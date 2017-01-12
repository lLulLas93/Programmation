<?php 
session_start();

//Connexion a la base de donnée, Check connection

try {
    $pdo = new PDO('mysql:host=localhost;dbname=programmation', 'root', 'toor');
    $pdo->exec('SET NAMES utf8');
} catch (PDOException $e) {
    print "Erreur !: ".$e->getMessage()."<br/>";
    die();
}
$query = '';

$query = (isset($_GET['page'])) ? $_GET['page'] : '';

switch ($query) {
    case '':
        include 'controler/access.php';
        break;
    case 'registerC':
        include 'controler/registerC.php';
        break;
    case 'connexion':
        include 'controler/connexion.php';
        break;
    case 'connexionC':
        include 'controler/connexionC.php';
        break;
    case 'deconnexion':
        include 'controler/deco.php';
        break;
    case 'tableAdmin':
        include 'controler/ShowUT.php';
        break;
    case 'showT':
        include 'controler/showUT.php';
        break;
    case 'message':
        include 'controler/message.php';
        break;
    case 'projet_view':
        include 'controler/projet_view.php';
        break;
    case 'projet_edit':
        include 'controler/projet_edit.php';
        break;
    case 'projet_add':
        include 'controler/projet_add.php';
        break;
    case 'projet_register':
        include 'controler/projet_register.php';
        break;
    case 'reunion':
        include 'controler/reunion.php';
        break;
    case 'accueilMembre':
        include 'controler/accueilMembre.php';
        break;
    case 'member_area':
        include 'controler/member_area.php';
        break;
    case 'profil':
        include 'controler/profil.php';
        break;
    case 'addMembrePrenom':
        include 'controler/addMembrePrenom.php';
        break;
    case 'ajoutOK':
        include 'controler/addMembreReunion.php';
        break;
	case 'reunion_add':
        include 'controler/reunion_add.php';
        break;	
	case 'reunion':
        include 'controler/reunion.php';
        break;
    case 'reunionCreer':
        include 'controler/reunionCree.php';
        break;
	case 'reunion_view':
        include 'controler/reunion_view.php';
        break;	
	case 'edit_R':
        include 'controler/edit_R.php';
        break;
	case 'reunion_now':
        include 'controler/reunion_now.php';
        break;	
	case 'reunion_past':
        include 'controler/reunion_past.php';
        break;
	case 'new_sujet':
        include 'controler/new_sujet.php';
        break;
    case 'comming':
        include 'controler/comming.php';
        break;
    case 'detailleParticiRe':
        include'controler/detailleParticiRe.php';
        break;
		
		// PARTIE DE TOM
		
	case 'reumod':
        include 'controler/reunion_mod.php';
        break;
	case 'reunion_edit':
        include 'controler/modiC.php';
        break;
	case 'modif_reu':
        include 'controler/modif_reu_cont.php';
        break;
		// Fin de partie de TOM
    default:
        echo '<h1>Cette page est inexistante</h1>';
        break;
		
}
?>