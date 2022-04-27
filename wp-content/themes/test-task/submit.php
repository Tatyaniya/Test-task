<?php

require( __DIR__ . '/../../../wp-load.php' );

if ( isset( $_POST['name']) && isset( $_POST['email']) && isset( $_POST['message'])) {

    $admin_email = get_option( 'admin_email' );
    $name = htmlspecialchars( $_POST['name'] );
    $email = htmlspecialchars( $_POST['email'] );
    $subject = 'Letter from ' . $name;
    $message = htmlspecialchars( $_POST['message'] );
    $date=date("d.m.y");
    $time=date("H:i");

    $headers = 'From: '.$name.' <'.$admin_email.'>' . "\r\n" . 'Reply-To: ' . $email;

    $message_to_email = "
        Name: $name<br>
        E-mail: $email<br>
        Message: $message<br>
        $date<br>
        $time<br>
    ";

    wp_mail(  $admin_email, $subject , $message_to_email ,  $headers );
}

?>