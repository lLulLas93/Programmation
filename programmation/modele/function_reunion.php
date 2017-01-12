<?php
function heure_restant($id_reu, $heure_d, $heure_f){
 $hour_now = date("H:i:s");
 $h_now = strtotime($hour_now);
 $h_reu = strtotime($heure_d);
 	
			$sec =($h_now - $h_reu);
			$seconde = $sec%60;
			
			$h = $sec/60;
			$minute = $h%60;
			
			$h2 = $h/60;
			$heure = $h2%60;

			// echo '<br/> temp restant manuel h: '.$heure.'h '.$minute.'min  '.$seconde.'sec';
			// echo '<br/><br/> h_f: '.$heure_f;
			if( $heure && $minute == 0) {
			echo"<h3>Votre Réunion à commencée cliquer <a href='index.php?page=reunion_now&id_reu=$id_reu'>ici</a> pour participer</h3>";
			}else if(($minute < 0)  && ($minute < -5)){
			echo"<h3>Votre Réunion est en approche</h3>";
			}else if(($minute < 0) && ($minute < -5)){
			echo"<h3>Votre Réunion est proche, vous êtes en avance de ".abs($heure)." heure ".abs($minute)." minute,</br> <a href='index.php?page=reunion_now&id_reu=$id_reu'>Participer à la réunion</a> </h3></br> ";
			}else if(($minute > 0) && ($hour_now < $heure_f)){
			echo"<h3>Vous êtes en retard de ".$heure." heure ".$minute." minute, </br> <a href='index.php?page=reunion_now&id_reu=$id_reu'>Participer à la réunion</a></h3></br>  ";
			}else if(($minute < 0) && ($hour_now < $heure_f)){
			echo"<h3>Vous êtes en avance de ".$heure." heure ".abs($minute)." minute,</br> <a href='index.php?page=reunion_now&id_reu=$id_reu'>Participer à la réunion</a> </h3></br> ";
			}else if($heure > 0 && ($hour_now > $heure_f)){
			echo"<h3>Votre Réunion a pris fin</br> <a href='index.php?page=reunion_now&id_reu=$id_reu'>voir le compte rendu</a></h3>";
			}


}

function New_info($ut, $date_now, $pdo) {
		
		$nombre_reunion = $pdo->query("SELECT Count(ID_reunion) FROM Reunions WHERE Date_r = '$date_now' && (Instigateur = '$ut' || ID_reunion IN (SELECT ID_reunion FROM participants_reu WHERE ID_ut ='$ut'));");
		$nb_reu = $nombre_reunion->fetch();

			echo'<h4>Vous avez '.$nb_reu[0].'  réunion pour aujourd\'hui (elle seront de couleur verte)</h4></br>';
	
	}
//RÉCUPÉRATION DES INFORMATIONS DES RÉUNIONS DONT ON EST L'INSTIGATEUR


function reunion_instigateur($ut, $date_now, $pdo){
	echo "<h3>Reunion dont vous êtes Instigateur </h3>";
	echo"<br>";
	New_info($ut, $date_now, $pdo);

	$reu_inst_ut = $pdo->query( "SELECT * FROM reunions WHERE Instigateur = '$ut'" );
	$r_i_ut = $reu_inst_ut->fetchAll();
	
	$instigateur_ut = $pdo->query( "SELECT * FROM utilisateurs WHERE ID_ut ='$ut'" );
	$i_ut = $instigateur_ut->fetchAll();
if( isset($r_i_ut) ) {

	//NB TOTAL DE REUNIONDONT ON EST L'INSTIGATEUR
	$c_r_i_ut = count($r_i_ut);
	$total = $c_r_i_ut;
	//Récup de notre nom et prenom
	// $info1 = $r_i_ut[0]['Prenom'];
	// $info2 = $r_i_ut[0]['Nom_ut'];

	//INFOS DES RÉUNIONS MISES EN TABLEAU
	for($c=0;$c<$total;$c++) {
		$heure_d =  $r_i_ut[$c]['Heure_d'];
		$heure_f =  $r_i_ut[$c]['Heure_f'];
		$id_reu = $r_i_ut[$c]['ID_reunion'];
		if($date_now == $r_i_ut[$c]['Date_r']) {
			heure_restant($id_reu, $heure_d, $heure_f);
				}else{
		echo"<h4><a href='index.php?page=reunion_past&id_reu=$id_reu'>Voir le compte rendu votre Réunion Passée </a></h4>";
	}
		$info3[$c] = $r_i_ut[$c]['ID_reunion'];
		$info4[$c] = $r_i_ut[$c]['Ordre'];
		$info5[$c] = $r_i_ut[$c]['Date_r'];
		$info6[$c] = $r_i_ut[$c]['Heure_d'];
		$info7[$c] = $r_i_ut[$c]['Heure_f'];
		$info8[$c] = $r_i_ut[$c]['Lieu'];
		echo 'ID_reunion : '.$info3[$c].'</br>';
		echo 'Ordre : '.$info4[$c].'</br>';
		echo 'Date_reunion : '.$info5[$c].'</br>';
		echo 'Heure_debut : '.$info6[$c].'</br>';
		echo 'Heure_fin : '.$info7[$c].'</br>';
		echo 'Lieu : '.$info8[$c].'</br>';
	
	
	//RÉCUP DES PRÉNOMS ET NOMS DES PARTICIPANTS
		$b = $r_i_ut[$c]['ID_reunion'];

		$participants_r_ut = $pdo->query( "SELECT P.ID_ut,U.Prenom,U.Nom_ut,P.ID_reunion,P.Presence FROM utilisateurs U INNER JOIN participants_reu P ON P.ID_ut = U.ID_ut AND ID_reunion = '$b'" );
		$p_r_ut = $participants_r_ut->fetchAll();
		$total2 = count($p_r_ut);	echo "Nous avons : ";
			if ($total2 != 0){
				for( $a=0; $a<$total2; $a++ ) {
					
					$c_p_r_ut = count($p_r_ut);
					echo "".$p_r_ut[$a]['Prenom']." ".$p_r_ut[$a]['Nom_ut'].". Presence : ".$p_r_ut[$a]['Presence'];
					$d = $p_r_ut[$a]['ID_ut'];
							echo" <button><a href='index.php?page=edit_R&ID_par=$d&ID_reu=$b'>Supprimer cette personne</a></button></br>";

				}
				echo "Nous avons : ".$c_p_r_ut." participants</br>" ;
			}else{
				echo ' Vous n\'avez pas de participant';
			}
		echo" <button><a href='index.php?page=ajoutOK'>Ajouter un participant</a></button>";
		echo" <button><a href='index.php?page=new_sujet&id_reu=$b'>Ajouter/Voir un sujet</a></button>";
		echo" <button><a href='index.php?page=edit_R&id_par=$b'>Supprimer tout mes participants</a></button>";
		echo"<button><a href='index.php?page=edit_R&id_reu=$b'>Supprimer la reunion</a></button></br></br></br></br></br></br>";
		}
	}
}



//RÉCUPÉRATION DES INFORMATIONS RELATIVES AUX RÉUNIONS DONT ON EST PARTICIPANT


function reunion_participant($ut, $date_now, $pdo){
		echo "<h3>Reunion dont vous êtes Participants </h3>" ;
		echo"<br>";
New_info($ut, $date_now, $pdo);

	$id_part_reu_ut = $pdo->query( "SELECT * FROM reunions WHERE ID_reunion IN (SELECT ID_reunion FROM participants_reu WHERE ID_ut ='$ut')" );
	$inf_r_p = $id_part_reu_ut->fetchAll();
	
	
if( isset($inf_r_p) ) {
	
	$total = count($inf_r_p);
	
	//RÉCUP DES NOMS ET PRENOMS DES PARTICIPANTS ET DES INFOS DES RÉUNIONS
	// for( $d=0;$d<$c_id_r_p_ut;$d++ ) {
		// $e = $id_p_r_ut[$d][3];
		// $reu_part = $pdo->query( "SELECT Prenom,Nom_ut,ID_reunion FROM utilisateurs U INNER JOIN participants_reu P ON P.ID_ut = U.ID_ut AND P.ID_reunion = '$e'" );
		// $r_p[$d] = $reu_part->fetchAll();
		// $info_reu_part = $pdo->query( "SELECT Ordre,Date_r,Heure_debut,Heure_fin,Lieu FROM reunions R INNER JOIN participants_reu P ON R.ID_reunion = P.ID_reunion AND R.ID_reunion = '$e' AND P.ID_reunion = '$e'" );
		// $inf_r_p[$d] = $info_reu_part->fetchAll();
		// for( $v=0;$v<count($p[$y]);$v++ ) {
			// $c_r_p = count($r_p[$d]);
			// $c_inf_r_p = count($inf_r_p[$d]);
		// }
	
	// var_dump ($inf_r_p);
	// echo $c_r_p." ";
	// echo $c_inf_r_p;

	//INFOS DES RÉUNIONS MISES EN TABLEAU
		for($f=0;$f<$total;$f++) {
		$heure_d =  $inf_r_p[$f]['Heure_d'];
		$heure_f =  $inf_r_p[$f]['Heure_f'];
		$id_reu = $inf_r_p[$f]['ID_reunion'];
		if($date_now == $inf_r_p[$f]['Date_r']) {
			heure_restant($id_reu, $heure_d, $heure_f);
				}else{
		echo"<h4><a href='index.php?page=reunion_past&id_reu=$id_reu'>Voir le compte rendu votre Réunion Passée </a></h4>";
	}
			$info9[$f] = $inf_r_p[$f]['ID_reunion'];
			$info10[$f] = $inf_r_p[$f]['Ordre'];
			$info11[$f] = $inf_r_p[$f]['Date_r'];
			$info12[$f] = $inf_r_p[$f]['Heure_d'];
			$info13[$f] = $inf_r_p[$f]['Heure_f'];
			$info14[$f] = $inf_r_p[$f]['Lieu'];
			echo 'ID_reunion : '.$info9[$f].'</br>';
			echo 'Ordre : '.$info10[$f].'</br>';
			echo 'Date_reunion : '.$info11[$f].'</br>';
			echo 'Heure_debut : '.$info12[$f].'</br>';
			echo 'Heure_fin : '.$info13[$f].'</br>';
			echo 'Lieu : '.$info14[$f].'</br>';
		
		//RÉCUP DES PRÉNOMS ET NOMS DES PARTICIPANTS
		$b = $inf_r_p[$f]['ID_reunion'];
		// $b = $r_i_ut[0][0];
		$participants_r_ut = $pdo->query( "SELECT Prenom,Nom_ut,ID_reunion,Presence,participants_reu.ID_ut FROM utilisateurs INNER JOIN participants_reu ON participants_reu.ID_ut = utilisateurs.ID_ut AND ID_reunion = '$b'" );
		$p_r_ut = $participants_r_ut->fetchAll();
		$total2 = count($p_r_ut);
		for( $a=0;$a<$total2;$a++ ) {
			
			$c_p_r_ut = count($p_r_ut);
			echo "Nous avons : ".$p_r_ut[$a]['Prenom']." ".$p_r_ut[$a]['Nom_ut']." . Presence : ".$p_r_ut[$a]['Presence']."</br>";
			$d = $ut;
			if($p_r_ut[$a]['Presence'] == "OUI" && $p_r_ut[$a]['ID_ut'] == $ut){
			echo" <button><a href='index.php?page=edit_R&ID=$d&ID_reu=$b'>Retirer sa présence de la réunion</a></button></br>";
			}else if($p_r_ut[$a]['Presence'] == "NON" && $p_r_ut[$a]['ID_ut'] == $ut){
			echo" <button><a href='index.php?page=edit_R&Id=$d&ID_reu=$b'>Ajouter ma présence de la réunion</a></button></br>";
			}
		}
			echo "Nous avons : ".$c_p_r_ut." participants</br></br></br></br></br></br>" ;
			
		}	
  }
}	


//RÉCUPÉRATION DES INFORMATIONS DES RÉUNIONS 


function reunion_all($ut, $pdo){
	echo "<h3>Toutes les Reunions </h3>";
	echo"<br>";
	$reu_inst_ut = $pdo->query( "SELECT * FROM reunions " );
	$r_i_ut = $reu_inst_ut->fetchAll();
	
	$instigateur_ut = $pdo->query( "SELECT * FROM utilisateurs WHERE ID_ut ='$ut'" );
	$i_ut = $instigateur_ut->fetchAll();
if( isset($r_i_ut) ) {

	//NB TOTAL DE REUNIONDONT ON EST L'INSTIGATEUR
	$c_r_i_ut = count($r_i_ut);
	$total = $c_r_i_ut;
	//Récup de notre nom et prenom
	$info1 = $i_ut[0]['Prenom'];
	$info2 = $i_ut[0]['Nom_ut'];

	//INFOS DES RÉUNIONS MISES EN TABLEAU
	for($c=0;$c<$total;$c++) {

	
		$info3[$c] = $r_i_ut[$c]['ID_reunion'];
		$info4[$c] = $r_i_ut[$c]['Ordre'];
		$info5[$c] = $r_i_ut[$c]['Date_r'];
		$info6[$c] = $r_i_ut[$c]['Heure_d'];
		$info7[$c] = $r_i_ut[$c]['Heure_f'];
		$info8[$c] = $r_i_ut[$c]['Lieu'];
		echo '</br>ID_reunion : '.$info3[$c].'</br>';
		echo 'Ordre : '.$info4[$c].'</br>';
		echo 'Date_reunion : '.$info5[$c].'</br>';
		echo 'Heure_debut : '.$info6[$c].'</br>';
		echo 'Heure_fin : '.$info7[$c].'</br>';
		echo 'Lieu : '.$info8[$c].'</br>';
	
	
	//RÉCUP DES PRÉNOMS ET NOMS DES PARTICIPANTS
		$b = $r_i_ut[$c]['ID_reunion'];
		// $b = $r_i_ut[0][0];
		$participants_r_ut = $pdo->query( "SELECT Prenom,Nom_ut,ID_reunion,Presence,participants_reu.ID_ut FROM utilisateurs INNER JOIN participants_reu ON participants_reu.ID_ut = utilisateurs.ID_ut AND ID_reunion = '$b'" );
		$p_r_ut = $participants_r_ut->fetchAll();
		$total2 = count($p_r_ut);
		for( $a=0;$a<$total2;$a++ ) {
			
			$c_p_r_ut = count($p_r_ut);
			echo "Nous avons : ".$p_r_ut[$a]['Prenom']." ".$p_r_ut[$a]['Nom_ut']." . Presence : ".$p_r_ut[$a]['Presence']."</br>";
			$d = $ut;
		
		}
			echo "Nous avons : ".$c_p_r_ut." participants</br></br></br></br></br></br>" ;
			
		}
	}
}

//RÉCUPÉRATION DES INFORMATIONS DES RÉUNIONS AYANT AUCUN LIEN

function reunion_autre($ut, $pdo){
			echo "<h3>Reunion dont vous êtes ni Instigateur ni Participant</h3>";
			echo"<br>";
	$id_part_reu_ut = $pdo->query( "SELECT * FROM reunions WHERE Instigateur != '$ut' and ID_reunion NOT IN (SELECT ID_reunion FROM participants_reu WHERE ID_ut = '$ut')" );
	$inf_r_p = $id_part_reu_ut->fetchAll();
	
if( isset($inf_r_p) ) {
	
	$total = count($inf_r_p);
	
	//RÉCUP DES NOMS ET PRENOMS DES PARTICIPANTS ET DES INFOS DES RÉUNIONS
	// for( $d=0;$d<$c_id_r_p_ut;$d++ ) {
		// $e = $id_p_r_ut[$d][3];
		// $reu_part = $pdo->query( "SELECT Prenom,Nom_ut,ID_reunion FROM utilisateurs U INNER JOIN participants_reu P ON P.ID_ut = U.ID_ut AND P.ID_reunion = '$e'" );
		// $r_p[$d] = $reu_part->fetchAll();
		// $info_reu_part = $pdo->query( "SELECT Ordre,Date_r,Heure_debut,Heure_fin,Lieu FROM reunions R INNER JOIN participants_reu P ON R.ID_reunion = P.ID_reunion AND R.ID_reunion = '$e' AND P.ID_reunion = '$e'" );
		// $inf_r_p[$d] = $info_reu_part->fetchAll();
		// for( $v=0;$v<count($p[$y]);$v++ ) {
			// $c_r_p = count($r_p[$d]);
			// $c_inf_r_p = count($inf_r_p[$d]);
		// }
	
	// var_dump ($inf_r_p);
	// echo $c_r_p." ";
	// echo $c_inf_r_p;

	//INFOS DES RÉUNIONS MISES EN TABLEAU
		for($f=0;$f<$total;$f++) {
			$info9[$f] = $inf_r_p[$f]['ID_reunion'];
			$info10[$f] = $inf_r_p[$f]['Ordre'];
			$info11[$f] = $inf_r_p[$f]['Date_r'];
			$info12[$f] = $inf_r_p[$f]['Heure_d'];
			$info13[$f] = $inf_r_p[$f]['Heure_f'];
			$info14[$f] = $inf_r_p[$f]['Lieu'];
			echo 'ID_reunion : '.$info9[$f].'</br>';
			echo 'Ordre : '.$info10[$f].'</br>';
			echo 'Date_reunion : '.$info11[$f].'</br>';
			echo 'Heure_debut : '.$info12[$f].'</br>';
			echo 'Heure_fin : '.$info13[$f].'</br>';
			echo 'Lieu : '.$info14[$f].'</br>';
		
		//RÉCUP DES PRÉNOMS ET NOMS DES PARTICIPANTS
		$b = $inf_r_p[$f]['ID_reunion'];
		// $b = $r_i_ut[0][0];
		$participants_r_ut = $pdo->query( "SELECT Prenom,Nom_ut,ID_reunion,Presence,participants_reu.ID_ut FROM utilisateurs INNER JOIN participants_reu ON participants_reu.ID_ut = utilisateurs.ID_ut AND ID_reunion = '$b'" );
		$p_r_ut = $participants_r_ut->fetchAll();
		$total2 = count($p_r_ut);	echo "Nous avons ";
		for( $a=0;$a<$total2;$a++ ) {
			
			$c_p_r_ut = count($p_r_ut);
			echo " ".$p_r_ut[$a]['Prenom']." ".$p_r_ut[$a]['Nom_ut']." . Presence : ".$p_r_ut[$a]['Presence']."</br>";
			$d = $ut;
			
		}
			echo "Nous avons : ".$c_p_r_ut." participants</br></br></br></br></br></br>" ;

		}
	}
}	


function lecture_sujet($id_reu, $pdo){
	$reu_inst_ut = $pdo->query( "SELECT * FROM sujet where ID_reunion='$id_reu' " );
	$r_i_ut = $reu_inst_ut->fetchall();			
	
	$reu = $pdo->query("SELECT Ordre FROM reunions where ID_reunion='$id_reu' " );
	$reunion = $reu->fetch();
		echo '<div class="STYLE-NAME">';
	echo "<h1> Reunions : ".$reunion['Ordre']."</h1>";
	
	$total = count($r_i_ut);
	for( $a=0;$a<$total;$a++ ) {
		
	$ut = $r_i_ut[$a]['ID_ut'];
	$personne = $pdo->query( "SELECT Nom_ut,Prenom FROM utilisateurs where ID_ut=$ut " );
	$pers = $personne->fetch();
	
		echo "<h5> Nous avons comme sujet : \"".$r_i_ut[$a]['Sujet']."\"
		Temps Accordé à ce sujet : ".$r_i_ut[$a]['Temps_sujet']."minute\" 
		 De : ".$pers['Nom_ut']."  ".$pers['Prenom']."</h5>";
		}
}


function insert_sujet($sent, $time, $id, $id_reu, $pdo) {
  
	$s = $pdo->prepare("INSERT INTO sujet(Sujet, Temps_sujet, ID_reunion, ID_ut) VALUES('$sent', '$time', '$id_reu', '$id')");
    	$s->execute();
		
   }

//$r_p = $reu_part->fetchAll();
//$reu_part = $pdo->query( "SELECT * FROM reunions WHERE ID_reunion = (SELECT ID_reunion FROM participants_reu WHERE ID_ut = (SELECT ID_ut FROM utilisateurs WHERE Mail LIKE '$ut'))" );
//var_dump ($id_p_r_ut);
//var_dump ($r_p);
//var_dump ($r_i);
//var_dump ($p_r_ut);
//for( $v=0;$v<count($p[$u]);$v++ ) {
//}
/*echo"<pre> b : ";
			print_r($b);
			echo"</pre>";
			echo"<pre> participants_r_ut : ";
			print_r($participants_r_ut);
			echo"</pre>";
			echo"<pre> p_r_ut : ";
			print_r($p_r_ut);
			echo"</pre>";*/
?>