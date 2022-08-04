-- base de donnee du fil rouge vide
-- drop database bdd_fil_rouge;
create database bdd_fil_rouge;
use bdd_fil_rouge;

CREATE TABLE utilisateur (
    id_utilisateur INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email_utilisateur VARCHAR(50) NOT NULL,
    mdp_utilisateur VARCHAR(50) NOT NULL);

CREATE TABLE aquarium (
    id_aquarium INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_aquarium VARCHAR(25) NOT NULL);
alter table aquarium 
add column id_utilisateur int(20) not null,
add constraint foreign key (id_utilisateur) references utilisateur (id_utilisateur);

CREATE TABLE donnee_nom (
    id_donnee_nom BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_donnee_nom VARCHAR(15) NOT NULL);
alter table donnee_nom
add column id_aquarium int(20) not null,
add constraint foreign key (id_aquarium) references aquarium (id_aquarium);

CREATE TABLE donnee_date (
    id_donnee_date BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    donnee_date DATE NOT NULL);
alter table donnee_date 
add column id_aquarium int(20) not null,
add constraint foreign key (id_aquarium) references aquarium (id_aquarium);

CREATE TABLE donnee_releve (
    id_donnee_releve BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_donnee_releve VARCHAR(15) NOT NULL,
    donnee_releve INT(20) NOT NULL);
alter table donnee_releve
add column id_donnee_date bigint(20) not null,
add constraint foreign key (id_donnee_date) references donnee_date (id_donnee_date);

CREATE TABLE donnee_note (
    id_donnee_note BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    donnee_note VARCHAR(200) NOT NULL
);
alter table donnee_note
add column id_donnee_date bigint(20) not null,
add constraint foreign key (id_donnee_date) references donnee_date (id_donnee_date);