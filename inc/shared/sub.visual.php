<?php
$cur_gnb = $CUR_PAGE_LIST[0]['title'] ?? '';
$cur_page = $CUR_PAGE_LIST[1]['title'] ?? '';

$img_path = '';
$eng_title = '';

if ($cur_gnb === '회사 소개') {
    $img_path = '1';
    $eng_title = 'About Us';
}

$bg_url = $img_path !== '' ? "/resource/images/sub/sub_visual_img_{$img_path}.jpg" : '';
$bg_temp_url = "/resource/images/sub/sub_visual_img_1.jpg";
?>
<!--
<section class="no-sub-visual" <?= $bg_url ? " style=\"background-image:url('{$bg_url}');\"" : '' ?>>
    <div class="no-container-xl">
        <h2 class="f-heading-2 font-en reveal-char <?= isset($h2TextColorClass) ? $h2TextColorClass : '' ?>">
            <?= htmlspecialchars($eng_title, ENT_QUOTES) ?>
        </h2>
    </div>
</section>-->


<section class="no-sub-visual" style="background-image: url('<?=$bg_temp_url?>');">
    <div class="no-container-xl">
        <h2 class="f-heading-2 font-en reveal-char <?= isset($h2TextColorClass) ? $h2TextColorClass : '' ?>">
            <?= htmlspecialchars($eng_title, ENT_QUOTES) ?>
        </h2>
    </div>
</section>