<?php
require_once './exercice1.php';
/** Exercice2 2-1 */

/* 
 * Écrire une méthode qui prend en entrée un haché possible h – sur 5 bits donc – et
 * un tableau de chaînes de caractères, et affiche lorsqu’un élément du tableau a le haché
 * tronqué égal à h.
*/

function findMatchingHash($method, $h , $array){
    foreach($array as $str){
        if(hash5($method, $str) == $h){
            echo "préimage trouvée : " . $str . "\n";
        }
    }
}

/*
 * 2-2
 * Écrire une méthode qui prend en entrée une chaîne de caractères "message" et un
 * tableau de chaînes de caractères, et affiche lorsqu’un élément du tableau a le même
 * haché tronqué que "message".
*/

function hash5_search_second_preimage($method, $h, $array){
    $h = hash5($method, $h);
    foreach($array as $str){
        if(hash5($method, $str) == $h){
            echo "Deuxième préimage trouvée : " . $str . "\n";
        }
    }
}


/*
 * 2-3
 * Écrire une fonction qui prend en entrée un tableau de chaînes de caractères, tire
 * aléatoirement deux éléments distincts contenus dans ce tableau et affiche s’ils ont le
 * même haché tronqué à 5 bits.

*/


function hash5_search_collision($method, $tab, $nb_trials)
{
    for ($i =0; $i < $nb_trials; $i++){
        $rand_ind = array_rand($tab, 2);
        $h0 = hash5($method, $tab[$rand_ind[0]]);
        $h1 = hash5($method, $tab[$rand_ind[1]]);
        if($h0 == $h1){
            echo "Collision trouvée entre : " . $tab[$rand_ind[0]] .
                " et " . $tab[$rand_ind[1]] . "\n";
        }
    }
}

/*
* 2-4
*/

function hash5_search_preimage_file($method, $h, $file)
{
    $file_handle = fopen($file, "r");
    while(!feof($file_handle)){
        $line = fgets($file_handle);
        $line = trim($line);
        if(hash5($method, $line) == $h){
            echo "préimage trouvée dans le fichier : " . $line . "\n";
        }
    }
    fclose($file_handle);
}


function hash5_search_collision_file($method, $file, $nb_trials)
{
    $tab = [];
    $file_handle = fopen($file, "r");

    while(!feof($file_handle)){
        $line = fgets($file_handle);
        $line = trim($line);
        array_push($tab, $line);
    }
    fclose($file_handle);
    hash5_search_collision($method, $tab, $nb_trials);
}

/*
 * 2-5
 * Fonction permettant de trouver le nb d'essais moyen pour trouver une collision
*/

function average_collision_trials($method, $file, $nb_trials){
    $tab = [];
    $file_handle = fopen($file, "r");
    while(!feof($file_handle)){
        $line = fgets($file_handle);
        $line = trim($line);
        array_push($tab, $line);
    }
    fclose($file_handle);

    $C = 0; /* varuable nombre d'essais moyen */
    $c = 0; /* Compteur essais entre chaque collision */
    $t = 1; /* Compteur nombre de collision */


    for ($i = 0; $i < $nb_trials; $i++){
        $c += 1;
        $rand_ind = array_rand($tab, 2);
        $h0 = hash5($method, $tab[$rand_ind[0]]);
        $h1 = hash5($method, $tab[$rand_ind[1]]);
        if($h0 == $h1){
            $C += $c;
            $c = 0;
            $t += 1;
        }
    }
    if($c == 0){
        return -1; // Pas de collision trouvée
    }
    return $C / $t;

}

// Exemple d'utilisation des fonctions average collision trials
$method = 'sha1';
$file = 'data.txt';
$nb_trials = 10000;
$average_trials = average_collision_trials($method, $file, $nb_trials);
if($average_trials != -1){
    echo "Nombre moyen d'essais pour trouver une collision : " . $average_trials .
    "\n";
} else {
    echo "Aucune collision trouvée lors des essais.\n";
}