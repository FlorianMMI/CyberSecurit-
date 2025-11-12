<?php

$letters = range('a', 'z');

$ch = curl_init('http://localhost:3000/Auth/exo2/login1.php'); // use a full URL to avoid relative path issues
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); // don't follow redirects automatically
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // don't directly echo the response

$url0 = 'http://localhost:3000/Auth/exo2/index.php';
$url1 = 'http://localhost:3000/Auth/exo2/home.html';

$post = [
    'username' => 'student',
    'password' => 'student'

];

curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$response = curl_exec($ch);
$url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);

if( $url == $url1){
    echo "Login successful\n";
} else {
    echo "Login failed\n";
}


curl_close($ch);