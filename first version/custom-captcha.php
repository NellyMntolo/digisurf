<?php
/*
*
*@ Author: Nelly Mntolo
*
*/

session_start();
 
$string = '';
 
for ($i = 0; $i < 5; $i++) {
    // these numbers refer to numbers of the ascii table (lower case)
    $string .= chr(rand(97, 122));
}
 
$_SESSION['rand_code'] = $string;
 
$dir = 'Assets/fonts/';
 
$image = imagecreatetruecolor(170, 50);
$black = imagecolorallocate($image, 0, 0, 0);
$color = imagecolorallocate($image, 18, 142, 117); // red 	237, 30, 121
$white = imagecolorallocate($image, 206, 206, 206);

 
imagefilledrectangle($image,0,0,399,99,$white);
imagettftext ($image, 30, 0, 10, 40, $color, $dir."Moms_typewriter.ttf", $_SESSION['rand_code']);
 
header("Content-type: image/png");
imagepng($image);
?>