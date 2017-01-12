<?php 

include('./view/head.html');
include('./view/nav_bar_co.html');
include('./modele/afficheMessage.php');

$id = $_SESSION['id'];
$statut = '1';
$_SESSION['statutMessage'] = $statut;

$pdo->exec("UPDATE messages SET statut=\"".$statut."\" WHERE id_destinataire =  \"".$id."\"");


if (isset($_GET['repondre'])) {
    include('./view/repondreMessage.html');
}
if (!isset($_GET['repondre'])) {
    include('./view/message.html');
}
if(!empty($_POST['titre']) || !empty($_POST['mail']) || !empty($_POST['message'])){
    include('./modele/messageM.php');
}
include('./view/footer.html');
?>