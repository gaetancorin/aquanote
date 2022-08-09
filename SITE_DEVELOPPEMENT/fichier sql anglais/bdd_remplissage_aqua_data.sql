use aquarium_data;

insert into users (email_user, password_user) values
('exemple@exemple.exemple', 'exemple'),
('gaetancorin@gmail.com', '1234'),
('mrpatate@gmail.com', '1234');


insert into aquariums (name_aquarium, id_user) values
('aquaexemple1', '1'),
('aquaexemple2', '1'),
('aquagaetan1', '2');

insert into analysis_comments (analysis_comment, date_analysis_comment, id_aquarium) values
('Voici le premier commentaire de aquaexemple1', '2022-08-04', '1'),
('Voici le deuxième commentaire de aquaexemple1', '2022-08-05', '2'),
('Voici le troisième commentaire de aquaexemple1', '2022-08-06', '3');

insert into analysis_types (analysis_type, explain_analysis_type, id_aquarium) values
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

insert into analysis_types_values (analysis_type_value, date_analysis_type_value, id_analysis_type) values
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

