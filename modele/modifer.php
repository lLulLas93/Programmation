<?php 

if (!empty($_POST['prenom']) && !empty($_POST['id'])) {
    $prenom = $_POST['prenom'];
    $id = $_POST['id'];

    $prenomM = $pdo->prepare('UPDATE utilisateurs SET Prenom = :prenom WHERE ID_ut = :id');
    $prenomM->execute(array('prenom' => $prenom, 'id' => $id));

    if ($prenomM) {
        $check = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['mdp']) && !empty($_POST['id'])) {

    $mdp = $_POST['mdp'];
    $id = $_POST['id'];
    $mdpM = $pdo->prepare('UPDATE utilisateurs SET Mdp = :mdp WHERE ID_ut = :id');
    $mdpM->execute(array('mdp' => $mdp, 'id' => $id));

    if ($mdpM) {
        $checkM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['mail']) && !empty($_POST['id'])){
    $mail = $_POST['mail'];
    $id = $_POST['id'];
    $reponseMail = $pdo->prepare('UPDATE utilisateurs SET Mail = :mail WHERE ID_ut = :id');
    $reponseMail->execute(array('mail' => $mail, 'id' => $id));

    if ($reponseMail) {
        $checkMail = true;
    } else {
        echo 'Erreur modification';
    }
    
} else if (!empty($_POST['nom_ut']) && !empty($_POST['id'])){
    $nom_ut = $_POST['nom_ut'];
    $id = $_POST['id'];
    $reponseNom_ut = $pdo->prepare('UPDATE utilisateurs SET Nom_ut = :nom_ut WHERE ID_ut = :id');
    $reponseNom_ut->execute(array('nom_ut' => $nom_ut, 'id' => $id));

    if ($reponseNom_ut) {
        $checkNom_ut = true;
    } else {
        echo 'Erreur modification';
    }
}
?>