<?php
include( "./modele/deleteReunion.php");

include( './view/head.html' );
include( './view/nav_bar_co.html' );
echo'<div class="text-success" align="center"><h4>';

if(isset($_GET['id_reu'])){
	$id_reu = $_GET['id_reu'];
	delete_reu($id_reu,$pdo);
	echo'Votre Réunion à bien été supprimée';

	echo'<meta http-equiv="refresh" content="2;URL=index.php?page=reunion_view">';
echo'reunion';
}else if(isset($_GET['id_par'])){
	$id_par = $_GET['id_par'];
	delete_par($id_par,$pdo);
	echo'<meta http-equiv="refresh" content="2;URL=index.php?page=reunion_view">';
echo'sup_all_participants';
}else if(isset($_GET['ID_reu']) and isset($_GET['ID_par'])){
	
	$id_reu = $_GET['ID_reu'];
	$id_par = $_GET['ID_par'];
	delete_sel_par($id_reu, $id_par,$pdo);
	echo'<meta http-equiv="refresh" content="2;URL=index.php?page=reunion_view">';
	echo' Ce paticipant à été retirer de la reunion';
}else if(isset($_GET['ID']) and isset($_GET['ID_reu'])){
	
	$id_reu = $_GET['ID_reu'];
	$id = $_GET['ID'];
	delete_soi_non($id_reu, $id, $pdo);
	echo'<meta http-equiv="refresh" content="2;URL=index.php?page=reunion_view">';
	echo' Vous avez été retirer de la reunion';
}else if(isset($_GET['Id']) and isset($_GET['ID_reu'])){
	
	$id_reu = $_GET['ID_reu'];
	$id = $_GET['Id'];
	delete_soi_oui($id_reu, $id, $pdo);
	echo'<meta http-equiv="refresh" content="2;URL=index.php?page=reunion_view">';
	echo' Vous avez été ajouter de la reunion';
}
echo'<br/><br/><br/><br/></h4></div>';
// }else if(isset($_GET['ID_reu']) and isset($_GET['ID'])){
	
	// $id_reu = $_GET['ID_reu'];
	// $id = $_GET['ID'];
	// delete_soi($id_reu, $id,$pdo);
	// echo'<meta http-equiv="refresh" content="10;URL=index.php?page=reunion_view">';
	// echo' new_supp_paticipant';

// }else if(isset($_GET['ID_reu']) and isset($_GET['ID_moi'])){
	

	// $id_reu = $_GET['ID_reu'];
	// $id = $_GET['ID'];
	// ajout($id_reu, $id_par,$pdo);
	// echo'<meta http-equiv="refresh" content="10;URL=index.php?page=reunion_view">';
	// echo'ajouter';

// }else if(isset($_GET['ID_reu']) and isset($_GET['ID_par'])){
	
	// $id_reu = $_GET['ID_reu'];
	// $id_par = $_GET['ID_par'];
	// delete_sel_par($id_reu, $id_par,$pdo);
	// echo'<meta http-equiv="refresh" content="10;URL=index.php?page=reunion_view">';
	// echo' new_supp_paticipant';

// }else if(isset($_GET['ID_reu']) and isset($_GET['ID_par'])){
	
	// $id_reu = $_GET['ID_reu'];
	// $id_par = $_GET['ID_par'];
	// delete_sel_par($id_reu, $id_par,$pdo);
	// echo'<meta http-equiv="refresh" content="10;URL=index.php?page=reunion_view">';
	// echo' new_supp_paticipant';

// }else if(isset($_GET['ID_reu']) and isset($_GET['ID_par'])){
	
	// $id_reu = $_GET['ID_reu'];
	// $id_par = $_GET['ID_par'];
	// delete_sel_par($id_reu, $id_par,$pdo);
	// echo'<meta http-equiv="refresh" content="10;URL=index.php?page=reunion_view">';
	// echo' new_supp_paticipant';

// }
// else if(isset($_GET['ID_reu']) and isset($_GET['ID_par'])){
	
	// $id_reu = $_GET['ID_reu'];
	// $id_par = $_GET['ID_par'];
	// delete_sel_par($id_reu, $id_par,$pdo);
	// echo'<meta http-equiv="refresh" content="10;URL=index.php?page=reunion_view">';
	// echo' new_supp_paticipant';

// }


// AFFICHAGE DES REUNIONS DONT ON EST INSTIGATEUR
// for ( $a=0;$a<$c_r_i_ut;$a++ ) {
		// echo "<form action=index.php?page=deleteR method='POST'>";
		// echo "<b>Instigateur : </b>".$info1." ".$info2."<br>";
		// echo "<b>Participants : </b><br>";
		// for( $b=0;$b<$c_p_r_ut;$b++ ) {
			// if( isset($p_r_ut[$a][$b]) ) {
				// echo $p_r_ut[$a][$b][0]." ".$p_r_ut[$a][$b][1]."<br>";
			// }
		// }
		// echo "<input type='hidden' name='ID_r' value='$info3[$a]'>";
		// echo "<p><b>Ordre : </b>".$info4[$a]."<br>";
		// echo "<b>Date : </b>".$info5[$a]."<br>";
		// echo "<b>Horaire prévu : </b>".$info6[$a]." - ".$info7[$a]."<br>";
		// echo "<b>Lieu : </b>".$info8[$a]."<br>";
		// echo "<input type='submit' value='Supprimer'></form>";
// }

// AFFICHAGE DES REUNIONS DONT ON EST PARTICIPANT
// for ( $c=0;$c<$c_id_r_p_ut;$c++ ) {
		// echo "<b>Instigateur : </b>"/*.$info1." ".$info2*/."<br>";
		// echo "<b>Participants : </b><br>";
		// for( $d=0;$d<$c_r_p;$d++ ) {
			// if( isset($r_p[$c][$d]) ) {
				// echo $r_p[$c][$d][0]." ".$r_p[$c][$d][1]."<br>";
			// }
		// }
		// echo "<p><b>Ordre : </b>".$info10[$c]."<br>";
		// echo "<b>Date : </b>".$info11[$c]."<br>";
		// echo "<b>Horaire prévu : </b>".$info12[$c]." - ".$info13[$c]."<br>";
		// echo "<b>Lieu : </b>".$info14[$c]."<br>";
// }

?>