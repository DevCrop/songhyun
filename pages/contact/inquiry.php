<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>




<script charset="UTF-8" class="daum_roughmap_loader_script"
    src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>

<!-- contents -->

<main class="no-sub ">
    <section class="no-sub-contact no-section-md">
        <div class="no-container-xl">

            <div class="--cnt">
                <div class="left">
                    <div class="--section-sub-title">
                        <h2 class="f-heading-3">INQUIRY</h2>
                        <p>
                            송현인베스트먼트는 정직한 원칙과 검증된 성과를 바탕으로 <br>
                            기업과 함께 성장하며 지속 가능한 미래를 만들어가는 투자사입니다.
                        </p>
                    </div>
                    <div class="info">
                        <ul>
                            <li>
                                <h5 class="f-body-1 --bold">Company</h5>
                                <p class="f-body-1 ">
                                    송현 인베스트먼트
                                </p>
                            </li>
                            <li>
                                <h5 class="f-body-1 --bold">Address</h5>
                                <p class="f-body-1 ">
                                    서울시 영등포구 여의대로 24. 10층 (여의도동, 한국경제인협회빌딩)
                                </p>
                            </li>
                            <li>
                                <h5 class="f-body-1 --bold">Phone</h5>
                                <p class="f-body-1 ">
                                    000-0000-0000
                                </p>
                            </li>
                            <li>
                                <h5 class="f-body-1 --bold">Fax</h5>
                                <p class="f-body-1 ">
                                    00-0000-00000
                                </p>
                            </li>

                        </ul>
                    </div>
                    <div class="map-link">
                        <div class="naver">
                            <a href="https://naver.me/xMn5xFJC" target="_blank">
                                <img src="<?=$ROOT?>/resource/images/icon/naver.svg" alt="">
                                네이버 지도로 보기</a>
                        </div>
                        <div class="kakao">
                            <a href="https://kko.kakao.com/ylNB0VkrX7" target="_blank">
                                <img src="<?=$ROOT?>/resource/images/icon/kakao.svg" alt="">

                                카카오 지도로 보기</a>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <form id="requestForm" method="POST" action="/module/ajax/request.process.php">
                        <fieldset>
                            <legend class="--blind">문의 양식</legend>
                            <div class="no-form-control">
                                <label for="title">성함 <span class="--require-symbol">*</span></label>
                                <input type="text" id="title" name="title" placeholder="성함을 입력해주세요.">
                            </div>
                            <div class="no-form-control">
                                <label for="phone">연락처 <span class="--require-symbol">*</span></label>
                                <input type="text" id="phone" name="phone" placeholder="010-0000-0000">
                            </div>
                            <div class="no-form-control">
                                <label for="email">이메일 <span class="--require-symbol">*</span></label>
                                <input type="email" id="email" name="email" placeholder="test@gmail.com">
                            </div>
                            <div class="no-form-control ">
                                <label for="contents">내용 <span class="--require-symbol">*</span></label>
                                <textarea name="contents" id="contents" placeholder="내용을 입력해주세요."></textarea>
                            </div>
                            <div class="no-form-control">
                                <label for="attachments">첨부 파일</label>
                                <div class="file-upload" aria-label="파일 업로드">
                                    <input type="file" id="attachments" name="attachments[]" multiple>
                                    <label class="dropzone" for="attachments">
                                        <span class="dz-icon" aria-hidden="true"></span>
                                        <span class="dz-text">
                                            <i class="fa-solid fa-file-pdf"></i>
                                            <strong>클릭하여 파일 선택</strong>
                                        </span>
                                        <span class="dz-sub">PDF, JPG, PNG, ZIP · 최대 10mb</span>
                                    </label>
                                    <ul class="file-list" id="fileList"></ul>
                                </div>
                            </div>
                            <div class="no-form-check ">
                                <input type="checkbox" name="check" id="check" class="check">
                                <label for="check"></label>
                                <label for="check" class="check-label ">
                                    <button type="button">개인정보처리방침</button>에 동의합니다.</label>
                            </div>
                            <div class="no-form-row ">
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
    <div class="map-wrap">
        <div id="daumRoughmapContainer1756802671009" class="root_daum_roughmap root_daum_roughmap_landing maping">
        </div>
    </div>

</main>


<script charset="UTF-8">
const fileInput = document.getElementById('attachments');
const fileList = document.getElementById('fileList');

// 파일 선택 시 실행
fileInput.addEventListener('change', () => {
    fileList.innerHTML = ''; // 기존 목록 초기화
    const files = Array.from(fileInput.files);

    files.forEach((file, index) => {
        const li = document.createElement('li');

        // 파일명
        const nameSpan = document.createElement('span');
        nameSpan.classList.add('name');
        nameSpan.textContent = file.name;

        // 삭제 버튼
        const removeBtn = document.createElement('button');
        removeBtn.type = 'button';
        removeBtn.classList.add('remove');
        removeBtn.innerHTML = '&times;'; // X 표시

        removeBtn.addEventListener('click', () => {
            // 파일 배열에서 제거하려면 DataTransfer 활용
            const dt = new DataTransfer();
            files
                .filter((_, i) => i !== index)
                .forEach(f => dt.items.add(f));
            fileInput.files = dt.files;

            // 화면에서도 제거
            li.remove();
        });

        li.appendChild(nameSpan);
        li.appendChild(removeBtn);
        fileList.appendChild(li);
    });
});



new daum.roughmap.Lander({
    "timestamp": "1756802671009",
    "key": "82yqfvsee6w",
    "mapWidth": "640",
    "mapHeight": "360"
}).render();
</script>



<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>