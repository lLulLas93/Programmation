<?php 
include('./view/head.html');
include('./view/nav_bar_co.html');
include('./modele/confirmationReunionPresence.php');
$id = $_SESSION['id'];

$req = $pdo->prepare("SELECT * FROM participants_reu WHERE ID_ut = :id");
$req->execute(array('id' => $id));
$contenu_reu = $req->fetch();

if (!empty($contenu_reu)) {
    include('./modele/askReunion.php');
} else {
    echo 'vous n\'avez pas d\'invitation de réunion';
}

echo'<div class=space></div></br>';
include('./view/footer.html');
?>