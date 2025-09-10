<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>


<!-- contents -->

<main class="no-sub">
    <section class="no-sub-overview no-section-md">
        <div class="no-container-xl">
            <div class="--cnt">
                <div class="txt">
                    <div class="--section-sub-title">
                        <h2 class="f-heading-3">CEO MESSAGE</h2>
                    </div>
                    <div class="no-sub-overview-txt">
                        <div class="--p-list">
                            <p>
                                송현인베스트먼트는 설립 이후 한결같이 정직한 원칙과 투명한 투자 철학을 지켜왔습니다.
                                평균 19년 이상의 운용 경험을 가진 전문가들이 모여, 기술과 산업을
                                깊이 이해하는 전문성과 검증된 투자 성과를 바탕으로 스타트업부터 그로쓰캐피탈,
                                PEF에 이르기까지 기업의
                                전 성장 단계에서 든든한 파트너가 되어왔습니다.
                            </p>
                            <p>
                                앞으로도 우리는 월 1회 이상 철저한 모니터링과 선제적 리스크 관리로 안정성을 지켜내며, 총 31개
                                코스닥 상장이라는 성과에 안주하지 않고 기업과 함께 지속 가능한 미래 가치를 만들어가겠습니다.
                            </p>
                            <p class="--bold">
                                감사합니다.
                            </p>
                        </div>
                    </div>
                    <div class="no-sub-overview-ceo">
                        <span class="f-body-1">대표이사</span>
                        <p class="f-heading-5">남 기 승</p>
                    </div>
                </div>
                <div class="img">
                    <figure>
                        <img src="<?=$ROOT?>/resource/images/sub/sub_overview_img.jpg" alt="">
                    </figure>
                </div>
            </div>
            <div class="--big-typo">
                <span>GROWTH TRUST INTEGRITY</span>
            </div>
        </div>
    </section>
    <section class="no-sub-ceo no-section-md">
        <div class="no-container-xl">
            <div class="--cnt">
                <div class="txt">
                    <div class="--section-sub-title">
                        <h2 class="f-heading-3">WHO WE ARE</h2>
                        <p>
                            송현인베스트먼트는 정직한 원칙과 검증된 성과를 바탕으로 <br>
                            기업과 함께 성장하며 지속 가능한 미래를 만들어가는 투자사입니다.
                        </p>
                    </div>
                    <ul>
                        <li>
                            <h5 class="f-heading-5 --bold">평균 19년 이상의 운용 경험</h5>
                            <p class="f-body-1 ">
                                이공계와 금융권 출신 심사역으로 구성된 전문팀
                            </p>
                        </li>
                        <li>
                            <h5 class="f-heading-5 --bold">검증된 성과</h5>
                            <p class="f-body-1 ">
                                IPO 성공률 33%, 총 31개 기업 코스닥 상장
                            </p>
                        </li>
                        <li>
                            <h5 class="f-heading-5 --bold">투명성과 신뢰</h5>
                            <p class="f-body-1 ">
                                철저한 리스크 관리와 정직한 투자 철학
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="img">
                    <figure>
                        <img src="/resource/images/sub/sub_overview_img.jpg" alt="">
                    </figure>
                </div>
            </div>
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
    <section class="no-sub-philosophy no-section-md">
        <div class="no-container-xl">
            <div class="--section-sub-title">
                <h2 class="f-heading-3">SONGHYUN PHILOSOPHY</h2>
                <p>
                    송현인베스트먼트의 투자는 단순한 자본 제공이 아닙니다.
                    우리는 정직한 원칙과 철저한 관리,<br>
                    그리고 파트너십을 바탕으로 기업의 가능성을 키우고 지속 가능한 성장을 만들어갑니다.
                </p>
            </div>
            <div class="--cnt">
                <ul>
                    <?php foreach($principals as $p): ?>
                    <li>
                        <figure>
                            <img src="<?=$ROOT?>/resource/images/main/<?=$p['img']?>" alt="<?=$p['title']?>">
                        </figure>
                        <div class="txt">
                            <h4 class="f-heading-4_5 --bold"><?=$p['title']?></h4>
                            <p class="f-body-1">
                                <?=$p['desc']?>
                            </p>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <?php
    $history = [
        "2024" => [
            "07" => [
                "재도약펀드 결정 (260억원, 바로벤처스와 Co-GP)",
            ],
            "06" => [
                "스마트워터펀드 결성 (200억원, 바로벤처스와 Co-GP)",
            ],
        ],
        "2023" => [
            "07" => [
                "최대주주 '무궁화금융그룹'으로 변경",
            ],
            "06" => [
                "'2016 KIF-송현 M&A · 세컨더리 ICT 투자조합' 청산 진행 중",
            ],
        ],
        "2022" => [
            "12" => [
                "'2014 송현 성장사다리 제2호(스타트업) 투자조합' 청산 진행 중",
                "'송현 청년창업 제1호 투자조합' 청산 진행 중",
            ],
            "11" => [
                "'키스톤 - 송현 밸류 크리에이션 PEF' 청산 진행중",
            ],
            "02" => [
                "'라구나 - 송현 NK투자조합' 청산",
            ],
        ],
        "2021" => [
            "06" => [
                "'송현 성장사다리 제1호 투자조합' 청산",
            ],
        ],
        "2018" => [
            "08" => [
                "'라구나 - 송현 NK 투자조합' 결성 (40.5억원)",
            ],
        ],
        "2017" => [
            "11" => [
                "'송현 e-신산업 펀드' 결성 (930억원)",
            ],
            "04" => [
                "'2016 KIF - 송현 M&A 세컨더리 ICT 투자조합' 결성 (300억원)",
            ],
        ],
        "2016" => [
            "03" => [
                "'송현 K-크라우드 펀드' 결성 (47억원)",
            ],
        ],
        "2014" => [
            "12" => [
                "중소기업청 투자기관평가 ‘A’등급 획득",
            ],
            "11" => [
                "‘2014 송현 성장사다리 제2호(스타트업) 투자조합’ 결성(165억원)",
                "‘키스톤-송현 밸류 크리에이션 PEF’ 결성(1,550억원)",
            ],
            "09" => [
                "‘송현 청년창업 제1호 투자조합’ 결성(240억원)",
            ],
        ],
        "2013" => [
            "08" => [
                "‘송현 성장사다리 제1호 투자조합’ 결성(300억원)",
            ],
        ],
        "2012" => [
            "06" => [
                "중소기업청 창업투자회사 등록",
            ],
            "05" => [
                "회사설립",
            ],
        ],
    ];
    ?>

    <section class="no-sub-history no-section-md">
        <div class="no-container-xl">
            <div class="--section-sub-title">
                <h2 class="f-heading-3">HISTORY</h2>
                <p>
                    성과와 성장을 이어온 발자취
                </p>
            </div>
            <div class="--cnt">
                <ul class="--year-list">
                    <?php foreach ($history as $year => $months): ?>
                    <li>
                        <div>
                            <h5 class="f-heading-4"><?= $year ?></h5>
                            <div class="--month-list">
                                <?php foreach ($months as $month => $items): ?>
                                <div>
                                    <span class="f-heading-4_5 --bold"><?= $month ?></span>
                                    <ul class="--info-list f-body-1">
                                        <?php foreach ($items as $item): ?>
                                        <li class="f-heading-5 --medium">
                                            <p><?= $item ?></p>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>
    <!--
    <section class="no-sub-showroom no-section-md">
        <div class="no-container-xl">
            <div class="--section-sub-title">
                <h2 class="f-heading-3">MIKUN Showroom</h2>
            </div>
            <div class="--cnt">
                <div class="no-sub-showroom-swiper swiper">
                    <ul class="swiper-wrapper">
                        <?php for ($i= 1; $i< 4; $i++) : ?>
                        <li class="swiper-slide">
                            <figure>
                                <img src="<?=$ROOT?>/resource/images/sub/sub_showroom_img_<?=$i?>.jpg" alt="">
                            </figure>
                        </li>
                        <?php endfor;?>
                        <?php for ($i= 1; $i< 4; $i++) : ?>
                        <li class="swiper-slide">
                            <figure>
                                <img src="<?=$ROOT?>/resource/images/sub/sub_showroom_img_<?=$i?>.jpg" alt="">
                            </figure>
                        </li>
                        <?php endfor;?>
                        <?php for ($i= 1; $i< 4; $i++) : ?>
                        <li class="swiper-slide">
                            <figure>
                                <img src="<?=$ROOT?>/resource/images/sub/sub_showroom_img_<?=$i?>.jpg" alt="">
                            </figure>
                        </li>
                        <?php endfor;?>

                    </ul>
                    <div class="no-sub-showroom-swiper-etc">
                        <div class="swiper-pagination"></div>
                        <div class="swiper-buttons">
                            <div class="swiper-button-prev swiper-button"></div>
                            <div class="swiper-button-next swiper-button"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>-->

    <?php include_once $STATIC_ROOT . '/inc/layouts/contact.php'; ?>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>