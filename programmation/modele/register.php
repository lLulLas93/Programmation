<?php 

include('function.php');

$firstname = $_POST['firstname'];
$secondname = $_POST['secondname'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$statut = $_POST['statut'];
$noti = $_POST['noti'];

$_SESSION['secondname'] = $secondname;
$_SESSION['password'] = $password;

//Appel de la fonction register

register($firstname, $secondname, $email, $password, $statut, $pdo);

?>