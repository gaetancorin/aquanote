<?php
require_once('src/lib/database.php');
require_once('src/models/value_type_analysis.php');

class TypeAnalysis{
	public string $id_type_analysis;
	public string $name_type_analysis;
	public string $tutorial_how_testing_type_analysis;
	public string $id_aquarium;

	public ?ValueTypeAnalysis $value_type_analysis;
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

	public function getTypesAnalisysByIdAquariumWithObjectValue(string $id_aquarium, $date_analysis): array
	{
		$valueTypeAnalysisRepository = new ValueTypeAnalysisRepository();
		$valueTypeAnalysisRepository->connection = $this->connection;

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

			$value_type_analysis = $valueTypeAnalysisRepository->getValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis($date_analysis, $type_analysis->id_type_analysis);
			
			$type_analysis->value_type_analysis = $value_type_analysis;

			$types_analysis[] = $type_analysis;
		}

        return $types_analysis;
    }


	public function getTypeAnalisysById(string $id_type_analysis): ?TypeAnalysis
	{
        $statement = $this->connection->getConnection()->prepare(
            "SELECT 
				id_type_analysis, name_type_analysis, tutorial_how_testing_type_analysis, id_aquarium 
			FROM types_analysis 
			WHERE id_type_analysis = ?"
        );
        $statement->execute([$id_type_analysis]);

		$row = $statement->fetch();
        if ($row === false) {
            return null;
        }

		$type_analysis = new TypeAnalysis();
		$type_analysis->id_type_analysis = $row['id_type_analysis'];
		$type_analysis->name_type_analysis = $row['name_type_analysis'];
		$type_analysis->tutorial_how_testing_type_analysis = $row['tutorial_how_testing_type_analysis'];
		$type_analysis->id_aquarium = $row['id_aquarium'];

        return $type_analysis;
    }
	
}