<?php

$id = $_SESSION['id'];

$req = $pdo->prepare("SELECT UT.prenom, RE.ordre, PA.Presence 
                    FROM utilisateurs UT 
                    JOIN participants_reu PA ON UT.ID_ut = PA.ID_ut 
                    JOIN reunions RE ON PA.ID_reunion = RE.ID_reunion 
                    WHERE RE.instigateur = :id");

$req->execute(array('id' => $id));


echo'<div class="centerReunion"><h4>Confirmation de présence à vos réunions</h4><hr>';

while($contenu = $req->fetch()){
    if($contenu['Presence'] == 'oui') {

        echo'<div class="alert alert-success">
        <strong>'.$contenu['prenom'].' sera présent a votre réunion '.$contenu['ordre'].'.</strong></div></br>';
    } else if($contenu['Presence'] == 'non') {
        echo '<div class="alert alert-danger">
        <strong>'.$contenu['prenom'].' ne sera pas présent a votre réunion '.$contenu['ordre'].'</strong></div></br>';
    } else {
        echo '<div class="alert alert-info">
        <strong>'.$contenu['prenom'].' n\'a pas encore répondu à votre réunion '.$contenu['ordre'].'</strong></div></br>';
    }
    
}
   
echo'</div>';
?>