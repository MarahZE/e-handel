<?php

include_once 'connectDb.php';

if (isset($_POST['sign-in'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $sql = "INSERT INTO Users VALUES (?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "SQL error";
    } else {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
        mysqli_stmt_execute($stmt);
    }

    header("Location: index.php");
}
