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
		  nom_expertise varchar(30))
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

ALTER TABLE aCours
ADD foreign KEY (id_cours) references cours(id_cours),
ADD foreign KEY (id_personne) references personne(id_personne);

ALTER TABLE estExpert
ADD foreign KEY (id_domaine) references domaine_expertise(id_domaine),
ADD	foreign KEY (id_expert) references personne(id_personne);



INSERT INTO domaine_expertise(nom_expertise) VALUES ('Gestion GitHub');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('BlockChain');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Php, CSS, Html');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Java et interfaces graphiques');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Python et utilisation API');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Statistiques et mathématiques générales');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Mathématiques logiques');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Gestion base de données');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Mécanique des fluides');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Mécanique des matériaux');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Electricité');
INSERT INTO domaine_expertise(nom_expertise) VALUES ('Electronique');



