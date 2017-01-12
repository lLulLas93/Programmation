<?php 

include('./view/head.html');
include('./view/nav_bar_co.html');


if (empty($_POST['ordre']) || empty($_POST['date_r']) || empty($_POST['heure_d']) || empty($_POST['heure_f']) || empty($_POST['lieu']) || empty($_POST['compte_rendu_r'])) {

    include('./view/reunion_add.html');
} else if (!empty($_POST['ordre']) || !empty($_POST['date_r']) || !empty($_POST['heure_d']) || !empty($_POST['heure_f']) || !empty($_POST['lieu']) || !empty($_POST['compte_rendu_r'])) {
    include('./modele/checking_reunion.php');

    if (isset($registerReunion)) {
        if ($registerReunion) {
            include('./controler/addMembreReunion.php');
        }
    }
}
include('./view/footer.html');
?>