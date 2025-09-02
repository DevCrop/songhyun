<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>

<!-- contents -->


<?php
$notices = [
  [
    "id" => 101,
    "cate" => "공지",
    "title" => "M200 제품 안내 및 출하 일정 공지",
    "date" => "2025-08-28",
    "views" => 312
  ],
  [
    "id" => 100,
    "cate" => "업데이트",
    "title" => "쇼룸 운영시간 변경 안내 쇼룸 운영시간 변경 안내쇼룸 운영시간 변경 안내",
    "date" => "2025-08-20",
    "views" => 189
  ],
  [
    "id" => 99,
    "cate" => "이벤트",
    "title" => "가을 프로모션 사전 신청 접수",
    "date" => "2025-08-12",
    "views" => 556
  ],
  [
    "id" => 98,
    "cate" => "공지",
    "title" => "서버 점검 예정 안내 (9월 1일)",
    "date" => "2025-08-05",
    "views" => 421
  ],
  [
    "id" => 97,
    "cate" => "공지",
    "title" => "홈페이지 리뉴얼 안내",
    "date" => "2025-07-30",
    "views" => 603
  ],
];
?>

<main class="no-sub">
    <section class="no-sub-notice no-section-md">
        <div class="no-container-xl">
            <div class="--section-title-with-search">
                <hgroup>
                    <h2 class="f-heading-3 clr-text-title">제품 문의</h2>
                </hgroup>

                <div class="no-form-search ">
                    <input type="text" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력해주세요.">
                    <button type="button" class="" aria-label="search" onclick="doSearch();">
                        <i class="fa-light fa-magnifying-glass" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <div class="--cnt">
                <!-- --cnt 내부 -->
                <div class="notice">
                    <table class="notice">
                        <colgroup>
                            <col style="width: auto;" />
                            <col />
                            <col />
                        </colgroup>
                        <thead>
                            <tr class="">
                                <th class="notice-head notice-title f-body-2">제목</th>
                                <th class="notice-head notice-date f-body-2">작성일</th>
                                <th class="notice-head notice-views f-body-2">조회수</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($notices as $notice): ?>
                            <tr class="notice-row">
                                <td class="notice-cell notice-title">
                                    <a class="f-body-1 --semibold"
                                        href="/pages/notice/view.php?id=<?= $notice['id'] ?>">
                                        <?= htmlspecialchars($notice['title']) ?>
                                    </a>
                                </td>
                                <td class="notice-cell notice-date ">
                                    <time datetime="<?= $notice['date'] ?>">
                                        <?= date("Y-m-d", strtotime($notice['date'])) ?>
                                    </time>
                                </td>
                                <td class="notice-cell notice-views">
                                    <?= number_format($notice['views']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>

                <div class="no-write-btn">
                    <a href="#" class="no-btn-primary">
                        자세히 보기
                    </a>
                </div>


                <nav class="no-pagination" aria-label="페이지 네비게이션">
                    <a href="#" class="--arrow" aria-label="첫 페이지">«</a>
                    <a href="#" class="--arrow" aria-label="이전 페이지">‹</a>

                    <a href="#">1</a>
                    <a href="#" class="active">2</a>
                    <a href="#">3</a>
                    <a href="#" class="--arrow" aria-label="다음 페이지">›</a>
                    <a href="#" class="--arrow" aria-label="마지막 페이지">»</a>
                </nav>

            </div>
    </section>

</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>