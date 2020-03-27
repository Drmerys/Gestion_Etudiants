#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: ETUDIANT
#------------------------------------------------------------

CREATE TABLE ETUDIANT(
        etu_id                 Int  Auto_increment  NOT NULL ,
        etu_nom                Varchar (72) NOT NULL ,
        etu_prenom             Varchar (72) NOT NULL ,
        etu_naissance          Date NOT NULL ,
        etu_nom_responsable    Varchar (72) NOT NULL ,
        etu_prenom_responsable Varchar (72) NOT NULL ,
        etu_niveau_scolaire    Varchar (72) NOT NULL ,
        etu_telephone          Varchar (72) NOT NULL
	,CONSTRAINT ETUDIANT_PK PRIMARY KEY (etu_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: COMPTE_UTILISATEUR
#------------------------------------------------------------

CREATE TABLE COMPTE_UTILISATEUR(
        com_id          Int  Auto_increment  NOT NULL ,
        com_identifiant Varchar (72) NOT NULL ,
        com_password    Varchar (72) NOT NULL ,
        com_email       Varchar (72) NOT NULL ,
        etu_id          Int
	,CONSTRAINT COMPTE_UTILISATEUR_PK PRIMARY KEY (com_id)

	,CONSTRAINT COMPTE_UTILISATEUR_ETUDIANT_FK FOREIGN KEY (etu_id) REFERENCES ETUDIANT(etu_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: NOTES
#------------------------------------------------------------

CREATE TABLE NOTES(
        not_id      Int  Auto_increment  NOT NULL ,
        not_matiere Varchar (72) NOT NULL ,
        not_date    Date NOT NULL
	,CONSTRAINT NOTES_PK PRIMARY KEY (not_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ACTIVITE_SPORTIVE
#------------------------------------------------------------

CREATE TABLE ACTIVITE_SPORTIVE(
        act_id   Int  Auto_increment  NOT NULL ,
        act_nom  Varchar (72) NOT NULL ,
        act_date Date NOT NULL
	,CONSTRAINT ACTIVITE_SPORTIVE_PK PRIMARY KEY (act_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ADMIN
#------------------------------------------------------------

CREATE TABLE ADMIN(
        adm_id          Int  Auto_increment  NOT NULL ,
        adm_identifiant Varchar (72) NOT NULL ,
        adm_password    Varchar (72) NOT NULL ,
        adm_nom         Varchar (72) NOT NULL
	,CONSTRAINT ADMIN_PK PRIMARY KEY (adm_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: EVENEMENT_SORTIE
#------------------------------------------------------------

CREATE TABLE EVENEMENT_SORTIE(
        eve_id   Int  Auto_increment  NOT NULL ,
        eve_nom  Varchar (72) NOT NULL ,
        eve_date Date NOT NULL
	,CONSTRAINT EVENEMENT_SORTIE_PK PRIMARY KEY (eve_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: ENSEIGNANT
#------------------------------------------------------------

CREATE TABLE ENSEIGNANT(
        ens_id               Int  Auto_increment  NOT NULL ,
        ens_nom              Varchar (72) NOT NULL ,
        ens_prenom           Varchar (72) NOT NULL ,
        ens_matiere_enseigne Varchar (72) NOT NULL
	,CONSTRAINT ENSEIGNANT_PK PRIMARY KEY (ens_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: avoir
#------------------------------------------------------------

CREATE TABLE avoir(
        not_id Int NOT NULL ,
        etu_id Int NOT NULL
	,CONSTRAINT avoir_PK PRIMARY KEY (not_id,etu_id)

	,CONSTRAINT avoir_NOTES_FK FOREIGN KEY (not_id) REFERENCES NOTES(not_id)
	,CONSTRAINT avoir_ETUDIANT0_FK FOREIGN KEY (etu_id) REFERENCES ETUDIANT(etu_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: participer
#------------------------------------------------------------

CREATE TABLE participer(
        etu_id Int NOT NULL ,
        eve_id Int NOT NULL
	,CONSTRAINT participer_PK PRIMARY KEY (etu_id,eve_id)

	,CONSTRAINT participer_ETUDIANT_FK FOREIGN KEY (etu_id) REFERENCES ETUDIANT(etu_id)
	,CONSTRAINT participer_EVENEMENT_SORTIE0_FK FOREIGN KEY (eve_id) REFERENCES EVENEMENT_SORTIE(eve_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: pratiquer
#------------------------------------------------------------

CREATE TABLE pratiquer(
        act_id Int NOT NULL ,
        etu_id Int NOT NULL
	,CONSTRAINT pratiquer_PK PRIMARY KEY (act_id,etu_id)

	,CONSTRAINT pratiquer_ACTIVITE_SPORTIVE_FK FOREIGN KEY (act_id) REFERENCES ACTIVITE_SPORTIVE(act_id)
	,CONSTRAINT pratiquer_ETUDIANT0_FK FOREIGN KEY (etu_id) REFERENCES ETUDIANT(etu_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: gerer
#------------------------------------------------------------

CREATE TABLE gerer(
        adm_id Int NOT NULL ,
        com_id Int NOT NULL
	,CONSTRAINT gerer_PK PRIMARY KEY (adm_id,com_id)

	,CONSTRAINT gerer_ADMIN_FK FOREIGN KEY (adm_id) REFERENCES ADMIN(adm_id)
	,CONSTRAINT gerer_COMPTE_UTILISATEUR0_FK FOREIGN KEY (com_id) REFERENCES COMPTE_UTILISATEUR(com_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: donner
#------------------------------------------------------------

CREATE TABLE donner(
        ens_id Int NOT NULL ,
        not_id Int NOT NULL
	,CONSTRAINT donner_PK PRIMARY KEY (ens_id,not_id)

	,CONSTRAINT donner_ENSEIGNANT_FK FOREIGN KEY (ens_id) REFERENCES ENSEIGNANT(ens_id)
	,CONSTRAINT donner_NOTES0_FK FOREIGN KEY (not_id) REFERENCES NOTES(not_id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: enseigner
#------------------------------------------------------------

CREATE TABLE enseigner(
        ens_id Int NOT NULL ,
        act_id Int NOT NULL
	,CONSTRAINT enseigner_PK PRIMARY KEY (ens_id,act_id)

	,CONSTRAINT enseigner_ENSEIGNANT_FK FOREIGN KEY (ens_id) REFERENCES ENSEIGNANT(ens_id)
	,CONSTRAINT enseigner_ACTIVITE_SPORTIVE0_FK FOREIGN KEY (act_id) REFERENCES ACTIVITE_SPORTIVE(act_id)
)ENGINE=InnoDB;

