<?php
require_once 'inc/config.php';

// Lister toutes les images de la table products
$query = $db->query('SELECT picture, name FROM products GROUP BY picture HAVING picture != "" ORDER BY picture ASC');
$products = $query->fetchAll();

debug($products);

foreach($products as $product) {

	$picture_path = 'img/'.$product['picture'];

	if (!file_exists($picture_path)) {
		echo 'No file for picture '.$product['picture'].'<hr>';
		continue;
	}

	$picture_filename = basename($picture_path);
	$picture_extension = pathinfo($picture_filename, PATHINFO_EXTENSION);

	$old_name = $product['name'];
	$new_name = cleanString($old_name).'.'.$picture_extension;

	$result = rename($picture_path, 'img/'.$new_name);

	echo $picture_filename.' => '.$new_name.'|'.($result ? 'OK': 'NOK');
	echo '<hr>';
}