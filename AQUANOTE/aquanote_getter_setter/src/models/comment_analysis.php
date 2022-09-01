<?php
require_once('src/lib/database.php');

class CommentAnalysis{
	private string $id_comment_analysis;
	private string $comment_analysis;
	private string $date_analysis;
	private string $id_aquarium;

	public function get_id_comment_analysis() :string{
		return $this->id_comment_analysis;
	}
	public function get_comment_analysis() :string{
		return $this->comment_analysis;
	}
	public function get_date_analysis() :string{
		return $this->date_analysis;
	}
	public function get_id_aquarium() :string{
		return $this->id_aquarium;
	}
	public function set_id_comment_analysis(string $id_comment_analysis){
		$this->id_comment_analysis = $id_comment_analysis;
	}
	public function set_comment_analysis(string $comment_analysis){
		$this->comment_analysis = $comment_analysis;
	}
	public function set_date_analysis(string $date_analysis){
		$this->date_analysis = $date_analysis;
	}
	public function set_id_aquarium(string $id_aquarium){
		$this->id_aquarium = $id_aquarium;
	}
}

class CommentAnalysisRepository{

	private DatabaseConnection $connection;
	
	public function set_connection(DatabaseConnection $DatabaseConnection){
		$this->connection = $DatabaseConnection;
	}
	
	public function createCommentAnalysis(string $comment_analysis, string $date_analysis, string $id_aquarium) 
	{
		$statement = $this->connection->getConnection()->prepare(
			'INSERT INTO 
				comments_analysis(comment_analysis, date_analysis, id_aquarium) 
			VALUES
				(?, ?, ?)'
		);
		$statement->execute([$comment_analysis, $date_analysis, $id_aquarium]);
	}


    public function getCommentAnalysisByDateAnalysisAndIdAquarium(string $date_analysis, string $id_aquarium): ?CommentAnalysis
	{
        $statement = $this->connection->getConnection()->prepare(
            "SELECT 
				id_comment_analysis, comment_analysis, date_analysis, id_aquarium
			FROM comments_analysis
			WHERE date_analysis = ? and id_aquarium = ?"
        );
        $statement->execute([$date_analysis, $id_aquarium]);

		$row = $statement->fetch();
        if ($row === false) {
            return null;
        }

		$comment_analysis = new CommentAnalysis();
		$comment_analysis->set_id_comment_analysis($row['id_comment_analysis']);
		$comment_analysis->set_comment_analysis($row['comment_analysis']);
		$comment_analysis->set_date_analysis($row['date_analysis']);
		$comment_analysis->set_id_aquarium($row['id_aquarium']);

        return $comment_analysis;
    }


    public function updateCommentAnalysisByDateAnalysisAndIdAquarium( string $comment_analysis, string $date_analysis, string $id_aquarium)
    {
        
        $statement = $this->connection->getConnection()->prepare(
            'UPDATE 
				comments_analysis 
			SET 
                comment_analysis = ? 
			WHERE 
				date_analysis = ? AND id_aquarium = ?'
        );
        
        $statement->execute([$comment_analysis, $date_analysis, $id_aquarium]);
    }

    public function deleteCommentAnalysisByDateAnalysisAndIdAquarium(string $date_analysis, string $id_aquarium)
	{

		$statement = $this->connection->getConnection()->prepare(
			'DELETE FROM 
				comments_analysis
			WHERE
				date_analysis = ? AND id_aquarium = ?'
		);
		$statement->execute([$date_analysis, $id_aquarium]);
	}

	
}