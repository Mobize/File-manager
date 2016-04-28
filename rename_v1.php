<?php
require_once 'inc/config.php';

// Lister toutes les images du répertoire img/ (php.net/glob)
$pictures = glob('img/*.{jpg,jpeg,png,gif,bmp,tga}', GLOB_BRACE);

debug($pictures);

foreach($pictures as $picture_path) {

	$picture_filename = basename($picture_path);
	$picture_extension = pathinfo($picture_filename, PATHINFO_EXTENSION);

	$query = $db->prepare('SELECT name, picture FROM products WHERE picture LIKE :picture');
	$query->bindValue(':picture', $picture_filename, PDO::PARAM_STR);
	$query->execute();
	$product = $query->fetch();

	if (empty($product)) {
		echo 'No name for picture '.$picture_filename.'<hr>';
		continue;
	}

	$old_name = $product['name'];
	$new_name = cleanString($old_name).'.'.$picture_extension;

	$result = rename($picture_path, 'img/'.$new_name);

	echo $picture_filename.' => '.$new_name.'|'.($result ? 'OK': 'NOK');
	echo '<hr>';
}