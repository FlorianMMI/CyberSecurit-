<?php


// passwords compute with the SHA1 hash function
define('CREDENTIALS', [
    'user2' => "ce850e3d4ae58883d72f01ca3c39dff0147af307",
    'user3' => "0b08e9f1c3394fe184f17f5c3e0e2a825802c75a",
    'user4' => "c6b0bb71a18be21f302726e52208e9a16533ec43"
]);




if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {

    echo hash("sha1", $_POST['password']);

    if (isset(CREDENTIALS[$_POST['username']]) && (hash("sha1", $_POST['password']) === CREDENTIALS[$_POST['username']])) {

        header('Location: ./home.html', TRUE, 302); // This is not the way...
        exit();
    } else {
        header('Location: ./index.html', TRUE, 302); // This is not the way...

        exit();
    }
}
exit();
