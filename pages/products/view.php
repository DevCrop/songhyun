<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>



<!-- contents -->

<main class="no-sub no-sub-view">
    <section class="no-sub-product-view ">
        <div class="no-container-xl">
            <h2 class="f-heading-2">
                Lacimbali M200
            </h2>
            <div class="product-view-banner">
                <figure>
                    <img src="<?=$ROOT?>/resource/images/sub/view_banner.jpg" alt="">
                </figure>
            </div>
        </div>
        <div class="product-view-youtube no-section-md">
            <div class="no-container-xl">
                <div class="desc --tac">
                    Lacimbali New 하이앤드 머신, M200. <br>
                    시선을 사로잡는 디자인, Lacimbali 100년의 최고의 기술력을 집약한 모델 <br>
                    M200은 최고의 바리스타, 최고의 커피를 위한 최선의 선택입니다.
                </div>
                <figure>
                    <iframe src="https://www.youtube.com/embed/L1oiYWCWUmM?si=EmVYpFQNQLseMDzV"
                        title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </figure>
            </div>
        </div>
        <div class="no-section-md">
            <div class="no-container-xl">
                <div class="--cnt">
                    <div class="left">
                        <div class="no-sub-product-view-swiper swiper">
                            <ul class="swiper-wrapper">
                                <?php for($i=1 ; $i < 4; $i++) :?>
                                <li class="swiper-slide">
                                    <figure>
                                        <img src="<?=$ROOT?>/resource/images/sub/product_list_1.png" alt="">
                                    </figure>
                                </li>
                                <?php endfor;?>
                            </ul>
                        </div>
                        <div class="no-sub-product-thumb-swiper swiper">
                            <ul class="swiper-wrapper">
                                <?php for($i=1 ; $i < 4; $i++) :?>
                                <li class="swiper-slide">
                                    <figure>
                                        <img src="<?=$ROOT?>/resource/images/sub/product_list_1.png" alt="">
                                    </figure>
                                </li>
                                <?php endfor;?>
                            </ul>
                        </div>
                    </div>
                    <div class="right">
                        <h3 class="f-heading-4 --bold">Lacimbali <span class="clr-primary-def">M200</span></h3>
                        <div class="info-wrap">

                            <div class="info-block">
                                <h5 class="f-heading-6 --semibold">Summary</h5>
                                <div class="info-feature">
                                    설명글 들어감
                                </div>
                            </div>


                            <div class="info-block">
                                <h5 class="f-heading-6 --semibold">Specifications</h5>
                                <ul class="no-sub-view-spec-list">
                                    <li>
                                        <h4 class="f-body-1 --bold">전기</h4>
                                        <ul class="no-sub-view-spec-item">
                                            <li>
                                                <span>2GR</span>
                                                <p>220~240V 60Hz</p>
                                            </li>
                                            <li>
                                                <span>3GR</span>
                                                <p>380~425V 60Hz</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h4 class="f-body-1 --bold">전력</h4>
                                        <ul class="no-sub-view-spec-item">
                                            <li>
                                                <span>2GR</span>
                                                <p>6200~7400W</p>
                                            </li>
                                            <li>
                                                <span>3GR</span>
                                                <p>7500~8800W</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h4 class="f-body-1 --bold">전력</h4>
                                        <ul class="no-sub-view-spec-item">
                                            <li>
                                                <span>2GR</span>
                                                <p>6200~7400W</p>
                                            </li>
                                            <li>
                                                <span>3GR</span>
                                                <p>7500~8800W</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h4 class="f-body-1 --bold">전력</h4>
                                        <ul class="no-sub-view-spec-item">
                                            <li>
                                                <span>2GR</span>
                                                <p>6200~7400W</p>
                                            </li>
                                            <li>
                                                <span>3GR</span>
                                                <p>7500~8800W</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <h4 class="f-body-1 --bold">전력</h4>
                                        <ul class="no-sub-view-spec-item">
                                            <li>
                                                <span>2GR</span>
                                                <p>6200~7400W</p>
                                            </li>
                                            <li>
                                                <span>3GR</span>
                                                <p>7500~8800W</p>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                            <div class="info-block">
                                <h5 class="f-heading-6 --semibold">Features</h5>
                                <div class="info-feature">
                                    ...텍스트 들어감
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </section>

</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>