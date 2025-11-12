<?php

// passwords compute with the SHA1 hash function
define(
    'CREDENTIALS',
    [
        'student' => "204036a1ef6e7360e536300ea78c6aeb4a9333dd",
        'user2' => "b612af11efb748105a3b356cf99f836b01fffbe9",
        'user3' => "7616bb87bd05f6439e3672ba1b2be55d5beb68b3",
        'user4' => "8aaaa5c38de3f6b9de78796abe58b97bc8c7ab6f",
        'user5' => "03de6c570bfe24bfc328ccd7ca46b76eadaf4334",
        'user6' => "48eee545bb57235a49c31f939bc0343fcc02d199" // this one might be geeky 
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
