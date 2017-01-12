<?php 

include('function.php');

$id = $_SESSION['id'];
$ordre = $nom_r;
$date_r = $d_r;
$heure_d = $heure_d;
$heure_f = $heure_f;
$lieu = $lieu;
$compte_rendu_r = $compte_rendu_r;

// Appel fonction Enregistrement réunion

registerReunion($pdo, $id, $ordre, $date_r, $heure_d, $heure_f, $lieu, $compte_rendu_r);

?>