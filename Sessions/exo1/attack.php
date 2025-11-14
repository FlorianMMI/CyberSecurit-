<?php



for ($i = 0; $i < 10; $i++) {
$ch = curl_init('http://localhost:3000/Sessions/exo1/index.php');

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie.txt');

$post = [
    'username' => 'student',
    'password' => 'student'
];

curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$response = curl_exec($ch);


curl_close($ch);
} 

?>