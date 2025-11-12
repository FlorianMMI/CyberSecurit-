<?php

// passwords compute with the SHA1 hash function
define(
    'CREDENTIALS',
    [
        'student' => "204036a1ef6e7360e536300ea78c6aeb4a9333dd",
        'admin' => "d033e22ae348aeb5660fc2140aec35850c4da997"
    ]
);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {

    if (isset(CREDENTIALS[$_POST['username']]) && (hash("sha1", $_POST['password']) === CREDENTIALS[$_POST['username']])) {

        header('Location: ./home.html', TRUE); // This is not the way...x
        exit();
    } else {
        header('Location: index.html', TRUE); // This is not the way...
        exit();
    }
}

exit();
