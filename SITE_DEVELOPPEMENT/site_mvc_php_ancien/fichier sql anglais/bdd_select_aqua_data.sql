use aquarium_data;

-- TABLE UTILISATEUR AQUARIUM COMMENTAIRE-ANALYSES DATE-ANALYSE
select * from user 
inner join aquarium on user.id_user = aquarium.id_user 
inner join comment_analysis on comment_analysis.id_aquarium = aquarium.id_aquarium
inner join date_analysis on date_analysis.id_date_analysis = comment_analysis.id_date_analysis; 

-- TABLE UTILISATEUR AQUARIUM TYPE-ANALYSE VALEUR_ANALYSE  DATE-ANALYSE
select * from user
inner join aquarium on user.id_user = aquarium.id_user 
inner join type_analysis on type_analysis.id_aquarium = aquarium.id_aquarium
inner join value_type_analysis on value_type_analysis.id_type_analysis = type_analysis.id_type_analysis
inner join date_analysis on date_analysis.id_date_analysis = value_type_analysis.id_date_analysis;


-- EXEMPLE DE REQUETE SUR LA BDD

-- TABLE UTILISATEuR
-- select * from utilisateur;