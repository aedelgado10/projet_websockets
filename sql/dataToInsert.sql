#-- Activite -- idActivit,nomA,TypeA, needMeteoA,
INSERT INTO Activite VALUES (1,'Jardinage', 'Tondeuse', 1);
INSERT INTO Activite VALUES (2,'Jardinage', 'Moto Culteurs', 1);
INSERT INTO Activite VALUES (3,'Jardinage', 'Taille Haie', 1);
INSERT INTO Activite VALUES (4,'Informatique', 'Creation Site Web', 0);
INSERT INTO Activite VALUES (5,'Informatique', 'Reparation PC', 0);
INSERT INTO Activite VALUES (6,'Informatique', 'Installation Matos', 0);
INSERT INTO Activite VALUES (7,'Sport', 'Coach Running', 1);
INSERT INTO Activite VALUES (8,'Sport', 'Musculation', 0);
INSERT INTO Activite VALUES (9,'Sport', 'Football', 1);
INSERT INTO Activite VALUES (10,'Cuisine', 'Desserts', 0);
INSERT INTO Activite VALUES (11,'Cuisine', 'Cueillir des fruits', 1);
INSERT INTO Activite VALUES (12,'Sexe', 'Kamasutra', 0);
INSERT INTO Activite VALUES (13,'Sexe', 'Orgies Outdoor', 1);

#-- Calendrier -- idCalendrier,dateC,HeureC,tempsMeteoC,
INSERT INTO Calendrier VALUES (1,'2018-04-05','15:10:00','Decouvert');
INSERT INTO Calendrier VALUES (2,'2018-04-05','17:30:00','Nuageux');
INSERT INTO Calendrier VALUES (3,'2018-04-08','09:45:00','Pluie');
INSERT INTO Calendrier VALUES (4,'2018-04-08','12:00:00','Pluie');
INSERT INTO Calendrier VALUES (5,'2018-04-30','21:00:00','Nuageux');
INSERT INTO Calendrier VALUES (6,'2018-05-01','21:00:00','Decouvert');
INSERT INTO Calendrier VALUES (7,'2018-05-01','23:30:00','Decouvert');
INSERT INTO Calendrier VALUES (8,'2018-05-10','11:20:00','Decouvert');
INSERT INTO Calendrier VALUES (9,'2018-05-11','11:35:00','Nuageux');
INSERT INTO Calendrier VALUES (10,'2018-05-12','14:10:00','Pluie');
INSERT INTO Calendrier VALUES (11,'2018-05-12','15:15:00','Nuageux');
INSERT INTO Calendrier VALUES (12,'2018-05-21','19:30:00','Decouvert');
INSERT INTO Calendrier VALUES (13,'2018-05-21','22:50:00','Grêle');

#-- Personne -- idPersonne, prenomP, nomP, addresseP, numeroTelP, mailP, idActiviteMaitriseP, idActiviteSouhaiteP,
INSERT INTO Personne VALUES (1,'Huguito','Chavez','hchavez','123','Avenue del cementerio, Venezuela','06 65 69 87 45', 'ElChavo@RIP.ve');
INSERT INTO Personne VALUES (2,'Niquito','Maduro','nmaduro','123','Avenue del bus, Venezuela','06 87 69 12 04', 'Maburro@autobus.ve');
INSERT INTO Personne VALUES (3,'Luisito','Comunica','lcomunica','123','Rue Telefonica, Mexique','07 22 31 09 09', 'Luis@youtube.mx');
INSERT INTO Personne VALUES (4,'Pascal','Courrier','pcourrier','123','OBS, Portet','07 00 91 27 43', 'Buge@laposte.fr');
INSERT INTO Personne VALUES (5,'Dame','Apoyo','dapoyo','123','Maison Delgado, Venezuela','07 87 01 01 52', 'apoyo@aquiesta.ve');
INSERT INTO Personne VALUES (6,'Gordon','Ramsey','gramsey','123','Kitchen Nightmare, USA','06 65 69 87 45', 'kitchen@nightmare.usa');
INSERT INTO Personne VALUES (7,'Nady','Keraghel','nk','123','Boulevard du biceps, Plaisance du Touch','06 85 61 72 35', 'nady.defop@gmail.com');
INSERT INTO Personne VALUES (8,'Fred','Ferrera','fferrera','123','Rue du doigt dans le nez, Brésil','06 00 09 70 54', 'federico@ronaldinho.br');

#-- Interesser -- typeInteret, idActivite,IdPersonne
INSERT INTO Interesser VALUES ('Enseigner',13,1);
INSERT INTO Interesser VALUES ('Enseigner',4,3);
INSERT INTO Interesser VALUES ('Enseigner',11,6);
INSERT INTO Interesser VALUES ('Enseigner',2,5);
INSERT INTO Interesser VALUES ('Apprendre',13,7);
INSERT INTO Interesser VALUES ('Apprendre',4,4);
INSERT INTO Interesser VALUES ('Apprendre',11,2);
INSERT INTO Interesser VALUES ('Apprendre',7,8);

#-- Cette table normalement devrait être saisie/remplie par le site. Des que celui ci trouvera des coincidences.
#-- Rencontre -- idRencontre,idCalenderierR,idActiviteR,idPersonne1,idPersonne2
INSERT INTO Rencontre VALUES (7,13,1,7);
INSERT INTO Rencontre VALUES (13,4,3,4);
INSERT INTO Rencontre VALUES (9,11,6,2);

#-- Être Dispo -- idCalendrier, idPersonne
INSERT INTO Etre_Disponible VALUES (1,8);
INSERT INTO Etre_Disponible VALUES (2,5);
INSERT INTO Etre_Disponible VALUES (9,6);
INSERT INTO Etre_Disponible VALUES (9,2);
INSERT INTO Etre_Disponible VALUES (13,4);
INSERT INTO Etre_Disponible VALUES (13,3);
INSERT INTO Etre_Disponible VALUES (7,7);
INSERT INTO Etre_Disponible VALUES (7,1);

