<?php

require "/../../db/mysqlconnec.php";
require "/../entities/article.php";

class ArticleDAO {
			
		
		public function getArticle($idArticle) {
	
		
			$myArticle = new Article;
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT * FROM article WHERE id = $idArticle ORDER BY date DESC");
			$resultArt = $req->fetchAll(\PDO::FETCH_ASSOC);
			var_dump($resultArt);
			$myArticle.setTitle($resultArt['titre']);
			$myArticle.setAuthor($resultArt['auteur']);
			$myArticle.setDatepost($resultArt['date']);
			$myArticle.setContent($resultArt['contenu']);
			
			return $myArticle;
			
		}
	
		public function setArticle($title, $author, $date, $content) {
			
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT id FROM article WHERE titre = \"$title\" AND auteur = \"$author\" AND date = \"$date\" AND contenu = \"$content\"");
			$resultID = $req->fetchAll(\PDO::FETCH_ASSOC);
			var_dump($resultID);
			return $resultID;
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