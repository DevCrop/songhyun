<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->



<!-- contents -->

<div class="no-intro">
    <div class="wrap">
        <div class="txt">
            <span>SONGHYUN INVEST.</span>
        </div>
        <div class="bg">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>

<main class="no-main">
    <section class="no-main-visual">
        <div class="no-main-visual-swiper swiper">
            <ul class="swiper-wrapper">
                <?php for($i = 1; $i < 4 ; $i++) :?>
                <li class="swiper-slide">
                    <a href="#">
                        <article>
                            <img src="/resource/images/main/main_visual_img_<?=$i?>.jpg">
                        </article>
                        <div class="no-main-visual-txt">
                            <div class="no-main-visual-txt-wrap">
                                <span class="f-display-1 ">
                                    GROWTH <br>
                                    TRUST <br>
                                    INTEGRITY
                                </span>
                            </div>
                        </div>
                    </a>
                </li>
                <?php endfor; ?>
            </ul>
            <div class="no-main-visual-pagination-container">
                <div>
                    <button class="swiper-button-prev swiper-button">
                        <i class="fa-sharp fa-solid fa-arrow-left"></i>
                    </button>
                    <div class="swiper-pagination"></div>
                    <button class="swiper-button-next swiper-button">
                        <i class="fa-sharp fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </div>

        </div>
    </section>
    <section class="no-main-about no-section-md">
        <div class="no-container-xl">
            <div class="--section-title-with-button --main-section-title">
                <div class="txt">
                    <hgroup>
                        <h2 class="f-heading-2 clr-text-title"><span class="clr-primary-def">SONGHYUN</span> INVEST.
                        </h2>
                    </hgroup>
                    <p class="f-heading-5 --medium">
                        평균 19년의 경험과 검증된 성과를 바탕으로 <br>
                        정직한 원칙과 함께 기업의 지속 성장을 이끌어갑니다.
                    </p>
                </div>
                <div class="button">
                    <a href="#" class="no-btn-arrow no-btn-arrow--default">
                        <span>VIEW MORE</span>
                        <i class="fa-sharp fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="--cnt">

                <div class="no-main-about-card-wrap">
                    <div class="no-main-about-card">
                        <span class="f-heading-5 --medium"> <i class="fa-regular fa-calendar-clock"></i>평균 운용 경력</span>
                        <div>
                            <h4><strong class="counting" data-count="2012">00</strong></h4>
                            <p> 년</p>
                        </div>
                    </div>

                    <div class="no-main-about-card">
                        <span class="f-heading-5 --medium"> <i class="fa-regular fa-building-magnifying-glass"></i>IPO
                            RATIO</span>

                        <div>
                            <h4><strong class="counting" data-count="33">00</strong></h4>
                            <p>%</p>
                        </div>
                    </div>
                    <div class="no-main-about-card">
                        <span class="f-heading-5 --medium">
                            <i class="fa-solid fa-money-bill"></i>
                            전체 펀드 수
                        </span>
                        <div>
                            <h4><strong class="counting" data-count="10">00</strong></h4>
                            <p>개</p>
                        </div>
                    </div>
                    <div class="no-main-about-card">
                        <span class="f-heading-5 --medium">
                            <i class="fa-regular fa-money-bill-trend-up"></i>
                            AUM
                        </span>
                        <div>
                            <h4><strong class="counting" data-count="3572">00</strong></h4>
                            <p>억</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="--gradient"></div>
        <div class="--big-typo">
            <span>GROWTH TRUST INTEGRITY</span>
        </div>
    </section>

    <?php
        $principals = [
            [
                'img' => 'main_principal_img_1.jpg',
                'title' => '동행',
                'desc' => '창업과 스타트업 대표가 걷는길은 외롭고도 험난한 길입니다. 
                        송현인베스트먼트는 외롭고도 험난한 그길을 함께 동행하는 
                        든든한 동반자가 되고자 합니다.',
            ],
            [
                'img' => 'main_principal_img_2.jpg',
                'title' => '야망과 집요함',
                'desc' => '스타트업의 가치는 대표자가 꾸는 꿈의 크기 만큼 올라간다 합니다. 
                        송현은 스타트업의 원대한 꿈과 그 꿈을 이루기 위한 집요함에 투자합니다.',
            ],
            [
                'img' => 'main_principal_img_3.jpg',
                'title' => 'NETWORK',
                'desc' => '송현의 구성원은 다양한 백그라운드를 가지고 있습니다. 
                        스타트업에게 실질적인 도움이 될수 있는 NETWORK를 제공합니다.',
            ],
            [
                'img' => 'main_principal_img_4.jpg',
                'title' => 'INTEGRITY',
                'desc' => '어려움을 솔직하게 이야기하는 스타트업을 돕습니다. 
                        송현도 또한 운용사에 걸맞는 진정성을 가지고 스타트업에 다가갑니다.',
            ],
        ];
    ?>

    <section class="no-main-principal no-section-md">
        <div class="no-container-xl">
            <article>
                <div class="--main-section-title">
                    <div class="txt">
                        <hgroup>
                            <h2 class="f-heading-2 clr-text-title">
                                PRINCIPLES OF <br>
                                <span class="clr-primary-def"> INVESTMENT</span>
                            </h2>
                        </hgroup>
                        <p class="f-heading-5 --medium">
                            송현은 다년간의 경험과 성과를 토대로 <br>
                            투자의 본질을 지키며 기업의 미래 성장을 견인합니다.
                        </p>
                    </div>
                </div>
                <div class="--cnt">
                    <ul>
                        <?php foreach ($principals as $p): ?>
                        <li>
                            <figure>
                                <img src="<?=$ROOT?>/resource/images/main/<?=$p['img']?>" alt="">
                            </figure>
                            <div class="txt">
                                <h4 class="f-heading-5"><?=$p['title']?></h4>
                                <p><?=$p['desc']?></p>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </article>
        </div>
    </section>
    <section class="no-main-best no-section-md">
        <div class="no-container-xl">
            <div class="--section-title-with-button --section-title-line --main-section-title">
                <div class="txt">
                    <hgroup>
                        <h2 class="f-heading-2 clr-text-title">
                            BEST PORTFOLIO
                        </h2>
                    </hgroup>
                </div>
                <div class="button">
                    <a href="#" class="no-btn-arrow no-btn-arrow--default">
                        <span>VIEW MORE</span>
                        <i class="fa-sharp fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="--cnt">
                <ul>
                    <?php for($i =1 ; $i<7; $i++) :?>
                    <li>
                        <a href="#">
                            <figure>
                                <img src="<?=$ROOT?>/resource/images/main/main_best_img_<?=$i?>.jpg" alt="">
                            </figure>
                            <div class="txt">
                                <div class="title">
                                    <h4 class="f-heading-5">클로버츄얼패션</h4>
                                    <img src="<?=$ROOT?>/resource/images/logo/best_logo_<?=$i?>.png" alt="">
                                </div>
                                <p class="f-body-1 --medium">3D 시뮬레이션 분야에서 성과를 거둔 기업입니다.</p>
                            </div>
                            <div class="tag">
                                <ul class="--tags">
                                    <li>3d</li>
                                    <li>simulation</li>
                                    <li>fashiontech</li>
                                </ul>
                            </div>
                        </a>
                    </li>
                    <?php endfor;?>
                </ul>
            </div>
        </div>

    </section>


    <section class="no-main-insights no-section-md ">
        <div class="no-container-xl">
            <div class="--section-title-with-button --section-title-line --main-section-title">
                <div class="txt">
                    <hgroup>
                        <h2 class="f-heading-2 clr-text-title">
                            INSIGHTS
                        </h2>
                    </hgroup>
                </div>
                <div class="button">
                    <a href="#" class="no-btn-arrow no-btn-arrow--default">
                        <span>VIEW MORE</span>
                        <i class="fa-sharp fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="--cnt">
                <div class="tabs">
                    <ul>
                        <li class="active">
                            <button type="button">News</button>
                        </li>
                        <li>
                            <button type="button">Notice</button>
                        </li>
                    </ul>
                </div>
                <div class="contents">
                    <ul>
                        <?php for($i=1; $i<6; $i++) :?>
                        <li>
                            <a href="">
                                <div class="txt">
                                    <p class="f-heading-5">신규 펀드 결성 안내 - 재도약펀드 260억 규모</p>
                                    <time datetime="2024.07.15">2024.07.15</time>
                                </div>
                                <div class="arrow">
                                    <i class="fa-sharp fa-solid fa-arrow-right"></i>
                                </div>
                            </a>
                        </li>
                        <?php endfor;?>
                    </ul>
                </div>
            </div>
        </div>
    </section>



    <section class="no-main-partners no-section-md">
        <div class="no-container-xl">
            <div class="--section-title-with-button --section-title-line --main-section-title">
                <div class="txt">
                    <hgroup>
                        <h2 class="f-heading-2 clr-text-title">
                            PARTNERS
                        </h2>
                    </hgroup>
                </div>
                <p class="f-body-1">
                    우리는 스타트업부터 글로벌 기업까지 다양한 파트너와 협력하며, <br>
                    혁신을 키우고 산업을 강화하고, 장기적인 성공을 위한 기반을 다져갑니다.
                </p>
            </div>
            <div class="--cnt">
                <ul>
                    <?php for($i = 1; $i < 20; $i++) :?>
                    <li>
                        <figure>
                            <img src="<?=$ROOT?>/resource/images/logo/logo_partners_img_<?=$i?>.png" alt="">
                        </figure>
                    </li>
                    <?php endfor;?>
                </ul>
            </div>
        </div>
    </section>
    <?php include_once $STATIC_ROOT . '/inc/layouts/contact.php'; ?>
    <!--
    <section class="no-main-contact no-section-md">
        <div class="no-container-xl">
            <div class="--cnt">
                <div class="left" <?=$aos['middle']?>>
                    <hgroup>
                        <span class="--bold clr-primary-def">Contact Us</span>
                        <h2 class="f-heading-3 clr-text-title">궁금한 점이 있다면 <br>
                            언제든 문의 주세요</h2>
                    </hgroup>
                    <div class="no-main-contact-info">
                        <ul>
                            <li>
                                <span>주소</span>
                                <p>
                                    서울시 서초구 강남대로 23길 25 미건빌딩
                                </p>
                            </li>
                            <li>
                                <span>TEL.</span>
                                <p>
                                    02-3443-2036
                                </p>
                            </li>
                            <li>
                                <span>FAX.</span>
                                <p>
                                    02-3443-2039
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="right" <?=$aos['fast']?>>
                    <form id="requestForm" method="POST" action="/module/ajax/request.process.php">
                        <fieldset>
                            <legend class="f-body-1">문의 양식</legend>
                            <div class="no-form-container --mt-sm">
                                <div class="no-form-control">
                                    <label for="title">성함 <span class="--require-symbol">*</span></label>
                                    <input type="text" id="title" name="title" placeholder="성함을 입력해주세요.">
                                </div>
                                <div class="no-form-control">
                                    <label for="company">업체명 </label>
                                    <input type="text" id="company" name="company" placeholder="업체명을 입력해주세요.">
                                </div>
                                <div class="no-form-control">
                                    <label for="phone">연락처 <span class="--require-symbol">*</span></label>
                                    <input type="text" id="phone" name="phone" placeholder="010-0000-0000">
                                </div>

                                <div class="no-form-control">
                                    <label for="area">
                                        설치 지역 <span class="text-primary-800">*</span>
                                    </label>
                                    <div class="dropdown" tabindex="1">
                                        <div class="select">
                                            <span>서울</span>
                                            <i class="fa-light fa-chevron-down" aria-hidden="true"></i>
                                        </div>
                                        <input type="hidden" name="area">
                                        <ul class="dropdown-menu test-dropdown-menu" style="display: none;">
                                            <li id="서울" data-value="서울">서울</li>
                                            <li id="경기" data-value="경기">경기</li>
                                            <li id="인천" data-value="인천">인천</li>
                                            <li id="부산" data-value="부산">부산</li>
                                            <li id="대구" data-value="대구">대구</li>
                                            <li id="광주" data-value="광주">광주</li>
                                            <li id="대전" data-value="대전">대전</li>
                                            <li id="울산" data-value="울산">울산</li>
                                            <li id="세종" data-value="세종">세종</li>
                                            <li id="강원" data-value="강원">강원</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="no-form-control --mt-sm">
                                <label for="contents">내용 <span class="--require-symbol">*</span></label>
                                <textarea name="contents" id="contents"></textarea>
                            </div>
                            <div class="no-form-check --mt-sm">
                                <input type="checkbox" name="check" id="check" class="check">
                                <label for="check"></label>
                                <label for="check" class="check-label ">
                                    <button type="button">개인정보처리방침</button>에 동의합니다.</label>
                            </div>
                            <div class="no-form-row --mt-sm">
                                <div class="no-form-captcha">
                                    <figure>
                                        <img id="captcha-img" src="/inc/lib/captcha.n.php" alt="captcha">
                                    </figure>
                                    <button type="button" id="reloading">
                                        <i class="fa-regular fa-arrow-rotate-left"></i>
                                    </button>
                                    <input type="text" name="r_captcha" id="r_captcha" maxlength="5"
                                        placeholder="스팸방지 5자리를 입력해 주세요" autocomplete="off">
                                </div>
                                <div>
                                    <button type="submit" class="no-btn-primary no-btn-inquiry">
                                        문의하기
                                    </button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>-->



</main>



<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>