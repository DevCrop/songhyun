<?php
include_once "../../../inc/lib/base.class.php";

$pageName = "제품 ";
$depthnum = 5;

try {
    $db = DB::getInstance(); 

} catch (Exception $e) {
    echo "데이터베이스 연결 오류: " . $e->getMessage();
    exit;
}

include_once "../../inc/admin.title.php";
include_once "../../inc/admin.css.php";
include_once "../../inc/admin.js.php";

?>

</head>

<body data-page="product">
    <div class="no-wrap">
        <?php include_once "../../inc/admin.header.php"; ?>

        <main class="no-app no-container">
            <?php include_once "../../inc/admin.drawer.php"; ?>

            <form id="frm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="mode" value="insert">

                <section class="no-content">
                    <div class="no-toolbar">
                        <div class="no-toolbar-container no-flex-stack">
                            <div class="no-page-indicator">
                                <h1 class="no-page-title"><?= $pageName ?> 등록</h1>
                                <div class="no-breadcrumb-container">
                                    <ul class="no-breadcrumb-list">
                                        <li class="no-breadcrumb-item"><span><?= $pageName ?></span></li>
                                        <li class="no-breadcrumb-item"><span><?= $pageName ?> 등록</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="no-toolbar-container">
                        <div class="no-card">
                            <div class="no-card-header no-card-header--detail">
                                <h2 class="no-card-title"><?=$pageName?> 등록</h2>
                            </div>

                            <div class="no-card-body no-admin-column no-admin-column--detail">

                                <!-- 제품 카테고리 선택 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="product_category">제품 카테고리</label></h3>
                                    <div class="no-admin-content">
                                        <select name="product_category_id" id="product_category" required>
                                            <option value="">카테고리 선택</option>
                                            <?php foreach ($product_categories as $id => $name): ?>
                                            <option value="<?= $id ?>"
                                                <?= isset($product_category_id) && $product_category_id == $id ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($name) ?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                        <span class="no-admin-info">
                                            <i class="bx bxs-info-circle"></i> 제품의 카테고리를 선택하세요
                                        </span>
                                    </div>
                                </div>

                                <!-- 세컨더리 옵션(체크박스) -->
                                <div class="no-admin-block" id="secondary-wrap" style="display:none">
                                    <h3 class="no-admin-title">세컨더리 옵션</h3>
                                    <div class="no-admin-content">
                                        <div class="no-checkbox-form no-list" id="secondary-list"></div>
                                        <span class="no-admin-info"><i class="bx bxs-info-circle"></i> 옵션을 선택하면 해당 스펙
                                            입력란이 생성됩니다</span>
                                    </div>
                                </div>
                                <!-- ========================= -->
                                <!-- [nb_products.title] 제품명 -->
                                <!-- ========================= -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="title">제품명</label></h3>
                                    <div class="no-admin-content">
                                        <input type="text" id="title" name="title" placeholder="제품명을 입력해주세요." required>
                                    </div>
                                </div>

                                <!-- ================================== -->
                                <!-- [nb_products.sub_title] 서브 타이틀 -->
                                <!-- ================================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="sub_title">서브 타이틀</label></h3>
                                    <div class="no-admin-content">
                                        <input type="text" id="sub_title" name="sub_title"
                                            placeholder="서브 타이틀을 입력해주세요.">
                                    </div>
                                </div>

                                <!-- =========================== -->
                                <!-- [nb_products.url] 상세 URL  -->
                                <!-- =========================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="url">상세 URL</label></h3>
                                    <div class="no-admin-content">
                                        <input type="text" id="url" name="url"
                                            placeholder="예) https://example.com/product/slug">
                                    </div>
                                </div>

                                <!-- ============================== -->
                                <!-- [nb_products.description] 설명 -->
                                <!-- ============================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="description">설명</label></h3>
                                    <div class="no-admin-content">
                                        <textarea name="description" id="description" class="no-textarea--detail"
                                            rows="5" placeholder="제품 설명을 입력해주세요."></textarea>
                                    </div>
                                </div>

                                <!-- ============================ -->
                                <!-- [nb_products.feature] 특징요약 -->
                                <!-- ============================ -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="feature">특징(요약)</label></h3>
                                    <div class="no-admin-content">
                                        <textarea name="feature" id="feature" class="no-textarea--detail" rows="5"
                                            placeholder="한 줄 요약 등 간단한 특징을 입력해주세요."></textarea>
                                    </div>
                                </div>

                                <!-- ================================== -->
                                <!-- [nb_products.feature_desc] 특징상세 -->
                                <!-- ================================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="feature_desc">특징(상세)</label></h3>
                                    <div class="no-admin-content">
                                        <textarea name="feature_desc" id="feature_desc" class="no-textarea--detail"
                                            rows="5" placeholder="상세한 특징 설명을 입력해주세요."></textarea>
                                    </div>
                                </div>

                                <!-- =============================== -->
                                <!-- [nb_products.thumb_image] 썸네일 -->
                                <!-- =============================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="thumb_image">썸네일 파일</label></h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-control">
                                            <input type="text" class="no-fake-file" id="fakeThumbFileTxt"
                                                placeholder="파일을 선택해주세요." readonly disabled />
                                            <div class="no-file-box">
                                                <input type="file" name="thumb_image" id="thumb_image"
                                                    onchange="document.getElementById('fakeThumbFileTxt').value = this.value"
                                                    accept="image/*" />
                                                <button type="button" class="no-btn no-btn--main">파일찾기</button>
                                            </div>
                                        </div>
                                        <span class="no-admin-info"><i class="bx bxs-info-circle"></i> 리스트/썸네일에 사용되는
                                            이미지입니다.</span>
                                    </div>
                                </div>

                                <!-- ================================ -->
                                <!-- [nb_products.detail_image] 상세이미지 -->
                                <!-- ================================ -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="detail_image">상세 이미지 파일</label></h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-control">
                                            <input type="text" class="no-fake-file" id="fakeDetailFileTxt"
                                                placeholder="파일을 선택해주세요." readonly disabled />
                                            <div class="no-file-box">
                                                <input type="file" name="detail_image" id="detail_image"
                                                    onchange="document.getElementById('fakeDetailFileTxt').value = this.value"
                                                    accept="image/*" />
                                                <button type="button" class="no-btn no-btn--main">파일찾기</button>
                                            </div>
                                        </div>
                                        <span class="no-admin-info"><i class="bx bxs-info-circle"></i> 상세 페이지 상단/본문 등에
                                            사용하는 메인 이미지입니다.</span>
                                    </div>
                                </div>

                                <!-- ============================== -->
                                <!-- [nb_products.banner_img] 배너  -->
                                <!-- ============================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="banner_img">배너 이미지</label></h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-control">
                                            <input type="text" class="no-fake-file" id="fakeBannerFileTxt"
                                                placeholder="파일을 선택해주세요." readonly disabled />
                                            <div class="no-file-box">
                                                <input type="file" name="banner_img" id="banner_img"
                                                    onchange="document.getElementById('fakeBannerFileTxt').value = this.value"
                                                    accept="image/*" />
                                                <button type="button" class="no-btn no-btn--main">파일찾기</button>
                                            </div>
                                        </div>
                                        <span class="no-admin-info"><i class="bx bxs-info-circle"></i> 배너 영역에 사용되는
                                            이미지입니다.</span>
                                    </div>
                                </div>

                                <!-- ===================================== -->
                                <!-- [nb_products.product_img_1] 추가 이미지1 -->
                                <!-- ===================================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="product_img_1">제품 이미지 1</label></h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-control">
                                            <input type="text" class="no-fake-file" id="fakeImg1FileTxt"
                                                placeholder="파일을 선택해주세요." readonly disabled />
                                            <div class="no-file-box">
                                                <input type="file" name="product_img_1" id="product_img_1"
                                                    onchange="document.getElementById('fakeImg1FileTxt').value = this.value"
                                                    accept="image/*" />
                                                <button type="button" class="no-btn no-btn--main">파일찾기</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===================================== -->
                                <!-- [nb_products.product_img_2] 추가 이미지2 -->
                                <!-- ===================================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="product_img_2">제품 이미지 2</label></h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-control">
                                            <input type="text" class="no-fake-file" id="fakeImg2FileTxt"
                                                placeholder="파일을 선택해주세요." readonly disabled />
                                            <div class="no-file-box">
                                                <input type="file" name="product_img_2" id="product_img_2"
                                                    onchange="document.getElementById('fakeImg2FileTxt').value = this.value"
                                                    accept="image/*" />
                                                <button type="button" class="no-btn no-btn--main">파일찾기</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===================================== -->
                                <!-- [nb_products.product_img_3] 추가 이미지3 -->
                                <!-- ===================================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="product_img_3">제품 이미지 3</label></h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-control">
                                            <input type="text" class="no-fake-file" id="fakeImg3FileTxt"
                                                placeholder="파일을 선택해주세요." readonly disabled />
                                            <div class="no-file-box">
                                                <input type="file" name="product_img_3" id="product_img_3"
                                                    onchange="document.getElementById('fakeImg3FileTxt').value = this.value"
                                                    accept="image/*" />
                                                <button type="button" class="no-btn no-btn--main">파일찾기</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===================================== -->
                                <!-- [nb_products.product_img_4] 추가 이미지4 -->
                                <!-- ===================================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="product_img_4">제품 이미지 4</label></h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-control">
                                            <input type="text" class="no-fake-file" id="fakeImg4FileTxt"
                                                placeholder="파일을 선택해주세요." readonly disabled />
                                            <div class="no-file-box">
                                                <input type="file" name="product_img_4" id="product_img_4"
                                                    onchange="document.getElementById('fakeImg4FileTxt').value = this.value"
                                                    accept="image/*" />
                                                <button type="button" class="no-btn no-btn--main">파일찾기</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- ===================================== -->
                                <!-- [nb_products.product_img_5] 추가 이미지5 -->
                                <!-- ===================================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label for="product_img_5">제품 이미지 5</label></h3>
                                    <div class="no-admin-content">
                                        <div class="no-file-control">
                                            <input type="text" class="no-fake-file" id="fakeImg5FileTxt"
                                                placeholder="파일을 선택해주세요." readonly disabled />
                                            <div class="no-file-box">
                                                <input type="file" name="product_img_5" id="product_img_5"
                                                    onchange="document.getElementById('fakeImg5FileTxt').value = this.value"
                                                    accept="image/*" />
                                                <button type="button" class="no-btn no-btn--main">파일찾기</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- =========================================== -->
                                <!-- [nb_products.variant_specs(JSON)] 기술 스펙 -->
                                <!-- spec_title[] / spec_desc[] 페어로 전송 -->
                                <!-- =========================================== -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title"><label>기술 스펙</label></h3>
                                    <div class="no-admin-content">
                                        <!-- 스펙 타이틀 -->
                                        <div class="no-admin-block" style="margin:0;padding:0;border:none;">
                                            <h3 class="no-admin-title"><label for="spec_title_1">스펙 타이틀</label></h3>
                                            <div class="no-admin-content">
                                                <input type="text" id="spec_title_1" name="spec_title[]"
                                                    placeholder="예) PGS Control">
                                            </div>
                                        </div>
                                        <!-- 스펙 설명 -->
                                        <div class="no-admin-block" style="margin:8px 0 0;padding:0;border:none;">
                                            <h3 class="no-admin-title"><label for="spec_desc_1">스펙 설명</label></h3>
                                            <div class="no-admin-content">
                                                <textarea id="spec_desc_1" name="spec_desc[]"
                                                    class="no-textarea--detail" rows="5"
                                                    placeholder="예) 머신이 추출 상태를 자동 보정합니다."></textarea>
                                            </div>
                                        </div>

                                        <!-- 필요 시 추가 스펙 행 복제 (2개 예시) -->
                                        <div class="no-admin-block" style="margin-top:12px;padding:0;border:none;">
                                            <h3 class="no-admin-title"><label for="spec_title_2">스펙 타이틀</label></h3>
                                            <div class="no-admin-content">
                                                <input type="text" id="spec_title_2" name="spec_title[]"
                                                    placeholder="예) Eco Mode">
                                            </div>
                                        </div>
                                        <div class="no-admin-block" style="margin:8px 0 0;padding:0;border:none;">
                                            <h3 class="no-admin-title"><label for="spec_desc_2">스펙 설명</label></h3>
                                            <div class="no-admin-content">
                                                <textarea id="spec_desc_2" name="spec_desc[]"
                                                    class="no-textarea--detail" rows="5"
                                                    placeholder="예) 대기 시 전력 소모를 최소화합니다."></textarea>
                                            </div>
                                        </div>

                                        <span class="no-admin-info" style="margin-top:10px;display:block;">
                                            <i class="bx bxs-info-circle"></i> 제출 시 <code>spec_title[]</code> /
                                            <code>spec_desc[]</code> 페어를
                                            <code>variant_specs(JSON)</code>으로 변환하여 저장합니다.
                                        </span>
                                    </div>
                                </div>

                                <!-- 노출 여부 -->
                                <div class="no-admin-block">
                                    <h3 class="no-admin-title">노출 여부</h3>
                                    <div class="no-admin-content">
                                        <div class="no-radio-form no-list">
                                            <?php foreach ($is_active as $value => $label): 
                                                $checked = ($value == 1) ? 'checked' : '';
                                                $id = "active_$value";
                                            ?>
                                            <label for="<?= $id ?>">
                                                <div class="no-radio-box">
                                                    <input type="radio" name="is_active" id="<?= $id ?>"
                                                        value="<?= $value ?>" <?= $checked ?>>
                                                    <span><i class="bx bx-radio-circle-marked"></i></span>
                                                </div>
                                                <span class="no-radio-text"><?= htmlspecialchars($label) ?></span>
                                            </label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- 버튼 -->
                                <div class="no-items-center center">
                                    <a href="./index.php" class="no-btn no-btn--big no-btn--normal">목록</a>
                                    <button type="submit" class="no-btn no-btn--big no-btn--main"
                                        id="submitBtn">저장</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>
            </form>

        </main>
        <?php include_once "../../inc/admin.footer.php"; ?>
    </div>


</body>

</html>