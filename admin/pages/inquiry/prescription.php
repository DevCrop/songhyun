<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "개인맞춤한약 예진표";
$depthnum = 11;
$pagenum  = 3;

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
 * 필터 GET 변수
 * ============================= */
$searchColumn  = isset($_GET['searchColumn']) ? trim($_GET['searchColumn']) : '';
$searchKeyword = isset($_GET['searchKeyword']) ? trim($_GET['searchKeyword']) : '';

/* =============================
 * WHERE 조건
 * ============================= */
$where  = "WHERE 1=1";
$params = [];

if ($searchColumn !== '' && $searchKeyword !== '') {
    $allowed = ['name','phone','job'];
    if (in_array($searchColumn, $allowed, true)) {
        $where .= " AND {$searchColumn} LIKE :searchKeyword";
        $params[':searchKeyword'] = "%{$searchKeyword}%";
    }
}

/* =============================
 * 총 개수 조회 → 전체 페이지 수 계산
 * ============================= */
$countSql = "SELECT COUNT(*) FROM nb_custom_inquires {$where}";
$countStmt = $db->prepare($countSql);
$countStmt->execute($params);
$totalCount = (int)$countStmt->fetchColumn();

$Page = (int)ceil($totalCount / $perpage);
if ($Page > 0 && $listCurPage > $Page) {
    $listCurPage = $Page;
    $offset = ($listCurPage - 1) * $perpage;
}

/* =============================
 * 목록 조회 (LIMIT)
 * ============================= */
$sql = "
    SELECT id, name, birth, is_confirmed, job, phone, gender, consult_time,
           first_visit, created_at
    FROM nb_custom_inquires
    {$where}
    ORDER BY created_at DESC
    LIMIT {$offset}, {$perpage}
";
$stmt = $db->prepare($sql);
$stmt->execute($params);
$inquiries = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<!--=====================HEAD========================= -->
<?php include_once "../../inc/admin.head.php"; ?>

<body data-page="faq">
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
                                <!-- 검색어 -->
                                <div class="no-admin-block wide">
                                    <h3 class="no-admin-title">검색어</h3>
                                    <div class="no-search-select">
                                        <select name="searchColumn" id="searchColumn">
                                            <option value="">선택</option>
                                            <option value="name" <?= ($searchColumn === 'name') ? 'selected' : '' ?>>이름
                                            </option>
                                            <option value="phone" <?= ($searchColumn === 'phone') ? 'selected' : '' ?>>
                                                연락처</option>
                                            <option value="job" <?= ($searchColumn === 'job') ? 'selected' : '' ?>>직업
                                            </option>
                                        </select>
                                        <div class="no-search-wrap no-ml">
                                            <div class="no-search-input">
                                                <i class="bx bx-search-alt-2"></i>
                                                <input type="text" name="searchKeyword" id="searchKeyword"
                                                    placeholder="검색어 입력"
                                                    value="<?= htmlspecialchars($searchKeyword) ?>">
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
                                                <th>이름</th>
                                                <th>성별</th>
                                                <th>생년월일</th>
                                                <th>직업</th>
                                                <th>연락처</th>
                                                <th>상담 시간</th>
                                                <th>첫 방문 여부</th>
                                                <th>등록일</th>
												<th>확인 여부</th>
                                                <th>관리</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($inquiries)): ?>
                                            <?php foreach ($inquiries as $row): ?>
                                            <tr>
                                                <td><?= $row['id'] ?></td>
                                                <td><?= htmlspecialchars($row['name']) ?></td>
                                                <td><?= $gender_options[$row['gender']] ?? '미정' ?></td>
                                                <td><?= htmlspecialchars($row['birth']) ?></td>
                                                <td><?= htmlspecialchars($row['job']) ?></td>
                                                <td><?= htmlspecialchars($row['phone']) ?></td>
                                                <td><?= $product_consult_time_options[$row['consult_time']] ?? '미정' ?>
                                                </td>
                                                <td><?= $first_visit_options[$row['first_visit']] ?? '미정' ?></td>
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
                                                            <a href="prescription.view.php?id=<?= $row['id'] ?>&page=<?= $listCurPage ?>"
                                                                class=" no-btn no-btn--sm no-btn--normal">자세히 보기</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="10" style="text-align:center;">예진표가 없습니다.</td>
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