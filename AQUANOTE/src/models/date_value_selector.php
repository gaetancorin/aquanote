<?php
require_once('src/lib/database.php');
require_once('src/models/type_analysis.php');

class DateValuesSelector{
	private string $date_where_are_values;
	private array $all_types_analysis_with_value_if_exist;

	public function get_date_where_are_values() :string{
		return $this->date_where_are_values;
	}
	public function get_all_types_analysis_with_value_if_exist() :array{
		return $this->all_types_analysis_with_value_if_exist;
	}
	public function set_date_where_are_values(string $date_where_are_values){
		$this->date_where_are_values = $date_where_are_values;
	}
	public function set_all_types_analysis_with_value_if_exist(array $all_types_analysis_with_value_if_exist){
		$this->all_types_analysis_with_value_if_exist = $all_types_analysis_with_value_if_exist;
	}

}

class DateValuesSelectorRepository{

	private Database $database;
	private array $dates_where_are_values;

	public function set_database(Database $database){
		$this->database = $database;
	}
	public function get_dates_where_are_values() :array{
		return $this->dates_where_are_values;
	}
	public function set_dates_where_are_values(array $dates_where_are_values){
		$this->dates_where_are_values = $dates_where_are_values;
	}

	public function getAllDatesWhereAreValuesTypesAnalysisByIdAquarium(string $id_aquarium)
	{
		$statement = $this->database->get_connection()->prepare(
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

        $this->set_dates_where_are_values($datesSelectAll);

	}

	public function DoListOfDatesContainsArrayTypesAnalysisObjectsWithValue(string $id_aquarium) :array
	{ // crée une liste d'objets 'DateValuesSelector'. Ces objets contiennent une date ainsi que un tableau des instances de tous les types d'analyses'. Chaque instance de type d'analyse contient une instance de 'value_type_analysis' pour la date si la donnée existe;  

		$datesWithValues = [];
		foreach($this->get_dates_where_are_values() as $date){
			// récupère la date dans l'attribut de l'encapsulation(déjà remplis au préalable)
			$dateWithValues = new DateValuesSelector();
			$dateWithValues->set_date_where_are_values($date);

			// récupère tous les types de valeurs avec les objets 'value_type_analysis' pour la date si la donnée existe'
			$typeAnalysisRepository = new TypeAnalysisRepository();
			$typeAnalysisRepository->set_database($this->database);

			$TypesAnalisysWithValueOject = $typeAnalysisRepository->getTypesAnalisysWithObjectValueIfExistByIdAquariumAndDate($id_aquarium, $date);

			$dateWithValues->set_all_types_analysis_with_value_if_exist($TypesAnalisysWithValueOject);


			$datesWithValues[] = $dateWithValues;
		}
		return $datesWithValues;
	}
	
	
}