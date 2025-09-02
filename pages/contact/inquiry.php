<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>




<script charset="UTF-8" class="daum_roughmap_loader_script"
    src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

<!-- contents -->

<main class="no-sub ">
    <section class="no-sub-head no-section-md">
        <div class="no-container-xl">
            <div class="--section-sub-title --section-sub-title-with-buttons">
                <h2 class="f-heading-3">Head Quarter</h2>
                <div class="map-link">
                    <div class="naver">
                        <a href="#">
                            <img src="<?=$ROOT?>/resource/images/icon/naver.svg" alt="">
                            네이버 지도로 보기</a>
                    </div>
                    <div class="kakao">
                        <a href="#">
                            <img src="<?=$ROOT?>/resource/images/icon/kakao.svg" alt="">

                            네이버 지도로 보기</a>
                    </div>
                </div>
            </div>
            <div class="--cnt">
                <div id="daumRoughmapContainer1756802671009" class="root_daum_roughmap root_daum_roughmap_landing map">
                </div>
                <div class="--info">
                    <ul>
                        <li>
                            <div class=" --ld-icon-sm">
                                <lord-icon src="https://cdn.lordicon.com/dugdfixw.json" trigger="loop"
                                    colors="primary:#333333,secondary:#005baa">
                                </lord-icon>
                            </div>
                            <div class="txt">
                                <h4 class="f-body-2 --bold">Address</h4>
                                <p class="f-body-1">
                                    서울시 서초구 강남대로 23길 25 미건빌딩
                                </p>
                            </div>
                        </li>
                        <li>
                            <div class=" --ld-icon-sm">
                                <lord-icon src="https://cdn.lordicon.com/ojbonimq.json" trigger="loop"
                                    colors="primary:#333333,secondary:#005baa">
                                </lord-icon>
                            </div>
                            <div class="txt">
                                <h4 class="f-body-2 --bold">TEL</h4>
                                <p class="f-body-1">
                                    02-3443-2036
                                </p>

                            </div>
                        </li>
                        <li>
                            <div class=" --ld-icon-sm">
                                <lord-icon src="https://cdn.lordicon.com/dhzbkemf.json" trigger="loop"
                                    colors="primary:#333333,secondary:#005baa">
                                </lord-icon>
                            </div>
                            <div class="txt">
                                <h4 class="f-body-2 --bold">FAX</h4>
                                <p class="f-body-1">
                                    02-3443-2039
                                </p>

                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="no-main-contact no-sub-contact no-section-md">
        <div class="no-container-lg">
            <div class="--cnt">
                <div class="left">
                    <hgroup>
                        <h2 class="f-heading-3">Contact Us</h2>
                    </hgroup>
                </div>
                <div class="right">
                    <form method="POST">
                        <fieldset>
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


<script charset="UTF-8">
new daum.roughmap.Lander({
    "timestamp": "1756802671009",
    "key": "82yqfvsee6w",
    "mapWidth": "640",
    "mapHeight": "360"
}).render();
</script>



<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>