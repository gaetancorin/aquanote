<?php
require_once('src/lib/database.php');

class ValueTypeAnalysis{
	public string $id_value_type_analysis;
	public string $value_type_analysis;
	public string $date_analysis;
	public string $id_type_analysis;
}

class ValueTypeAnalysisRepository{

	public DatabaseConnection $connection;
	
	public function createValueTypeAnalysis(string $value_type_analysis, string $date_analysis, string $id_type_analysis) 
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO 
				values_types_analysis(value_type_analysis, date_analysis, id_type_analysis) 
			VALUES
				(? ,?, ?)'
		);
		$statement->execute([$value_type_analysis, $date_analysis, $id_type_analysis]);
	}

	public function getValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis(string $date_analysis, string $id_type_analysis): ?ValueTypeAnalysis
	{
        $statement = $this->connection->getConnection()->prepare(
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
		$value_type_analysis->id_value_type_analysis = $row['id_value_type_analysis'];
		$value_type_analysis->value_type_analysis = $row['value_type_analysis'];
		$value_type_analysis->date_analysis = $row['date_analysis'];
		$value_type_analysis->id_type_analysis = $row['id_type_analysis'];

        return $value_type_analysis;
    }


	public function updateValueTypeAnalysisByDateAnalysisAndIdTypeAnalysis( string $value_type_analysis, string $date_analysis, string $id_type_analysis)
    {
        $statement = $this->connection->getConnection()->prepare(
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

		$statement = $this->connection->getConnection()->prepare(
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