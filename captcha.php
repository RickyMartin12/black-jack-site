<?php

// We start a session to access
// the captcha externally!
session_start();

$filename = session_id();

// Generate a random number
// from 1000-9999
switch ($_GET['teste'])
{
    case 'image_captcha':

        $captcha = rand(1000, 9999);
        $_SESSION["captcha"] = $captcha;

        $myimage = create_capacha($captcha);
	file_put_contents($filename, $captcha);
        break;

    case 'return_captcha':
        echo $_SESSION["captcha"];
        break;


}







?>