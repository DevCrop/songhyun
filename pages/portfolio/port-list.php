<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>


<!-- contents -->

<main class="no-sub">
    <section class="no-sub-port no-section-md">
        <div class="no-container-xl">
            <div class="--section-sub-title ">
                <h2 class="f-heading-3">투자 포토폴리오</h2>
            </div>
            <div class="no-filter-wrap">
                <div class="no-categories">
                    <ul>
                        <li class="is-active">
                            <a href="#">All</a>
                        </li>
                        <li>
                            <a href="#">Current</a>
                        </li>
                        <li>
                            <a href="#">Exited</a>
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
            <div class="--cnt">
                <div class="no-sub-port-list">
                    <ul>
                        <?php for($i = 1; $i<10 ; $i++) :?>
                        <li>
                            <a href="#">

                                <figure>
                                    <span class="--tag">Current</span>
                                    <img src="<?=$ROOT?>/resource/images/logo/port_logo_img_<?=$i?>.png" alt="">
                                </figure>
                                <div class="txt">
                                    <h4 class="f-heading-5 --bold">하나 기술</h4>
                                    <span class="f-body-1 --medium">2차전지장비</span>
                                </div>
                            </a>
                        </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
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
    </section>


    <?php include_once $STATIC_ROOT . '/inc/layouts/contact.php'; ?>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>