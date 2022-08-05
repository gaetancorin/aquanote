-- base de donnee du fil rouge vide
drop database aquarium_data;
create database aquarium_data;
use aquarium_data;

CREATE TABLE user (
    id_user INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email_user VARCHAR(50) NOT NULL,
    password_user VARCHAR(50) NOT NULL);

CREATE TABLE aquarium (
    id_aquarium INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name_aquarium VARCHAR(25) NOT NULL);
alter table aquarium 
add column id_user INT(20) not null,
add constraint foreign key (id_user) references user (id_user);

CREATE TABLE date_analysis (
    id_date_analysis INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date_analysis DATE NOT NULL);

CREATE TABLE comment_analysis (
    id_comment_analysis BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    comment_analysis VARCHAR(200) NOT NULL);
alter table comment_analysis
add column id_aquarium INT(20) not null,
add constraint foreign key (id_aquarium) references aquarium (id_aquarium),
add column id_date_analysis INT(20) not null,
add constraint foreign key (id_date_analysis) references date_analysis (id_date_analysis);

CREATE TABLE type_analysis (
    id_type_analysis INT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type_analysis VARCHAR(15) NOT NULL,
    explain_type_analysis VARCHAR(500) );
alter table type_analysis
add column id_aquarium INT(20) not null,
add constraint foreign key (id_aquarium) references aquarium (id_aquarium);

CREATE TABLE value_type_analysis (
    id_value_type_analysis BIGINT(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    value_type_analysis DECIMAL(4,1) NOT NULL);
alter table value_type_analysis
add column id_type_analysis INT(20) not null,
add constraint foreign key (id_type_analysis) references type_analysis (id_type_analysis),
add column id_date_analysis INT(20) not null,
add constraint foreign key (id_date_analysis) references date_analysis (id_date_analysis);