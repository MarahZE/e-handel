<?php
//logga ut
session_start();
if (session_destroy()) {
    header("location:index.php");
}
