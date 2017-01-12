<?php


$id_projet = $_POST['id_projet'];


	$rep_dest = "./modele/reception/";	
	
	if(move_uploaded_file($_FILES['image']['tmp_name'],$rep_dest . $_FILES['image']['name'])){
		
		echo'<br/>';
		echo'<br/>';echo'<br/>';
		echo'<br/>';echo'<br/>';
		print"Bon Travail :)"; 
		echo'<br/>';

	}else {

		print "PAS BON :( nb d'erreur ";
		// print_r($_FILES['image']['error']);

	}
	//Recuperation de donnée
	
	
	$statut = $_SESSION['Statut'];
	$a = date("Y-m-d");
	$nom_p = addslashes($_POST["projet_nom"]);
	$langage = addslashes($_POST["langage"]);
	$participants = $_POST["participants"];
	$d_f = $_POST["d_f"];
	$d_d = $_POST["d_d"];
	$description = addslashes($_POST["description"]);
	$logo = $_FILES['image']['name'];
	$difficultes = $_POST['difficultes'];
	$date_de_creation = "$a";
	$instigateur = $_SESSION['id'];
	
	
	
	
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$insertion = " 	UPDATE projets
				SET 
					Date_de_creation = '$date_de_creation',
					Nom_p = '$nom_p',
					Instigateur = '$instigateur',
					Langage = '$langage',
					Description = '$description',
					Date_de_debut = '$d_d',
					Date_de_fin = '$d_f',
					Logo = '$logo',
					statut = '$statut',
					difficultes = '$difficultes',
					Participant = '$participants'
				WHERE 
					ID_projet = '$id_projet'
				";
	
	$pdo->exec($insertion);
			echo 'Valeurs bien modifiée';
	
	echo'<br/>';
	echo'<br/>';
?>