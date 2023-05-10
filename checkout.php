<?php
session_start();

require 'includes/PHPMailer.php';
require 'includes/SMTP.php';
require 'includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->isSMTP();

$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth = true;

$mail->Username = "testphpsendmail96@gmail.com";

$mail->Password = "fitsjqilkdtmwjgu";

$mail->Port = "465";

$mail->SMTPSecure = "ssl";

$mail->isHTML(true);

if (isset($_POST['checkout'])) {

    /* $from = "testphpsendmail96@gmail.com";
    $to = $_SESSION['name'];

    $subject = "Order";
    $message = "new message";

    foreach ($_SESSION['cart'] as $key => $value) {
    }


    $mail->setFrom($from);

    $mail->addAddress($to);

    $mail->Subject = $subject;

    $mail->Body = $message . '';

    if ($mail->Send()) {
        //echo "Email Sent..";
        unset($_SESSION['cart']);
    } else {
        echo "Error";
    }

    $mail->smtpClose();*/

    unset($_SESSION['cart']);
    header("location:selectMakeup.php");
}
