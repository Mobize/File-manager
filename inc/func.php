<?php

function debug($tableau) {
	echo '<pre>'.print_r($tableau, true).'</pre>';
}

/*
    Nettoie une chaine de caractere
*/
function cleanString($str, $delimiter='-') {
    // Convertit en caractères unicode
    // Et transforme les accents (Ex: é => e, Ç => c)
    $clean = iconv('UTF-8', 'ASCII//TRANSLIT', trim($str))  ;
    // Supprime tous ce qui n'est pas des lettres, nombres et "_+ -"
    $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
    // Mets en minuscule et supprime les tirets en début/fin de chaine
    $clean = strtolower(trim($clean, '-'));
    // Remplace tous les caractères "/_|+ -" par $delimiter
    $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

    return $clean;
}