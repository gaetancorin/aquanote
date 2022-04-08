use bdd_fil_rouge;

select * from utilisateur;
select * from utilisateur inner join aquarium on utilisateur.id_utilisateur = aquarium.id_utilisateur;
select * from aquarium inner join donnee_nom on aquarium.id_aquarium = donnee_nom.id_aquarium;
select * from donnee_releve;
select * from donnee_note;
select donnee_note.donnee_note, donnee_date.donnee_date from donnee_note inner join donnee_date on donnee_note.id_donnee_date = donnee_date.id_donnee_date;
select donnee_note.donnee_note, donnee_date.donnee_date, donnee_releve.donnee_releve from donnee_note inner join donnee_date on donnee_note.id_donnee_date = donnee_date.id_donnee_date 
inner join donnee_releve on donnee_releve.id_donnee_date = donnee_date.id_donnee_date;


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
