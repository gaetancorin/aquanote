<?php
require_once('src/lib/database.php');

class CommentAnalysis{
	public string $id_comment_analysis;
	public string $comment_analysis;
	public string $date_analysis;
	public string $id_aquarium;
}

class CommentAnalysisRepository{

	public DatabaseConnection $connection;
	
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
		$comment_analysis->id_comment_analysis = $row['id_comment_analysis'];
		$comment_analysis->comment_analysis = $row['comment_analysis'];
		$comment_analysis->date_analysis = $row['date_analysis'];
		$comment_analysis->id_aquarium = $row['id_aquarium'];

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