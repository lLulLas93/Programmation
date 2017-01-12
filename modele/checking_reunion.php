<?php 

// Récupérer des donnees

$nom_r = $_POST["ordre"];
$d_r = $_POST["date_r"];
$heure_d = $_POST["heure_d"];
$heure_f = $_POST["heure_f"];
$lieu = $_POST["lieu"];
$compte_rendu_r = $_POST["compte_rendu_r"];


$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$requete1 = $pdo->prepare("SELECT * FROM reunions ");
$requete1->execute();
$resultat = $requete1->fetchall(PDO::FETCH_ASSOC);


$total = count($resultat);
for ($i = 0; $i <= $total; $i++) {

if ($i == $total) {
	$projet = 1;
}
else {
    if ($resultat[$i]['Ordre'] == "$nom_r") {

        echo '</br></br></br></br><div class="alert alert-danger" role="alert" align="center"><h3>Reunion Existante</h3></div></br></br></br></br>';
        echo "<meta http-equiv='refresh' content='2; url=index.php?page=reunion_add' />";

        $i = $total;
        $i += 1;
        $projet = 0;

    } else {
        $projet = 1;
    }

}
}
    if ($projet == 1) {
        include '/modele/reunion_add.php';
    }

?>