<?php

require "/../../db/mysqlconnec.php";
require_once "/../entities/article.php";

class ArticleDAO {
			
		
		public function getArticle($idArticle) {
	
		
			$myArticle = new Article;
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT * FROM article WHERE id = $idArticle ORDER BY date DESC");
			$resultArt = $req->fetch(\PDO::FETCH_ASSOC);
			var_dump($resultArt);
			$myArticle->setTitle($resultArt['titre']);
			$myArticle->setAuthor($resultArt['auteur']);
			$myArticle->setDatepost($resultArt['date']);
			$myArticle->setContent($resultArt['contenu']);
			
			return $myArticle;
			
		}
	
		public function setArticle($title, $author, $date, $content) {
			
			$myID = new Article;
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT id FROM article WHERE titre = \"$title\" AND auteur = \"$author\" AND date = \"$date\" AND contenu = \"$content\"");
			$resultID = $req->fetch(\PDO::FETCH_ASSOC);
			var_dump($resultID);
			$myID->setId($resultID['id']);
			
			return $myID;
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
				$artcl->getArticle($idArticle);
			}
			return $artcl;
				
		}
		
	
	
}