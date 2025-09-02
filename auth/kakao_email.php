<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; 

// ------------------------------------------------------
// 0) 기본 검증
// ------------------------------------------------------
if (!isset($_GET['code'])) {
    exit('카카오 로그인 실패!');
}

$CODE = $_GET['code'];
$curlTimeout = 10; // 네트워크 안정성

// ------------------------------------------------------
// 1) 토큰 발급
// ------------------------------------------------------
$token_url = "https://kauth.kakao.com/oauth/token";

$data = [
    'grant_type'   => 'authorization_code',
    'client_id'    => $REST_API_KEY,     // base.class.php에서 정의
    'redirect_uri' => $AUTH_REDIRECT_URL, // base.class.php에서 정의 (인가요청에도 동일 적용)
    'code'         => $CODE
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $token_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $curlTimeout);
curl_setopt($ch, CURLOPT_TIMEOUT, $curlTimeout);
$response = curl_exec($ch);
if ($response === false) {
    $err = curl_error($ch);
    curl_close($ch);
    exit("토큰 요청 실패: {$err}");
}
curl_close($ch);

$token_info   = json_decode($response, true);
$access_token = $token_info['access_token'] ?? null;

if (!$access_token) {
    // 디버깅 필요 시 주석 해제
    // var_dump($token_info);
    exit("토큰 발급 실패");
}

// ------------------------------------------------------
// 2) 사용자 정보 조회
// ------------------------------------------------------
$user_url = "https://kapi.kakao.com/v2/user/me";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $user_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer {$access_token}"
]);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $curlTimeout);
curl_setopt($ch, CURLOPT_TIMEOUT, $curlTimeout);
$user_response = curl_exec($ch);
if ($user_response === false) {
    $err = curl_error($ch);
    curl_close($ch);
    exit("사용자 정보 요청 실패: {$err}");
}
curl_close($ch);

$user_info   = json_decode($user_response, true);
$kakao_id    = $user_info['id'] ?? null;
$nickname    = $user_info['properties']['nickname']      ?? '';
$profile_img = $user_info['properties']['profile_image'] ?? '';

// ------------------------------------------------------
// 3) 이메일 추출 + 검증
//    (scope=account_email 동의가 필요; 인가요청에 scope 포함해야 함)
// ------------------------------------------------------
$kakao_account = $user_info['kakao_account'] ?? [];
$email = '';
if (!empty($kakao_account['has_email']) && !empty($kakao_account['email'])) {
    $is_valid    = (bool)($kakao_account['is_email_valid']    ?? false);
    $is_verified = (bool)($kakao_account['is_email_verified'] ?? false);

    if ($is_valid && $is_verified) {
        $candidate = strtolower(trim($kakao_account['email']));
        if (filter_var($candidate, FILTER_VALIDATE_EMAIL)) {
            $email = $candidate;
        }
    }
}

// ------------------------------------------------------
// 4) DB 처리
// ------------------------------------------------------
$db = DB::getInstance();

// 4-1) 이메일 중복 정책 (일반 로그인과의 충돌 방지)
//  - 이메일이 있고, 동일 이메일의 계정이 이미 존재하면 차단.
//  - 특히 "일반 계정(카카오 미연동)"이 먼저 있다면 신규 카카오 가입을 막아야 함.
if ($email !== '') {
    $stmtEmail = $db->prepare("SELECT id, kakao_id FROM nb_users WHERE email = :email LIMIT 1");
    $stmtEmail->execute([':email' => $email]);
    $existingByEmail = $stmtEmail->fetch(PDO::FETCH_ASSOC);

    if ($existingByEmail) {
        $existingKakaoId = $existingByEmail['kakao_id'] ?? null;

        // (1) 일반 계정(카카오 미연동)으로 이미 존재하거나
        // (2) 다른 카카오 계정과 연동되어 있는 경우
        // => 신규 카카오 가입 차단 (정책상 안내)
        if (empty($existingKakaoId) || (string)$existingKakaoId !== (string)$kakao_id) {
            exit('이미 동일한 이메일로 가입된 계정이 있습니다. 일반 로그인 후 "카카오 연동"을 진행해 주세요.');
        }
    }
}

// 4-2) 기존 카카오 회원 조회
$stmt = $db->prepare("SELECT * FROM nb_users WHERE kakao_id = :kakao_id");
$stmt->execute([':kakao_id' => $kakao_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// 4-3) 신규 가입 (카카오 전용 계정 생성)
if (!$user) {
    $insert = $db->prepare("
        INSERT INTO nb_users (
            sitekey, user_id, password, name, email, phone,
            birth,
            kakao_id, kakao_nickname, kakao_profile_img,
            agree_receive_notice,
            agree_privacy_policy,
            agree_terms_of_service,
            regdate
        ) VALUES (
            :sitekey, :user_id, '', :name, :email, '',
            '',
            :kakao_id, :kakao_nickname, :kakao_profile_img,
            0, 0, 0,
            NOW()
        )
    ");
    $insert->execute([
        ':sitekey'           => $NO_SITE_UNIQUE_KEY,      // base.class.php에서 정의
        ':user_id'           => 'kakao_' . $kakao_id,
        ':name'              => $nickname ?: ('kakao_' . $kakao_id),
        ':email'             => $email,                   // 이메일 저장
        ':kakao_id'          => $kakao_id,
        ':kakao_nickname'    => $nickname,
        ':kakao_profile_img' => $profile_img
    ]);

    // 가입 후 다시 조회
    $stmt->execute([':kakao_id' => $kakao_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // 4-4) 기존 카카오 회원의 이메일 보강 업데이트 (DB엔 비어 있고, 새 이메일이 유효하며 중복도 없을 때만)
    if (empty($user['email']) && $email !== '') {
        $stmtDup = $db->prepare("SELECT id FROM nb_users WHERE email = :email AND id <> :id LIMIT 1");
        $stmtDup->execute([':email' => $email, ':id' => $user['id']]);
        $dup = $stmtDup->fetch(PDO::FETCH_ASSOC);

        if (!$dup) {
            $upd = $db->prepare("UPDATE nb_users SET email = :email WHERE id = :id");
            $upd->execute([':email' => $email, ':id' => $user['id']]);
            $user['email'] = $email;
        }
    }

    // (선택) 닉네임/프로필 최신화
    $needProfileUpdate = false;
    $params = [':id' => $user['id']];
    $sets   = [];

    if (!empty($nickname) && $nickname !== $user['kakao_nickname']) {
        $sets[] = "kakao_nickname = :nk";
        $params[':nk'] = $nickname;
        $needProfileUpdate = true;
    }
    if (!empty($profile_img) && $profile_img !== $user['kakao_profile_img']) {
        $sets[] = "kakao_profile_img = :pi";
        $params[':pi'] = $profile_img;
        $needProfileUpdate = true;
    }
    if ($needProfileUpdate) {
        $sql = "UPDATE nb_users SET " . implode(", ", $sets) . " WHERE id = :id";
        $u = $db->prepare($sql);
        $u->execute($params);
    }
}

// ------------------------------------------------------
// 5) 세션 로그인 처리
// ------------------------------------------------------
$_SESSION['id']          = $user['id'];
$_SESSION['user_id']     = $user['user_id'] ?? null;
$_SESSION['kakao_id']    = $user['kakao_id'];
$_SESSION['nickname']    = $user['kakao_nickname'];
$_SESSION['profile_img'] = $user['kakao_profile_img'];

// ------------------------------------------------------
// 6) 리다이렉트
// ------------------------------------------------------
$redirectPath = $_GET['state'] ?? '/';
header("Location: $redirectPath");
exit;

/*
메모:
- 인가 요청에 scope=account_email 포함 필요.
  예) https://kauth.kakao.com/oauth/authorize?...&scope=account_email
- "동일 이메일 자동 연동" 정책을 원하면, 차단(exit) 대신 기존 일반 계정에 kakao_id 업데이트하는 로직으로 바꿀 수 있습니다.
*/