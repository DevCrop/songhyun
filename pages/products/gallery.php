<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>


<!-- contents -->

<main class="no-sub">
    <section class="no-sub-gallery no-section-md">
        <div class="no-container-xl">

            <div class="--section-title-with-button" <?=$aos['middle']?>>
                <hgroup>
                    <h2 class="f-heading-3">Products Gallery</h2>
                </hgroup>
            </div>
            <div class="--cnt">
                <ul>

                    <li>
                        <a href="<?=$ROOT?>/pages/board/board.list.php?board_no=23">
                            <figure class="--clip-img-wrap">
                                <img class="--clip-img" src="<?=$ROOT?>/resource/images/main/main_brand_img_1.jpg"
                                    alt="">
                            </figure>
                            <div class="txt">
                                <div>
                                    <h3 class="f-heading-5 --semibold">Scotsman</h3>
                                    <p class="f-body-3 --medium">
                                        세계적인 제빙기 브랜드 SCOTSMAN은 안정적인 생산량과 뛰어난 내구성으로<br>
                                        호텔, 레스토랑, 카페 등 다양한 업장에서 최상의 얼음을 제공합니다.
                                    </p>
                                </div>
                                <button type="button">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="<?=$ROOT?>/pages/board/board.list.php?board_no=23">
                            <figure class="--clip-img-wrap">
                                <img class="--clip-img" src="<?=$ROOT?>/resource/images/main/main_brand_img_2.jpg"
                                    alt="">
                            </figure>
                            <div class="txt">
                                <div>
                                    <h3 class="f-heading-5 --semibold">Eversys</h3>
                                    <p class="f-body-3 --medium">
                                        스위스 기술력의 정수를 담은 Eversys는 최첨단 자동 에스프레소 머신으로,<br>
                                        바리스타 수준의 품질과 효율성을 동시에 제공합니다.
                                    </p>
                                </div>
                                <button type="button">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$ROOT?>/pages/board/board.list.php?board_no=23">
                            <figure class="--clip-img-wrap">
                                <img class="--clip-img" src="<?=$ROOT?>/resource/images/main/main_brand_img_4.jpg"
                                    alt="">
                            </figure>
                            <div class="txt">
                                <div>
                                    <h3 class="f-heading-5 --semibold">Fetco</h3>
                                    <p class="f-body-3 --medium">
                                        대용량 커피 브루어 분야의 선두주자 FETCO는<br>
                                        안정적인 추출력과 유지보수 편의성으로 업계에서 높은 신뢰를 받고 있습니다.
                                    </p>
                                </div>
                                <button type="button">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="<?=$ROOT?>/pages/board/board.list.php?board_no=23">
                            <figure class="--clip-img-wrap">
                                <img class="--clip-img" src="<?=$ROOT?>/resource/images/main/main_brand_img_5.jpg"
                                    alt="">
                            </figure>
                            <div class="txt">
                                <div>
                                    <h3 class="f-heading-5 --semibold">Cooktek</h3>
                                    <p class="f-body-3 --medium">
                                        Cooktek은 첨단 인덕션 기술로 유명하며,<br>
                                        에너지 효율성과 빠른 조리 속도로 현대적인 주방 환경을 혁신합니다.
                                    </p>
                                </div>
                                <button type="button">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="<?=$ROOT?>/pages/board/board.list.php?board_no=23">
                            <figure class="--clip-img-wrap">
                                <img class="--clip-img" src="<?=$ROOT?>/resource/images/main/main_brand_img_6.jpg"
                                    alt="">
                            </figure>
                            <div class="txt">
                                <div>
                                    <h3 class="f-heading-5 --semibold">Grindmaster</h3>
                                    <p class="f-body-3 --medium">
                                        커피 그라인더와 브루잉 장비의 명가 Grindmaster는<br>
                                        오랜 노하우와 기술력으로 균일하고 신선한 커피 경험을 제공합니다.
                                    </p>
                                </div>
                                <button type="button">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="<?=$ROOT?>/pages/board/board.list.php?board_no=23">
                            <figure class="--clip-img-wrap">
                                <img class="--clip-img" src="<?=$ROOT?>/resource/images/main/main_brand_img_3.jpg"
                                    alt="">
                            </figure>
                            <div class="txt">
                                <div>
                                    <h3 class="f-heading-5 --semibold">LaCimbali</h3>
                                    <p class="f-body-3 --medium">
                                        전통과 혁신을 아우르는 이탈리아 브랜드 LaCimbali는<br>
                                        세계 바리스타들이 사랑하는 프리미엄 에스프레소 머신을 제공합니다.
                                    </p>
                                </div>
                                <button type="button">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </section>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>