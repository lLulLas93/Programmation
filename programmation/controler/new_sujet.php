<?php
include('./view/head.html');
$id = $_SESSION['ID_ut'];		
include('./view/nav_bar_co.html' );
include( './modele/function_reunion.php' );

if( isset($_POST['sent'])&& !empty($_POST['id_reu']) && (!empty($_POST['time']) && empty($_POST['sujet']) || empty($_POST['time']) && !empty($_POST['sujet'])) && $_GET ){

	echo'<div align="center" class="alert alert-danger" role="alert">Veuillez remplir tout les champs</div>'; 

	$id_reu = $_POST['id_reu'];
	lecture_sujet($id_reu, $pdo);

	include( './view/new_sujet.html' );
	echo"<input type ='hidden' name = 'id_reu' value='$id_reu'/>
		</form>	";

}else if( !isset($_POST['sent']) && empty($_POST['time']) && empty($_POST['sujet']) && $_GET ){
	
	$id_reu = $_GET['id_reu'];

lecture_sujet($id_reu, $pdo);
include( './view/new_sujet.html' );
	echo"<input type ='hidden' name = 'id_reu' value='$id_reu'/>
		</form>	";

} else if(isset($_POST['sent']) && !empty($_POST['time']) && !empty($_POST['sujet'])&& !empty($_POST['id_reu'])){
		echo"insere";
	$sent = $_POST['sujet'];
	$time = $_POST['time'];
	$id_reu = $_POST['id_reu'];
	insert_sujet($sent, $time, $id, $id_reu, $pdo);
   	echo"<META http-equiv='refresh' content='00000000;URL=index.php?page=new_sujet&id_reu=$id_reu'>";
}
// }else{	$id_reu = $_POST['id_reu'];


	// }



include( './view/footer.html' );


?>