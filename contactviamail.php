<?php

session_start();

if (isset($_SESSION['name'])) {
    $html = file_get_contents("contact.html");
    $html = str_replace('---$name---', $_SESSION['name'], $html);
    echo $html;
} else {
    echo "you have to log in first!";
}
