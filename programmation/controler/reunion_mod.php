<?php
include('./view/head.html');
include('./view/nav_bar_co.html');


if (!empty($_POST['ordre']) || !empty($_POST['date_r']) || !empty($_POST['heure_d']) || !empty($_POST['heure_f']) || !empty($_POST['lieu']) || !empty($_POST['compte_rendu_r'] || !empty($_POST['ID_reunion']))){
	
	include('./modele/function.php');
	
	$ordre = $_POST['ordre'];
	$date_r = $_POST['date_r']; 
	$heure_d = $_POST['heure_d'];
	$heure_f = $_POST['heure_f'];
	$lieu = $_POST['lieu'];
	$compte = $_POST['compte_rendu_r'];
	$ID_reunion = $_POST['ID_reunion'];
	$ck_heur = verif_heur($heure_d, $heure_f);
	$ck_date = chek_date($date_r);
	
	if ($ck_heur == 1)
	{
		echo ('la reunion ce fini avant qu\'elle commence');
	}
	else if($ck_date == 1){
		
	echo 'La réunion ne peut commencer dans le passé';
	}
	else
		sql_modif($pdo, $ordre, $date_r, $heure_d, $heure_f, $lieu, $compte, $ID_reunion);
	
} else {
	echo'veuillez remplire les champ suivants';
}
	?>