<?php
//behandla bestälning och visa produkter i shopping page..
session_start();
$html = file_get_contents("cart.html");
$html_pieces = explode("<!--===xxx===-->", $html);



if (isset($_POST['buy'])) {

    if (isset($_SESSION['cart'])) {
        $found = false;

        foreach ($_SESSION['cart'] as $key => $value) {
            if ($_GET['id'] == $value['id']) {
                $_SESSION['cart'][$key]['quantity'] += 1;
                $found = true;
                break;
            }
        }

        if (!$found) {
            $session_data = array(
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'quantity' => 1
            );


            $_SESSION['cart'][] = $session_data;
        }
    } else {
        $session_data = array(
            'id' => $_GET['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'quantity' => 1
        );


        $_SESSION['cart'][] = $session_data;
    }

    header("location:selectMakeup.php");
}

if (!empty($_SESSION['cart'])) {
    $cartSize = 0;

    foreach ($_SESSION['cart'] as $value) {
        $cartSize += $value['quantity'];
    }


    $temp_html = $html_pieces[0];
    $temp_html = str_replace('---$items---', $cartSize, $temp_html);
    $temp_html = str_replace('---$user---', $_SESSION['name'], $temp_html);
    echo $temp_html;
} else {
    $temp_html = $html_pieces[0];
    $temp_html = str_replace('---$items---', 0, $temp_html);
    $temp_html = str_replace('---$user---', $_SESSION['name'], $temp_html);
    echo $temp_html;
}

$total = 0;
foreach ($_SESSION['cart'] as $value) {
    $temp_html = $html_pieces[1];

    $temp_html = str_replace('---$id---', $value['id'], $temp_html);
    $temp_html = str_replace('---$name---', $value['name'], $temp_html);
    $temp_html = str_replace('---$price---', $value['price'], $temp_html);
    $temp_html = str_replace(' ---$quantity---', $value['quantity'], $temp_html);
    $total += $value['price'] * $value['quantity'];
    echo $temp_html;
}

$temp_html = $html_pieces[2];
$temp_html = str_replace('---$total---', number_format($total, 2), $temp_html);
$temp_html = str_replace('---$ship---', '30.00', $temp_html);
$temp_html = str_replace('---$totaaftership---', number_format($total + 30.00, 2), $temp_html);
echo $temp_html;

if (empty($_SESSION['cart'])) {
    echo " <form method='post' action='selectMakeup.php'>
    <input type='submit' value='start shopping'>
    </form>";
}
