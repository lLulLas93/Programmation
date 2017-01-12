<?php
include('./view/head.html');
include('./view/nav_bar_co.html');
include('./modele/confirmationReunion.php');

echo'<div class=space></div>';

if($_POST['presence'] == 'oui'){
        echo'</br></br></br><div class="alert alert-success">
        <strong>Votre présence à bien été prise en compte</strong> le chef de réunion en sera informé !
        </div>';

  
} else {
    echo'</br></br></br><div class="alert alert-success">
    <strong>le chef de réunion en sera informé !</strong>
    </div>';
}

echo'<div class=space></div></br></br></br>';

include('./view/footer.html');
?>