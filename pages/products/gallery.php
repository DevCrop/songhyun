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

            <div class="--section-title-with-button">
                <hgroup>
                    <h2 class="f-heading-3">Products Gallery</h2>
                </hgroup>
            </div>
            <div class="--cnt">
                <ul>
                    <?php for($i =1 ; $i < 7; $i++) : ?>
                    <li>
                        <a href="">
                            <figure>
                                <img src="<?=$ROOT?>/resource/images/main/main_brand_img_<?=$i?>.jpg" alt="">
                            </figure>
                            <div class="txt">
                                <div>
                                    <h3 class="f-heading-5 --semibold">SCOTSMAN</h3>
                                    <p class="f-body-3 --medium"> SCOTSMAN은 상업용 제빙 솔루션에 특화된 브랜드로, 안정적인 생산량과 균일한 얼음 품질로
                                        바쁜
                                        주방과
                                        카페, 바(Bar)
                                        환경에서도 일관된 서비스를
                                        가능하게 합니다.
                                    </p>
                                </div>
                                <button type="button">
                                    <i class="fa-regular fa-arrow-right"></i>
                                </button>
                            </div>
                        </a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </section>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>