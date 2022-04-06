#base de donnee fu fil rouge vide
drop database bdd_fil_rouge;
create database bdd_fil_rouge;
use bdd_fil_rouge;

CREATE TABLE Utilisateur (
    id_Utilisateur INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email_utilisateur VARCHAR(50) NOT NULL,
    mdp_utilisateur VARCHAR(50) NOT NULL);

CREATE TABLE Aquarium (
    id_Aquarium INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_aquarium VARCHAR(25) NOT NULL);
alter table Aquarium 
add column id_Utilisateur int(20) not null,
add constraint foreign key (id_Utilisateur) references Utilisateur (id_Utilisateur);

CREATE TABLE Donnee_nom (
    id_Donnee_nom BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_donnee_nom VARCHAR(15) NOT NULL);
alter table Donnee_nom
add column id_Aquarium int(20) not null,
add constraint foreign key (id_Aquarium) references Aquarium (id_Aquarium);

CREATE TABLE Donnee_date (
    id_Donnee_date BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    donnee_date DATE NOT NULL);
alter table Donnee_date 
add column id_Aquarium int(20) not null,
add constraint foreign key (id_Aquarium) references Aquarium (id_Aquarium);

CREATE TABLE Donnee_releve (
    id_Donnee_releve BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_donnee_releve VARCHAR(15) NOT NULL,
    donnee_releve INT(20) NOT NULL);
alter table Donnee_releve
add column id_Donnee_date bigint(20) not null,
add constraint foreign key (id_Donnee_date) references Donnee_date (id_Donnee_date);

CREATE TABLE Donnee_note (
    id_Donnee_note BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    donnee_note VARCHAR(200) NOT NULL
);
alter table Donnee_note
add column id_Donnee_date bigint(20) not null,
add constraint foreign key (id_Donnee_date) references Donnee_date (id_Donnee_date);