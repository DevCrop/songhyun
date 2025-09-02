<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->



<!-- contents -->



<main class="no-main">
    <section class="no-main-visual">
        <div class="no-main-visual-swiper swiper">
            <ul class="swiper-wrapper">
                <?php for($i = 1; $i < 4 ; $i++) :?>
                <li class="swiper-slide">
                    <article>
                        <img src="/resource/images/main/main_visual_img_<?=$i?>.jpg">
                    </article>
                    <div class="no-main-visual-txt">
                        <div class="">
                            <span class="lang-en">Eversys</span>
                            <h2 class="f-heading-2">Decoding the DNA of Coffee</h2>
                            <p class="f-heading-6">
                                스위스 기술로 완성한 바리스타 퀄리티
                            </p>
                        </div>
                    </div>
                </li>
                <?php endfor; ?>
            </ul>
            <div class="no-main-visual-pagination-container">
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section class="no-main-about no-section-md">
        <div class="no-container-xl">
            <div class="--section-title-with-button">
                <hgroup>
                    <span class="--bold clr-primary-def">WHO WE ARE</span>
                    <h2 class="f-heading-3 clr-text-title">가치를 연결하는 미건시스템</h2>
                </hgroup>
                <div>
                    <a href="#" class="no-btn-primary">
                        자세히 보기
                    </a>
                </div>
            </div>
            <div class="--cnt">
                <div class="--img">
                    <img src="<?=$ROOT?>./resource/images/main/main_about_img.jpg" alt="">
                </div>
                <div class="--txt">
                    <h3 class="f-heading-6 clr-text-title">
                        우리는 검증된 브랜드만을 고집합니다
                    </h3>
                    <ul class="--p-list f-body-3">
                        <li>
                            <p>
                                미건시스템은 단지 제품을 유통하는 회사를 넘어, 고객의 비즈니스에 가장 적합한 해답을
                                제시하는 브랜드 큐레이터입니다. 우리는 글로벌 시장에서 품질과 성능이 검증된 브랜드만을
                            </p>
                        </li>
                        <li>
                            <p>
                                엄선하며, 단순한 인기나 가격 경쟁력이 아닌, 장비의 내구성, 기술력, 브랜드 철학, 그리고
                                실제 운용의 효율성까지 깊이 있게 분석하고 경험해본 후 선택합니다. 우리는 당장의 선택보다,
                                오랜 시간 신뢰할 수 있는 브랜드만을 제안합니다.
                            </p>
                        </li>
                    </ul>
                    <div class="no-main-about-card-wrap">
                        <div class="no-main-about-card">
                            <div>
                                <h4><strong>30</strong></h4>
                                <p>
                                    +
                                </p>
                            </div>
                            <span>Years of Expertise</span>
                        </div>
                        <div class="no-main-about-card">
                            <div>
                                <h4><strong>06</strong></h4>
                                <p>
                                    +
                                </p>
                            </div>
                            <span>Global Brands</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="no-main-why no-section-md">
        <div class="no-container-xl">
            <div class="--section-title">
                <hgroup>
                    <span class="--bold clr-primary-def">Why MIKUN SYSTEM</span>
                    <h2 class="f-heading-3 clr-text-title">차이를 만드는 기준</h2>
                </hgroup>
            </div>
            <div class="--cnt">
                <ul>
                    <li>
                        <div class="--ld-icon">
                            <lord-icon src="https://cdn.lordicon.com/bvfvqndi.json" trigger="loop"
                                colors="primary:#333333,secondary:#005baa">
                            </lord-icon>
                        </div>
                        <div class="txt">
                            <h4 class="f-heading-5">검증된 퀄리티</h4>
                            <p>
                                미건시스템은 단순한 유통이 아닌 <br>

                                품질·성능·브랜드 철학까지 분석한 <br>
                                <b>최고의 장비</b>만을 선별하여 유통합니다.
                            </p>
                            <div class="link">
                                <a href="#" class="no-btn-primary">
                                    자세히 보기
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="--ld-icon">
                            <lord-icon src="https://cdn.lordicon.com/euaablbm.json" trigger="loop"
                                colors="primary:#333333,secondary:#005baa">
                            </lord-icon>
                        </div>
                        <div class="txt">
                            <h4 class="f-heading-5">처음부터 끝까지</h4>
                            <p>
                                설치, 운영, 교육, A/S까지 <br>
                                전 과정 지원을 지원하며 고객의 <br>
                                환경에 맞춘 컨설팅을 제안합니다
                            </p>
                            <div class="link">
                                <a href="#" class="no-btn-primary">
                                    자세히 보기
                                </a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="--ld-icon">
                            <lord-icon src="https://cdn.lordicon.com/lemrzdkt.json" trigger="loop"
                                colors="primary:#333333,secondary:#005baa">
                            </lord-icon>
                        </div>
                        <div class="txt">
                            <h4 class="f-heading-5">전국 AS 인프라 구축</h4>
                            <p>
                                30년간 쌓아온 노하우와 기술력으로 <br>
                                전국 어디서든 빠르고 정확한 <br>
                                유지보수와 기술 지원을 제공합니다.
                            </p>
                            <div class="link">
                                <a href="#" class="no-btn-primary">
                                    자세히 보기
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="no-main-brands no-section-md">
        <div class="no-container-xl">
            <div class="--section-title-with-button">
                <hgroup>
                    <span class="--bold clr-primary-def">OUR BRANDS</span>
                    <h2 class="f-heading-3 clr-text-title">최고의 브랜드만을 고집합니다</h2>
                </hgroup>
                <div>
                    <a href="#" class="no-btn-primary">
                        자세히 보기
                    </a>
                </div>
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
    <section class="no-main-contact no-section-md">
        <div class="no-container-xl">
            <div class="--cnt">
                <div class="left">
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
                <div class="right">
                    <form method="POST">
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
    </section>



</main>



<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>