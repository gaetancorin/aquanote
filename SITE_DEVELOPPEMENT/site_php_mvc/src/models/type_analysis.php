<?php
require_once('src/lib/database.php');

class TypeAnalysis{
	public string $id_type_analysis;
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

	public function getTypesAnalisysByIdAquarium(string $id_aquarium): array
	{
        $statement = $this->connection->getConnection()->prepare(
            "SELECT 
				id_type_analysis, name_type_analysis, tutorial_how_testing_type_analysis, id_aquarium 
			FROM types_analysis 
			WHERE id_aquarium = ?"
        );
        $statement->execute([$id_aquarium]);

		$types_analysis = [];
		while (($row = $statement->fetch())){
			$type_analysis = new TypeAnalysis();
			$type_analysis->id_type_analysis = $row['id_type_analysis'];
			$type_analysis->name_type_analysis = $row['name_type_analysis'];
			$type_analysis->tutorial_how_testing_type_analysis = $row['tutorial_how_testing_type_analysis'];
			$type_analysis->id_aquarium = $row['id_aquarium'];
			$types_analysis[] = $type_analysis;
		}

        return $types_analysis;
    }

	
}