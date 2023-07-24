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

    $from = "testphpsendmail96@gmail.com";
    $to = $_SESSION['email'];
    $price = $_POST['price'];

    //echo $_SESSION['email'];

    $subject = "Order";
    $message = " Hi " . $_SESSION['name'] . " Your order: ";

    $date = date("d/m/Y");

    $items = sizeof($_SESSION['cart']) . " items <br>";
    $count = 1;
    foreach ($_SESSION['cart'] as $key => $value) {
        $items .= $count . " : id : " . $value['id'] . " price : " . $value['price'] . " quantity : " . $value['quantity'] . "<br>";
        $count++;
    }


    $payment = "Payment method : Invoice  <br> Total price : " . $price;


    $mail->setFrom($from);

    $mail->addAddress($to);

    $mail->Subject = $subject;

    $mail->Body = $message . "<br>" . $date . "<br>" . $items . "<br>" . $payment;

    if ($mail->Send()) {
        //echo "Email Sent..";
        unset($_SESSION['cart']);
    } else {
        echo "Error";
    }

    $mail->smtpClose();

    //unset($_SESSION['cart']);

    header("location:shoppingCart.php");
    echo '<script>alert("We have received your order")</script>';
} else if (isset($_POST['Send-message'])) {

    $from = $_SESSION['email'];
    $to = 'zeibakmarah@gmail.com';
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail->setFrom($from);

    $mail->addAddress($to);

    $mail->Subject = $subject;

    $mail->Body = $message;

    if ($mail->Send()) {
        echo '<script>alert("We have received your message")</script>';
    } else {
        echo "Error";
    }

    $mail->smtpClose();
}

header("location:shoppingCart.php");
