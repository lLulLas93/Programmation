<?php

echo'<br/><br/><br/>';
echo '<div class="STYLE-NAME">';
$_SESSION['id_projet'] = $id_projet;

		
		$info_pr = $pdo->query("SELECT * FROM projets WHERE ID_projet='$id_projet'");
		$info = $info_pr->fetchall(PDO::FETCH_ASSOC);
		
			$id_ut_old = $info[0]['Instigateur'];
			$nom_inst = $pdo->query("SELECT Prenom,Nom_ut FROM utilisateurs WHERE ID_ut=$id_ut_old ");
			$nom = $nom_inst->fetch();
		$logo = $info[0]['Logo'];
				echo "<h1><div align='center'>".$info[0]['Nom_p']."</div></h1>";
		echo'  <div class="col-md-6">
            <div class="msgN">
			';
		echo "<h5> Du ".$info[0]['Date_de_debut']." au ".$info[0]['Date_de_fin']."</h5>";
		echo "<h5> Langage : ".$info[0]['Langage']."</h5>";
		echo "<h5> Instigateur : ".$nom['Prenom']." ".$nom['Nom_ut']."</h5>";
		echo "<h5>Description : ".$info[0]['Description']."</h5>";
		echo'</div></div>';
		
		echo'  <div class="col-md-6">
            <div class="msgN">
			';
		echo "<h5>Logo : <img src='../programmation/modele/reception/$logo' width='150' height='90'> </h5>";
		$message = $pdo->query("SELECT ID_ut,message FROM messages WHERE ID_destinataire=0 && id_projet='$id_projet'&& titre=''");
		$new_message = $message->fetchall();
		$total = count($new_message);
		
			$num_inst = $pdo->query("SELECT ID_ut,ID_projet FROM PARTICIPANTS_PR WHERE ID_projet=$id_projet");
			$num = $num_inst->fetchall(PDO::FETCH_NUM);
			$nb_num = count($num);
		echo'</div></div>';
	
		echo "<h5>Participant : ";
				for ($a = 0; $a < $nb_num; $a++) {
				$id_participant = $num[$a][0];
				$id_projet = $num[$a][1];
				$nom_inst = $pdo->query("SELECT Prenom,Nom_ut FROM utilisateurs WHERE ID_ut=$id_participant ");
				$nom = $nom_inst->fetch();
				echo"". $nom['Prenom']." ".$nom['Nom_ut']." ";
				}
			echo'</h5></br>';
			
	
echo'<pre>';
		for($a=0; $a<$total; $a++){
			$new_message[$a];
			$id_ut_old = $new_message[$a]['ID_ut'];
			$nom_inst = $pdo->query("SELECT Prenom,Nom_ut FROM utilisateurs WHERE ID_ut=$id_ut_old ");
			$nom = $nom_inst->fetch();
			echo '<br/>';echo '<br/>';
			echo $nom['Prenom'].' '.$nom['Nom_ut'].' : '.$new_message[$a]['message'];
		}
echo'</pre></div>';
			
?>