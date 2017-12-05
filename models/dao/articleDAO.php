<?php

require "/../../db/mysqlconnec.php";

class ArticleDAO {
	
	// public function getPosts() {
		
		
		// $listeIDs = array();
		// $db = SPDO::getInstance();
		
		// $req = $db->query("SET NAMES UTF8");
		// $req = $db->query("SELECT * FROM article ORDER BY date DESC");
		// print("Fetch all of the remaining row in the result set:\n");
		// $result = $req->fetchAll(\PDO::FETCH_ASSOC);
		
		// foreach($result as $data){
			// $listeIDs[] = $data['id'] . $data['titre'] . $data['auteur'] . $data['date'] . $data['contenu'];
			
			// $monArticle = new Article;
			// $monArticle->setTitle($data['titre']);
			// $monArticle->setDatepost($data['date']);
			// $monArticle->setAuthor($data['auteur']);
			// $monArticle->setContent($data['contenu']);
			
			// echo "L'article " . $monArticle->getTitle() . " date du " . $monArticle->getDatepost() . " de l'auteur " . $monArticle->getAuthor() . " contenant : " . $monArticle->getContent() . "<br>";
		// }
		// var_dump($listeIDs);
		
	// }
		
		
		

			
		
		public function getArticle($idArticle) {
	
		
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT * FROM article WHERE id = $idArticle ORDER BY date DESC");
			$result = $req->fetchAll(\PDO::FETCH_ASSOC);
			var_dump($result);
			
		}
	
		public function setArticle($title, $author, $date, $content) {
			
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT id FROM article WHERE titre = \"$title\" AND auteur = \"$author\" AND date = \"$date\" AND contenu = \"$content\"");
			$result = $req->fetchAll(\PDO::FETCH_ASSOC);
			var_dump($result);
		}
		
		public function get5Articles() {
		
			$artcl = new ArticleDAO;
			$listeIDs = array();
			
			$db = SPDO::getInstance();
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT id FROM article LIMIT 0,5");
			$result = $req->fetchAll(\PDO::FETCH_ASSOC);
			
			foreach($result as $data) {
				$listeIDs[] = $data['id'];
			}
			
			foreach($listeIDs as $idArticle){
				$art = $artcl->getArticle($idArticle);
			}
				
		}
		
	
	
}