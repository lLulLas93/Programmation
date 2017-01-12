<?php
$id = $_SESSION['id'];
$id_reunion = $_POST['reunion'];
$presence = $_POST['presence'];
$req = $pdo->prepare(" UPDATE participants_reu SET Presence = :presence WHERE ID_reunion = :id_reunion AND ID_ut = :id");
$req->execute(array('presence' => $presence, 'id_reunion' => $id_reunion, 'id' => $id));

?>