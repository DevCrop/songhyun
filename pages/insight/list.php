<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>


<!-- contents -->

<main class="no-sub">
    <section class="no-sub-notice no-section-md">
        <div class="no-container-xl">
            <div class="--section-sub-title ">
                <h2 class="f-heading-3">INSIGHTS</h2>
            </div>

            <div class="no-filter-wrap">
                <div class="no-categories">
                    <ul>
                        <li class="is-active">
                            <a href="#">All</a>
                        </li>
                        <li>
                            <a href="#">News</a>
                        </li>
                        <li>
                            <a href="#">Notice</a>
                        </li>
                    </ul>
                </div>
                <div class="no-form-search ">
                    <input type="text" name="searchKeyword" id="searchKeyword" placeholder="검색어를 입력해주세요.">
                    <button type="button" class="" aria-label="search" onclick="doSearch();">
                        <i class="fa-light fa-magnifying-glass" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <?php
                $items = [
                    "VC 투자 유망 스타트업 동향 보고서SDADSASADADSDASADSDSADSADSA",
                    "PE 펀드를 통한 글로벌 인수합병 전략",
                    "인베스트먼트 트렌드: 2025년 산업 전망",
                    "VC 포트폴리오 관리 및 성과 분석",
                    "PE 투자자의 ESG 전략과 사례",
                    "스타트업 초기투자(Seed) 주요 포인트",
                    "글로벌 벤처캐피탈 투자 트렌드",
                    "PE 자금 조달 및 레버리지 전략",
                    "인베스트먼트 딜 소싱과 네트워크 구축",
                    "VC와 PE의 투자 차이점과 협력 기회"
                ];
            ?>

            <div class="--cnt">
                <!-- --cnt 내부 -->
                <div class="notice">
                    <ul>
                        <?php foreach( $items as $item) :?>
                        <li>
                            <a href="#">
                                <div class="title f-heading-5">
                                    <p><?=$item?></p>
                                </div>
                                <div class="arrow f-heading-4">
                                    <i class="fa-sharp fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>



                <nav class="no-pagination" aria-label="페이지 네비게이션">
                    <!-- 첫 페이지 -->
                    <a href="#" class="--arrow disabled" aria-label="첫 페이지">
                        <i class="fa-regular fa-chevrons-left"></i>
                    </a>

                    <!-- 이전 페이지 -->
                    <a href="#" class="--arrow disabled" aria-label="이전 페이지">
                        <i class="fa-regular fa-chevron-left"></i>
                    </a>

                    <!-- 페이지 번호 (예시) -->
                    <a href="#" class="">1</a>
                    <a href="#" class="">2</a>
                    <a href="#" class="active">3</a>
                    <a href="#" class="">4</a>
                    <a href="#" class="">5</a>
                    <a href="#" class="dots" aria-hidden="true">…</a>
                    <a href="#" class="">10</a>

                    <!-- 다음 페이지 -->
                    <a href="#" class="--arrow" aria-label="다음 페이지">
                        <i class="fa-regular fa-chevron-right"></i>
                    </a>

                    <!-- 마지막 페이지 -->
                    <a href="#" class="--arrow" aria-label="마지막 페이지">
                        <i class="fa-regular fa-chevrons-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </section>

    <?php include_once $STATIC_ROOT . '/inc/layouts/contact.php'; ?>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>