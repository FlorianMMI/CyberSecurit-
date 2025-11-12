<?php


// passwords compute with the SHA1 hash function
define('CREDENTIALS', ['user1' =>  "7bdd161c94587ab444b815ff116e5ea96ad7ccf7",
                       'user2' =>  "6f8d691d46867b03c518e904fd5890588e2ad0d2",
                       'user3' =>  "4f438b5fb4252e077c28d3895644377d1c794195",
                       'user4' =>  "dc79526903c460eb1e796c84884586d443f6eb50"]);


// 


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {

    echo hash("sha1", $_POST['password']);
    
    if (isset(CREDENTIALS[$_POST['username']]) && (hash("sha1", $_POST['password']) === CREDENTIALS[$_POST['username']])) {

        
        header('Location: ./home.html', TRUE, 302); // This is not the way...
        exit();
    } else {
        header('Location: ./index.php', TRUE, 302); // This is not the way...

        exit();
    }
}
exit();
