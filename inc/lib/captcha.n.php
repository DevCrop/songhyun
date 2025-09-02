<?php
session_start();

header('Content-Type: image/png');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Expires: 0');

// === 아래는 기존 이미지 생성 로직 ===
$image = imagecreatetruecolor(120, 30);
if (!$image) { exit; }

imagealphablending($image, false);
imagesavealpha($image, true);
$transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
imagefill($image, 0, 0, $transparent);
imagealphablending($image, true);

$textcolor = imagecolorallocatealpha($image, 255, 255, 255, 0);

$digit = '';
for ($x = 15; $x <= 95; $x += 20) {
    $num = rand(0, 9);
    $digit .= $num;
    $fontSize = rand(3, 5);
    $yPosition = rand(2, 14);
    imagechar($image, $fontSize, $x, $yPosition, (string)$num, $textcolor);
}

$_SESSION['captcha_secure'] = $digit;

imagepng($image);
imagedestroy($image);