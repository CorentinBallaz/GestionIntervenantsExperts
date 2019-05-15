create table if not exists personne(id_personne integer auto_increment primary key,
		  nom varchar(30),
		  prenom varchar(30),
		  login varchar(30),
		  mot_de_passe varchar(30),
		  type varchar(30)) 
	ENGINE=INNODB;

create table if not exists demande(id_demande integer auto_increment primary key,
		  cours_concerne varchar(30),
		  domaine_expertise varchar(30),
		  description varchar(200),
		  etat varchar(10),
		  duree integer DEFAULT null,
		  retour varchar(300) DEFAULT null,
		  groupe_concerne varchar(30),
		  eleve_concerne varchar(30),
		  id_eleve integer DEFAULT null,
		  id_expert integer DEFAULT null)
	ENGINE=INNODB;

create table if not exists cours(id_cours integer auto_increment primary key,
		  nom_cours varchar(30))
	ENGINE=INNODB;

create table if not exists domaine_expertise(id_domaine integer auto_increment primary key,
		  nom_expertise varchar(30),
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
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Statistiques et mathématiques générales',(select c.id_cours from cours c where c.nom_cours like 'MATHS631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Mathématiques logiques',(select c.id_cours from cours c where c.nom_cours like 'INFO631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Gestion base de données',(select c.id_cours from cours c where c.nom_cours like 'INFO642'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Mécanique des fluides',(select c.id_cours from cours c where c.nom_cours like 'MECA631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Mécanique des matériaux',(select c.id_cours from cours c where c.nom_cours like 'MECA631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Electricité',(select c.id_cours from cours c where c.nom_cours like 'ELEC631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Electronique',(select c.id_cours from cours c where c.nom_cours like 'ELEC631'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('Système d exploitation',(select c.id_cours from cours c where c.nom_cours like 'INFO632'));
INSERT INTO domaine_expertise(nom_expertise,id_cours) VALUES ('C, C++',(select c.id_cours from cours c where c.nom_cours like 'INFO632'));




