<?php
session_start();
// enter colors here
$im = imagecreatefrompng('background.png'); // image
$colors = array(
	0 => imagecolorallocate($im, 1, 47, 56),
	1 => imagecolorallocate($im, 4, 121, 145),
	2 => imagecolorallocate($im, 5, 141, 168),
);

// generate and set code
$characters = 'abcdefghjkmnopqrstuvwxyz';
$code = '';
for ($i = 0; $i < 5; $i++) {
	$code .= $characters[rand(0, strlen($characters) - 1)];
}
$_SESSION['code'] = md5($code);
$rotate = rand(-10,10);
putenv('GDFONTPATH=' . realpath('.'));
$font =  'font.ttf';
for ($i = 0; $i <= strlen($code); $i++) {
	$rotate = -$rotate;
	$select = rand(0,count($colors));
	imagettftext($im, 38, $rotate, ((40*$i)+5), 40, $colors[$select], $font, $code[$i]);
}

header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s") ." GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);
?>
