<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>


<!-- contents -->

<main class="no-sub">
    <section class="no-sub-product-list no-section-md">
        <div class="no-container-xl">
            <div class="product-banner">
                <figure>
                    <img src="<?=$ROOT?>/resource/images/sub/sub_list_banner.jpg" alt="">
                </figure>
                <div class="product-banner-txt">
                    <span class="clr-primary-def">Eversys</span>
                    <h3 class="f-heading-4">배너 타이틀입니다.</h3>
                    <p class="f-body-2">배너 설명글입니다.</p>
                </div>
            </div>
            <div class="--cnt">
                <ul class="product-list">
                    <?php for($i = 1 ; $i < 10; $i ++) :?>
                    <li class="product-item">
                        <a href="">
                            <span class="--badge">New</span>
                            <figure>
                                <img src="<?=$ROOT?>/resource/images/sub/product_list_1.png" alt="">
                            </figure>

                        </a>
                        <h5 class="f-heading-6 --tac">E4S/Classic</h5>
                    </li>
                    <?php endfor;?>
                </ul>
            </div>
        </div>
    </section>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>