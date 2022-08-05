-- base de donnee du fil rouge vide
drop database bdd_fil_rouge;
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
add column id_utilisateur INT(20) not null,
add constraint foreign key (id_utilisateur) references utilisateur (id_utilisateur);

CREATE TABLE type_analyse (
    id_type_analyse INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type_analyse VARCHAR(15) NOT NULL,
    explication_type_analyse VARCHAR(500) );
alter table type_analyse
add column id_aquarium INT(20) not null,
add constraint foreign key (id_aquarium) references aquarium (id_aquarium);

CREATE TABLE date_analyse (
    id_date_analyse INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date_analyse DATE NOT NULL);

CREATE TABLE commentaire_analyses (
    id_commentaire_analyses BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    commentaire_analyses VARCHAR(200) NOT NULL);
alter table commentaire_analyses
add column id_aquarium INT(20) not null,
add constraint foreign key (id_aquarium) references aquarium (id_aquarium),
add column id_date_analyse INT(20) not null,
add constraint foreign key (id_date_analyse) references date_analyse (id_date_analyse);

CREATE TABLE valeur_analyse (
    id_valeur_analyse BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    valeur_analyse DECIMAL(4,1) NOT NULL);
alter table valeur_analyse
add column id_type_analyse INT(20) not null,
add constraint foreign key (id_type_analyse) references type_analyse (id_type_analyse),
add column id_date_analyse INT(20) not null,
add constraint foreign key (id_date_analyse) references date_analyse (id_date_analyse);