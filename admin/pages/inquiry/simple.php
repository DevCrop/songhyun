<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "간편 문의";
$depthnum = 11;
$pagenum  = 1;

$db = DB::getInstance();

/* =============================
 * 페이지네이션 기본값
 * ============================= */
$perpage     = 10; // 페이지당 개수
$listCurPage = isset($_POST['page']) ? (int)$_POST['page'] : (isset($_GET['page']) ? (int)$_GET['page'] : 1);
if ($listCurPage < 1) $listCurPage = 1;
$pageBlock   = 2;   // 좌우 페이지 번호 개수
$offset      = ($listCurPage - 1) * $perpage;

/* =============================
 * 지점 목록
 * ============================= */
$branchesStmt = $db->prepare("SELECT id, name_kr FROM nb_branches WHERE id IN (2,3,4) ORDER BY id ASC");
$branchesStmt->execute();
$branches = $branchesStmt->fetchAll(PDO::FETCH_ASSOC);

/* =============================
 * GET 필터 파라미터
 * ============================= */
$branch_id      = isset($_GET['branch_id'])      ? trim($_GET['branch_id'])      : '';
$hope_treatment = isset($_GET['hope_treatment']) ? trim($_GET['hope_treatment']) : '';
$searchColumn   = isset($_GET['searchColumn'])   ? trim($_GET['searchColumn'])   : '';
$searchKeyword  = isset($_GET['searchKeyword'])  ? trim($_GET['searchKeyword'])  : '';

/* =============================
 * WHERE 절 구성
 * ============================= */
$where  = "WHERE 1=1";
$params = [];

if ($branch_id !== '') {
    $where .= " AND si.branch_id = :branch_id";
    $params[':branch_id'] = (int)$branch_id;
}
if ($hope_treatment !== '') {
    $where .= " AND si.hope_treatment = :hope_treatment";
    $params[':hope_treatment'] = (int)$hope_treatment;
}
if ($searchColumn !== '' && $searchKeyword !== '') {
    $allowedColumns = ['name','phone'];
    if (in_array($searchColumn, $allowedColumns, true)) {
        $where .= " AND si.{$searchColumn} LIKE :searchKeyword";
        $params[':searchKeyword'] = "%{$searchKeyword}%";
    }
}

/* =============================
 * 총 개수 → 전체 페이지 수
 * ============================= */
$countSql = "
    SELECT COUNT(*)
    FROM nb_simple_inquiries si
    LEFT JOIN nb_branches b ON si.branch_id = b.id
    {$where}
";
$countStmt = $db->prepare($countSql);
$countStmt->execute($params);
$totalCount = (int)$countStmt->fetchColumn();

$Page = (int)ceil($totalCount / $perpage);
if ($Page > 0 && $listCurPage > $Page) {
    $listCurPage = $Page;
    $offset = ($listCurPage - 1) * $perpage;
}

/* =============================
 * 리스트 조회 (LIMIT)
 * ============================= */
$sql = "
    SELECT 
        si.id,
        si.branch_id,
        si.name,
        si.phone,
        si.consult_time,
        si.hope_treatment,
        si.inquiry_type,
        si.created_at,
        si.is_confirmed,
        b.name_kr AS branch_label
    FROM nb_simple_inquiries si
    LEFT JOIN nb_branches b ON si.branch_id = b.id
    {$where}
    ORDER BY si.created_at DESC
    LIMIT {$offset}, {$perpage}
";
$stmt = $db->prepare($sql);
$stmt->execute($params);
$inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!--=====================HEAD========================= -->
<?php include_once "../../inc/admin.head.php"; ?>

<body data-page="inquiry">
    <div class="no-wrap">

        <!--=====================HEADER========================= -->
        <?php include_once "../../inc/admin.header.php"; ?>

        <main class="no-app no-container">

            <!--=====================DRAWER========================= -->
            <?php include_once "../../inc/admin.drawer.php"; ?>

            <form method="GET" name="frm" id="frm" autocomplete="off">
                <input type="hidden" name="mode" id="mode" value="list">

                <section class="no-content">
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                                <h1 class="no-page-title"><?=$pageName?> 관리</h1>
                                <div class="no-breadcrumb-container">
                                    <ul class="no-breadcrumb-list">
                                        <li class="no-breadcrumb-item"><span>환경설정</span></li>
                                        <li class="no-breadcrumb-item"><span><?=$pageName?> 관리</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 검색 조건 -->
                    <div class="no-search no-toolbar-container">
                        <div class="no-card">
                            <div class="no-card-header">
                                <h2 class="no-card-title"><?= $pageName ?> 검색</h2>
                            </div>
                            <div class="no-card-body no-admin-column">

                                <!-- 지점 선택 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">지점</h3>
                                    <div class="no-admin-content">
                                        <select name="branch_id" id="branch_category">
                                            <option value="">전체</option>
                                            <?php foreach ($branches as $b): ?>
                                            <option value="<?= $b['id'] ?>"
                                                <?= ($branch_id ?? '') == $b['id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($b['name_kr']) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- 희망 진료 선택 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">희망 진료</h3>
                                    <div class="no-admin-content">
                                        <select name="hope_treatment" id="hope_treatment">
                                            <option value="">전체</option>
                                            <?php foreach ($hope_treatments as $code => $label): ?>
                                            <option value="<?= $code ?>"
                                                <?= ($hope_treatment == $code) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($label) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <!-- 검색어 -->
                                <div class="no-admin-block wide">
                                    <h3 class="no-admin-title">검색어</h3>
                                    <div class="no-search-select">
                                        <select name="searchColumn" id="searchColumn">
                                            <option value="">선택</option>
                                            <option value="name"
                                                <?= ($searchColumn ?? '') === 'name' ? 'selected' : '' ?>>이름</option>
                                            <option value="phone"
                                                <?= ($searchColumn ?? '') === 'phone' ? 'selected' : '' ?>>연락처</option>
                                        </select>
                                        <div class="no-search-wrap no-ml">
                                            <div class="no-search-input">
                                                <i class="bx bx-search-alt-2"></i>
                                                <input type="text" name="searchKeyword" id="searchKeyword"
                                                    placeholder="검색어 입력"
                                                    value="<?= htmlspecialchars($searchKeyword ?? '') ?>">
                                            </div>
                                            <div class="no-search-btn">
                                                <button type="submit" class="no-btn no-btn--main no-btn--search">
                                                    검색
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="no-content-container">
                        <div class="no-card">
                            <div class="no-card-header">
                                <h2 class="no-card-title"><?=$pageName?> 리스트</h2>
                            </div>

                            <div class="no-card-body">

                                <div class="no-table-responsive">
                                    <table class="no-table">
                                        <thead>
                                            <tr>
                                                <th>번호</th>
                                                <th>지점</th>
                                                <th>이름</th>
                                                <th>연락처</th>
                                                <th>상담 시간</th>
                                                <th>희망 진료</th>
                                                <th>문의 일자</th>
												<th>확인 여부</th>
                                                <th>관리</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($inquiries) > 0): ?>
                                            <?php foreach ($inquiries as $row): ?>
                                            <tr>

                                                <td><?= $row['id'] ?></td>
                                                <td><?= htmlspecialchars($row['branch_label']) ?></td>
                                                <td><?= htmlspecialchars($row['name']) ?></td>
                                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                                <td><?= $consult_time_options[$row['consult_time']] ?? '미정' ?></td>
                                                <td><?= $hope_treatments[$row['hope_treatment']] ?? '미정' ?></td>
                                                <td><?= substr($row['created_at'], 0, 10) ?></td>
												<td>
												  <span
													class="no-btn <?= ((int)$row['is_confirmed'] === 1) ? 'no-btn--notice' : 'no-btn--normal' ?>">
													<?= htmlspecialchars($is_confirmed[(int)$row['is_confirmed']] ?? '미정', ENT_QUOTES, 'UTF-8') ?>
												  </span>
												</td>
                                                <td>
                                                    <div class="no-table-role">
                                                        <span class="no-role-btn"><i
                                                                class="bx bx-dots-vertical-rounded"></i></span>
                                                        <div class="no-table-action">
                                                            <a href="simple.view.php?id=<?= $row['id'] ?>"
                                                                class="no-btn no-btn--sm no-btn--normal">자세히 보기</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="10" style="text-align:center;">문의 내역이 없습니다.</td>
                                            </tr>
                                            <?php endif; ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include_once "../../lib/admin.pagination.php"; ?>
                </section>
            </form>
        </main>
    </div>

    <?php include_once "../../inc/admin.footer.php"; ?>