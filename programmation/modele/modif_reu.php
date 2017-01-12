<?php 

include('function.php');

$reunions_mod = $_POST['reunions_mod'];

// Appel fonction modification de réunion

$data = modif_reu($reunions_mod, $pdo);

if ($data == 0){
	echo('La reunions n\'existe pas');
	return (0);
}
else if ($data == -1)
{
	echo('Vous n\'est pas instigateur');
	return (0);
}
else {
		include('./view/mod_reu.html');
}
?>