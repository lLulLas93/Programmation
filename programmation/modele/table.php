<?php 

$reponse_table = $pdo->query('SHOW TABLES');
$i = 1;

echo "<form action='index.php?page=tableAdmin' method='post'>
      <select name='tables'>";


while ($recup = $reponse_table->fetch()) {
    echo "<option value='".$i."'><selected>";
    echo $recup['Tables_in_programmation'].'</br></option>';
    $i++;
}

echo '</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-success">Confirmer</button></form>';

//if(isset($_POST))


?>