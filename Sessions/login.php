<?php

require("controller.php");
session_start();

// passwords compute with the SHA1 hash function
define(
    'CREDENTIALS',
    [
        'student' => "204036a1ef6e7360e536300ea78c6aeb4a9333dd",
        'teacher' => "4a82cb6db537ef6c5b53d144854e146de79502e8",
        'admin' => "d033e22ae348aeb5660fc2140aec35850c4da997" // this one is a bit geeky 
    ]
);

$m = checkMethod();

if ($m) {
    if (checkCredentials()) {
        $_SESSION["loggedIn"] = true;
        $_SESSION["user"] = $_POST["username"];

        // session_regenerate_id();

        if (isset($_SESSION['current_page'])) {
            $url = "." . $_SESSION['current_page'];
            $dir = 'Location: ' . $url;
            header($dir, TRUE);
        } else {
            header('Location: home.php', TRUE);
        }
    } else {
        header('Location: index.php', TRUE); // This is not the way...
        exit();
    }
} else {
    http_response_code(400);
    exit();
}

