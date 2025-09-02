<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>



<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>



<?php
$faqs = [
  [
    "q" => "설치는 얼마나 걸리나요?",
    "a" => "현장 조건에 따라 다르며 보통 3~7일 내 완료됩니다. 사전 현장 점검 후 정확한 일정을 안내드립니다."
  ],
  [
    "q" => "무상 보증 기간은 어떻게 되나요?",
    "a" => "제품 기본 1년 무상 보증을 제공합니다. 단, 소모품은 보증 대상에서 제외됩니다."
  ],
  [
    "q" => "AS 요청은 어디로 하나요?",
    "a" => "고객센터 또는 온라인 문의를 통해 접수하시면 접수 순서대로 방문 일정을 조율해드립니다."
  ],
  [
    "q" => "납기 일정은 어떻게 확인하나요?",
    "a" => "재고 유무와 프로젝트 상황에 따라 상이합니다. 계약 전 담당 매니저가 예상 납기를 안내드립니다."
  ],
  [
    "q" => "결제 방식은 어떻게 되나요?",
    "a" => "계약금·중도금·잔금 분할 또는 일시불 결제가 가능하며, 세부 조건은 계약 시 확정됩니다."
  ],
  [
    "q" => "환불 정책이 궁금해요.",
    "a" => "제작 착수 전 전액 환불 가능하며, 착수 이후에는 진행 단계에 따라 일부 비용이 공제될 수 있습니다."
  ],
  [
    "q" => "시공 후 유지보수는 어떻게 진행되나요?",
    "a" => "정기 점검 서비스와 긴급 출동 서비스를 함께 제공하며, 필요 시 전문 엔지니어가 직접 방문합니다."
  ],
  [
    "q" => "제품 수명은 얼마나 되나요?",
    "a" => "일반적으로 10년 이상 사용이 가능하며, 환경 및 사용 조건에 따라 달라질 수 있습니다."
  ],
  [
    "q" => "설치 장소 제약이 있나요?",
    "a" => "옥상, 주차장, 공장 부지 등 다양한 장소에 설치할 수 있으나 구조 안전성 및 일조량 검토가 필요합니다."
  ],
  [
    "q" => "사후 관리 비용은 별도로 발생하나요?",
    "a" => "보증 기간 이후에는 소정의 유지보수 비용이 발생할 수 있습니다. 계약 시 상세 조건을 안내드립니다."
  ],
  [
    "q" => "정부 지원이나 보조금 신청도 가능하나요?",
    "a" => "네, 일부 제품이나 프로젝트는 정부 지원 사업과 연계 가능하며, 신청 절차를 도와드립니다."
  ],
  [
    "q" => "설치 후 모니터링 시스템을 제공하나요?",
    "a" => "모바일·웹을 통한 실시간 모니터링 시스템을 기본 제공하여 사용자가 직접 발전량과 상태를 확인할 수 있습니다."
  ],
];
?>


<!-- contents -->

<main class="no-sub">
    <section class="no-sub-faq no-section-md">
        <div class="no-container-xl">
            <div class="--cnt-wrap">
                <div class="--section-sub-title">
                    <h2 class="f-heading-3">FAQ's</h2>
                </div>
                <div class="--cnt">
                    <!-- --cnt 내부 -->
                    <div class="faq">

                        <ul class="faq-list">
                            <?php foreach ($faqs as $faq): ?>
                            <li class="faq-item">
                                <button class="faq-q" aria-expanded="false">
                                    <div class="faq-title">
                                        <span class="faq-q__text f-heading-6 --semibold --tal">
                                            <?= htmlspecialchars($faq["q"], ENT_QUOTES) ?>
                                        </span>
                                    </div>
                                    <span class="faq-q__icon" aria-hidden="true"></span>
                                </button>
                                <div class="faq-a f-body-2">
                                    <p><?= htmlspecialchars($faq["a"], ENT_QUOTES) ?></p>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
    </section>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>