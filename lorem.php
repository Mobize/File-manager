<?php
require_once 'inc/config.php';

$contents = nl2br(file_get_contents('lorem.txt'));
$contents = explode('<br />'.PHP_EOL.'<br />'.PHP_EOL, $contents);

debug($contents);
/*
1. Faire une boucle sur le tableau $contents
   Et pour chaque entrée du tableau
   Créer un fichier "loremX.txt" dans le répertoire "lorem"
   Avec le contenu renvoyé par le foreach
*/

// On crée le répertoire lorem
if (!is_dir('lorem')) {
	mkdir('lorem');
}

foreach($contents as $key => $content) {

	$num = $key + 1;
	$filename = 'lorem/lorem'.$num.'.txt';

	$result = file_put_contents($filename, $content);

	echo 'Write '.$filename.' => '.($result ? 'OK' : 'NOK').'<br>';
}

/*
2. 	Créer une branche "lorem"
	Faire un git status pour lister les nouveaux fichiers
   	Ajouter les fichiers à l'index GIT
   	Enregistrer une version des fichiers
   	Envoyer les fichiers vers un dépôt GIT distant

	git checkout -b lorem
	git status
	git add lorem.php lorem/
	git commit -m "Add lorem files text" lorem.php lorem/
	git push origin lorem
*/

