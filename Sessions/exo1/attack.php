<?php





// for ($i = 0; $i < 10; $i++) {
// $ch = curl_init('http://localhost:3000/Sessions/exo1/index.php');

// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


// curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie_'. strval($i) . '.txt');
// curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie_'. strval($i) . '.txt');

// $post = [
//     'username' => 'student',
//     'password' => 'student'
// ];

// curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
// $response = curl_exec($ch);


// curl_close($ch);
// } 


$ch = curl_init('http://localhost:3000/Sessions/exo1/home.php');

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


$value = bin2hex(function_exists('random_bytes') ? random_bytes(2) : openssl_random_pseudo_bytes(2));

curl_setopt($ch, CURLOPT_COOKIE, `PHPSESSID=` . $value
);

?>