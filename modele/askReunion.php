<?php
// Récupération de l'id Instigateur
$id = $_SESSION['id'];

$req = $pdo->prepare(" SELECT RE.Instigateur
                       FROM utilisateurs UT 
                       JOIN participants_reu PA ON UT.ID_ut = PA.ID_ut 
                       JOIN reunions RE ON PA.ID_reunion = RE.ID_reunion 
                       WHERE UT.ID_ut = :id");

$req->execute(array('id' => $id));

$_SESSION['instigateur'] = array();

while ($contenu = $req->fetch()) {
    array_push($_SESSION['instigateur'], $contenu['Instigateur']);
}

// Récupération nom de L'instigateur
$i = 0;
$_SESSION['name_insti'] = array();
foreach ($_SESSION['instigateur'] as $key => $value) {
    
    $reqName = $pdo->prepare("SELECT UT.Prenom FROM utilisateurs UT
                              JOIN reunions RE ON UT.ID_ut = RE.Instigateur
                              JOIN participants_reu PAR ON RE.ID_reunion = PAR.ID_reunion
                              WHERE UT.ID_ut = :id_insti AND PAR.ID_ut = :id_ut");
    $reqName->execute(array('id_insti' => $value, 'id_ut' => $id));
    $i++;
    
    while ($contenuAffName = $reqName->fetch()) {
        array_push($_SESSION['name_insti'], $contenuAffName['Prenom']);
    }
}
// Affichage plus demande de participation a une réunion
$reqAf = $pdo->prepare(" SELECT UT.Prenom, RE.Instigateur, RE.Ordre, RE.Date_r, RE.Heure_d, RE.Heure_f, RE.Lieu, RE.Compte_rendu_r, RE.ID_reunion, PA.ID_tache, PA.Presence 
                         FROM utilisateurs UT 
                         JOIN participants_reu PA ON UT.ID_ut = PA.ID_ut 
                         JOIN reunions RE ON PA.ID_reunion = RE.ID_reunion 
                         WHERE UT.ID_ut = :id");

$reqAf->execute(array('id' => $id));
$a = 0;

echo'<div class="centerReunion"><h4>Vos invitations réunions</h4><hr>';
while ($contenuAf = $reqAf->fetch()) {
    echo $_SESSION['name_insti'][$a].' vous invites à participer à la réunion '.$contenuAf['Ordre'].
    '<form method="POST" action="index.php?page=detailleParticiRe">
        <button type="submit" class="btn btn-primary btn-xs">Voir le détaille</button>
    </form>';
    echo'</br>';
      $a++; 
          }
echo'</div>';
?>