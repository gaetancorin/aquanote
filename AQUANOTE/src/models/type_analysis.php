<?php
require_once('src/lib/database.php');
require_once('src/models/value_type_analysis.php');

class TypeAnalysis{
	private string $id_type_analysis;
	private string $name_type_analysis;
	private string $tutorial_how_testing_type_analysis;
	private string $id_aquarium;

	private ?ValueTypeAnalysis $value_type_analysis;

	public function get_id_type_analysis() :string{
		return $this->id_type_analysis;
	}
	public function get_name_type_analysis() :string{
		return $this->name_type_analysis;
	}
	public function get_tutorial_how_testing_type_analysis() :string{
		return $this->tutorial_how_testing_type_analysis;
	}
	public function get_id_aquarium() :string{
		return $this->id_aquarium;
	}
	public function get_value_type_analysis() :?ValueTypeAnalysis{
		return $this->value_type_analysis;
	}
	public function set_id_type_analysis(string $id_type_analysis){
		$this->id_type_analysis = $id_type_analysis;
	}
	public function set_name_type_analysis(string $name_type_analysis){
		$this->name_type_analysis = $name_type_analysis;
	}
	public function set_tutorial_how_testing_type_analysis(string $tutorial_how_testing_type_analysis){
		$this->tutorial_how_testing_type_analysis = $tutorial_how_testing_type_analysis;
	}
	public function set_id_aquarium(string $id_aquarium){
		$this->id_aquarium = $id_aquarium;
	}
	public function set_value_type_analysis(?ValueTypeAnalysis $value_type_analysis){
		$this->value_type_analysis = $value_type_analysis;
	}
}

class TypeAnalysisRepository{

	private Database $database;

	public function set_database(Database $database){
		$this->database = $database;
	}
	
	public function createTypeAnalysis(string $name_type_analysis, string $tutorial_how_testing_type_analysis, string $id_aquarium) 
	{
		$statement = $this->database->get_connection()->prepare(
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
		$statement = $this->database->get_connection()->query(
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

	public function getTypeAnalisysById(string $id_type_analysis): ?TypeAnalysis
	{
        $statement = $this->database->get_connection()->prepare(
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
		$type_analysis->set_id_type_analysis($row['id_type_analysis']);
		$type_analysis->set_name_type_analysis($row['name_type_analysis']);
		$type_analysis->set_tutorial_how_testing_type_analysis($row['tutorial_how_testing_type_analysis']);
		$type_analysis->set_id_aquarium($row['id_aquarium']);

        return $type_analysis;
    }


	public function getTypesAnalisysByIdAquarium(string $id_aquarium): array
	{
        $statement = $this->database->get_connection()->prepare(
            "SELECT 
				id_type_analysis, name_type_analysis, tutorial_how_testing_type_analysis, id_aquarium 
			FROM types_analysis 
			WHERE id_aquarium = ?"
        );
        $statement->execute([$id_aquarium]);

		$types_analysis = [];
		while (($row = $statement->fetch())){
			$type_analysis = new TypeAnalysis();
			$type_analysis->set_id_type_analysis($row['id_type_analysis']);
			$type_analysis->set_name_type_analysis($row['name_type_analysis']);
			$type_analysis->set_tutorial_how_testing_type_analysis($row['tutorial_how_testing_type_analysis']);
			$type_analysis->set_id_aquarium($row['id_aquarium']);
			$types_analysis[] = $type_analysis;
		}

        return $types_analysis;
    }

	public function getTypesAnalisysWithObjectValueIfExistByIdAquariumAndDate(string $id_aquarium, $date_analysis): array
	// récupère uniquement sur la date donnée les types d'analyses avec sa value_type_analysis en attribut
	{
		$valueTypeAnalysisRepository = new ValueTypeAnalysisRepository();
		$valueTypeAnalysisRepository->set_database($this->database); 

        $statement = $this->database->get_connection()->prepare(
            "SELECT 
				id_type_analysis, name_type_analysis, tutorial_how_testing_type_analysis, id_aquarium 
			FROM types_analysis 
			WHERE id_aquarium = ?"
        );
        $statement->execute([$id_aquarium]);

		$types_analysis = [];
		while (($row = $statement->fetch())){
			$type_analysis = new TypeAnalysis();
			$type_analysis->set_id_type_analysis($row['id_type_analysis']);
			$type_analysis->set_name_type_analysis($row['name_type_analysis']);
			$type_analysis->set_tutorial_how_testing_type_analysis($row['tutorial_how_testing_type_analysis']);
			$type_analysis->set_id_aquarium($row['id_aquarium']);

			$value_type_analysis = $valueTypeAnalysisRepository->getValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis($date_analysis, $type_analysis->get_id_type_analysis());
			
			$type_analysis->set_value_type_analysis($value_type_analysis);

			$types_analysis[] = $type_analysis;
		}

        return $types_analysis;
    }

	public function deleteTypeAnalysisById(string $id_type_analysis)
	{
        $statement = $this->database->get_connection()->prepare(
			'DELETE FROM 
				types_analysis
			WHERE
				id_type_analysis = ?'
        );
        $statement->execute([$id_type_analysis]);
    }
	
}