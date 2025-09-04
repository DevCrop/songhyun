<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/inc/lib/base.class.php'; ?>

<?php


try {
  $pdo = DB::getInstance();
  $cat = isset($_GET['cat']) ? (int)$_GET['cat'] : 0;

  if ($cat > 0 && array_key_exists($cat, $faq_categories)) {
    $stmt = $pdo->prepare("SELECT * FROM nb_faqs WHERE categories = :cat ORDER BY sort_no ASC, id DESC");
    $stmt->execute([':cat' => $cat]);
  } else {
    $stmt = $pdo->prepare("SELECT * FROM nb_faqs ORDER BY sort_no ASC, id DESC");
    $stmt->execute();
    $cat = 0; // All
  }

  $faqs = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Throwable $e) {
  $faqs = [];
  $cat = 0;
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
                <div class="--section-title-with-button" <?=$aos['middle']?>>
                    <hgroup>
                        <h2 class="f-heading-3 clr-text-title">FAQ</h2>
                    </hgroup>
                </div>

                <div class="--cnt" <?=$aos['fast']?>>
                    <div class="left">
                        <h4 class="f-heading-6 --bold">
                            자주 묻는 질문
                        </h4>
                        <p class="mt--sm f-body-2">
                            미건시스템은 전국에 걸쳐
                            체계적인 A/S 센터 네트워크를 운영하며,
                            언제 어디서나 신뢰할 수 있는 서비스를 제공합니다.
                        </p>

                        <div class="no-categories">
                            <ul>
                                <?php
                                        $self = strtok($_SERVER['REQUEST_URI'], '?');
                                        // All 버튼
                                        $active = ($cat === 0) ? ' class="is-active"' : '';
                                        echo '<li'.$active.'><a href="'.$self.'">All</a></li>';

                                        // 나머지 카테고리 버튼
                                        foreach ($faq_categories as $id => $label):
                                            $active = ($cat === $id) ? ' class="is-active"' : '';
                                            $href = $self . '?cat=' . $id;
                                    ?>
                                <li<?=$active?>><a href="<?=$href?>"><?=$label?></a></li>
                                    <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>

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
        </div>
    </section>
</main>





<?php include_once $STATIC_ROOT . '/inc/layouts/footer.php'; ?>