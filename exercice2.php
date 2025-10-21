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

