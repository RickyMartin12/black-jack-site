<?php

// We start a session to access
// the captcha externally!
session_start();

// Generate a random number
// from 1000-9999
switch ($_GET['teste'])
{
    case 'image_captcha':

        $captcha = rand(1000, 9999);
        $_SESSION["captcha"] = $captcha;

        $width = 200;
	$height = 100;
	$fontfile = "OpenSans-Regular.ttf";

        $image = imagecreatetruecolor($width, $height);

	$white = imagecolorallocate($image, 255, 255, 255);
	$black = imagecolorallocate($image, 0, 0, 0);

        imagefill($image, 0, 0, $white);
	imagettftext($image, 25, rand(-20,20), $width/4, 60, $black, $fontfile, $captcha);

        header('Content-type: image/jpeg');

        imagejpeg($image);
	imagedestroy($image);
        //$myimage = create_capacha($captcha);
	//file_put_contents($filename, $captcha);
        break;

    case 'return_captcha':
        echo $_SESSION["captcha"];
        break;


}







?>