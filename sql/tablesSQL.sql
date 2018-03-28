#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Activite
#------------------------------------------------------------

CREATE TABLE Activite(
        idActivite Int NOT NULL ,
        nomA       Varchar (25) ,
        typeA      Varchar (25) ,
        needMeteoA Bool ,
        PRIMARY KEY (idActivite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Calendrier
#------------------------------------------------------------

CREATE TABLE Calendrier(
        idCalendrier Int NOT NULL ,
        dateC        Date ,
        heureC       Time ,
        tempsMeteoC  Varchar (25) ,
        PRIMARY KEY (idCalendrier )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        idPersonne Int NOT NULL ,
        prenomP    Varchar (25) ,
        nomP       Varchar (25) ,
        login      Varchar (25) ,
        mdp        Varchar (25) ,
        adresseP   Varchar (255) ,
        numeroTelP Varchar (25) ,
        mailP      Varchar (25) ,
        PRIMARY KEY (idPersonne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Interesser 
#------------------------------------------------------------

CREATE TABLE Interesser(
        typeInteret Varchar (25) ,
        idActivite  Int NOT NULL ,
        idPersonne  Int NOT NULL ,
        PRIMARY KEY (idActivite ,idPersonne )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Rencontre
#------------------------------------------------------------

CREATE TABLE Rencontre(
        idCalendrier Int NOT NULL ,
        idActivite   Int NOT NULL ,
        idPersonne   Int NOT NULL ,
        idPersonne_1 Int NOT NULL ,
        PRIMARY KEY (idCalendrier ,idActivite ,idPersonne ,idPersonne_1 )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Être Disponible
#------------------------------------------------------------

CREATE TABLE Etre_Disponible(
        idCalendrier Int NOT NULL ,
        idPersonne   Int NOT NULL ,
        PRIMARY KEY (idCalendrier ,idPersonne )
)ENGINE=InnoDB;

ALTER TABLE Interesser ADD CONSTRAINT FK_Interesser_idActivite FOREIGN KEY (idActivite) REFERENCES Activite(idActivite);
ALTER TABLE Interesser ADD CONSTRAINT FK_Interesser_idPersonne FOREIGN KEY (idPersonne) REFERENCES Personne(idPersonne);
ALTER TABLE Rencontre ADD CONSTRAINT FK_Rencontre_idCalendrier FOREIGN KEY (idCalendrier) REFERENCES Calendrier(idCalendrier);
ALTER TABLE Rencontre ADD CONSTRAINT FK_Rencontre_idActivite FOREIGN KEY (idActivite) REFERENCES Activite(idActivite);
ALTER TABLE Rencontre ADD CONSTRAINT FK_Rencontre_idPersonne FOREIGN KEY (idPersonne) REFERENCES Personne(idPersonne);
ALTER TABLE Rencontre ADD CONSTRAINT FK_Rencontre_idPersonne_1 FOREIGN KEY (idPersonne_1) REFERENCES Personne(idPersonne);
ALTER TABLE Etre_Disponible ADD CONSTRAINT FK_Etre_Disponible_idCalendrier FOREIGN KEY (idCalendrier) REFERENCES Calendrier(idCalendrier);
ALTER TABLE Etre_Disponible ADD CONSTRAINT FK_Etre_Disponible_idPersonne FOREIGN KEY (idPersonne) REFERENCES Personne(idPersonne);
