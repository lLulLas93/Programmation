<?php 
if (empty($_POST['reunion']) || empty($_POST['membre']) && !is_numeric($_POST['membre']) && !is_numeric($_POST['reunion'])) {
    echo 'veuillez remplire les champs suivants';
    include('./view/head.html');
    include('./view/nav_bar_co.html');
    include('./view/addMembreReunion.html');
    echo '<div class="alert alert-danger">
  <strong>Danger!</strong> Vous n\'avez pas remplis les champs.
</div>';
    include('./view/footer.html');

} else {
    include('./view/head.html');
    include('./view/nav_bar_co.html');
    include('./modele/addMembre.php');
    include('./view/footer.html');
}
?>