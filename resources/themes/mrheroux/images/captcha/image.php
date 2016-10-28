<?php
// generate random string function
function generateRandomString($length = 5) {
		$characters = 'abcdefghjkmnopqrstuvwxyz';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {$randomString .= $characters[rand(0, strlen($characters) - 1)];}
		return $randomString;
}
function select_color(){
	global $im;
	global $color_selected;
	if($color_selected==NULL) {$color_selected = rand(0,2);}
	$colors = array(
		imagecolorallocate($im, 1, 47, 56), 
		imagecolorallocate($im, 4, 121, 145),
		imagecolorallocate($im, 5, 141, 168),
	);
	$color_selected++;
	if($color_selected >= count($colors)){$color_selected = 0;}
	return $colors[$color_selected];
}

session_start();
$code = generateRandomString();
$_SESSION['code'] = md5($code);
$im = imagecreatefrompng("background.png"); // image
list($width, $height, $type, $attr) = getimagesize("background.png"); 

$rotate = rand(-10,10);
$font = 'font.ttf';
for ($i = 0; $i <= strlen($code); $i++) {
	$rotate = -$rotate; 
	imagettftext($im, 38, $rotate, 40*$i+5, 45, select_color(), $font, $code{$i});
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