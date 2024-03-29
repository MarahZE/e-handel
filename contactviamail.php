<?php

session_start();

if (isset($_SESSION['name'])) {
    $html = file_get_contents("contact.html");
    if (!empty($_SESSION['cart'])) {
        $cartSize = 0;

        foreach ($_SESSION['cart'] as $value) {
            $cartSize += $value['quantity'];
        }


        $html = str_replace('---$items---', $cartSize, $html);
        $html = str_replace('---$user---', $_SESSION['name'], $html);
    } else {
        $html = str_replace('---$items---', 0, $html);
        $html = str_replace('---$user---', $_SESSION['name'], $html);
    }
    $html = str_replace('---$name---', $_SESSION['name'], $html);
    echo $html;
} else {
    echo "you have to log in first!";
}
