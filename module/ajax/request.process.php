<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/inc/lib/base.class.php";
if (session_status() === PHP_SESSION_NONE) { session_start(); }


function p($k) {
    $v = $_POST[$k] ?? '';
    return function_exists('xss_clean') ? xss_clean($v) : (is_string($v) ? trim($v) : $v);
}

$name     = p('title');     
$company  = p('company');
$phone    = p('phone');
$area     = p('area');
$contents = p('contents');
$r_captcha= p('r_captcha');

if ($name === '' || $phone === '' || $contents === '' || $area === '') {
    echo json_encode(["result"=>"fail","msg"=>"필수 입력 항목이 누락되었습니다."]); exit;
}


if (!isset($_SESSION['captcha_secure']) || $_SESSION['captcha_secure'] != $r_captcha) {
    echo json_encode(["result"=>"fail","msg"=>"보안코드가 일치하지 않습니다. 정확히 입력해주세요"]); exit;
}

try {
    /** @var PDO $pdo */
    $pdo = DB::getInstance();

    $sql = "INSERT INTO nb_request
              (sitekey, name, phone, company, area, contents, regdate, is_confirmed)
            VALUES
              (:sitekey, :name, :phone, :company, :area, :contents, NOW(), 0)";

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':sitekey',  $NO_SITE_UNIQUE_KEY, PDO::PARAM_STR);
    $stmt->bindValue(':name',     $name,               PDO::PARAM_STR);
    $stmt->bindValue(':phone',    $phone,              PDO::PARAM_STR);
    $stmt->bindValue(':company',  $company,            PDO::PARAM_STR);
    $stmt->bindValue(':area',     $area,               PDO::PARAM_INT);
    $stmt->bindValue(':contents', $contents,           PDO::PARAM_STR);

    $ok = $stmt->execute();

    echo json_encode($ok
        ? ["result"=>"success","msg"=>"정상적으로 문의가 접수되었습니다. 빠른 시일 내 연락드리겠습니다."]
        : ["result"=>"fail","msg"=>"처리 중 문제가 발생했습니다. [REQ-DB]"]
    );
    exit;

} catch (Throwable $e) {
    echo json_encode(["result"=>"fail","msg"=>"처리중 오류가 발생했습니다. [REQ-EXC]"]); exit;
}