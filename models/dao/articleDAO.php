<?php

require "/../../db/mysqlconnec.php";

class ArticleDAO {
	
	public function getPosts() {
		
		
		$listeIDs = array();
		$listePosts = array();
		$db = SPDO::getInstance();
		
		$req = $db->query("SET NAMES UTF8");
		$req = $db->query("SELECT * FROM article ORDER BY date DESC");
		$req->execute();
		print("Fetch all of the remaining row in the result set:\n");
		$result = $req->fetchAll(\PDO::FETCH_ASSOC);
		
		foreach($result as $data){
			$listeIDs[] = $data['id'] . $data['titre'] . $data['auteur'] . $data['date'] . $data['contenu'];
			
			$monArticle = new Article;
			$monArticle->setTitle($data['titre']);
			$monArticle->setDatepost($data['date']);
			$monArticle->setAuthor($data['auteur']);
			$monArticle->setContent($data['contenu']);
			
			echo "L'article " . $monArticle->getTitle() . " date du " . $monArticle->getDatepost() . " de l'auteur " . $monArticle->getAuthor() . " contenant : " . $monArticle->getContent() . "<br>";
		}
		var_dump($listeIDs);
		
		
		
		
		

			
	}	
		
	
}