<?php

echo'  <div class="col-md-6">
            <div class="msgN">
				<div class="STYLE-NAME">
';
$_SESSION['id_reu'] = $id_reu;

		
		$info_pr = $pdo->query("SELECT * FROM reunions WHERE id_reunion='$id_reu'");
		$info = $info_pr->fetchall(PDO::FETCH_ASSOC); 
		echo "<h1><div align='center'>".$info[0]['Ordre']."</div></h1>";
		echo "<h4> De ".$info[0]['Heure_d']." au ".$info[0]['Heure_f']."</h4>";
		echo "<h4> Aujourd'hui : ".$info[0]['Date_r']."</h4>";
		echo "<h5> Compte-Rendu : ".$info[0]['Compte_rendu_r']."</h5>";
			$num_inst = $pdo->query("SELECT ID_ut,Presence FROM PARTICIPANTS_REU WHERE ID_reunion=$id_reu");
			$num = $num_inst->fetchall();
			$nb_num = count($num);
		echo "<h5>Participant : ";
				for ($a = 0; $a < $nb_num; $a++) {
				$id_participant = $num[$a][0];
				$nom_inst = $pdo->query("SELECT Prenom,Nom_ut FROM utilisateurs WHERE ID_ut=$id_participant ");
				$nom = $nom_inst->fetch();	
				echo $nom['Prenom']." ".$nom['Nom_ut']." Presence  ".$num[$a][1]."</br>";
				}
		echo"</h5>";
				
		
		$tache = $pdo->query("SELECT * FROM tache WHERE ID_reunion='$id_reu'");
		$new_tache = $tache->fetchall(PDO::FETCH_ASSOC);
		$total = count($new_tache);
		global $total;
echo'<pre>';
		for($a=0; $a<$total; $a++){
			$id_ut_old = $new_tache[$a]['ID_ut'];
			$nom_inst = $pdo->query("SELECT Prenom,Nom_ut FROM utilisateurs WHERE ID_ut=$id_ut_old ");
			$nom = $nom_inst->fetch();
			echo '<br/>';echo '<br/>';
			echo $nom['Prenom'].' '.$nom['Nom_ut'].' : '.$new_tache[$a]['Tache'];
		}
echo'</pre>';

	echo' <form action="index.php?page=reunion_now&id_reu=$id_reu&a=fin" method="POST" >
	
        <textarea name="message" placeholder="Entre votre Tache ou Compte-Rendu "></textarea>
   <div align="center">
		 <input type="submit" name="compte_rendu_reunion" class="button" value="Envoyer votre compte_rendu"/>  
		 <input type="submit" name="tache" class="button" value="Envoyer votre tache" /> <br/>
         <input type ="hidden" name = "id_reu" value="'.$id_reu.'"/>
		</form>	</h5></div></div></div></div>';
?>