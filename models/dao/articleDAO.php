<?php

require "/../../db/mysqlconnec.php";
require_once "/../entities/article.php";

class ArticleDAO {
			
		
		public function getArticle($idArticle) {
	
		
			$myArticle = new Article;
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT * FROM article WHERE id = $idArticle");
			$resultArt = $req->fetch(\PDO::FETCH_ASSOC);
			$myArticle->setTitle($resultArt['titre']);
			$myArticle->setAuthor($resultArt['auteur']);
			$myArticle->setDatepost($resultArt['date']);
			$myArticle->setContent($resultArt['contenu']);
			
			return $myArticle;
			
		}
	
		public function setArticle($article) {
			
			
			$myID = new  Article;
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->exec("INSERT INTO article(`titre`, `auteur`, `date`, `contenu`) VALUES ('" . $article->getTitle() . "', '" . $article->getAuthor() . "', '" . $article->getDatepost() . "', '" . $article->getContent() . "');");
			
		}
		
		public function get5Articles() {
		
			$artcl = new ArticleDAO;
			$listeIDs = [];
			$article = [];
			
			$db = SPDO::getInstance();
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT id FROM article ORDER BY date DESC LIMIT 0,5");
			$result = $req->fetchAll(\PDO::FETCH_ASSOC);
			foreach($result as $data) {
				$listeIDs[] = $data['id'];
			}
			foreach($listeIDs as $idArticle){
				$article[] = $artcl->getArticle($idArticle);
				
				
			}
			return $article; //retourne un tableau contenant chaque article
			
						
				
		}
		
		
		public function getTitleDate($idPost) {
			
			$myTitleDate = new Article;
			
			$db = SPDO::getInstance();
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT titre, date FROM article WHERE id = '$idPost'");
			$resultreq = $req->fetch(\PDO::FETCH_ASSOC);
			
			$myTitleDate->setTitle($resultreq['titre']);
			$myTitleDate->setDatepost($resultreq['date']);
			
			return $myTitleDate;
		}

		public function getIdfromArticle($title, $author, $content){
		
			$myIDfromArticle = new Article;
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->query("SELECT id FROM article WHERE titre = $title AND auteur = $author AND contenu = $content");
			$resultreq = $req->fetch(\PDO::FETCH_ASSOC);
			
			$myIDfromArticle->setId($resultreq['id']);
			$id = $myIDfromArticle->getId();
			
			return $id;
		
		}
	
	
}