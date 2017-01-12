<?php 
$titre = $_POST['titre'];
$mail = $_POST['mail'];
$message = $_POST['message'];


// Recuperation de L'id utilisateurs qui recois le mail

$recup = $pdo->query('SELECT ID_ut, Mail FROM utilisateurs WHERE Mail = \''.$mail.'\'');
$ID_ut = $recup->fetch();

$Num = $ID_ut['ID_ut'];
$_SESSION['ID_ut'] = $Num;
$mail = $ID_ut['Mail'];
$id_ut = $_SESSION['id'];

if (!$ID_ut) {
    echo '<div class="centerr">';
    echo "Cet utilisateur n'existe pas";
    echo '</div>';
} else {
    
    $sql = $pdo->prepare("INSERT INTO messages(id_destinataire, ID_ut, titre, message, statut) VALUES( :Num, :id_ut, :titre, :message, '0')");
    $aaac = $sql->execute(array('Num' => $Num, 'id_ut' => $id_ut, 'titre' => $titre, 'message' => $message));
   
    if (!$aaac) {
        echo '<div class="centerr">';
        echo 'echoué';
        echo '</div>';
    } else {
        echo '<div class="centerr">';
        echo '</div>';
    }
}   
?>