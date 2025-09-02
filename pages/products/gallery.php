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
            <div class="--section-sub-title">
                <h2 class="f-heading-3">Products Gallery</h2>
            </div>
            <div class="--cnt">
                <ul>
                    <?php for($i =1 ; $i < 7; $i++) : ?>
                    <li>
                        <a href="">
                            <figure>
                                <img src="<?=$ROOT?>/resource/images/main/main_brand_img_<?=$i?>.jpg" alt="">
                                <div class="--pos-logo">
                                    <img src="<?=$ROOT?>/resource/images/logo/brands_logo_<?=$i?>.svg" alt="">
                                </div>

                            </figure>
                        </a>
                    </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </section>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>