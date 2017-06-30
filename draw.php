<?php
/**
 * Created by PhpStorm.
 * User: Baozi
 * Date: 2016/10/5
 * Time: 0:43
 */

require_once('common.php');

//phpinfo();exit;
ini_set('display_errors', 0);
error_reporting(E_ALL);


$infoMap = [
    "nick" => [90, 84],
    "sex" => [],
    "birth" => [],
    "birthplace" => [],
    "body_height" => [],
    "body_weight" => [],
    "mobile" => [],
    "income" => [],
    "qq" => [],
    "weixin" => [],
    "marriage" => [],
    "education" => [],
    "house" => [],
    "job" => [],
    "member" => [],
    "hobby" => [],
    // "photo" => [],
    "ta_birthplace" => [],
    "ta_birth" => [],
    "ta_body_height" => [],
    "ta_marriage" => [],
    "ta_education" => [],
    "ta_house" => [],
    "ta_income" => [],
    // "info_open" => [],
    // "photo_open" => [],
    'ta_desc' => ''
];

$im = imagecreatefrompng('media/' . EMPTY_TMP);
$logoFile = 'media/yuanqi.png';
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$color = imagecolorallocate($im, 255, 102, 0);
$text = '爱上包子';  //要写到图上的文字
$font = 'media/simsun.ttc';  //写的文字用到的字体。
$size = 12;
$angle = 0;

$startX = 91;
$startY = 112;
$cellHeight = 26;
$cellWidth = 245;

$offsetArr = [
    'hobby' => 1,
    'ta_birthplace' => 5,
    'ta_birth' => 1,
    'ta_desc' => 3
];


$_POST['body_height'] .= 'cm';
$_POST['body_weight'] .= 'kg';

$today = date('Y-m-d');
imagettftext($im, $size, $angle, $startX + (144 - showLength($size, $font, $today)) / 2, $startY - $cellHeight, $color, $font, $today);


$i = 0;
foreach ($infoMap as $key => $info) {
    if (isset($offsetArr[$key])) {
        $i += $offsetArr[$key];
    }
    $text = $_POST[$key];
    $x = $startX + $i % 2 * $cellWidth;
    $y = $startY + floor($i / 2) * $cellHeight;

    // 居中
    $fixX = 0;
    if ($key != 'ta_desc') {
        $len = showLength($size, $font, $text);
        $width = $i % 2 ? 128 : 144;
        if ($key == 'member' || $key == 'hobby') {
            $width = 360;
        }
        if ($width > $len) {
            $fixX = ($width - $len) / 2;
        }
    }

    if ($key == 'ta_desc' && $text) {
        $x = $startX - 81;
        $text = autowrap($size, 0, $font, $text, 442);
    }
    //var_dump([$x, $y]);
    imagettftext($im, $size, $angle, $x + $fixX, $y, $color, $font, $text);
    $i++;
}

$info_open = $_POST['info_open'] ? '是' : '否';
imagettftext($im, $size, $angle, 255 + 85, 626, $color, $font, $info_open);
$photo_open = $_POST['photo_open'] ? '是' : '否';
imagettftext($im, $size, $angle, 255 + 370 + 60, 626, $color, $font, $photo_open);


$newPhotoSize = [310, 440];

$file = $_FILES['photo']['tmp_name'];
if ($file) {
    list($waterImgObj, $newW, $newH) = resize($file, $newPhotoSize[0], $newPhotoSize[1]);
    $info = getimagesizefromstring($waterImgObj);
    $y = 42 + (488 - $newH) / 2;
    $y = round($y);
    imagecopymerge($im, $waterImgObj, 491, $y, 0, 0, $newW, $newH, 100);
}

// logo
list($logoImgObj, $newW, $newH) = resize($logoFile, 346, 999);
imagecopymerge_alpha($im, $logoImgObj, 490, 270 , 0, 0, $newW, $newH, 30);

//exit;
$sex = $_POST['sex'] == '男' ? 'G' : 'M';
$birth = intval($_POST['birth']);
$birth = strlen($birth) == 4 ? $birth % 100 : $birth;
$birthplace = $_POST['birthplace'];
$rawName = "{$sex}{$birth}_Q{$_POST['qq']}_{$_POST['nick']}_{$birthplace}_" . date('Ymd');
$path = STORAGE_FOLDER . $rawName . '.png';
imagepng($im, $path);
imagedestroy($im);


$fileName = base64_encode($rawName);
$fileName = encodeFileName($fileName);
$url = 'show.php?file=' . urlencode($fileName);
header('Location: ' . $url);
exit;
