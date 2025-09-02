<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "페이지별 SEO";
$depthnum = 10;
$pagenum  = 3;

$db = DB::getInstance();

/* =============================
 * 페이지네이션
 * ============================= */
$perpage     = 10;
$listCurPage = isset($_REQUEST['page']) ? (int)$_REQUEST['page'] : 1;
if ($listCurPage < 1) $listCurPage = 1;
$pageBlock   = 2;
$offset      = ($listCurPage - 1) * $perpage;

/* =============================
 * 지점 데이터 (검색용)
 * ============================= */
$branchesStmt = $db->prepare("SELECT id, name_kr FROM nb_branches ORDER BY id ASC");
$branchesStmt->execute();
$branches = $branchesStmt->fetchAll(PDO::FETCH_ASSOC);

/* =============================
 * 필터 파라미터
 * ============================= */
$branch_id     = isset($_GET['branch_id']) ? trim($_GET['branch_id']) : '';
$searchColumn  = isset($_GET['searchColumn']) ? trim($_GET['searchColumn']) : '';
$searchKeyword = isset($_GET['searchKeyword']) ? trim($_GET['searchKeyword']) : '';

/* =============================
 * WHERE + 파라미터
 * ============================= */
$where  = "WHERE 1=1";
$params = [];

if ($branch_id !== '') {
    $where .= " AND s.branch_id = :branch_id";
    $params[':branch_id'] = (int)$branch_id;
}
if ($searchColumn !== '' && $searchKeyword !== '') {
    // 실제 컬럼만 허용
    $allowed = ['path','page_title','meta_title'];
    if (in_array($searchColumn, $allowed, true)) {
        $where .= " AND s.{$searchColumn} LIKE :kw";
        $params[':kw'] = "%{$searchKeyword}%";
    }
}

/* =============================
 * 총 개수 → 전체 페이지
 * ============================= */
$countSql = "
    SELECT COUNT(*)
    FROM nb_branch_seos s
    LEFT JOIN nb_branches b ON s.branch_id = b.id
    {$where}
";
$countStmt = $db->prepare($countSql);
$countStmt->execute($params);
$totalCount = (int)$countStmt->fetchColumn();
$Page = (int)ceil($totalCount / $perpage);

// 범위 보정
if ($Page > 0 && $listCurPage > $Page) {
    $listCurPage = $Page;
    $offset = ($listCurPage - 1) * $perpage;
}

/* =============================
 * 데이터 조회 (동일 WHERE + LIMIT)
 * ============================= */
$sql = "
    SELECT 
        s.id, s.branch_id, b.name_kr AS branch_label, 
        s.path, s.page_title, s.meta_title, s.updated_at
    FROM nb_branch_seos s
    LEFT JOIN nb_branches b ON s.branch_id = b.id
    {$where}
    ORDER BY s.id DESC
    LIMIT :offset, :perpage
";
$stmt = $db->prepare($sql);
foreach ($params as $k => $v) {
    $stmt->bindValue($k, $v);
}
$stmt->bindValue(':offset',  $offset,  PDO::PARAM_INT);
$stmt->bindValue(':perpage', $perpage, PDO::PARAM_INT);
$stmt->execute();
$seoRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!--=====================HEAD========================= -->
<?php include_once "../../inc/admin.head.php"; ?>

<body data-page="seo">
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
                            <div class="no-items-center">
                                <a href="./seo.new.php" class="no-btn no-btn--main no-btn--big"> <?=$pageName?> 생성 </a>
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

                                <!-- 검색어 -->
                                <div class="no-admin-block wide">
                                    <h3 class="no-admin-title">검색어</h3>
                                    <div class="no-search-select">
                                        <div class="no-search-wrap">
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
                                <div class="no-table-option">
                                    <ul class="no-table-check-control">
                                        <li><a href="#" class="no-btn no-btn--sm no-btn--check active "
                                                data-action="selectAll">전체선택</a></li>
                                        <li><a href="#" class="no-btn no-btn--sm no-btn--check"
                                                data-action="deselectAll">선택해제</a></li>
                                        <li><a href="#" class="no-btn no-btn--sm no-btn--check"
                                                data-action="deleteSelected">선택삭제</a></li>
                                    </ul>
                                </div>

                                <div class="no-table-responsive">
                                    <table class="no-table">
                                        <thead>
                                            <tr>
                                                <th class="no-width-25 no-check">
                                                    <div class="no-checkbox-form">
                                                        <label>
                                                            <input type="checkbox" id="selectAllCheckbox" />
                                                            <span><i class="bx bxs-check-square"></i></span>
                                                        </label>
                                                    </div>
                                                </th>
                                                <th>번호</th>
                                                <th>지점</th>
                                                <th>경로</th>
                                                <th>제목</th>
                                                <th>Meta Title</th>
                                                <th>수정일</th>
                                                <th>관리</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (count($seoRows) > 0): ?>
                                            <?php foreach ($seoRows as $row): ?>
                                            <tr>
                                                <td class="no-check">
                                                    <div class="no-checkbox-form">
                                                        <label>
                                                            <input type="checkbox" class="no-chk"
                                                                value="<?= $row['id'] ?>" />
                                                            <span><i class="bx bxs-check-square"></i></span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td><?= htmlspecialchars($row['id']) ?></td>
                                                <td><?= htmlspecialchars($row['branch_label']) ?></td>
                                                <td><?= htmlspecialchars($row['path']) ?></td>
                                                <td><?= htmlspecialchars($row['page_title']) ?></td>
                                                <td><?= htmlspecialchars($row['meta_title']) ?></td>
                                                <td><?= htmlspecialchars(substr($row['updated_at'], 0, 10)) ?></td>
                                                <td>
                                                    <div class="no-table-role">
                                                        <span class="no-role-btn"><i
                                                                class="bx bx-dots-vertical-rounded"></i></span>
                                                        <div class="no-table-action">
                                                            <a href="seo.edit.php?id=<?= $row['id'] ?>&page=<?= $listCurPage ?>"
                                                                class="no-btn no-btn--sm no-btn--normal">수정</a>
                                                            <button type="button"
                                                                class="no-btn no-btn--sm no-btn--delete-outline delete-btn"
                                                                data-id="<?= $row['id'] ?>">
                                                                삭제
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center; color: #888;">등록된 SEO 데이터가
                                                    없습니다.</td>
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