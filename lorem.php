<?php
require_once 'inc/config.php';

$contents = nl2br(file_get_contents('lorem.txt'));
$contents = explode('<br />'.PHP_EOL.'<br />'.PHP_EOL, $contents);

// 1. Faire une boucle sur le tableau $contents
// 	  Et pour chaque entrée du tableau
//    Créer un fichier "loremX.txt" dans le répertoire "lorem"
//    Avec le contenu renvoyé par le foreach



// 2.