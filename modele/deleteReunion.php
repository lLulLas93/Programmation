<?php
function delete_reu($id_reu,$pdo){
$delete_r = $pdo->prepare( "DELETE FROM reunions WHERE ID_reunion = '$id_reu'" );
$delete_r->execute();
}

function delete_par($id_reu, $pdo){
$delete_p = $pdo->prepare( "DELETE FROM participants_reu WHERE ID_reunion = '$id_reu'" );
$delete_p->execute();
}

function delete_sel_par($id_reu, $id_par, $pdo){
$delete_p = $pdo->prepare( "DELETE FROM participants_reu WHERE ID_reunion = '$id_reu' and ID_ut = '$id_par'" );
$delete_p->execute();
print_r($delete_p);
}

function delete_soi_non($id_reu, $id, $pdo){
$delete_p = $pdo->prepare( "UPDATE PARTICIPANTS_REU SET Presence = 'NON' WHERE ID_reunion = '$id_reu' and ID_ut = '$id'" );
$delete_p->execute();
}

function delete_soi_oui($id_reu, $id, $pdo){
$delete_p = $pdo->prepare( "UPDATE PARTICIPANTS_REU SET Presence = 'OUI' WHERE ID_reunion = '$id_reu' and ID_ut = '$id'" );
$delete_p->execute();
}



// $delete_r = $pdo->prepare( "DELETE FROM reunions WHERE ID_reunion = '$_POST['ID_r']'" );
// $delete_r->execute();
// $delete_p = $pdo->prepare( "DELETE FROM participants_reu WHERE ID_reunion = '$_POST['ID_r']'" );
// $delete_p->execute();
?>