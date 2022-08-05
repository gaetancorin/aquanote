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
-- TABLE UTILISATEUR AQUARIUM
-- select * from utilisateur inner join aquarium on utilisateur.id_utilisateur = aquarium.id_utilisateur;

-- TABLE UTILISATEUR AQUARIUM COMMENTAIRE-ANALYSES DATE-ANALYSE
-- select * from utilisateur 
-- inner join aquarium on utilisateur.id_utilisateur = aquarium.id_utilisateur 
-- inner join commentaire_analyses on commentaire_analyses.id_aquarium = aquarium.id_aquarium
-- inner join date_analyse on date_analyse.id_date_analyse = commentaire_analyses.id_date_analyse; 

-- TABLE UTILISATEUR AQUARIUM TYPE-ANALYSE VALEUR_ANALYSE DATE-ANALYSE
-- select * from utilisateur 
-- inner join aquarium on aquarium.id_utilisateur = utilisateur.id_utilisateur
-- inner join type_analyse on type_analyse.id_aquarium = aquarium.id_aquarium
-- inner join valeur_analyse on valeur_analyse.id_type_analyse = type_analyse.id_type_analyse
-- inner join date_analyse on date_analyse.id_date_analyse = valeur_analyse.id_date_analyse

-- TABLE UTILISATEUR AQUARIUM COMMENTAIRE-ANALYSE DATE-ANALYSE TYPE-ANALYSE VALEUR_ANALYSE
-- PROBLEME NE PREND QUE LORSQUE DATE DE VALEUR ANALYSE ET DATE DE COMMENTAIRE ANALYSE SONT LES MEMES, OUBLIE LES AUTRES
-- select * from utilisateur 
-- inner join aquarium on utilisateur.id_utilisateur = aquarium.id_utilisateur 
-- inner join commentaire_analyses on commentaire_analyses.id_aquarium = aquarium.id_aquarium
-- inner join date_analyse on date_analyse.id_date_analyse = commentaire_analyses.id_date_analyse
-- inner join type_analyse on type_analyse.id_aquarium = aquarium.id_aquarium
-- inner join valeur_analyse on valeur_analyse.id_type_analyse = type_analyse.id_type_analyse
-- and valeur_analyse.id_date_analyse = date_analyse.id_date_analyse;



-- D AUTRES EXEMPLES SUR DES EXERCICES
-- select * from ceinture;
-- select nom_judoka, prenom_judoka from judoka;
-- select * from judoka where sexe_judoka = 2;
-- select * from competition where date_debut_competition between "2021-01-01 00h00h00" and "2022-01-01 00h00h00";
-- select * from competition order by  date_debut_competition;
-- select * from judoka where prenom_judoka like "r%";
-- select nom_judoka, couleur_ceinture from judoka inner join ceinture on judoka.id_ceinture = ceinture.id_ceinture;
-- select prenom_judoka, couleur_ceinture from judoka inner join ceinture on judoka.id_ceinture = ceinture.id_ceinture where sexe_judoka = 1;
-- select date_naissance_judoka from judoka inner join ceinture on judoka.id_ceinture = ceinture.id_ceinture where couleur_ceinture = "rouge";
-- #select nom_judoka, prenom_judoka, nom_competition from inscrire inner join judoka, competition on inscrire.id_judoka = judoka.id_competition and inscrire.id_competition = competition.id_competition;

-- #select nom_judoka, prenom_judoka, nom_competition from judoka inner join inscrire on judoka.id_judoka = inscrire.id_judoka inner join competition on inscrire.id_competition = competition.id_competition;

-- select couleur_ceinture, nom_judoka, nom_competition from judoka inner join inscrire on judoka.id_judoka = inscrire.id_judoka inner join competition on inscrire.id_competition = competition.id_competition 
-- inner join ceinture on judoka.id_ceinture = ceinture.id_ceinture where date_debut_competition between "2021-11-03 00:00:00" and  "2021-11-04 00:00:00" ;
