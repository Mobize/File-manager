<form method="POST" enctype="multipart/form-data">

	<input type="file" name="upload" />

	<input type="submit" value="Envoyer" />

</form>
<?php
require_once 'inc/config.php';

debug($_FILES);

if (!empty($_FILES)) {

	if (!is_dir('upload')) {
		mkdir('upload');
	}

	$filename = $_FILES['upload']['name'];
	$filetype = $_FILES['upload']['type'];
	$temp_file = $_FILES['upload']['tmp_name'];

	$result = move_uploaded_file($temp_file, 'upload/'.$filename);

	echo 'Upload file '.$filename.' => '.($result ? 'OK' : 'NOK');
}
?>