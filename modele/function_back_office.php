<?php 

if ($_POST['tables'] == '1'){
    // FUNCTION Affichage Admin

    function affichageTableAction($pdo) {

        $affichage = $pdo->query('SELECT * FROM action');

        echo '</br><div class="utilisateur"><div class="title"><h2 class="sub-header">Table Action</h2></div>
            </br></br>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID_action</th>
                    <th>Action</th>
                    <th>Etat</th>
                    <th>ID_participant_reu</th>
                    </tr>
                </thead>
                <tbody>';

        while ($donnees = $affichage->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "</TR>";
            echo "<TH> $donnees[ID_action] </TH>";
            echo "<TH> $donnees[Action] </TH>";
            echo "<TH> $donnees[Etat] </TH>";
            echo "<TH> $donnees[ID_participant_reu] </TH>";
            echo "</TR>";
        }
        echo '          </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>';
        echo '</table>';
        echo '</div></div>';
        $affichage->closeCursor();
    }
    // appel fonction
    affichageTableAction($pdo);

} else if ($_POST['tables'] == '2') {
    // FUNCTION Affichage Admin Messages

    function affichageTableMessages($pdo) {

        $affichage = $pdo->query('SELECT * FROM Messages');

        echo '</br><div class="utilisateur"><div class="title"><h2 class="sub-header">Table Messages</h2></div>
            </br></br>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID_messages</th>
                    <th>id_destinataire</th>
                    <th>ID_ut</th>
                    <th>titre</th>
                    <th>messages</th>
                    </tr>
                </thead>
                <tbody>';

        while ($donnees = $affichage->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "</TR>";
            echo "<TH> $donnees[ID_messages] </TH>";
            echo "<TH> $donnees[id_destinataire] </TH>";
            echo "<TH> $donnees[ID_ut] </TH>";
            echo "<TH> $donnees[titre] </TH>";
            echo "<TH> $donnees[message] </TH>";
            echo "</TR>";
        }
        echo '          </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>';
        echo '</table>';
        echo '</div></div>';
        $affichage->closeCursor();
    }
    // appel fonction
    affichageTableMessages($pdo); 
    
} else if ($_POST['tables'] == '3') { 
    // FUNCTION Affichage Admin Table Participants Projet

    function affichageTableParticipantsProjet($pdo) {

        $affichage = $pdo->query('SELECT * FROM participants_pr');

        echo '</br><div class="utilisateur"><div class="title"><h2 class="sub-header">Table Participants_pr</h2></div>
            </br></br>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID_participant_pr</th>
                    <th>ID_ut</th>
                    <th>ID_projet</th>
                    </tr>
                </thead>
                <tbody>';

        while ($donnees = $affichage->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "</TR>";
            echo "<TH> $donnees[ID_participant_pr] </TH>";
            echo "<TH> $donnees[ID_ut] </TH>";
            echo "<TH> $donnees[ID_projet] </TH>";
            echo "</TR>";
        }
        echo '          </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>';
        echo '</table>';
        echo '</div></div>';
        $affichage->closeCursor();
    }
    // appel fonction
    affichageTableParticipantsProjet($pdo);       
} else if ($_POST['tables'] == '4') {
    // FUNCTION Affichage Admin Table Participants Reunion
    function affichageTableParticipantsReunion($pdo) {

        $affichage = $pdo->query('SELECT * FROM participants_reu');

        echo '</br><div class="utilisateur"><div class="title"><h2 class="sub-header">Participants_reu</h2></div>
            </br></br>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID_participant_reu</th>
                    <th>Presence</th>
                    <th>ID_ut</th>
                    <th>ID_tache</th>
                    <th>ID_reunion</th>
                    </tr>
                </thead>
                <tbody>';

        while ($donnees = $affichage->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "</TR>";
            echo "<TH> $donnees[ID_participant_reu] </TH>";
            echo "<TH> $donnees[Presence] </TH>";
            echo "<TH> $donnees[ID_ut] </TH>";
            echo "<TH> $donnees[ID_tache] </TH>";
            echo "<TH> $donnees[ID_reunion] </TH>";
            echo "</TR>";
        }
        echo '          </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>';
        echo '</table>';
        echo '</div></div>';
        $affichage->closeCursor();
    }
    // appel fonction
    affichageTableParticipantsReunion($pdo);
    
}  else if ($_POST['tables'] == '5') {
// FUNCTION Affichage Admin table projets
    function affichageTableProjets($pdo) {

        $affichage = $pdo->query('SELECT * FROM projets');

        echo '</br><div class="utilisateur"><div class="title"><h2 class="sub-header">Table Projets</h2></div>
            </br></br>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID_projet</th>
                    <th>Date_de_creation</th>
                    <th>Nom_p</th>
                    <th>Instigateur</th>
                    <th>Langage</th>
                    <th>Description</th>
                    <th>Date_de_debut</th>
                    <th>Logo</th>
                    <th>Statut</th>
                    <th>difficultés</th>
                    <th>participant</th>
                    <th>ID_participant_pr</th>
                    </tr>
                </thead>
                <tbody>';

        while ($donnees = $affichage->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "</TR>";
            echo "<TH> $donnees[ID_projet] </TH>";
            echo "<TH> $donnees[Date_de_creation] </TH>";
            echo "<TH> $donnees[Nom_p] </TH>";
            echo "<TH> $donnees[Instigateur] </TH>";
            echo "<TH> $donnees[Langage] </TH>";
            echo "<TH> $donnees[Description] </TH>";
            echo "<TH> $donnees[Date_de_debut] </TH>";
            echo "<TH> $donnees[Logo] </TH>";
            echo "<TH> $donnees[Statut] </TH>"; 
            echo "<TH> $donnees[difficultes] </TH>";
            echo "<TH> $donnees[Participant] </TH>";
            //echo "<TH> $donnees[ID_participant_pr] </TH>";
            echo "</TR>";
        }
        echo '          </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>';
        echo '</table>';
        echo '</div>';
        $affichage->closeCursor();
    }
    // appel fonction
    affichageTableProjets($pdo);
} else if ($_POST['tables'] == '6') { 
    // FUNCTION Affichage Admin table Reunion

    function affichageTableReunion($pdo) {

        $affichage = $pdo->query('SELECT * FROM reunions');

        echo '</br><div class="utilisateur"><div class="title"><h2 class="sub-header">Table Reunions</h2></div>
            </br></br>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID_reunion</th>
                    <th>Instigateur</th>
                    <th>Ordre</th>
                    <th>Date_d</th>
                    <th>Date_f</th>
                    <th>Heure</th>
                    <th>Lieu</th>
                    <th>Compte_rendu_r</th>
                    <th>ID_sujet</th> 
                    </tr>
                </thead>
                <tbody>';

        while ($donnees = $affichage->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "</TR>";
            echo "<TH> $donnees[ID_reunion] </TH>";
            echo "<TH> $donnees[Instigateur] </TH>";
            echo "<TH> $donnees[Ordre] </TH>";
            echo "<TH> $donnees[Date_r] </TH>";
            echo "<TH> $donnees[Lieu] </TH>";
            echo "<TH> $donnees[Compte_rendu_r] </TH>";
            echo "<TH> $donnees[ID_sujet] </TH>"; 
            echo "</TR>";
        }
        echo '          </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>';
        echo '</table>';
        echo '</div></div>';
        $affichage->closeCursor();
    }
    affichageTableReunion($pdo);

} else if ($_POST['tables'] == '7') {
    // FUNCTION Affichage Admin table Sujet

    function affichageTableSujet($pdo) {

        $affichage = $pdo->query('SELECT * FROM sujet');

        echo '</br><div class="utilisateur"><div class="title"><h2 class="sub-header">Table Sujet</h2></div>
            </br></br>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID_sujet</th>
                    <th>Sujet</th>
                    <th>Temps_sujet</th>
                    <th>Compte_rendu_s</th>
                    </tr>
                </thead>
                <tbody>';

        while ($donnees = $affichage->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "</TR>";
            echo "<TH> $donnees[ID_sujet] </TH>";
            echo "<TH> $donnees[Sujet] </TH>";
            echo "<TH> $donnees[Temps_sujet] </TH>";
            echo "<TH> $donnees[Compte_rendu_s] </TH>";
            echo "</TR>";
        }
        echo '          </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>';
        echo '</table>';
        echo '</div></div>';
        $affichage->closeCursor();
    }
    // appel fonction 
    affichageTableSujet($pdo);
} else if ($_POST['tables'] == '8') {
    // FUNCTION Affichage Admin
    function affichageTableTache($pdo) {

        $affichage = $pdo->query('SELECT * FROM tache');

        echo '</br><div class="utilisateur"><div class="title"><h2 class="sub-header">Table Tache</h2></div>
            </br></br>
            <div class="table-responsive">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID_tache</th>
                    <th>Tache</th>
                    </tr>
                </thead>
                <tbody>';

        while ($donnees = $affichage->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "</TR>";
            echo "<TH> $donnees[ID_tache] </TH>";
            echo "<TH> $donnees[Tache] </TH>";
            echo "</TR>";
        }
        echo '          </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>';
        echo '</table>';
        echo '</div></div>';
        $affichage->closeCursor();
    }
    // appel fonction
    affichageTableTache($pdo);

} else if ($_POST['tables'] == '9') {
    // FUNCTION Affichage Admin

    function affichageTableUtilisateurs($pdo) {

        $affichage = $pdo->query('SELECT * FROM utilisateurs');

        echo '</br><div class="utilisateur"><div class="title"><h2 class="sub-header">Table utilisateurs</h2></div>
            </br></br></br></br>
            <div class="table-responsive ">
                <table class="table table-striped">
                <thead>
                    <tr>
                    <th>ID_ut</th>
                    <th>Prenom</th>
                    <th>Nom_ut</th>
                    <th>Mail</th>
                    <th>Mdp</th>
                    <th>Statut</th>
                    <th>ID_projet</th>
                    <th>ID_reunion</th>
                    </tr>
                </thead>
                <tbody>';

        while ($donnees = $affichage->fetch()) {
            //On affiche l'id et le nom du client en cours
            echo "</TR>";
            echo "<TH> $donnees[ID_ut] </TH>";
            echo "<TH> $donnees[Prenom] </TH>";
            echo "<TH> $donnees[Nom_ut] </TH>";
            echo "<TH> $donnees[Mail] </TH>";
            echo "<TH> $donnees[Mdp] </TH>";
            echo "<TH> $donnees[Statut] </TH>";
            echo "<TH></TH>";
            echo "<TH>  </TH>";
            echo "</TR>";
        }
        echo '          </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>';
        echo '</table>';
        echo '</div></div>';
        $affichage->closeCursor();
        echo'<div class="marge"></div>';
    }
    // appel fonction
    affichageTableUtilisateurs($pdo);
}
?>