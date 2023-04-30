<?php

session_start();

if (isset($_POST['remove_item'])) {
    $id = $_GET['id'];
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($id == $value['id']) {
            unset($_SESSION['cart'][$key]);
            header("location:shoppingCart.php");
        }
    }
}
