<?php

session_start();

$_SESSION['current_page'] = $_SERVER['REQUEST_URI'];

if ($_SESSION["loggedIn"] != true || !isset($_SESSION["loggedIn"])) {
    echo $_SESSiON["loggedIn"];
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
        Successful login !

        <p> Welcome home
            <?php
            $mess = $_SESSION["user"];
            echo $mess . " !";
            ?>

        </p>


        <ul>
            <li> <a href="other.php"> Other </a></li>
            <li> <a href="logout.php"> Logout </a></li>
        </ul>

    </body>



    </html>

<?php
    exit();
}
