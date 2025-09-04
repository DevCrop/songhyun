<?php
if (!isset($paginator) || !$paginator instanceof Paginator) return;

$pagination   = $paginator->getPaginationData();
$baseUrl      = strtok($_SERVER['REQUEST_URI'], '?');
$queryParams  = $_GET ?? [];

function buildPaginationUrl($page, $baseUrl, $queryParams) {
    return $baseUrl . '?' . http_build_query(array_merge($queryParams, ['page' => $page]));
}

$isFirstPage  = $paginator->currentPage <= 1;
$isLastPage   = $paginator->currentPage >= $paginator->totalPages;
$firstUrl     = buildPaginationUrl(1, $baseUrl, $queryParams);
$prevUrl      = buildPaginationUrl($pagination['prev'], $baseUrl, $queryParams);
$nextUrl      = buildPaginationUrl($pagination['next'], $baseUrl, $queryParams);
$lastUrl      = buildPaginationUrl($paginator->totalPages, $baseUrl, $queryParams);
?>

<nav class="no-pagination" aria-label="페이지 네비게이션">
    <!-- 첫 페이지 -->
    <a href="<?= $isFirstPage ? '#' : $firstUrl ?>" class="--arrow<?= $isFirstPage ? ' disabled' : '' ?>"
        aria-label="첫 페이지"><i class="fa-regular fa-chevrons-left"></i></a>

    <!-- 이전 페이지 -->
    <a href="<?= $isFirstPage ? '#' : $prevUrl ?>" class="--arrow<?= $isFirstPage ? ' disabled' : '' ?>"
        aria-label="이전 페이지"><i class="fa-regular fa-chevron-left"></i></a>

    <!-- 페이지 번호 -->
    <?php foreach ($pagination['pages'] as $item): ?>
    <?php if ($item['type'] === 'dots'): ?>
    <a href="#" class="dots" aria-hidden="true">…</a>
    <?php elseif ($item['type'] === 'page'): ?>
    <a href="<?= buildPaginationUrl($item['num'], $baseUrl, $queryParams) ?>"
        class="<?= !empty($item['current']) ? 'active' : '' ?>">
        <?= $item['num'] ?>
    </a>
    <?php endif; ?>
    <?php endforeach; ?>

    <!-- 다음 페이지 -->
    <a href="<?= $isLastPage ? '#' : $nextUrl ?>" class="--arrow<?= $isLastPage ? ' disabled' : '' ?>"
        aria-label="다음 페이지">
        <i class="fa-regular fa-chevron-right"></i>
    </a>

    <!-- 마지막 페이지 -->
    <a href="<?= $isLastPage ? '#' : $lastUrl ?>" class="--arrow<?= $isLastPage ? ' disabled' : '' ?>"
        aria-label="마지막 페이지"><i class="fa-regular fa-chevrons-right"></i></a>
</nav>

<script>
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.no-pagination a.disabled').forEach(a => {
        a.addEventListener('click', e => e.preventDefault());
    });
});
</script>

<style>
.no-pagination a.disabled {
    pointer-events: none;
    opacity: .4;
    cursor: default;
}

.no-pagination a.active {
    font-weight: 600;
}

.no-pagination a.dots {
    pointer-events: none;
}
</style>