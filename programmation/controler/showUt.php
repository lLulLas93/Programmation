<?php 

include('./view/head.html');
include('./view/nav_bar_co.html');



if (isset($_POST['tables'])) {

    echo '<div class="pickselec2"><h4>veuillez sélectionner une table :</h4>';
    include('./modele/table.php');
    echo '</div>';
    if ($_POST['tables'] == '1') {
        include('./modele/function_back_office.php');
        include('./view/BackOfficeAction.html');
    } else if ($_POST['tables'] == '2') {
        include('./modele/function_back_office.php');
        include('./view/BackOfficeMessages.html');
    } else if ($_POST['tables'] == '3') {
        include('./modele/function_back_office.php');
        include('./view/backOfficeParticipants_pr.html');
    } else if ($_POST['tables'] == '4') {
        include('./modele/function_back_office.php');
        include('./view/backOfficeParticipants_reu.html');
    } else if ($_POST['tables'] == '5') {
        include('./modele/function_back_office.php');
        include('./view/backOfficeProjet.html');
    } else if ($_POST['tables'] == '6') {
        include('./modele/function_back_office.php');
        include('./view/backOfficeReunion.html');
    } else if ($_POST['tables'] == '7') {
        include('./modele/function_back_office.php');
        include('./view/backOfficeSujet.html');
    } else if ($_POST['tables'] == '8') {
        include('./modele/function_back_office.php');
        include('./view/backOfficeTache.html');
    } else if ($_POST['tables'] == '9') {
        include('./modele/function_back_office.php');
        include('./view/BackOfficeUtilisateurs.html');
    }
} else {
    echo '<div class="pickselec"><h4>veuillez sélectionner une table :</h4>';
    include('./modele/table.php');
    echo '</div>';
    echo '</br></br></br></br></br></br></br></br></br></br></br></br></br>';
}
//...........VERIFICATION CHAMPS MODIFICATION TABLE UTILISATEUR.........................
if (!empty($_POST['prenom']) && !empty($_POST['id'])) {
    include('./modele/modifier.php');
    if ($check) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['mdp']) && !empty($_POST['id'])) {
    include('./modele/modifier.php');
    if ($checkM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['mail']) && !empty($_POST['id'])) {
    include('./modele/modifier.php');
    if ($checkMail) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['nom_ut']) && !empty($_POST['id'])) {
    include('./modele/modifier.php');
    if ($checkNom_ut) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['id'])) {
    include('./modele/delete.php');
    if ($checkDelete) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
}
//...........VERIFICATION CHAMPS MODIFICATION TABLE MESSAGES.................. 

if (!empty($_POST['id_destinataire']) && !empty($_POST['ID_messages'])) {
    include('./modele/modifier.php');
    if ($checkDesti) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['ID_ut']) && !empty($_POST['ID_messages'])) {
    include('./modele/modifier.php');
    if ($checkID_ut) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['titre']) && !empty($_POST['ID_messages'])) {
    include('./modele/modifier.php');
    if ($checkTitle) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['messages']) && !empty($_POST['ID_messages'])) {
    include('./modele/modifier.php');
    if ($checkMessagesM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['ID_messages'])) {
    include('./modele/delete.php');
    if ($checkDelete) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
}
//...........VERIFICATION CHAMPS MODIFICATION TABLE REUNION.................

if (!empty($_POST['Instigateur']) && !empty($_POST['ID_reunion'])) {
    include('./modele/modifier.php');
    if ($checkReunion) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Ordre']) && !empty($_POST['ID_reunion'])) {
    include('./modele/modifier.php');
    if ($checkOrdre) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Date_d']) && !empty($_POST['ID_reunion'])) {
    include('./modele/modifier.php');
    if ($checkID_date_d) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Date_f']) && !empty($_POST['ID_reunion'])) {
    include('./modele/modifier.php');
    if ($checkID_date_f) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Heure']) && !empty($_POST['ID_reunion'])) {
    include('./modele/modifier.php');
    if ($checkHeureM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Lieu']) && !empty($_POST['ID_reunion'])) {
    include('./modele/modifier.php');
    if ($checkLieuM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Compte_rendu_r']) && !empty($_POST['ID_reunion'])) {
    include('./modele/modifier.php');
    if ($checkCompte_rendu_r) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['ID_reunion'])) {
    include('./modele/delete.php');
    if ($checkDelete) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
}
//...........VERIFICATION CHAMPS MODIFICATION TABLE PROJET.................

if (!empty($_POST['Date_de_creation']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkProjet) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Nom_p']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkNom_pM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Instigateur']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkInstigateurM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Langage']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkLangageM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Description']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkDescriptionM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Date_de_debut']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkDate_de_debutM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Statut']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkStatut_M) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['difficultes']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkDifficultes_M) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['difficultes']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkDifficultes_M) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['participant']) && !empty($_POST['ID_projet'])) {
    include('./modele/modifier.php');
    if ($checkParticipantM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['ID_projet'])) {
    include('./modele/delete.php');
    if ($checkDelete) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
}
//...........VERIFICATION CHAMPS MODIFICATION TABLE ACTION.................

if (!empty($_POST['Action']) && !empty($_POST['ID_action'])) {
    include('./modele/modifier.php');
    if ($checkAction) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['Etat']) && !empty($_POST['ID_action'])) {
    include('./modele/modifier.php');
    if ($checkEtat) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['ID_participant_reu']) && !empty($_POST['ID_action'])) {
    include('./modele/modifier.php');
    if ($checkPartici) {
    }
}
//...........VERIFICATION CHAMPS MODIFICATION TABLE Participants_pr.................

if (!empty($_POST['ID_ut']) && !empty($_POST['ID_participants_pr'])) {
    include('./modele/modifier.php');
    if ($checkParticipants_prM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
} else if (!empty($_POST['ID_projet']) && !empty($_POST['ID_partcipants_pr'])) {
    include('./modele/modifier.php');
    if ($checkProjetM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
}
//...........VERIFICATION CHAMPS MODIFICATION TABLE Participants_reu.................
 
 if (!empty($_POST['Presence']) && !empty($_POST['ID_participant_reu'])) {
    include('./modele/modifier.php');
    if ($checkParticipant_reuM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
 } else if (!empty($_POST['ID_ut']) && !empty($_POST['ID_participant_reu'])) {
    include('./modele/modifier.php');
    if ($checkID_ut_reuM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
 } else if (!empty($_POST['ID_tache']) && !empty($_POST['ID_participant_reu'])) {
    include('./modele/modifier.php');
    if ($checkID_tache_reuM) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
 } else if (!empty($_POST['ID_reunion']) && !empty($_POST['ID_participant_reu'])) {
    include('./modele/modifier.php');
    if ($checkID_reunion_reuM) {
    }
 } else if (!empty($_POST['ID_participant_reu'])) {
    include('./modele/delete.php');
    if ($checkDelete) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
}
//...........VERIFICATION CHAMPS MODIFICATION TABLE SUJET.................

if (!empty($_POST['Sujet']) && !empty($_POST['ID_sujet'])) {
    include('./modele/modifier.php');
    if ($checkSujetM) {
          echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
 } else if (!empty($_POST['Temps_sujet']) && !empty($_POST['ID_sujet'])) {
    include('./modele/modifier.php');
    if ($checkTemps_sujetM) {
          echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
 } else if (!empty($_POST['Compte_rendu_s']) && !empty($_POST['ID_sujet'])) {
    include('./modele/modifier.php');
    if ($checkcompte_renduM) {
          echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
 } else if (!empty($_POST['ID_sujet'])) {
    include('./modele/delete.php');
    if ($checkDelete) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
}
//...........VERIFICATION CHAMPS MODIFICATION TABLE TACHE.................

if (!empty($_POST['Tache']) && !empty($_POST['ID_tache'])) {
    include('./modele/modifier.php');
    if ($checkTacheM) {
          echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
 } else if (!empty($_POST['ID_tache'])) {
    include('./modele/delete.php');
    if ($checkDelete) {
        echo '<div class="alert alert-success">
                <strong>Success!</strong> Votre modification à bien été pris en compte.
              </div>';
    }
}


include('./view/footer.html');
?>