use aquan1946540;

insert into users (email_user, password_user) values
('exemple@exemple.exemple', 'exemple'),
('gaetancorin@gmail.com', '1234'),
('mrpatate@gmail.com', '1234');


insert into aquariums (name_aquarium, id_user) values
('aquaexemple1', '1'),
('aquaexemple2', '1'),
('aquagaetan1', '2');

insert into comments_analysis (comment_analysis, date_analysis, id_aquarium) values
('Voici le premier commentaire de aquaexemple1', '2022-08-04', '1'),
('Voici le deuxième commentaire de aquaexemple1', '2022-08-05', '2'),
('Voici le troisième commentaire de aquaexemple1', '2022-08-06', '3');

insert into types_analysis (name_type_analysis, tutorial_how_testing_type_analysis, id_aquarium) values
('°C', 'Ceci est la température', '1'),
('K', 'Ceci est le potassium', '1'),
('NO3', 'Ceci est le nitrate', '1'),
('PO4', 'Ceci est le phosphate', '1'),
('Fe', 'Ceci est le Fer', '1'),
('NO2', 'Ceci est le nitrite', '1'),
('Chang eau', 'Ceci est le changement d\'eau', '1'),

('°C', 'Ceci est la température', '2'),
('K', 'Ceci est le potassium', '2'),
('NO3', 'Ceci est le nitrate', '2'),
('PO4', 'Ceci est le phosphate', '2'),
('Fe', 'Ceci est le Fer', '2'),
('NO2', 'Ceci est le nitrite', '2'),
('Chang eau', 'Ceci est le changement d\'eau', '2');

insert into values_types_analysis (value_type_analysis, date_analysis, id_type_analysis) values
('25', '2022-08-04', '1'),
('15', '2022-08-04', '2'),
('5', '2022-08-04', '3'),
('0.5', '2022-08-04', '4'),
('0.2', '2022-08-04', '5'),
('0.1', '2022-08-04', '6'),
('25', '2022-08-05', '7'),
('24', '2022-08-06', '1'),
('23', '2022-08-07', '1'),
('22', '2022-08-08', '1');

-- TABLE DE DONNEE POUR REMPLIR LES TYPES_ANALYSIS PAR DEFAULT A LA CREATION D'UN AQUARIUM

insert into default_types_analysis (name_type_analysis, tutorial_how_testing_type_analysis) values
('°C', 'Ceci est la température'),
('K', 'Ceci est le potassium'),
('NO3', 'Ceci est le nitrate'),
('PO4', 'Ceci est le phosphate'),
('Fe', 'Ceci est le Fer'),
('NO2', 'Ceci est le nitrite'),
('chang eau %', '');
