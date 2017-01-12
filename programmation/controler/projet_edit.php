<?php


		
include('./view/head.html');
include('./view/nav_bar_co.html' );

if (empty($_POST['projet_nom']) || empty($_POST['langage']) || empty($_POST['participants']) || empty($_POST['d_f']) || empty($_POST['d_d']) || empty($_POST['description']) || empty($_POST['difficultes'])){
	$id_projet = $_GET['id_projet'];
    $projet_all = $pdo->query("SELECT * FROM projets U WHERE ID_projet=$id_projet");
    $projet = $projet_all->fetchall();
	
   echo'Veuillez remplir tout les champs vides';
	include( './view/projet_edit.html' );
	echo"<input type ='hidden' name = 'id_projet' value=' $id_projet'/>
	</form>	";
		
}else{
 
include('./modele/edit_projet.php');
}

?>