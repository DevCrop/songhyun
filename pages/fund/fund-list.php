<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>


<!-- contents -->

<main class="no-sub">
    <?php
        $funds = [
            [
                "name" => "송현 청년창업 제1호 투자조합",
                "date" => "2014년 09월",
                "amount" => "240억원",
                "period" => "8년",
                "method" => "주식 (보통주, 우선주), CB, BW 등",
                "target" => [
                    "청년창업기업",
                    "7년 이내의 중소기업",
                    "벤처기업, 이노비즈 기업",
                ],
                "lp" => "한국모태펀드, KDB, 대구TP, 대구은행"
            ],
            [
                "name" => "송현 성장사다리 제1호 투자조합",
                "date" => "2013년 08월",
                "amount" => "300억원",
                "period" => "7년",
                "method" => "지분투자, 전환사채, 신주인수권부사채",
                "target" => [
                    "ICT 스타트업",
                    "벤처기업",
                    "혁신기술기업",
                ],
                "lp" => "한국모태펀드, KDB, 대구은행"
            ],
            [
                "name" => "2014 송현 성장사다리 제2호(스타트업) 투자조합",
                "date" => "2014년 11월",
                "amount" => "165억원",
                "period" => "7년",
                "method" => "주식 (보통주, 우선주), CB, RCPS",
                "target" => [
                    "초기 스타트업",
                    "모빌리티·핀테크",
                    "바이오 벤처",
                ],
                "lp" => "한국모태펀드, KDB, 대구은행"
            ],
            [
                "name" => "키스톤-송현 밸류 크리에이션 PEF",
                "date" => "2014년 11월",
                "amount" => "1,550억원",
                "period" => "8년",
                "method" => "지분투자, PIPE, Buy-out",
                "target" => [
                    "중견기업",
                    "M&A 대상기업",
                    "구조조정 기업",
                ],
                "lp" => "키스톤PE, 모태펀드, KDB"
            ],
            [
                "name" => "송현 e-신산업 펀드",
                "date" => "2017년 11월",
                "amount" => "930억원",
                "period" => "8년",
                "method" => "주식 (보통주, 우선주), CB, BW",
                "target" => [
                    "4차산업 혁신기업",
                    "ICT 기업",
                    "바이오·헬스케어",
                ],
                "lp" => "모태펀드, KDB, 산업은행"
            ],
            [
                "name" => "2016 KIF-송현 M&A 세컨더리 ICT 투자조합",
                "date" => "2016년 04월",
                "amount" => "300억원",
                "period" => "7년",
                "method" => "지분투자, 세컨더리 투자",
                "target" => [
                    "ICT 기업",
                    "세컨더리 벤처",
                ],
                "lp" => "한국인터넷진흥원(KIF), 모태펀드, KDB"
            ],
            [
                "name" => "라구나-송현 NK 투자조합",
                "date" => "2018년 08월",
                "amount" => "40.5억원",
                "period" => "7년",
                "method" => "주식, CB",
                "target" => [
                    "신재생에너지 기업",
                    "중소 벤처기업",
                ],
                "lp" => "라구나인베스트먼트, 모태펀드"
            ],
            [
                "name" => "송현 K-크라우드 펀드",
                "date" => "2016년 03월",
                "amount" => "47억원",
                "period" => "5년",
                "method" => "크라우드 기반 지분투자",
                "target" => [
                    "초기 스타트업",
                    "창업초기 기업",
                ],
                "lp" => "모태펀드, 중소기업진흥공단"
            ],
        ];
    ?>

    <section class="no-sub-fund no-section-md">
        <div class="no-container-xl">
            <div class="--section-sub-title --section-title-line">
                <h2 class="f-heading-3">운용 및 청산중인 조합 </h2>
                <span class="clr-primary-def  f-body-1">Venture Capital</span>
            </div>
            <div class="--cnt">

                <ul class="no-sub-fund-list">
                    <?php foreach($funds as $fund): ?>
                    <li>
                        <div class="title">
                            <h4 class="f-heading-4_5 --bold"><?= $fund['name'] ?></h4>
                        </div>
                        <div class="list">
                            <ul>
                                <li><span>결성일</span>
                                    <p><?= $fund['date'] ?></p>
                                </li>
                                <li><span>결정금액</span>
                                    <p><?= $fund['amount'] ?></p>
                                </li>
                                <li><span>존속기간</span>
                                    <p><?= $fund['period'] ?></p>
                                </li>
                                <li><span>투자방법</span>
                                    <p><?= $fund['method'] ?></p>
                                </li>
                                <li>
                                    <span>투자 대상</span>
                                    <p>
                                        <?php foreach($fund['target'] as $t): ?>
                                        <?= $t ?><br>
                                        <?php endforeach; ?>
                                    </p>
                                </li>
                                <li><span>주요 LP</span>
                                    <p><?= $fund['lp'] ?></p>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>





    <?php include_once $STATIC_ROOT . '/inc/layouts/contact.php'; ?>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>