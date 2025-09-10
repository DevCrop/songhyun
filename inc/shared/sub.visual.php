<?php
$cur_gnb = $CUR_PAGE_LIST[0]['title'] ?? '';
$cur_page = $CUR_PAGE_LIST[1]['title'] ?? '';

$img_path = '';
$eng_title = '';
$eng_desc = '';

if ($cur_gnb === '회사 소개') {
    $img_path = '1';
    $eng_title = 'ABOUT US';
    $eng_desc = "신뢰와 원칙을 지켜온 투자 여정 속에서 검증된 성과와 성장의 기록을 담았습니다";
} elseif ($cur_gnb === '제품 안내') {
    $img_path = '2';
    $eng_title = 'Our Products';
    $eng_desc = "첨단 기술과 세심한 품질 관리로 탄생한 제품 <br> 미건시스템의 전문성과 신뢰를 담아 고객에게 최고의 솔루션을 제공합니다.";
} elseif ($cur_gnb === '고객 지원') {
    $img_path = '3';
    $eng_title = 'Customer Support';
    $eng_desc = "고객의 목소리에 귀 기울이며 <br> 보다 신속하고 세심한 지원으로 언제나 만족과 가치를 드리겠습니다.";
} elseif ($cur_gnb === '문의 지원') {
    $img_path = '4';
    $eng_title = 'Contact Us';
    $eng_desc = "작은 문의에도 정성을 다해 응답하며,<br>고객님의 신뢰를 최우선으로 생각합니다. 언제든 편하게 연락 주시기 바랍니다.";
}

if ($img_path === '') {
    $img_path = '0';
    $eng_title = 'MIKUN SYSTEM';
    $eng_desc = "미건시스템은 기술과 품질, 그리고 책임 있는 서비스를 바탕으로 <br>고객의 미래 가치를 창조하는 글로벌 파트너입니다.";
}

$bg_url = "/resource/images/sub/sub_visual_img_{$img_path}.jpg";
?>


<section class="no-sub-visual">

    <div class="no-container-xl">
        <div class="txt">
            <div>
                <h2 class="f-heading-1  <?= isset($h2TextColorClass) ? $h2TextColorClass : '' ?>">
                    <?= htmlspecialchars($eng_title, ENT_QUOTES) ?>
                </h2>
            </div>
            <div>
                <p class="f-heading-6 --regular">
                    <?= $eng_desc ?>
                </p>
            </div>
        </div>
        <div class="breadcrumb">
            <nav>
                <ul>
                    <li class="home">
                        <a href="/">
                            <i class="fa-solid fa-house"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-has-menu">
                        <button type="button" class="breadcrumb-toggle">
                            회사소개 <i class="fa-solid fa-caret-down"></i>
                        </button>
                        <ul class="breadcrumb-menu" data-lenis-prevent>
                            <?php foreach ($MENU_ITEMS as $di => $depth): ?>
                            <?php $depth_active = $depth['isActive'] ? 'active' : ''; ?>
                            <li
                                class="<?= $depth_active ?> <?= !empty($depth['children']) ? 'breadcrumb-has-submenu' : '' ?>">
                                <a href="<?= $depth['path'] ?? '#' ?>">
                                    <?= $depth['title'] ?>
                                    <?php if (!empty($depth['children'])): ?>
                                    <i class="fa-solid fa-caret-down"></i>
                                    <?php endif; ?>
                                </a>

                                <?php if (!empty($depth['children'])): ?>
                                <ul class="breadcrumb-submenu">
                                    <?php foreach ($depth['children'] as $child): ?>
                                    <li>
                                        <a href="<?= $child['href'] ?? '#' ?>">
                                            <?= $child['title'] ?>
                                        </a>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                                <?php endif; ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

    </div>
    <figure class="img">
        <img src="<?=$bg_url?>" alt="">
    </figure>
    <figure class="bg"></figure>

</section>



<!--
<section class="no-sub-visual" <?= $bg_url ? " style=\"background-image:url('{$bg_url}');\"" : '' ?>>
    <div class="no-container-xl">
        <h2 class="f-heading-2 font-en reveal-char <?= isset($h2TextColorClass) ? $h2TextColorClass : '' ?>">
            <?= htmlspecialchars($eng_title, ENT_QUOTES) ?>
        </h2>
    </div>
</section>-->