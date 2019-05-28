DROP TABLE IF EXISTS estExpert;
DROP TABLE IF EXISTS aCours;
DROP TABLE IF EXISTS demande;
DROP TABLE IF EXISTS domaine_expertise;
DROP TABLE IF EXISTS personne;
DROP TABLE IF EXISTS cours;


create table if not exists personne(id_personne integer auto_increment primary key,
		  nom varchar(100),
		  prenom varchar(100),
		  login varchar(100),
		  mot_de_passe varchar(100),
		  type varchar(30)) 
	ENGINE=INNODB;

create table if not exists demande(id_demande integer auto_increment primary key,
		  id_cours_concerne integer DEFAULT null,
		  id_domaine_expertise integer DEFAULT null,
		  description varchar(300),
		  etat varchar(100),
		  duree integer DEFAULT null,
		  retour varchar(500) DEFAULT null,
		  nb_eleve_concerne integer DEFAULT null,
		  id_eleve integer DEFAULT null,
		  id_expert integer DEFAULT null)
	ENGINE=INNODB;

create table if not exists cours(id_cours integer auto_increment primary key,
		  nom_cours varchar(100))
	ENGINE=INNODB;

create table if not exists domaine_expertise(id_domaine integer auto_increment primary key,
		  nom_expertise varchar(100),
		  id_cours integer)
	ENGINE=INNODB;

create table if not exists aCours(id_aCours integer auto_increment primary key,
		  id_cours integer,
		  id_personne integer)
	ENGINE=INNODB;

create table if not exists estExpert(id_estExpert integer auto_increment primary key,
		  id_domaine integer,
		  id_expert integer)
	ENGINE=INNODB;


ALTER TABLE demande
ADD foreign KEY (id_eleve) references personne (id_personne),
ADD	foreign KEY (id_expert) references personne (id_personne);

ALTER TABLE domaine_expertise
ADD foreign KEY (id_cours) references cours (id_cours);

ALTER TABLE aCours
ADD foreign KEY (id_cours) references cours(id_cours),
ADD foreign KEY (id_personne) references personne(id_personne);

ALTER TABLE estExpert
ADD foreign KEY (id_domaine) references domaine_expertise(id_domaine),
ADD	foreign KEY (id_expert) references personne(id_personne);


INSERT INTO cours(nom_cours) VALUES ('ISOC631');
INSERT INTO cours(nom_cours) VALUES ('INFO641');
INSERT INTO cours(nom_cours) VALUES ('INFO642');
INSERT INTO cours(nom_cours) VALUES ('MATHS631');
INSERT INTO cours(nom_cours) VALUES ('INFO631');
INSERT INTO cours(nom_cours) VALUES ('INFO632');
INSERT INTO cours(nom_cours) VALUES ('MECA631');
INSERT INTO cours(nom_cours) VALUES ('ELEC631');

INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Gestion GitHub',(select c.id_cours from cours c where c.nom_cours like 'ISOC631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('BlockChain',(select c.id_cours from cours c where c.nom_cours like 'ISOC631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Php, CSS, Html',(select c.id_cours from cours c where c.nom_cours like 'INFO642'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Java et interfaces graphiques',(select c.id_cours from cours c where c.nom_cours like 'INFO641'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Python et utilisation API',(select c.id_cours from cours c where c.nom_cours like 'ISOC631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Statistiques et mathematiques generales',(select c.id_cours from cours c where c.nom_cours like 'MATHS631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Mathematiques logiques',(select c.id_cours from cours c where c.nom_cours like 'INFO631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Gestion base de donnees',(select c.id_cours from cours c where c.nom_cours like 'INFO642'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Mecanique des fluides',(select c.id_cours from cours c where c.nom_cours like 'MECA631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Mecanique des materiaux',(select c.id_cours from cours c where c.nom_cours like 'MECA631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Electricite',(select c.id_cours from cours c where c.nom_cours like 'ELEC631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Electronique',(select c.id_cours from cours c where c.nom_cours like 'ELEC631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Systeme d exploitation',(select c.id_cours from cours c where c.nom_cours like 'INFO632'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('C, C++',(select c.id_cours from cours c where c.nom_cours like 'INFO632'));

INSERT INTO personne(nom, prenom, login, mot_de_passe, type) VALUES ("Durant","Nicolas","NicolasDurant","mdp","expert");
INSERT INTO personne(nom, prenom, login, mot_de_passe, type) VALUES ("Dupont","Albert","AlbertDupont","mdp","expert");
INSERT INTO personne(nom, prenom, login, mot_de_passe, type) VALUES ("Petit","David","DavidPetit","mdp","etudiant");
INSERT INTO personne(nom, prenom, login, mot_de_passe, type) VALUES ("Nasri","Chiheb","ChihebNasri","mdp","etudiant");
INSERT INTO personne(nom, prenom, login, mot_de_passe, type) VALUES ("Burillon","William","WilliamBurillon","mdp","professeur");
INSERT INTO personne(nom, prenom, login, mot_de_passe, type) VALUES ("Mariton","Tanguy","TanguyMariton","mdp","professeur");

INSERT INTO aCours(id_cours,id_personne) VALUES (1,5);
INSERT INTO aCours(id_cours,id_personne) VALUES (6,6);
INSERT INTO aCours(id_cours,id_personne) VALUES (1,3);
INSERT INTO aCours(id_cours,id_personne) VALUES (6,3);
INSERT INTO aCours(id_cours,id_personne) VALUES (1,4);
INSERT INTO aCours(id_cours,id_personne) VALUES (6,4);

INSERT INTO estExpert(id_domaine,id_expert) VALUES (1,1);
INSERT INTO estExpert(id_domaine,id_expert) VALUES (14,2);

INSERT INTO demande(id_cours_concerne,id_domaine_expertise,description,etat,nb_eleve_concerne,id_eleve) VALUES (1,1,"besoin d aide","transmis",15,3);
INSERT INTO demande(id_cours_concerne,id_domaine_expertise,description,etat,nb_eleve_concerne,id_eleve,id_expert) VALUES (1,1,"besoin d aide","valide",12,4,1);






