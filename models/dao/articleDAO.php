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
			$myArticle->setId($resultArt['id']);
			
			return $myArticle;
			
		}
	
		public function setArticle($article) {
			
			
			$myNewArticle = new  Article;
			$db = SPDO::getInstance();
			
			$req = $db->query("SET NAMES UTF8");
			$req = $db->exec("INSERT INTO article(`titre`, `auteur`, `date`, `contenu`) VALUES ('" . $article->getTitle() . "', '" . $article->getAuthor() . "', '" . $article->getDatepost() . "', '" . $article->getContent() . "');");
			var_dump($req);
			$last_ID = $db->lastInsertId();
			var_dump($last_ID);
			$myNewArticle->setId($last_ID);
			$myNewArticle->setTitle($article->getTitle());
			$myNewArticle->setAuthor($article->getAuthor());
			$myNewArticle->setDatepost($article->getDatepost());
			$myNewArticle->setContent($article->getContent());
			var_dump($myNewArticle);
			
			return $myNewArticle;
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
		
		public function getTitleDate($idPost) { // non utilisé
			
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
			$req = $db->query("SELECT id FROM article WHERE titre = '$title' AND auteur = '$author' AND contenu = '$content'");
			$resultreq = $req->fetch(\PDO::FETCH_ASSOC);
			
			$myIDfromArticle->setId($resultreq['id']);
			$id = $myIDfromArticle->getId();
			
			return $id;
		
		}
	
		public function dateToString($date, $lang = "fr") {
		
			$timestamp = strtotime($date);
			setlocale(LC_TIME, $lang);
			
			$day = strftime("%A %d %B %Y", $timestamp); // jour, mois et année
			$hour = strftime("%H", $timestamp); // heure
			$min = strftime("%M", $timestamp); // minutes
			
			$stringDate = $day . " à " . $hour . "h" . $min . ".";
			
			return $stringDate;

		
		}
		
}