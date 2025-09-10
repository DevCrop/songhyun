<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>


<!-- contents -->

<main class="no-sub">
    <section class="no-sub-port-view no-section-md">
        <div class="no-container-lg">
            <div class="no-sub-port-view-inner">
                <div class="left">
                    <figure>
                        <img src="<?=$ROOT?>/resource/images/logo/port_logo_img_1.png" alt="">
                    </figure>
                    <div class="desc f-body-1 --medium">
                        ㈜유앤아이메디컬은 의료기기 및 소모품을 전문적으로 공급하는 기업으로, 1,500여 개 병·의원과의 안정적인 네트워크를 기반으로 국내외 의료산업에서 지속적인 성장을 이어가고
                        있습니다.
                    </div>
                </div>
                <div class="right">
                    <div class="title">
                        <h3 class="f-heading-3">유앤아이</h3>
                        <span class="state">Current</span>
                    </div>
                    <div class="info">
                        <ul>
                            <li>
                                <span>업종</span>
                                <p>
                                    의료기기 판매 및 유통
                                </p>
                            </li>
                            <li>
                                <span>투자연도</span>
                                <p>
                                    2019년
                                </p>
                            </li>
                            <li>
                                <span>홈페이지</span>
                                <p>
                                    <a href="#">홈페이지 링크</a>
                                </p>
                            </li>
                            <li>
                                <span>수익률</span>
                                <p>
                                    21%
                                </p>
                            </li>
                            <li>
                                <span>IRR</span>
                                <p>
                                    18%
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="no-container-lg">
            <div class="flex-center">
                <a href="#" class="prev-link">
                    <span>Go To List</span>
                    <i class="fa-regular fa-list"></i>
                </a>
            </div>
        </div>

    </section>




    <?php include_once $STATIC_ROOT . '/inc/layouts/contact.php'; ?>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>