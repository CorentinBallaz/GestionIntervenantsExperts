create table personne(id_personne integer auto_increment primary key,
		  nom varchar(30),
		  prenom varchar(30),
		  login varchar(30),
		  mot_de_passe varchar(30),
		  type varchar(30)) 
	TYPE=INNODB;

create table demande(id_demande integer auto_increment primary key,
		  cours_concerne varchar(30),
		  domaine_expertise varchar(30),
		  description varchar(200),
		  etat varchar(10),
		  duree integer DEFAULT null,
		  retour varchar(300) DEFAULT null,
		  groupe_concerne varchar(30),
		  eleve_concerne varchar(30))
	TYPE=INNODB;

create table cours(id_cours integer auto_increment primary key,
		  nom_cours varchar(30))
	TYPE=INNODB;

create table domaine_expertise(id_domaine integer auto_increment primary key,
		  nom_expertise varchar(30))
	TYPE=INNODB;

create table aCours(id_cours integer,
		  id_personne integer)
	TYPE=INNODB;

create table estExpert(id_domaine integer,
		  id_expert integer)
	TYPE=INNODB;


ALTER TABLE demande
ADD foreign KEY (id_eleve) references personne (id_personne),
ADD	foreign KEY (id_expert) references personne (id_personne);

ALTER TABLE aCours
ADD foreign KEY (id_cours) references cours(id_cours),
ADD foreign KEY (id_personne) references personne(id_personne);

ALTER TABLE estExpert
ADD foreign KEY (id_domaine) references domaine_expertise(id_domaine),
ADD	foreign KEY (id_expert) references personne(id_personne);

ALTER TABLE aCours
ADD primary KEY (id_cours,id_personne);

ALTER TABLE estExpert
ADD primary KEY (id_domaine,id_expert);



