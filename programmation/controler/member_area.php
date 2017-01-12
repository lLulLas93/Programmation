<?php


$id_ut = $_SESSION['id'];
include('./view/head.html');
include( './view/nav_bar_co.html' );


if ((empty($_POST['message'])) && $_GET ){
	
	$id_projet = $_GET['id_projet'];
	
	include('./modele/member_area_view_projet.php');
	include( './view/member_area.html' );
	echo"<input type ='hidden' name = 'id_projet' value=' $id_projet'/>
		</form>	";
	echo "<button type='submit' name='particulier'><a href=index.php?page=message>Message Particuliers</a></button>";
		
}else if ( (isset($_POST['sent'])) && isset($_POST['id_projet']) && (!empty($_POST['message']))) {
	
	$message = $_POST['message'];
	$id_projet = $_POST['id_projet'];
	$inserer = "INSERT INTO messages(id_destinataire, id_projet, ID_ut,titre, message) VALUES( 0, '$id_projet', '$id_ut', '', '$message')";
    $pdo->exec($inserer);
	echo"<META http-equiv='refresh' content='0;URL=index.php?page=member_area&id_projet=$id_projet'>";

}else if (isset($_POST['particulier'])) {
		echo"<META http-equiv='refresh' content='0;URL=index.php?page=message>";	
	}

include('./view/footer.html');
echo '</div>';

?>