<?php 

$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$mail = $_POST['mail'];
$mdp = $_POST['mdp'];
$confirmationMdp = $_POST['confirmationMdp'];
$id = $_SESSION['id'];

if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['mdp']) && !empty($_POST['confirmationMdp'])) {
    if ($mdp == $confirmationMdp) {
        $modif = $pdo->prepare('UPDATE utilisateurs SET Prenom = :prenom, Nom_ut = :nom, Mail = :mail, Mdp = :mdp WHERE ID_ut = :id');
        $modif->execute(array('prenom' => $prenom, 'nom' => $nom, 'mail' => $mail, 'mdp' => $mdp, 'id' => $id));
        
        if ($modif) {
            $check = true;
        }
    }
} else {
    echo '</br></br></br><div class="alert alert-danger">
        <strong>Erreur!</strong> Vous devez remplire tous les champs.
        </div>';
}

?>