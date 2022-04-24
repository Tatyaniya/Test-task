<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$refferer = getenv('HTTP_REFERER');
$date=date("d.m.y");
$time=date("H:i");
$admin_email = get_option( 'admin_email' );

$email = htmlspecialchars($_POST["email"]) ?? '';
$name = htmlspecialchars($_POST["name"]) ?? '';
$subject = 'Letter from ' . $name ?? '';
$message = htmlspecialchars($_POST["message"]) ?? '';

$headers = array(
	'content-type: text/html',
);

$message_to_email = "
    <br><br>
    Name: $name<br>
    E-mail: $email<br>
    Message: $message<br>
    Source: $refferer
";

wp_mail( $admin_email , $subject , $message_to_email ,  $headers  =  '' , $attachments  =  array() ));

?>