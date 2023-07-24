<?php

session_start();
include_once 'connectDb.php';

if (isset($_SESSION['name'])) {
    $html = file_get_contents("makeup.html");
    $html_pieces = explode("<!--===xxx===-->", $html);
    //echo $html_pieces[0];

    if (!empty($_SESSION['cart'])) {
        $cartSize = 0;
        //echo $cartSize;

        foreach ($_SESSION['cart'] as $value) {
            $cartSize += $value['quantity'];
        }


        $temp_html = $html_pieces[0];
        $temp_html = str_replace('---$items---', $cartSize, $temp_html);
        echo $temp_html;
    } else {
        $temp_html = $html_pieces[0];
        $temp_html = str_replace('---$items---', 0, $temp_html);
        echo $temp_html;
    }




    $sql = "SELECT * FROM Products WHERE Products.Type = 'makeup'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    if ($check > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $temp_html = $html_pieces[1];
            $temp_html = str_replace('---$img---', '<img src= "data:image;base64,' . base64_encode($row['Image']) . '" width="300" height="400"/>', $temp_html);
            $temp_html = str_replace('---$id---', $row['ID'], $temp_html);
            $temp_html = str_replace('---$name---', $row['Name'], $temp_html);
            $temp_html = str_replace('---$price---', number_format($row['Price'], 2), $temp_html);
            // echo ' <img src= "data:image;base64,' . base64_encode($row['Image']) . '" width="300" height="400"/>';
            echo $temp_html;
        }
    }

    echo $html_pieces[2];
} else {
    echo "you have to log in first!";
}

/*$html = file_get_contents("makeup.html");
$html_pieces = explode("<!--===xxx===-->", $html);
echo $html_pieces[0];
$x = 1;

$sql = "SELECT * FROM Products WHERE Products.Type = 'makeup'";
$result = mysqli_query($conn, $sql);
$check = mysqli_num_rows($result);

if ($check > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $temp_html = $html_pieces[1];
        echo ' <img src= "data:image;base64,' . base64_encode($row['Image']) . '" width="300" height="400"/>';
        $temp_html = str_replace('---$id---', $row['ID'], $temp_html);
        $temp_html = str_replace('---$name---', $row['Name'], $temp_html);
        $temp_html = str_replace('---$price---', $row['Price'], $temp_html);
        echo $temp_html;
    }
}

echo $html_pieces[2];*/
