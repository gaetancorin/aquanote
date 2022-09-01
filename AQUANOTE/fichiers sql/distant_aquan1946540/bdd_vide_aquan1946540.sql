-- base de donnee du fil rouge vide
-- drop database aquanote;
-- create database aquanote;
use aquan1946540;
drop table comments_analysis, values_types_analysis, types_analysis, default_types_analysis, aquariums, users;

CREATE TABLE users (
    id_user INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email_user VARCHAR(255) NOT NULL,
    password_user VARCHAR(255) NOT NULL);

CREATE TABLE aquariums (
    id_aquarium INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name_aquarium VARCHAR(25) NOT NULL);
alter table aquariums 
add column id_user INT not null,
add constraint foreign key (id_user) references users (id_user) ON DELETE CASCADE;

CREATE TABLE comments_analysis (
    id_comment_analysis BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comment_analysis VARCHAR(200) NOT NULL,
    date_analysis DATE NOT NULL);
alter table comments_analysis
add column id_aquarium INT not null,
add constraint foreign key (id_aquarium) references aquariums (id_aquarium) ON DELETE CASCADE;

CREATE TABLE types_analysis (
    id_type_analysis INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name_type_analysis VARCHAR(15) NOT NULL,
    tutorial_how_testing_type_analysis TEXT);
alter table types_analysis
add column id_aquarium INT not null,
add constraint foreign key (id_aquarium) references aquariums (id_aquarium) ON DELETE CASCADE;

CREATE TABLE values_types_analysis (
    id_value_type_analysis BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    value_type_analysis DECIMAL(4,1) NOT NULL,
    date_analysis DATE NOT NULL);
alter table values_types_analysis
add column id_type_analysis INT not null,
add constraint foreign key (id_type_analysis) references types_analysis (id_type_analysis) ON DELETE CASCADE;

-- TABLE DE DONNEE POUR REMPLIR LES TYPES_ANALYSIS PAR DEFAULT A LA CREATION D'UN AQUARIUM

CREATE TABLE default_types_analysis (
    id_default_type_analysis INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name_type_analysis VARCHAR(15) NOT NULL,
    tutorial_how_testing_type_analysis TEXT);