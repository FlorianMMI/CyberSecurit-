<?php

require "mysession.php";
$handler = new MySessionHandler;
session_set_save_handler($handler, true);

session_start();
$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];
if ($_SESSION["loggedIn"] != true || !isset($_SESSION["loggedIn"])) {
    header("Location: index.php");
    exit();
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Homepage</title>
    </head>

    <body>
        Welcome to the dark side of the moon !
        
        <ul>
            <li> <a href="home.php"> Home </a></li>
            <li> <a href="logout.php"> Logout </a></li>
        </ul>
        
    </body>

    </html>

<?php
    exit();
}
