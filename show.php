<?php
/**
 * Created by PhpStorm.
 * User: Baozi
 * Date: 2016/11/4
 * Time: 22:13
 */

require_once('common.php');

$fileString = $_GET['file'];
$fileString = trim($fileString);

if (empty($fileString)) {
    error(4);
}

if (!preg_match('/[0-9_a-z=\/+]+/i', $fileString)) {
    error(1);
}

list($time, $fileName, $tmp) = explode('_', $fileString);
$fileName = base64_decode($fileName);
$now = time();
if ($now < $time) {
    error(2);
}

if ($now > $time + FILE_TTL) {
    error(3);
}
if (encodeFileName(base64_encode($fileName), $time) != $fileString) {
    error(6);
}

$path = STORAGE_FOLDER . $fileName . '.png';

if (!file_exists($path)) {
    error(5);
}


$type = $_GET['type'];
$type = trim($type);

if ($type == 'img') {
    header("content-type: image/png");
    echo file_get_contents($path);
} elseif ($type == 'dl') {
    header("Content-type: application/octet-stream");
    Header("Accept-Ranges: bytes");
    if ($_GET['no_mobile'] == 1) {
        //$im =
        //imagettftext($im, $size, $angle, $startX + (144 - showLength($size, $font, $today)) / 2, $startY - $cellHeight, $color, $font, $today);
    } else {
        header("Content-Disposition: attachment; filename=" . $fileName . '.png');
        Header("Accept-Length: ".filesize($path));
        echo file_get_contents($path);
    }
} else {
    $name = $fileName;
    $overTime = $time + FILE_TTL;
    $url = 'show.php?file=' . urlencode($fileString);
    include 'result.php';
}


