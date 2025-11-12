<?php


/* Q1 : tester la commande 'curl_exec' sur 'www.example.com' et sur 'www.google.fr' */


// $ch = curl_init('https://www.google.fr');
// curl_setopt($ch, CURLOPT_HEADER, true);
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// $response = curl_exec($ch);
// echo $response;
// curl_close($ch);

/* Q2 : en remarquant que le header pour 'www.google.fr' indique que la page a été déplacée, mettre
 * l'option 'CURLOP_FOLLOWLOCATION' à 'true' et observer le résultat.
 */



/* Q3 : on veut maintenant connaître l'url finale sans pour autant afficher le résultat. En remettant l'option le code pour la Q2
 * en mettant l'option 'CURLOP_FOLLOWLOCATION' à 'false', en mettant 'CURLOPT_RETURNTRANSFER' à 'true' également, récupérer l'url finale
//  * en utilisant la commande 'curl_getinfo($ch, CURLINFO_REDIRECT_URL);'
//  */
// $ch = curl_init('https://www.google.fr');
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);

// /* on récupère l'url dans une variable $url */
// $url = curl_getinfo($ch, CURLINFO_REDIRECT_URL);
// echo $url;
// curl_close($ch);


// /* Q4 : On va maintenant faire un requête POST sur login1.php.
//  * Deux utilisateurs 'student' et 'admin' ont comme mot de passe leur nom d'utilisateur.
//  * En modifiant le code suivant, faites les requêtes pour vous authentifier.
//  * Observer les différences entre une authentification réussie et ratée.
//  */
$ch = curl_init('http://localhost/Auth/index.html'); // use a full URL to avoid relative path issues
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // don't directly echo the response
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false); // don't follow redirects automatically

// timeouts to avoid hanging if the server is slow or unreachable
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // seconds to wait for connection
curl_setopt($ch, CURLOPT_TIMEOUT, 10); // max seconds for the whole request

/* set the post fields */

$post = [
    'username' => 'admin',
    'password' => 'admin'
];

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    $err = curl_error($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "cURL error: $err (HTTP code: $code)";
} else {
    echo $response;
}

curl_close($ch);
