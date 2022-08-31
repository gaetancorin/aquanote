use aquanote;

-- TABLE UTILISATEUR AQUARIUM COMMENTAIRE
select * from users
inner join aquariums on users.id_user = aquariums.id_user 
inner join comments_analysis on aquariums.id_aquarium = comments_analysis.id_aquarium;

-- TABLE UTILISATEUR AQUARIUM TYPE VALEUR
select * from users
inner join aquariums on users.id_user = aquariums.id_user 
inner join types_analysis on aquariums.id_aquarium = types_analysis.id_aquarium 
inner join values_types_analysis on types_analysis.id_type_analysis = values_types_analysis.id_type_analysis;

-- TABLE DEFAULTTYPESANALYSIS
select * from default_types_analysis;


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
