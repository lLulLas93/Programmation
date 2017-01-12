<?php 

function affichageMessage($pdo) {
    $id = $_SESSION['id'];
    $affichageMessage = $pdo->query('SELECT * FROM messages WHERE id_destinataire =  \''.$id.'\'');
    echo ' </br></br></br></br><div class="col-md-6">
                <div class="msgN">
                    <form action="index.php?page=message" meTDod="post" class="STYLE-NAME">
                        <h1>Boite de réception</h1>
                        <table class="table table-inverse">
                            <TDead>
                                <tr>
                                        <td>Expediteur</td>
                                        <td>Heure</td>
                                        <td>Objet</td>
                                        <td>Message</td>
                                </tr>
                            </thead >
                            <tbody>';
    while ($donnees = $affichageMessage->fetch()) {  
                  
        $recupmail = $pdo->query('SELECT mail FROM utilisateurs WHERE ID_ut = \''.$donnees['ID_ut'].'\'');    
        $id_destinataire = $donnees['id_destinataire'];
        
        $id_ut = $donnees['ID_ut'];
        
        $req = $pdo->prepare('SELECT * FROM utilisateurs WHERE ID_ut = :id_ut');
        $req->execute(array('id_ut' => $id_ut));
        
        $contenu = $req->fetch();
        $_SESSION['mail'] = $contenu['Mail'];
       
        global $mail;
        $mail = $_SESSION['mail'];
      
          echo '<TR>
                <TD>'.$contenu['Mail'].'</TD>
                <TD> '.$donnees['Heure'].'</TD>
                <TD> '.$donnees['titre'].'</TD>
                <TD> '.$donnees['message'].'</TD>
                <TD> <form action="index.php" method="GET">
                <input type="hidden" name="page" value="message">
                <button type="submit" class="btn btn-info btn-xs" name ="repondre" value ='.$donnees["titre"].'>
                Répondre
                </button></TD>
                </tr>';
           
        while ($donneesMail = $recupmail->fetch()) {
            $_SESSION['mailExpe'] = $donneesMail['mail'];
            $mailExpe = $_SESSION['mailExpe'];
            echo '<input type="hidden" name="mail" value='.$mailExpe.'></form>';
        }
    }


    echo '</tbody>
</table>
</form>
</div>
</div>
</div>';
    $affichageMessage->closeCursor();
}
affichageMessage($pdo);
?>