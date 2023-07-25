<?php
//skapa kontakt med db
session_start();

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "e-handel";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
