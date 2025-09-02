<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>



<!-- contents -->

<main class="no-sub">
    <section class="no-sub-as no-section-md">
        <div class="no-container-xl">
            <div class="--section-title-with-button">
                <hgroup>
                    <h2 class="f-heading-3 clr-text-title">AS Center</h2>
                </hgroup>

            </div>
            <div class="--cnt">
                <div class="left">
                    <h4 class="f-heading-4 --semibold">
                        미건 시스템은 전국적으로 <br>
                        AS센터를
                        보유하고 있습니다.</h4>
                </div>
                <div class="right">
                    <ul>
                        <?php for($i=1 ; $i < 10 ; $i++) :?>
                        <li>
                            <div class="txt">
                                <h5 class="f-heading-6 --semibold">서울 A/S센터</h5>
                                <p class="f-body-2">
                                    서울시 서초구 강남대로 23길 25 미건빌딩
                                </p>
                            </div>
                            <div class="phone">
                                <a href="#">
                                    <i class="fa-solid fa-phone"></i>
                                </a>
                            </div>

                        </li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
    </section>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>