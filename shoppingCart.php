<?php
session_start();
$html = file_get_contents("cart.html");
$html_pieces = explode("<!--===xxx===-->", $html);
echo $html_pieces[0];

if (isset($_POST['buy'])) {


    if (isset($_SESSION['cart'])) {
        $session_data_id = array_column($_SESSION['cart'], 'id');

        if (!in_array($_GET['id'], $session_data_id)) {
            $session_data = array(
                'id' => $_GET['id'],
                'name' => $_POST['name'],
                'price' => $_POST['price']
            );

            $_SESSION['cart'][] = $session_data;
        }
    } else {
        $session_data = array(
            'id' => $_GET['id'],
            'name' => $_POST['name'],
            'price' => $_POST['price']
        );

        $_SESSION['cart'][] = $session_data;
    }
}

foreach ($_SESSION['cart'] as $key => $value) {
    $temp_html = $html_pieces[1];
    $temp_html = str_replace('---$id---', $value['id'], $temp_html);
    $temp_html = str_replace('---$name---', $value['name'], $temp_html);
    $temp_html = str_replace('---$price---', $value['price'], $temp_html);
    //echo $value['id'] . '<br>';
    echo $temp_html;
}

echo $html_pieces[2];
