<?php 

//...........................................MODIFICATION TABLE UTILISATEURS..................................................

if (!empty($_POST['prenom']) && !empty($_POST['id'])) {
    $prenom = $_POST['prenom'];
    $id = $_POST['id'];

    $prenomM = $pdo->prepare('UPDATE utilisateurs SET Prenom = :prenom WHERE ID_ut = :id');
    $prenomM->execute(array('prenom' => $prenom, 'id' => $id));

    if ($prenomM) {
        $check = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['mdp']) && !empty($_POST['id'])) {

    $mdp = $_POST['mdp'];
    $id = $_POST['id'];
    $mdpM = $pdo->prepare('UPDATE utilisateurs SET Mdp = :mdp WHERE ID_ut = :id');
    $mdpM->execute(array('mdp' => $mdp, 'id' => $id));

    if ($mdpM) {
        $checkM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['mail']) && !empty($_POST['id'])) {
    $mail = $_POST['mail'];
    $id = $_POST['id'];
    $reponseMail = $pdo->prepare('UPDATE utilisateurs SET Mail = :mail WHERE ID_ut = :id');
    $reponseMail->execute(array('mail' => $mail, 'id' => $id));

    if ($reponseMail) {
        $checkMail = true;
    } else {
        echo 'Erreur modification';
    }

} else if (!empty($_POST['nom_ut']) && !empty($_POST['id'])) {
    $nom_ut = $_POST['nom_ut'];
    $id = $_POST['id'];
    $reponseNom_ut = $pdo->prepare('UPDATE utilisateurs SET Nom_ut = :nom_ut WHERE ID_ut = :id');
    $reponseNom_ut->execute(array('nom_ut' => $nom_ut, 'id' => $id));

    if ($reponseNom_ut) {
        $checkNom_ut = true;
    } else {
        echo 'Erreur modification';
    }
}

//...........................................MODIFICATION TABLE MESSAGES..................................................

if (!empty($_POST['id_destinataire']) && !empty($_POST['ID_messages'])) {
    $id_destinataire = $_POST['id_destinataire'];
    $ID_messages = $_POST['ID_messages'];

    $id_destinataireM = $pdo->prepare('UPDATE Messages SET id_destinataire = :id_destinataire WHERE ID_messages = :ID_messages');
    $id_destinataireM->execute(array('id_destinataire' => $id_destinataire, 'ID_messages' => $ID_messages));

    if ($id_destinataireM) {
        $checkDesti = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['ID_ut']) && !empty($_POST['ID_messages'])) {
    $id_ut = $_POST['ID_ut'];
    $ID_messages = $_POST['ID_messages'];

    $id_utM = $pdo->prepare('UPDATE Messages SET ID_ut = :id_ut WHERE ID_messages = :ID_messages');
    $id_utM->execute(array('id_ut' => $id_ut, 'ID_messages' => $ID_messages));

    if ($id_utM) {
        $checkID_ut = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['titre']) && !empty($_POST['ID_messages'])) {
    $titre = $_POST['titre'];
    $ID_messages = $_POST['ID_messages'];

    $id_titreM = $pdo->prepare('UPDATE Messages SET titre = :titre WHERE ID_messages = :ID_messages');
    $id_titreM->execute(array('titre' => $titre, 'ID_messages' => $ID_messages));

    if ($id_titreM) {
        $checkTitle = true;
    } else {
        echo 'Erreur modification';
    }

} else if (!empty($_POST['messages']) && !empty($_POST['ID_messages'])) {
    $messages = $_POST['messages'];
    $ID_messages = $_POST['ID_messages'];

    $id_messagesM = $pdo->prepare('UPDATE Messages SET message = :messages WHERE ID_messages = :ID_messages');
    $id_messagesM->execute(array('messages' => $messages, 'ID_messages' => $ID_messages));

    if ($id_messagesM) {
        $checkMessagesM = true;
    } else {
        echo 'Erreur modification';
    }
}
//...........................................MODIFICATION TABLE REUNION..................................................

if (!empty($_POST['Instigateur']) && !empty($_POST['ID_reunion'])) {
    $instigateur = $_POST['Instigateur'];
    $ID_reunion = $_POST['ID_reunion'];

    $id_reunionM = $pdo->prepare('UPDATE Reunions SET Instigateur = :instigateur WHERE ID_reunion = :ID_reunion');
    $id_reunionM->execute(array('instigateur' => $instigateur, 'ID_reunion' => $ID_reunion));

    if ($id_reunionM) {
        $checkReunion = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Ordre']) && !empty($_POST['ID_reunion'])) {
    $ordre = $_POST['Ordre'];
    $ID_reunion = $_POST['ID_reunion'];

    $id_ordreM = $pdo->prepare('UPDATE Reunions SET Ordre = :ordre WHERE ID_reunion = :ID_reunion');
    $id_ordreM->execute(array('ordre' => $ordre, 'ID_reunion' => $ID_reunion));

    if ($id_ordreM) {
        $checkOrdre = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Date_d']) && !empty($_POST['ID_reunion'])) {
    $Date_d = $_POST['Date_d'];
    $ID_reunion = $_POST['ID_reunion'];

    $id_date_dM = $pdo->prepare('UPDATE Reunions SET Date_d = :Date_d WHERE ID_reunion = :ID_reunion');
    $id_date_dM->execute(array('Date_d' => $Date_d, 'ID_reunion' => $ID_reunion));

    if ($id_date_dM) {
        $checkID_date_d = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Date_f']) && !empty($_POST['ID_reunion'])) {
    $Date_f = $_POST['Date_f'];
    $ID_reunion = $_POST['ID_reunion'];

    $id_date_fM = $pdo->prepare('UPDATE Reunions SET Date_f = :Date_f WHERE ID_reunion = :ID_reunion');
    $id_date_fM->execute(array('Date_f' => $Date_f, 'ID_reunion' => $ID_reunion));

    if ($id_date_fM) {
        $checkID_date_f = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Heure']) && !empty($_POST['ID_reunion'])) {
    $heure = $_POST['Heure'];
    $ID_reunion = $_POST['ID_reunion'];

    $idHeureM = $pdo->prepare('UPDATE Reunions SET Heure = :heure WHERE ID_reunion = :ID_reunion');
    $idHeureM->execute(array('heure' => $heure, 'ID_reunion' => $ID_reunion));

    if ($idHeureM) {
        $checkHeureM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Lieu']) && !empty($_POST['ID_reunion'])) {
    $lieu = $_POST['Lieu'];
    $ID_reunion = $_POST['ID_reunion'];

    $idLieu = $pdo->prepare('UPDATE Reunions SET Lieu = :lieu WHERE ID_reunion = :ID_reunion');
    $idLieu->execute(array('lieu' => $lieu, 'ID_reunion' => $ID_reunion));

    if ($idLieu) {
        $checkLieuM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Compte_rendu_r']) && !empty($_POST['ID_reunion'])) {
    $compte_rendu_r = $_POST['Compte_rendu_r'];
    $ID_reunion = $_POST['ID_reunion'];

    $idCompte_rendu_r = $pdo->prepare('UPDATE Reunions SET Compte_rendu_r = :compte_rendu_r WHERE ID_reunion = :ID_reunion');
    $idCompte_rendu_r->execute(array('compte_rendu_r' => $compte_rendu_r, 'ID_reunion' => $ID_reunion));

    if ($idCompte_rendu_r) {
        $checkCompte_rendu_r = true;
    } else {
        echo 'Erreur modification';
    }
}
//...........................................MODIFICATION TABLE Projet..................................................

if (!empty($_POST['Date_de_creation']) && !empty($_POST['ID_projet'])) {
    $dateCreation = $_POST['Date_de_creation'];
    $ID_projet = $_POST['ID_projet'];

    $id_projetM = $pdo->prepare('UPDATE Projets SET Date_de_creation = :dateCreation WHERE ID_projet = :ID_projet');
    $id_projetM->execute(array('dateCreation' => $dateCreation, 'ID_projet' => $ID_projet));

    if ($id_projetM) {
        $checkProjet = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Nom_p']) && !empty($_POST['ID_projet'])) {
    $nom_p = $_POST['Nom_p'];
    $ID_projet = $_POST['ID_projet'];

    $id_projetNom_pM = $pdo->prepare('UPDATE projets SET Nom_p = :nom_p WHERE ID_projet = :ID_projet');
    $id_projetNom_pM->execute(array('nom_p' => $nom_p, 'ID_projet' => $ID_projet));

    if ($id_projetNom_pM) {
        $checkNom_pM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Instigateur']) && !empty($_POST['ID_projet'])) {
    $instigateur = $_POST['Instigateur'];
    $ID_projet = $_POST['ID_projet'];

    $id_projetInstigateur = $pdo->prepare('UPDATE projets SET Instigateur = :instigateur WHERE ID_projet = :ID_projet');
    $id_projetInstigateur->execute(array('instigateur' => $instigateur, 'ID_projet' => $ID_projet));

    if ($id_projetInstigateur) {
        $checkInstigateurM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Langage']) && !empty($_POST['ID_projet'])) {
    $langage = $_POST['Langage'];
    $ID_projet = $_POST['ID_projet'];

    $id_projetLangage = $pdo->prepare('UPDATE projets SET Langage = :langage WHERE ID_projet = :ID_projet');
    $id_projetLangage->execute(array('langage' => $langage, 'ID_projet' => $ID_projet));

    if ($id_projetLangage) {
        $checkLangageM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Description']) && !empty($_POST['ID_projet'])) {
    $description = $_POST['Description'];
    $ID_projet = $_POST['ID_projet'];

    $id_projetDescription = $pdo->prepare('UPDATE projets SET description = :description WHERE ID_projet = :ID_projet');
    $id_projetDescription->execute(array('description' => $description, 'ID_projet' => $ID_projet));

    if ($id_projetDescription) {
        $checkDescriptionM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Date_de_debut']) && !empty($_POST['ID_projet'])) {
    $date_de_debut = $_POST['Date_de_debut'];
    $ID_projet = $_POST['ID_projet'];

    $id_projetDate_de_debut = $pdo->prepare('UPDATE projets SET Date_de_debut = :date_de_debut WHERE ID_projet = :ID_projet');
    $id_projetDate_de_debut->execute(array('date_de_debut' => $date_de_debut, 'ID_projet' => $ID_projet));

    if ($id_projetDate_de_debut) {
        $checkDate_de_debutM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Statut']) && !empty($_POST['ID_projet'])) {
    $statut = $_POST['Statut'];
    $ID_projet = $_POST['ID_projet'];

    $id_projetStatut = $pdo->prepare('UPDATE projets SET Statut = :statut WHERE ID_projet = :ID_projet');
    $id_projetStatut->execute(array('statut' => $statut, 'ID_projet' => $ID_projet));

    if ($id_projetStatut) {
        $checkStatut_M = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['difficultes']) && !empty($_POST['ID_projet'])) {
    $difficultes = $_POST['difficultes'];
    $ID_projet = $_POST['ID_projet'];

    $id_projetDifficultes = $pdo->prepare('UPDATE projets SET difficultes = :difficultes WHERE ID_projet = :ID_projet');
    $id_projetDifficultes->execute(array('difficultes' => $difficultes, 'ID_projet' => $ID_projet));

    if ($id_projetDifficultes) {
        $checkDifficultes_M = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['participant']) && !empty($_POST['ID_projet'])) {
    $participant = $_POST['participant'];
    $ID_projet = $_POST['ID_projet'];

    $id_projetParticipant = $pdo->prepare('UPDATE projets SET participant = :participant WHERE ID_projet = :ID_projet');
    $id_projetParticipant->execute(array('participant' => $participant, 'ID_projet' => $ID_projet));

    if ($id_projetParticipant) {
        $checkParticipantM = true;
    } else {
        echo 'Erreur modification';
    }
}
//...........................................MODIFICATION TABLE ACTION..................................................

if (!empty($_POST['Action']) && !empty($_POST['ID_action'])) {
    $action = $_POST['Action'];
    $ID_action = $_POST['ID_action'];

    $id_actionM = $pdo->prepare('UPDATE Action SET Action = :Action WHERE ID_action = :ID_action');
    $id_actionM->execute(array('Action' => $action, 'ID_action' => $ID_action));

    if ($id_actionM) {
        $checkAction = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Etat']) && !empty($_POST['ID_action'])) {
    $etat = $_POST['Etat'];
    $ID_action = $_POST['ID_action'];

    $id_etatM = $pdo->prepare('UPDATE Action SET Etat = :Etat WHERE ID_action = :ID_action');
    $id_etatM->execute(array('Etat' => $etat, 'ID_action' => $ID_action));

    if ($id_etatM) {
        $checkEtat = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['ID_participant_reu']) && !empty($_POST['ID_action'])) {
    $id_partici = $_POST['ID_participant_reu'];
    $ID_action = $_POST['ID_action'];

    $id_particiM = $pdo->prepare('UPDATE Action SET ID_participant_reu = :partici WHERE ID_action = :ID_action');
    $id_particiM->execute(array('partici' => $id_partici, 'ID_action' => $ID_action));

    if ($id_particiM) {
        $checkPartici = true;
    } else {
        echo 'Erreur modification';
    }
}
//...........................................MODIFICATION TABLE participants_pr..................................................

if (!empty($_POST['ID_ut']) && !empty($_POST['ID_participants_pr'])) {
    $ID_ut = $_POST['ID_ut'];
    $ID_participant_pr = $_POST['ID_participants_pr'];

    $id_participants_prM = $pdo->prepare('UPDATE Participants_pr SET ID_ut = :ID_ut WHERE ID_participant_pr = :ID_participant_pr');
    $id_participants_prM->execute(array('ID_ut' => $ID_ut, 'ID_participant_pr' => $ID_participant_pr));

    if ($id_participants_prM) {
        $checkParticipants_prM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['ID_projet']) && !empty($_POST['ID_participants_pr'])) {
    $ID_projet = $_POST['ID_projet'];
    $ID_participant_pr = $_POST['ID_participants_pr'];

    $id_projet_M = $pdo->prepare('UPDATE Participants_pr SET ID_projet = :ID_projet WHERE ID_participant_pr = :ID_participant_pr');
    $id_projet_M->execute(array('ID_projet' => $ID_projet, 'ID_participant_pr' => $ID_participants_pr));

    if ($id_projet_M) {
        $checkProjetM = true;
    } else {
        echo 'Erreur modification';
    }
}
//...........................................MODIFICATION TABLE participants_pr..................................................

if (!empty($_POST['Presence']) && !empty($_POST['ID_participant_reu'])) {
    $presence = $_POST['Presence'];
    $ID_participant_reu = $_POST['ID_participant_reu'];

    $id_participants_reuM = $pdo->prepare('UPDATE Participants_reu SET Presence = :presence WHERE ID_participant_reu = :ID_participant_reu');
    $id_participants_reuM->execute(array('presence' => $presence, 'ID_participant_reu' => $ID_participant_reu));

    if ($id_participants_reuM) {
       $checkParticipant_reuM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['ID_ut']) && !empty($_POST['ID_participant_reu'])) {
    $ID_ut = $_POST['ID_ut'];
    $ID_participant_reu = $_POST['ID_participant_reu'];

    $id_ut_reuM = $pdo->prepare('UPDATE Participants_reu SET ID_ut = :ID_ut WHERE ID_participant_reu = :ID_participant_reu');
    $id_ut_reuM->execute(array('ID_ut' => $ID_ut, 'ID_participant_reu' => $ID_participant_reu));

    if ($id_ut_reuM) {
       $checkID_ut_reuM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['ID_tache']) && !empty($_POST['ID_participant_reu'])) {
    $ID_tache = $_POST['ID_tache'];
    $ID_participant_reu = $_POST['ID_participant_reu'];

    $id_tache_reuM = $pdo->prepare('UPDATE Participants_reu SET ID_tache = :ID_tache WHERE ID_participant_reu = :ID_participant_reu');
    $id_tache_reuM->execute(array('ID_tache' => $ID_tache, 'ID_participant_reu' => $ID_participant_reu));

    if ($id_tache_reuM) {
       $checkID_tache_reuM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['ID_reunion']) && !empty($_POST['ID_participant_reu'])) {
    $ID_reunion = $_POST['ID_reunion'];
    $ID_participant_reu = $_POST['ID_participant_reu'];

    $id_reunion_reuM = $pdo->prepare('UPDATE Participants_reu SET ID_reunion = :ID_reunion WHERE ID_participant_reu = :ID_participant_reu');
    $id_reunion_reuM->execute(array('ID_reunion' => $ID_reunion, 'ID_participant_reu' => $ID_participant_reu));

    if ($id_reunion_reuM) {
       $checkID_reunion_reuM = true;
    } else {
        echo 'Erreur modification';
    }
}
//...........................................MODIFICATION TABLE SUJET..................................................

if (!empty($_POST['Sujet']) && !empty($_POST['ID_sujet'])) {
    $sujet = $_POST['Sujet'];
    $ID_sujet = $_POST['ID_sujet'];

    $id_sujetM = $pdo->prepare('UPDATE sujet SET Sujet = :sujet WHERE ID_sujet = :ID_sujet');
    $id_sujetM->execute(array('sujet' => $sujet, 'ID_sujet' => $ID_sujet));

    if ($id_sujetM) {
       $checkSujetM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Temps_sujet']) && !empty($_POST['ID_sujet'])) {
    $temps_sujet = $_POST['Temps_sujet'];
    $ID_sujet = $_POST['ID_sujet'];

    $id_temps_sujetM = $pdo->prepare('UPDATE sujet SET Temps_sujet = :temps_sujet WHERE ID_sujet = :ID_sujet');
    $id_temps_sujetM->execute(array('temps_sujet' => $temps_sujet, 'ID_sujet' => $ID_sujet));

    if ($id_temps_sujetM) {
       $checkTemps_sujetM = true;
    } else {
        echo 'Erreur modification';
    }
} else if (!empty($_POST['Compte_rendu_s']) && !empty($_POST['ID_sujet'])) {
    $compte_rendu_s = $_POST['Compte_rendu_s'];
    $ID_sujet = $_POST['ID_sujet'];

    $id_compte_renduM = $pdo->prepare('UPDATE sujet SET Compte_rendu_s = :compte WHERE ID_sujet = :ID_sujet');
    $id_compte_renduM->execute(array('compte' => $compte_rendu_s, 'ID_sujet' => $ID_sujet));

    if ($id_compte_renduM) {
       $checkcompte_renduM = true;
    } else {
        echo 'Erreur modification';
    }
}
//...........................................MODIFICATION TABLE TACHE..................................................

if (!empty($_POST['Tache']) && !empty($_POST['ID_tache'])) {
    $tache = $_POST['Tache'];
    $ID_tache = $_POST['ID_tache'];

    $id_tacheM = $pdo->prepare('UPDATE Tache SET Tache = :tache WHERE ID_tache = :ID_tache');
    $id_tacheM->execute(array('tache' => $tache, 'ID_tache' => $ID_tache));

    if ($id_tacheM) {
       $checkTacheM = true;
    } else {
        echo 'Erreur modification';
    }
} 
?>