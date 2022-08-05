use bdd_fil_rouge;

insert into utilisateur (email_utilisateur, mdp_utilisateur) values
('exemple@exemple.exemple', 'exemple'),
('gaetancorin@gmail.com', '1234'),
('mrpatate@gmail.com', '1234');


insert into aquarium (nom_aquarium, id_utilisateur) values
('aquaexemple1', '1'),
('aquaexemple2', '1'),
('aquagaetan1', '2');

insert into date_analyse (date_analyse) values
('2022-08-04'),
('2022-08-05'),
('2022-08-06'),
('2022-08-07'),
('2022-08-08'),
('2022-08-09');

insert into commentaire_analyses (commentaire_analyses, id_aquarium, id_date_analyse) values
('Voici le premier commentaire de aquaexemple1', '1', '1'),
('Voici le deuxième commentaire de aquaexemple1', '1', '2'),
('Voici le troisième commentaire de aquaexemple1', '1', '3');

insert into type_analyse (type_analyse, id_aquarium, explication_type_analyse) values
('°C', '1', 'Ceci est la température'),
('K', '1', 'Ceci est le potassium'),
('NO3', '1', 'Ceci est le nitrate'),
('PO4', '1', 'Ceci est le phosphate'),
('Fe', '1', 'Ceci est le Fer'),
('NO2', '1', 'Ceci est le nitrite'),
('Chang eau', '1', 'Ceci est le changement d\'eau'),

('°C', '2', 'Ceci est la température'),
('K', '2', 'Ceci est le potassium'),
('NO3', '2', 'Ceci est le nitrate'),
('PO4', '2', 'Ceci est le phosphate'),
('Fe', '2', 'Ceci est le Fer'),
('NO2', '2', 'Ceci est le nitrite'),
('Chang eau', '2', 'Ceci est le changement d\'eau');

insert into valeur_analyse (valeur_analyse, id_type_analyse, id_date_analyse) values
('25', '1', '1'),
('15', '2', '1'),
('5', '3', '1'),
('0.5', '4', '1'),
('0.2', '5', '1'),
('0.1', '6', '1'),
('25', '7', '2'),
('24', '1', '3'),
('23', '1', '4'),
('22', '1', '5');

