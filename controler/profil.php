<?php 
include('./view/head.html');
include('./view/nav_bar_co.html');

if (empty($_POST['prenom']) && empty($_POST['nom']) && empty($_POST['mail']) && empty($_POST['mdp']) && empty($_POST['confirmationMdp'])) {
    include('./view/profil.html');
} else {
    include('./modele/profil.php');
    if (isset($check)) {
        if ($check) {
            echo '</br></br></br><div class="alert alert-success">
         <strong>Correct!</strong> Votre modification à bien été pris en compte.
         </div>';
            include('./view/profil.html');

        }
    } else {
        echo '</br></br></br>';
        echo '<div class="alert alert-danger">
        <strong>Erreur!</strong> Vous devez mettre le même mot de passe.
        </div>';
        include('./view/profil.html');
    }
}

include('./view/footer.html');

?>