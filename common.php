<?php
/**
 * Created by PhpStorm.
 * User: Baozi
 * Date: 2016/11/4
 * Time: 22:13
 */

define('DEBUG', 0);

if ($_SERVER['HTTP_HOST'] == 'fz.baozi.me') {
    $site = 'fz';
} else {
    $site = 'xm';
}

$site = 'xm';

define('STORAGE_FOLDER', DEBUG ? __DIR__ . '/data_234r234y65/' : '/data/cupid_dir/' . $site . '/');
// 密钥 随便输入一个字符串，切勿公开
define('SECRET_KEY', 'XXX');
define('FILE_TTL', 60 * 60 * 5);



$GConfig = [
    'xm' => [
        'empty' => 'empty.png',
        'statsUrl' => 'https://s95.cnzz.com/z_stat.php?id=1260536077&web_id=1260536077',
        'appendTitle' => '',
        'dir' => '',
    ],
    'fz' => [
        'empty' => 'empty_fz.png',
        'statsUrl' => 'https://s11.cnzz.com/z_stat.php?id=1260835517&web_id=1260835517',
        'appendTitle' => '',
        'dir' => '',
    ],
];
define('EMPTY_TMP', $GConfig[$site]['empty']);
define('STATS_URL', $GConfig[$site]['statsUrl']);


function resize($srcImage, $maxWidth = 100, $maxHeight = 100)
{

    list($width, $height, $type, $attr) = getimagesize($srcImage);
    switch ($type) {
        case 1:
            $img = imagecreatefromgif($srcImage);
            break;
        case 2:
            $img = imagecreatefromjpeg($srcImage);
            break;
        case 3:
            $img = imagecreatefrompng($srcImage);
            break;
    }
    if ($width < $maxWidth || $height < $maxHeight) return [$img, $width, $height];
    $scale = min($maxWidth / $width, $maxHeight / $height); //求出绽放比例
    if ($scale < 1) {
        $newWidth = floor($scale * $width);
        $newHeight = floor($scale * $height);
        $newImg = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
        $img = $newImg;
    }
    return [$img, $newWidth, $newHeight];
}

function image_create_from_ext($imgfile)
{
    $info = getimagesize($imgfile);
    $im = null;
    switch ($info[2]) {
        case 1:
            $im = imagecreatefromgif($imgfile);
            break;
        case 2:
            $im = imagecreatefromjpeg($imgfile);
            break;
        case 3:
            $im = imagecreatefrompng($imgfile);
            break;
    }
    return $im;
}

function autowrap($fontsize, $angle, $fontface, $string, $width)
{
// 这几个变量分别是 字体大小, 角度, 字体名称, 字符串, 预设宽度
    $content = "";
    // 将字符串拆分成一个个单字 保存到数组 letter 中
    for ($i = 0; $i < mb_strlen($string); $i++) {
        $letter[] = mb_substr($string, $i, 1);
    }
    foreach ($letter as $l) {
        $teststr = $content . " " . $l;
        $testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
        // 判断拼接后的字符串是否超过预设的宽度
        if (($testbox[2] > $width) && ($content !== "")) {
            $content .= "\n";
        }
        $content .= $l;
    }
    return $content;
}

function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
    $opacity=$pct;
    // getting the watermark width
    $w = imagesx($src_im);
    // getting the watermark height
    $h = imagesy($src_im);

    // creating a cut resource
    $cut = imagecreatetruecolor($src_w, $src_h);
    // copying that section of the background to the cut
    imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
    // inverting the opacity
    $opacity = 100 - $opacity;

    // placing the watermark now
    imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
    imagecopymerge($dst_im, $cut, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $opacity);
}

function encodeFileName($fileName = '', $time = 0)
{
    if (empty($time)) {
        $time = time();
    }
    $params = [$fileName, SECRET_KEY, $time];
    $str = implode('|', $params);
    return implode('_', [$time, $fileName, md5($str)]);
}


function error($code = 0) {
    $arr = [
        3 => '已经过期',
    ];
    $msg = $code;
    isset($arr[$code]) && $msg .= "({$arr[$code]})";
    echo "Error Code: $msg";
    exit;
}

function showLength($fontsize, $fontface, $str) {
    $box = imagettfbbox($fontsize, 0, $fontface, $str);
    return $box[2] - $box[0];
}
