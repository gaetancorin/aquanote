-- base de donnee du fil rouge vide
drop database aquarium_data;
create database aquarium_data;
use aquarium_data;

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

CREATE TABLE analysis_comments (
    id_analysis_comment BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    analysis_comment VARCHAR(200) NOT NULL,
    date_analysis_comment DATE NOT NULL);
alter table analysis_comments
add column id_aquarium INT not null,
add constraint foreign key (id_aquarium) references aquariums (id_aquarium) ON DELETE CASCADE;

CREATE TABLE analysis_types (
    id_analysis_type INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    analysis_type VARCHAR(15) NOT NULL,
    explain_analysis_type TEXT);
alter table analysis_types
add column id_aquarium INT not null,
add constraint foreign key (id_aquarium) references aquariums (id_aquarium) ON DELETE CASCADE;

CREATE TABLE analysis_types_values (
    id_analysis_type_value BIGINT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    analysis_type_value DECIMAL(4,1) NOT NULL,
    date_analysis_type_value DATE NOT NULL);
alter table analysis_types_values
add column id_analysis_type INT not null,
add constraint foreign key (id_analysis_type) references analysis_types (id_analysis_type) ON DELETE CASCADE;