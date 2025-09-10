<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>


<!-- contents -->

<main class="no-sub">
    <?php
        $members = [
            [
                "name" => "박찬우",
                "position" => "CEO",
                "career" => [
                    "前 삼성벤처투자 심사역",
                    "前 미래에셋벤처투자 투자팀장",
                    "송현인베스트먼트 창립자"
                ],
                "education" => [
                    "서울대학교 경영학 학사",
                    "KAIST 금융MBA"
                ]
            ],
            [
                "name" => "이정은",
                "position" => "Managing Director",
                "career" => [
                    "前 KDB산업은행 기업금융팀",
                    "前 소프트뱅크벤처스 투자본부",
                    "ICT · 헬스케어 분야 투자 15년 경력"
                ],
                "education" => [
                    "연세대학교 경제학 학사",
                    "시카고대학교 MBA"
                ]
            ],
            [
                "name" => "김도현",
                "position" => "Investment Director",
                "career" => [
                    "前 딜로이트 안진회계법인 M&A 자문",
                    "스타트업 투자 및 Exit 다수 경험",
                    "바이오·딥테크 전문 심사역"
                ],
                "education" => [
                    "고려대학교 경영학 학사",
                    "펜실베이니아대학교 와튼스쿨 MBA"
                ]
            ],
            [
                "name" => "최수진",
                "position" => "Associate",
                "career" => [
                    "前 CJ ENM 전략기획팀",
                    "스타트업 액셀러레이터 프로그램 운영 경험",
                    "소비재 · 콘텐츠 분야 전문 투자 담당"
                ],
                "education" => [
                    "이화여자대학교 국제학부 학사"
                ]
            ],
        ];
    ?>
    <section class="no-sub-members no-section-md">
        <div class="no-container-xl">
            <ul class="no-sub-members-list">
                <?php   foreach($members as $m): ?>
                <li>
                    <div class="title">
                        <h4 class="f-heading-4 --bold"><?= $m['name'] ?></h4>
                        <span class="f-heading-5 --regular"><?= $m['position'] ?></span>
                    </div>
                    <div class="career">
                        <h5 class="f-body-1 --bold">주요이력</h5>
                        <ul>
                            <?php foreach($m['career'] as $c): ?>
                            <li>
                                <p class="f-body-1"><?= $c ?></p>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="education">
                        <h5 class="f-body-1 --bold">학력</h5>
                        <ul>
                            <?php foreach($m['education'] as $e): ?>
                            <li>
                                <p class="f-body-1"><?= $e ?></p>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </section>

    <?php include_once $STATIC_ROOT . '/inc/layouts/contact.php'; ?>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>