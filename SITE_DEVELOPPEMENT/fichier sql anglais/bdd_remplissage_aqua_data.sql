use aquarium_data;

insert into user (email_user, password_user) values
('exemple@exemple.exemple', 'exemple'),
('gaetancorin@gmail.com', '1234'),
('mrpatate@gmail.com', '1234');


insert into aquarium (name_aquarium, id_user) values
('aquaexemple1', '1'),
('aquaexemple2', '1'),
('aquagaetan1', '2');

insert into date_analysis (date_analysis) values
('2022-08-04'),
('2022-08-05'),
('2022-08-06'),
('2022-08-07'),
('2022-08-08'),
('2022-08-09');

insert into comment_analysis (comment_analysis, id_aquarium, id_date_analysis) values
('Voici le premier commentaire de aquaexemple1', '1', '1'),
('Voici le deuxième commentaire de aquaexemple1', '1', '2'),
('Voici le troisième commentaire de aquaexemple1', '1', '3');

insert into type_analysis (type_analysis, id_aquarium, explain_type_analysis) values
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

insert into value_type_analysis (value_type_analysis, id_type_analysis, id_date_analysis) values
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

