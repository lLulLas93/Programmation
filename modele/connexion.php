<?php 

include('function.php');

$pseudo = $_POST['pseudo'];
$mdp = $_POST['password'];

$_SESSION['pseudo'] = $pseudo;

//Appel function LOGIN

login($pdo);

?>