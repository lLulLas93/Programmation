<?php 
$membre = $_POST["membre"];
$ID_reunion = $_POST['reunion'];

for ($i = 0; $i < count($_POST["membre"]); $i++) {
    $sql = $pdo->prepare('INSERT INTO participants_reu(ID_ut, ID_reunion) VALUES(:idUt, :idReu)');
    $sql->execute(array('idUt' => $membre[$i], 'idReu' => $ID_reunion));
}

if (!$sql) {
    echo '<div class="center">';
    echo 'echoué';
    echo '</div>';
} else {
    echo '<div class="text-success" align="center"><h4>';
    echo 'Votre Réunion à bien été insérée.';
	    echo "<meta http-equiv='refresh' content='3; url=index.php?page=reunion_view' />";

    echo '<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></h4></div>';
}
?>