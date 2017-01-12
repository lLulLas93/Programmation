<?php 

//FUNCTION delate UTILISATEUR

if (!empty($_POST['id'])) {
    $id = $_POST['id'];


    function deleteUT($pdo, $id) {

        $reponseDelete = $pdo->prepare('DELETE FROM utilisateurs WHERE ID_ut = :id');
        $reponseDelete->execute(array('id' => $id));

        if ($reponseDelete) {
            global $checkDelete;
            $checkDelete = true;
        } else {
            echo 'Erreur modification';
        }
    }
    deleteUT($pdo, $id);
}


//FUNCTION DELATE MESSAGES

if (!empty($_POST['ID_messages'])) {
    $ID_messagesDelete = $_POST['ID_messages'];

    function deleteMessages($pdo, $ID_messagesDelete) {

        $reponseDeleteMessages = $pdo->prepare('DELETE FROM messages WHERE ID_messages = :ID_messages ');
        $reponseDeleteMessages->execute(array('ID_messages' => $ID_messagesDelete));

        if ($reponseDeleteMessages) {
            global $checkDelete;
            $checkDelete = true;
        } else {
            echo 'Erreur modification';
        }
    }
    deleteMessages($pdo, $ID_messagesDelete);
}

//FUNCTION DELATE REUNION

if (!empty($_POST['ID_reunion'])) {
    $ID_reunionDelete = $_POST['ID_reunion'];

    function deleteReunion($pdo, $ID_reunionDelete) {

        $reponseDeleteReunion = $pdo->prepare('DELETE FROM reunions WHERE ID_reunion = :ID_reunion ');
        $reponseDeleteReunion->execute(array('ID_reunion' => $ID_reunionDelete));

        if ($reponseDeleteReunion) {
            global $checkDelete;
            $checkDelete = true;
        } else {
            echo 'Erreur modification';
        }
    }
    deleteReunion($pdo, $ID_reunionDelete);
}

//FUNCTION DELATE PROJET

if (!empty($_POST['ID_projet'])) {
    $ID_projetDelete = $_POST['ID_projet'];

    function deleteProjet($pdo, $ID_projetDelete) {

        $reponseDeleteProjet = $pdo->prepare('DELETE FROM projets WHERE ID_projet = :ID_projet ');
        $reponseDeleteProjet->execute(array('ID_projet' => $ID_projetDelete));

        if ($reponseDeleteProjet) {
            global $checkDelete;
            $checkDelete = true;
        } else {
            echo 'Erreur modification';
        }
    }
    deleteProjet($pdo, $ID_projetDelete);
}

//FUNCTION DELATE PARTICIPANT_REU

 if (!empty($_POST['ID_participant_reu'])) {
    $ID_participant_reuDelete = $_POST['ID_participant_reu'];

    function deleteParticipant_reu($pdo, $ID_participant_reuDelete) {

        $reponseDeletePartici_reu = $pdo->prepare('DELETE FROM Participants_reu WHERE ID_participant_reu = :ID_participant_reuDelete ');
        $reponseDeletePartici_reu->execute(array('ID_participant_reuDelete' => $ID_participant_reuDelete));

        if ($reponseDeletePartici_reu) {
            global $checkDelete;
            $checkDelete = true;
        } else {
            echo 'Erreur modification';
        }
    }
    deleteParticipant_reu($pdo, $ID_participant_reuDelete);
}

//FUNCTION DELATE PARTICIPANT_REU

if (!empty($_POST['ID_sujet'])) {
    $ID_sujetDelete = $_POST['ID_sujet'];

    function deleteSujet($pdo, $ID_sujetDelete) {

        $reponseDeleteSujet = $pdo->prepare('DELETE FROM Sujet WHERE ID_sujet = :ID_sujetDelete ');
        $reponseDeleteSujet->execute(array('ID_sujetDelete' => $ID_sujetDelete));

        if ($reponseDeleteSujet) {
            global $checkDelete;
            $checkDelete = true;
        } else {
            echo 'Erreur modification';
        }
    }
    deleteSujet($pdo, $ID_sujetDelete);
}
//FUNCTION DELATE TACHE

if (!empty($_POST['ID_tache'])) {
    $ID_tacheDelete = $_POST['ID_tache'];

    function deleteTache($pdo, $ID_tacheDelete) {

        $reponseDeleteTache = $pdo->prepare('DELETE FROM Tache WHERE ID_tache = :ID_tacheDelete ');
        $reponseDeleteTache->execute(array('ID_tacheDelete' => $ID_tacheDelete));

        if ($reponseDeleteTache) {
            global $checkDelete;
            $checkDelete = true;
        } else {
            echo 'Erreur modification';
        }
    }
    deleteTache($pdo, $ID_tacheDelete);
}
?>