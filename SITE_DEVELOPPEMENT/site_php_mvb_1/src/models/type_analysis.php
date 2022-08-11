<?php
require_once('src/lib/database.php');

class TypeAnalysis{

	public string $name_type_analysis;
	public string $tutorial_how_testing_type_analysis;
	public string $id_aquarium;
}

class TypeAnalysisRepository{

	public DatabaseConnection $connection;
	
	public function createTypeAnalysis(string $name_type_analysis, string $tutorial_how_testing_type_analysis, string $id_aquarium) 
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO 
				types_analysis(name_type_analysis, tutorial_how_testing_type_analysis, id_aquarium) 
			VALUES
				(?, ?, ?)'
		);
		$statement->execute([$name_type_analysis, $tutorial_how_testing_type_analysis, $id_aquarium]);
	}

	public function createDefaultTypesAnalysis(string $id_aquarium) 
	{
		// récupérer les types d'analyses par défaut 
		$statement = $this->connection->getConnection()->query(
			"SELECT 
				*
			 FROM default_types_analysis"
		);

		while (($row = $statement->fetch())) {
            $name_type_analysis = $row['name_type_analysis'];
            $tutorial_how_testing_type_analysis = $row['tutorial_how_testing_type_analysis'];
			$id_aquarium = $id_aquarium;

			//créer les types d'analyses
			$this->createTypeAnalysis( $name_type_analysis, $tutorial_how_testing_type_analysis, $id_aquarium);
        }
	}

	
}