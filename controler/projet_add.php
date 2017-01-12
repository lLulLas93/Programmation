<?php

include('./view/head.html');
include( './view/nav_bar_co.html' );



if (empty($_POST['projet_nom']) || empty($_POST['langage']) || empty($_POST['participants']) || empty($_POST['d_f']) || empty($_POST['d_d']) || empty($_POST['description']) || empty($_POST['difficultes'])){
    include( './view/projet_add.html' );
}
else{
    include('./modele/checking_projet.php');
    include( './view/projet_register.html' );

}

include('./view/footer.html');

?>