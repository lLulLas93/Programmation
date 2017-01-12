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

echo '<div class="utilisateur">
          <div class="table-responsive ">
            <table class="table table-striped">
              <thead>
                <tr>
                <th>Instigateur</th>
                <th>Ordre</th>
                <th>Date réunion</th>
                <th>deure de début</th>
                <th>Heure de fin</th>
                <th>Lieu </th>
                <th>Présence</th>
                </tr>
                </thead>
                </tbody>';

$a = 0;

echo'<div class="centerReunion"><h4>Détaille de vos Invitations réunions</h4><hr>';
while ($contenuAf = $reqAf->fetch()) {
    echo'</br>';
    echo '</TR>';
    echo '<TH>'.$_SESSION['name_insti'][$a].'</TH>';
    echo '
          <TH>'.$contenuAf['Ordre'].'</TH>
          <TH>'.$contenuAf['Date_r'].'</TH>
          <TH>'.$contenuAf['Heure_d'].'</TH>
          <TH>'.$contenuAf['Heure_f'].'</TH>
          <TH>'.$contenuAf['Lieu'].'</TH>';

    echo '<TH><form action="index.php?page=comming" method="POST">';
               echo'<input type="hidden" name="reunion" value='.$contenuAf["ID_reunion"].'>
               <button type="submit" name="presence" value="oui" class="glyphicon glyphicon-ok"></button>
                <button type="submit" name="presence" value="non" class="glyphicon glyphicon-remove"></button>';
              echo'</form>
          </TH>
          </TR>';
     $a++;       
}
echo'</div>';

echo '</tbody></table></div></div></div></div>';
?>