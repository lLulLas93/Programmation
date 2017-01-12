DROP DATABASE programmation;
Create DATABASE programmation;
use programmation;

CREATE TABLE SUJET
(ID_sujet SMALLINT AUTO_INCREMENT PRIMARY KEY,
Sujet TEXT,
Temps_sujet VARCHAR(3),
Compte_rendu_s TEXT,
ID_reunion SMALLINT,
FOREIGN KEY (ID_reunion) REFERENCES REUNIONS (ID_reunion),
ID_ut SMALLINT,
FOREIGN KEY (ID_ut) REFERENCES UTILISATEURS (ID_ut));

CREATE TABLE TACHE
(ID_tache SMALLINT AUTO_INCREMENT PRIMARY KEY,
Tache TEXT,
ID_reunion SMALLINT,
FOREIGN KEY (ID_reunion) REFERENCES REUNIONS (ID_reunion),
ID_ut SMALLINT,
FOREIGN KEY (ID_ut) REFERENCES UTILISATEURS (ID_ut));

CREATE TABLE UTILISATEURS
(ID_ut SMALLINT AUTO_INCREMENT PRIMARY KEY,
Prenom VARCHAR(30),
Nom_ut VARCHAR(30),
Mail VARCHAR(30),
Mdp VARCHAR(100),
Statut VARCHAR(15));

CREATE TABLE PROJETS
(ID_projet SMALLINT AUTO_INCREMENT PRIMARY KEY,
Date_de_creation DATE,
Nom_p VARCHAR(30),
Instigateur SMALLINT,
FOREIGN KEY (Instigateur) REFERENCES UTILISATEURS (ID_ut),
Langage VARCHAR(45),
Description TEXT,
Date_de_debut DATE,
Date_de_fin DATE,
Logo TEXT,
Statut VARCHAR(15),
difficultes VARCHAR(3),
Vote SMALLINT(100),
Participant SMALLINT);

CREATE TABLE PARTICIPANTS_PR
(ID_participant_pr SMALLINT AUTO_INCREMENT PRIMARY KEY,
ID_ut SMALLINT,
FOREIGN KEY (ID_ut) REFERENCES UTILISATEURS (ID_ut),
ID_projet SMALLINT,
FOREIGN KEY (ID_projet) REFERENCES PROJETS (ID_projet));

CREATE TABLE REUNIONS
(ID_reunion SMALLINT AUTO_INCREMENT PRIMARY KEY,
Instigateur SMALLINT,
FOREIGN KEY (Instigateur) REFERENCES UTILISATEURS (ID_ut),
Ordre TEXT,
Date_r DATE,
Heure_d TIME,
Heure_f TIME,
Lieu VARCHAR(50),
Compte_rendu_r TEXT);

CREATE TABLE PARTICIPANTS_REU
(ID_participant_reu SMALLINT AUTO_INCREMENT PRIMARY KEY,
Presence CHAR(3),
ID_ut SMALLINT,
FOREIGN KEY (ID_ut) REFERENCES UTILISATEURS (ID_ut),
ID_tache SMALLINT,
FOREIGN KEY (ID_tache) REFERENCES TACHE (ID_tache),
ID_reunion SMALLINT,
FOREIGN KEY (ID_reunion) REFERENCES REUNIONS (ID_reunion));

CREATE TABLE ACTION
(ID_action SMALLINT AUTO_INCREMENT PRIMARY KEY,
Action VARCHAR(50),
Etat VARCHAR(3),
ID_participant_reu SMALLINT,
FOREIGN KEY (ID_participant_reu) REFERENCES PARTICIPANTS_REU (ID_participant_reu));

CREATE TABLE messages (
ID_messages SMALLINT auto_increment PRIMARY KEY,
Heure DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
id_destinataire SMALLINT,
id_projet SMALLINT,
FOREIGN KEY (ID_destinataire) REFERENCES UTILISATEURS (ID_ut),
ID_ut int,
FOREIGN KEY (ID_ut) REFERENCES UTILISATEURS (ID_ut),
statut SMALLINT,
titre text NOT NULL,
message text NOT NULL); 

INSERT INTO `utilisateurs` (`ID_ut`, `Prenom`, `Nom_ut`, `Mail`, `Mdp`, `Statut`) VALUES
(1, 'bot', 'bot', 'bot@bot', 'aqw', 'bot'),
(2, 'azertyuiop', 'azertyuiop', 'aze@poiu', 'azertyuiop', 'etudiant'),
(3, 'qsdfghjklvbn', 'wxcvbn', 'aze@poiu', 'wxcvbn', 'etudiant'),
(5, 'aqw', 'aqw', 'aqw@wqa', 'aqw', 'etudiant'),
(6, 'efcxse', 'Admin', 'vprigaud@laposte.net', 'aze', 'administrateur'),
(7, 'pmlo', 'AdminAdmin', 'vprigaud@laposte.net', 'aze', 'etudiant'),
(8, 'fevz', 'Adam', 'vprigaud@laposte.net', 'aze', 'etudiant'),
(9, 'zze', 'dmominique', 'vprigaud@laposte.net', 'aze', 'etudiant'),
(10, 'plpzcd', 'Alice', 'vprigaud@laposte.net', 'aze', 'etudiant'),
(11, 'zdc', 'noémi', 'vprigaud@laposte.net', 'aze', 'professionnel'),
(12, 'dcz', 'iris', 'vprigaud@laposte.net', 'aze', 'professionnel'),
(13, 'aezr', 'dimitri', 'vprigaud@laposte.net', 'aze', 'professionnel'),
(14, 'ezqcd', 'nimad', 'vprigaud@laposte.net', 'aze', 'O');


INSERT INTO projets(Date_de_creation,Nom_p,Instigateur,Langage,Description,Date_de_debut,Date_de_fin,Logo,statut,difficultes,vote,Participant)
VALUES ('2016-12-12','PROGRAMMATION',1,'PHP&MYSQL','Cest nous','2016-12-12','2016-08-19','test.jpg','etudiant','100',0,'4');
INSERT INTO projets(Date_de_creation,Nom_p,Instigateur,Langage,Description,Date_de_debut,Date_de_fin,Logo,statut,difficultes,vote,Participant)
VALUES ('2016-12-12','nom_p2',2,'langage','description','2016-12-12','2016-08-19','F-D.jpg','statut','100',0,'8');
INSERT INTO projets(Date_de_creation,Nom_p,Instigateur,Langage,Description,Date_de_debut,Date_de_fin,Logo,statut,difficultes,vote,Participant)
VALUES ('2016-12-12','nom_p3',3,'langage','description','2016-12-12','2016-08-19','F-D.jpg','statut','100',0,'9');
INSERT INTO projets(Date_de_creation,Nom_p,Instigateur,Langage,Description,Date_de_debut,Date_de_fin,Logo,statut,difficultes,vote,Participant)
VALUES ('2016-12-12','nom_p4',4,'langage','description','2016-12-12','2016-08-19','F-D.jpg','statut','100',0,'12');


INSERT INTO messages(id_destinataire, ID_ut, titre, message) VALUES( 0, '1', '', 'Bienvenue');


INSERT INTO `participants_pr` (`ID_participant_pr`, `ID_ut`, `ID_projet`) VALUES
(1, 14, 3),
(2, 11, 3),
(3, 3, 1),
(4, 6, 1),
(5, 5, 4),
(6, 11, 1),
(7, 14, 4),
(8, 2, 3),
(9, 6, 2),
(10, 4, 2),
(11, 1, 2),
(12, 3, 2),
(13, 5, 2),
(14, 7, 2),
(15, 8, 2),
(16, 9, 2),
(17, 10, 1),
(18, 12, 1),
(19, 4, 4),
(20, 9, 4),
(21, 13, 3),
(22, 1, 3),
(23, 4, 1);



INSERT INTO `reunions` (`ID_reunion`, `Instigateur`, `Ordre`, `Date_r`, `Heure_d`, `Heure_f`, `Lieu`, `Compte_rendu_r`) VALUES
(1, 4, 'pkds', '2016-07-05', '08:30:00', '23:30:00', 'xqs', 'xqs'),
(2, 4, 'coucou', '2016-07-05', '08:30:00', '20:00:00', 'la bas', 'Peut etre'),
(3, 4, 'csq', '2016-06-23', '08:30:00', '23:00:00', 'dkzo', 'cids'),
(4, 4, 'sqock', '2016-07-05', '08:30:00', '19:19:00', 'csq', 'csdvf'),
(5, 4, 'sqock', '2016-07-05', '09:00:00', '19:19:00', 'csq', 'csdvf'),
(6, 4, 'dazo', '2016-07-05', '09:00:00', '18:18:00', 'codk', 'cods'),
(7, 4, 'ok', '2016-07-05', '10:45:00', '18:18:00', 'cd', 'c;dl;o'),
(8, 4, 'pcksd', '2016-07-05', '10:45:00', '23:00:00', 'qocs,', 'ld,'),
(9, 4, 'salut', '2016-07-05', '00:50:00', '23:00:00', 'sd', 'cdo'),
(10, 4, 'salut', '2016-07-05', '13:40:00', '23:00:00', 'sd', 'cdo'),
(11, 4, 'salut', '2016-07-05', '13:40:00', '23:00:00', 'sd', 'cdo'),
(12, 5, 'kfoez', '2016-07-05', '15:50:00', '23:00:00', 'cdos', 'sâq'),
(13, 5, 'la', '2016-07-05', '15:50:00', '16:17:00', 'xqs', 'xqs'),
(14, 5, 'aze', '2016-06-03', '01:01:00', '04:02:00', 'érfdz', 'zfeq'),
(15, 1, 'aze', '2016-06-03', '01:01:00', '04:02:00', 'érfdz', 'zfeq'),
(16, 1, 'ok', '2016-06-03', '01:01:00', '04:02:00', 'érfdz', 'zfeq'),
(17, 1, 'ok', '2016-01-09', '01:01:00', '01:20:00', 'adv', 'adcs'),
(18, 6, 'ok', '2016-06-08', '08:49:00', '11:12:00', 'ebtzvdc', 'rzfdcs'),
(19, 6, 'ok2', '2016-06-08', '08:49:00', '11:12:00', 'ebtzvdc', 'rzfdcs'),
(20, 6, 'terz', '2016-06-27', '10:50:00', '14:15:00', 'fredc', 'grefzvd');

INSERT INTO `participants_reu` (`ID_participant_reu`, `Presence`, `ID_ut`, `ID_tache`, `ID_reunion`) VALUES
(1, 'OUI', 1, NULL, 7),
(2, 'OUI', 1, NULL, 2),
(3, 'OUI', 1, NULL, 3),
(4, 'OUI', 1, NULL, 4),
(5, 'OUI', 1, NULL, 5),
(6, 'OUI', 1, NULL, 6),
(7, 'OUI', 3, NULL, 1),
(8, 'OUI', 3, NULL, 2),
(9, 'OUI', 3, NULL, 7),
(10, 'OUI', 3, NULL, 4),
(11, 'OUI', 3, NULL, 5),
(12, 'OUI', 3, NULL, 6),
(13, 'OUI', 5, NULL, 1),
(14, 'OUI', 5, NULL, 2),
(15, 'OUI', 5, NULL, 3),
(16, 'OUI', 5, NULL, 4),
(17, 'OUI', 5, NULL, 7),
(18, 'OUI', 5, NULL, 6),
(19, 'OUI', 6, NULL, 1),
(20, 'OUI', 6, NULL, 2),
(21, 'OUI', 6, NULL, 3),
(22, 'OUI', 6, NULL, 4),
(23, 'OUI', 6, NULL, 5),
(24, 'OUI', 6, NULL, 8),
(25, 'OUI', 2, NULL, 1),
(26, 'OUI', 2, NULL, 10),
(27, 'OUI', 2, NULL, 3),
(28, 'OUI', 2, NULL, 4),
(29, 'OUI', 2, NULL, 5),
(30, 'OUI', 2, NULL, 6),
(31, 'OUI', 4, NULL, 1),
(32, 'OUI', 4, NULL, 2),
(33, 'OUI', 4, NULL, 3),
(34, 'OUI', 4, NULL, 11),
(35, 'OUI', 4, NULL, 5),
(36, 'OUI', 4, NULL, 6),
(37, 'OUI', 4, NULL, 14),
(38, 'OUI', 4, NULL, 14),
(39, 'OUI', 4, NULL, 14),
(40, 'OUI', 4, NULL, 14);

INSERT INTO `sujet` (ID_sujet, Sujet, Temps_sujet, Compte_rendu_s, ID_reunion, ID_ut) VALUES
(1, 'OUI', 1, NULL, 7,4),
(2, 'OUI', 1, NULL, 2,4),
(3, 'OUI', 1, NULL, 3,4),
(4, 'OUI', 1, NULL, 4,4),
(5, 'OUI', 1, NULL, 5,4),
(6, 'OUI', 1, NULL, 6,4),
(7, 'OUI2', 1, NULL, 6,4),
(8, 'OUI', 3, NULL, 2,4),
(9, 'OUI', 3, NULL, 7,4),
(10, 'OUI', 3, NULL, 4,4),
(11, 'Economie', 10, NULL, 1,4),
(12, 'Finance', 10, NULL, 1,4),
(13, 'Ecologie', 10, NULL, 1,4),
(14, 'Etudiant', 10, NULL, 1,4),
(15, 'Bourse', 10, NULL, 1,4),
(16, 'Logistique', 10, NULL, 1,1),
(17, 'Administration', 10, NULL, 1,2),
(18, 'Professeur', 10, NULL, 1,4),
(19, 'Loisir', 10, NULL, 1,5),
(20, 'Sportif', 10, NULL, 1,4);

INSERT INTO `tache` (ID_tache, tache, ID_reunion, ID_ut) VALUES
(1, 'OUI', 7,4),
(2, 'OUI', 2,4),
(3, 'OUI', 3,4),
(4, 'OUI', 4,4),
(5, 'OUI', 5,4),
(6, 'OUI', 6,4),
(7, 'OUI2', 6,4),
(8, 'OUI', 2,4),
(9, 'OUI', 7,4),
(10, 'OUI', 4,4),
(11, 'Changer les toilettes', 1,4),
(12, 'Réparer la table', 1,4),
(13, 'Améliorer la machine à café', 1,4),
(14, 'Rajouter un baby-foot', 1,4),
(15, 'Ajouter de l\'ancre', 1,4),
(16, 'Retirer toutes les affiches', 1,1),
(17, 'Changer les chaises', 1,2),
(18, 'Vider les poubelles', 1,3),
(19, 'Mettre des goblets', 1,5),
(20, 'Nétoyage de la ruelle', 1,4);