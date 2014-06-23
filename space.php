<?
header("Content-type: image/png");
$im = @imagecreate(150, 15)
    or die("Cannot Initialize new GD image stream");
$background_color = imagecolorallocate($im, 255, 255, 255);
$text_color = imagecolorallocate($im, 1, 14, 91);
imagestring($im, 2, 0, 0,  "Emarketing #".$_REQUEST[key], $text_color);
imagepng($im);
imagedestroy($im);
include("Config.php");
include("libEmarketing.php");
viewEmail($_REQUEST[key]);
?> 