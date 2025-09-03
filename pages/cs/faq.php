<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<?php

  try {
      $pdo = DB::getInstance();

      // 원하는 정렬이 있으면 ORDER BY만 조정하세요.
      $stmt = $pdo->prepare("SELECT * FROM nb_faqs ORDER BY sort_no ASC, id DESC");
      $stmt->execute();

      $faqs = $stmt->fetchAll(PDO::FETCH_ASSOC); // ← 전체 컬럼
  } catch (Throwable $e) {
      $faqs = [];
  }
  
?>


<!-- dev -->


<?php include_once $STATIC_ROOT . '/inc/layouts/head.php'; ?>
<?php include_once $STATIC_ROOT . '/inc/layouts/header.php'; ?>

<!-- css, js  -->
<?php include_once $STATIC_ROOT . '/inc/shared/sub.visual.php'; ?>





<!-- contents -->

<main class="no-sub">
    <section class="no-sub-faq no-section-md">
        <div class="no-container-xl">
            <div class="--cnt-wrap">
                <div class="--section-title-with-button">
                    <hgroup>
                        <h2 class="f-heading-3 clr-text-title">FAQ || 자주 묻는 질문</h2>
                    </hgroup>

                </div>
                <div class="--cnt">
                    <div class="left">
                        <h4 class="f-heading-4 --semibold">
                            미건 시스템은 전국적으로 <br>
                            AS센터를
                            보유하고 있습니다.</h4>
                    </div>
                    <!-- --cnt 내부 -->
                    <div class="faq">
                        <ul class="faq-list">
                            <?php foreach ($faqs as $faq): ?>
                            <li class="faq-item">
                                <button class="faq-q" aria-expanded="false">
                                    <div class="faq-title">
                                        <span class="faq-q__text f-heading-6 --semibold --tal">
                                            <?= htmlspecialchars($faq['question'] ?? '', ENT_QUOTES, 'UTF-8') ?>
                                        </span>
                                    </div>
                                    <span class="faq-q__icon" aria-hidden="true"></span>
                                </button>
                                <div class="faq-a f-body-2">
                                    <p><?= nl2br(htmlspecialchars($faq['answer'] ?? '', ENT_QUOTES, 'UTF-8')) ?></p>
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