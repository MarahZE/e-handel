<?php
session_start();

include_once 'connectDb.php';

if (isset($_POST['log-in'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];


    $select = mysqli_query($conn, "SELECT * FROM Users WHERE Email = '$name' AND password ='$password'");
    $row = mysqli_fetch_array($select);

    if (empty($row)) {
        echo 'Unkorrekt password or name';
        //header("location:index.php");
    } else {
        $_SESSION['name'] = $row['Name'];
        $_SESSION['email'] = $row['Email'];
        header("location:selectMakeup.php");
    }
}
