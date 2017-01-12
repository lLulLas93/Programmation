<?php

$id_ut = $_SESSION['id'];
include('./view/head.html');
include( './view/nav_bar_co.html' );
include( './modele/function_reunion.php' );

if (empty($_POST['message']) && $_GET ){
	
	$id_reu = $_GET['id_reu'];
	include( './view/send_message_reunion.html' );
	include('./modele/member_area_view_reunion.php');
		
}else if ( (isset($_POST['submit'])) ) {
	// echo'</br></br></br></br></br>iiiiiiiiciiiiiiiiiiiiiii</br></br>';
	// print_r($_POST);
	$message = $_POST['message'];
	$a = $_GET['a'];
	$id_sujet = $_POST['id_sujet'];
	$id_reu = $_GET['id_reu'];
	$inserer = "UPDATE sujet
				SET 
					Compte_rendu_s = '$message'	
				WHERE 
					ID_sujet = '$id_sujet'";
    $envoi = $pdo->exec($inserer);	//print_r($inserer);
	echo"<META http-equiv='refresh' content='000000000;URL=index.php?page=reunion_now&id_reu=$id_reu&a=$a'>";

}else if ( (isset($_POST['compte_rendu_reunion'])) && (!empty($_POST['id_reu'])) && (!empty($_POST['message']))) {
	
	$message = $_POST['message'];
	$id_reu = $_POST['id_reu'];
	$inserer = "UPDATE reunions
				SET 
					Compte_rendu_r = '$message'	
				WHERE 
					ID_reunion = '$id_reu'";
    $pdo->exec($inserer); print_r($inserer);
	echo"<META http-equiv='refresh' content='0000000000000;URL=index.php?page=reunion_view'>";

}else if ( (isset($_POST['tache'])) && (!empty($_POST['id_reu'])) && (!empty($_POST['message']))) {
	
		// include('./modele/member_area_view_reunion.php');

	$message = $_POST['message'];
	$id_reu = $_POST['id_reu'];
	$inserer = "INSERT INTO tache(Tache, ID_reunion, ID_ut) VALUES('$message','$id_reu','$id_ut')";
    $pdo->exec($inserer);
	echo"<META http-equiv='refresh' content='000000000;URL=index.php?page=reunion_now&id_reu=$id_reu&a=fin'>";

}else if (isset($_POST['particulier'])) {
		echo"<META http-equiv='refresh' content='0000000000;URL=index.php?page=message>";	
	}

include('./view/footer.html');

?>