<?php
//valeur arbitraire pour le jeu de test
$ut = $_SESSION['ID_ut'];

include('./view/head.html');
include('./view/nav_bar_co.html');
include( './view/reunions.html' );
 
include( './modele/function_reunion.php' );
$date_now = date("Y-m-d");
//AFFICHAGE DES REUNIONS DONT ON EST INSTIGATEUR
 // echo'<div class="reunionCenterShow">';

	if(isset($_POST['me_reunion'])){
		reunion_instigateur($ut, $date_now, $pdo);
	}else if(isset($_POST['me_participant'])){
		reunion_participant($ut, $date_now, $pdo);
	}else if(isset($_POST['me_non_all'])){
		reunion_autre($ut, $pdo);
	}else if(isset($_POST['me_all'])){
		reunion_all($ut, $pdo);
	}
	echo'<br/><br/><br/><br/><br/></div>';
include('./view/footer.html');

/*echo "AFFICHAGE DES REUNIONS DONT ON EST INSTIGATEUR";
for ( $a=0;$a<$c_r_i_ut;$a++ ) {
		echo "<form action=index.php?page=deleteR method='POST'>";
		echo "<b>Instigateur : </b>".$info1." ".$info2."<br>";
		echo "<b>Participants : </b><br>";
		for( $b=0;$b<$c_p_r_ut;$b++ ) {
			//if( isset($p_r_ut[$a][$b]) ) {
				echo $p_r_ut[$a][$b][0]." ".$p_r_ut[$a][$b][1]."<br>";
			//}
		}
		echo "<input type='hidden' name='ID_r' value='$info3[$a]'>";
		echo "<p><b>Ordre : </b>".$info4[$a]."<br>";
		echo "<b>Date : </b>".$info5[$a]."<br>";
		echo "<b>Horaire prévu : </b>".$info6[$a]." - ".$info7[$a]."<br>";
		echo "<b>Lieu : </b>".$info8[$a]."<br>";
		echo "<input type='submit' value='Supprimer'></form>";
}
echo"<br>";
echo"<br>";
echo"<br>";
echo"<br>";*/
//AFFICHAGE DES REUNIONS DONT ON EST PARTICIPANT
// echo "AFFICHAGE DES REUNIONS DONT ON EST PARTICIPANT";

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

// AFFICHAGE DES AUTRES REUNIONS 
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

	/*} else {
		echo "erreur inst";
	}
} else {
	echo "Vous etes un boulet";
}

if( isset( $ut_part ) ) {
	if( $ut_part == true ) {
		echo "Vous ne pouvez pas supprimer";
	} else {
		echo "erreur part";
	}
} else {
	echo "Vous etes un boulet";
};*/

?>