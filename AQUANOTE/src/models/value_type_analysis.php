<?php
require_once('src/lib/database.php');

class ValueTypeAnalysis{
	private string $id_value_type_analysis;
	private string $value_type_analysis;
	private string $date_analysis;
	private string $id_type_analysis;

	public function get_id_value_type_analysis() :string{
		return $this->id_value_type_analysis;
	}
	public function get_value_type_analysis() :string{
		return $this->value_type_analysis;
	}
	public function get_date_analysis() :string{
		return $this->date_analysis;
	}
	public function get_id_type_analysis() :string{
		return $this->id_type_analysis;
	}
	public function set_id_value_type_analysis(string $id_value_type_analysis){
		$this->id_value_type_analysis = $id_value_type_analysis;
	}
	public function set_value_type_analysis(string $value_type_analysis){
		$this->value_type_analysis = $value_type_analysis;
	}
	public function set_date_analysis(string $date_analysis){
		$this->date_analysis = $date_analysis;
	}
	public function set_id_type_analysis(string $id_type_analysis){
		$this->id_type_analysis = $id_type_analysis;
	}
}

class ValueTypeAnalysisRepository{

	private Database $database;

	public function set_database(Database $database){
		$this->database = $database;
	}
	
	public function createValueTypeAnalysis(string $value_type_analysis, string $date_analysis, string $id_type_analysis) 
	{
		$statement = $this->database->get_connection()->prepare(
			'INSERT INTO 
				values_types_analysis(value_type_analysis, date_analysis, id_type_analysis) 
			VALUES
				(? ,?, ?)'
		);
		$statement->execute([$value_type_analysis, $date_analysis, $id_type_analysis]);
	}

	public function getValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis(string $date_analysis, string $id_type_analysis): ?ValueTypeAnalysis
	{
        $statement = $this->database->get_connection()->prepare(
            "SELECT 
				id_value_type_analysis, value_type_analysis, date_analysis, id_type_analysis
			FROM values_types_analysis 
			WHERE date_analysis = ? and id_type_analysis = ?"
        );
        $statement->execute([$date_analysis, $id_type_analysis]);

		$row = $statement->fetch();
        if ($row === false) {
            return null;
        }

		$value_type_analysis = new ValueTypeAnalysis();
		$value_type_analysis->set_id_value_type_analysis($row['id_value_type_analysis']);
		$value_type_analysis->set_value_type_analysis($row['value_type_analysis']);
		$value_type_analysis->set_date_analysis($row['date_analysis']);
		$value_type_analysis->set_id_type_analysis($row['id_type_analysis']);

        return $value_type_analysis;
    }


	public function updateValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis( string $value_type_analysis, string $date_analysis, string $id_type_analysis)
    {
        $statement = $this->database->get_connection()->prepare(
            'UPDATE 
				values_types_analysis 
			SET 
				value_type_analysis = ? 
			WHERE 
				date_analysis = ? AND id_type_analysis = ?'
        );
        $statement->execute([$value_type_analysis, $date_analysis, $id_type_analysis]);
    }

	public function deleteValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis(string $date_analysis, string $id_type_analysis)
	{

		$statement = $this->database->get_connection()->prepare(
			'DELETE FROM 
				values_types_analysis
			WHERE
				date_analysis = ?
			AND
				id_type_analysis = ?'
		);
		$statement->execute([$date_analysis, $id_type_analysis]);
	}

	
}