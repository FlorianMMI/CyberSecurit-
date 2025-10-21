<?php
/** Exercice1 1-1 */
$chaine = "Bonjour tout le monde";

#Version avec hash --> Correction
$hashed_chaine = hash('sha1', $chaine);
echo "Chaîne hachée avec SHA-1 : " . $hashed_chaine . "\n";

/** Exercice1 1-2 
 * Faire une fonction  qui prend 5 bits et hash les valeur 
 * 
*/

function hash5($method, $message){

    $a = hash($method, $message);

    /* On a besoin de 5 bits et chaque bit est représenté par 4 caractères hexadécimaux */
    $a = substr($a, 0, 2);



    $res = "";
    
    /* on parcourt les caractères de $a */
    for($i = 0; $i < strlen($a); $i++){
        /* on convertit chacun des caractères */
        $c = base_convert($a[$i], 16, 2); 

        /* on rajoute des 0 si la longueur de $c n'est pas correcte */
        $l = strlen($c);
        for($j = 0; $j < 4 - $l; $j++){
            $c = "0" . $c;
    }

        $res = $res . $c;
    }

    return substr($res, 0, 5);

}


echo("Hash 5 bits de la chaîne avec SHA-1 : " . hash5('sha1', $chaine) . "\n");