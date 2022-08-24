<?php
require_once('src/lib/database.php');
require_once('src/models/type_analysis.php');

class DateValuesSelector{
	public string $date_where_are_value;
	public array $all_types_analysis_with_value_if_exist;

}

class DateValuesSelectorRepository{

	public DatabaseConnection $connection;
	public array $dates_where_are_values;

	public function getAllDatesWhereAreValuesTypesAnalysisByIdAquarium(string $id_aquarium)
	{
		$statement = $this->connection->getConnection()->prepare(
			'SELECT 
				date_analysis from values_types_analysis
			inner join 
				types_analysis on values_types_analysis.id_type_analysis = types_analysis.id_type_analysis
			inner join 
				aquariums on types_analysis.id_aquarium = aquariums.id_aquarium
			where 
				aquariums.id_aquarium = ?
			GROUP BY date_analysis
			ORDER BY date_analysis DESC'
		);
		$statement->execute([$id_aquarium]);

		$datesSelectAll = [];
		while (($row = $statement->fetch())){
			$dateSelect = $row['date_analysis'];
			$datesSelectAll[] = $dateSelect;
		}

        $this->dates_where_are_values = $datesSelectAll;

	}

	public function DoListOfDatesContainsArrayTypesAnalysisObjectsWithValue(string $id_aquarium)
	{ // crée une liste d'objets 'DateValuesSelector'. Ses objets contiennent une date ainsi que un tableau des instances de tous les types de valeurs. Chaque instance contient une instance de 'value_type_analysis' pour la date si la donnée existe;  

		$datesWithValues = [];
		foreach($this->dates_where_are_values as $date){
			// récupère la date dans l'attribut de l'encapsulation(déjà remplis au préalable)
			$dateWithValues = new DateValuesSelector();
			$dateWithValues->date_where_are_values = $date;

			// récupère tous les types de valeurs avec les objets 'value_type_analysis' pour la date si la donnée existe'
			$typeAnalysisRepository = new TypeAnalysisRepository();
			$typeAnalysisRepository->connection = $this->connection;

			$TypesAnalisysWithValueOject = $typeAnalysisRepository->getTypesAnalisysWithObjectValueIfExistByIdAquariumAndDate( $id_aquarium, $date);

			$dateWithValues->all_types_analysis_with_value_if_exist = $TypesAnalisysWithValueOject;


			$datesWithValues[] = $dateWithValues;
		}
		return $datesWithValues;
	}
	
	
}