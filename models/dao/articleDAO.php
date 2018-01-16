<?php

require_once "/../../db/SPDO.php";
require_once "/../entities/article.php";
require_once "/../../controllers/Utils.php";

class ArticleDAO {
			

		public function getArticle($idArticle) {

			$myArticle = new Article;
			$db = SPDO::getInstance();
	
			$req = $db->query("SELECT * FROM article WHERE id = $idArticle");
			$resultArt = $req->fetch(\PDO::FETCH_ASSOC);
			$myArticle->setTitle($resultArt['titre']);
			$myArticle->setAuthor($resultArt['auteur']);
			$myArticle->setDatepost($resultArt['date']);
			$myArticle->setDateEdit($resultArt['dateEdit']);
			$myArticle->setContent($resultArt['contenu']);
			$myArticle->setId($resultArt['id']);
			
			return $myArticle;

		}

		public function setArticle($article) { //contient la fonction pour créer un nouvel article et pour modifier un article

			$db = SPDO::getInstance();

			if($article->getId()!=null) {
				$article->setDateEdit(time());

				$req = $db->exec("UPDATE article SET titre ='" . $article->getTitle() . "', dateEdit = " . $article->getDateEdit() . ", contenu ='" . $article->getContent() . "' WHERE id = '" . $article->getId() . "'");

			}
			else {
			$req = $db->exec("INSERT INTO article(`titre`, `auteur`, `date`, `contenu`) VALUES ('" . $article->getTitle() . "', '" . $article->getAuthor() . "', '" . $article->getDatepost() . "', '" . $article->getContent() . "');");
			
			$last_ID = $db->lastInsertId();
			$article->setId($last_ID);
			$article->setTitle($article->getTitle());
			$article->setContent($article->getContent());
			}

			$article->setAuthor($article->getAuthor());
			$article->setDatepost($article->getDatepost());
			
			
			
			return $article;
		}
		
		public function get5Articles() {
		
			$artcl = new ArticleDAO;
			$listeIDs = [];
			$article = [];
			
			$db = SPDO::getInstance();
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
			$req = $db->query("SELECT titre, date FROM article WHERE id = '$idPost'");
			$resultreq = $req->fetch(\PDO::FETCH_ASSOC);
			
			$myTitleDate->setTitle($resultreq['titre']);
			$myTitleDate->setDatepost($resultreq['date']);
			
			return $myTitleDate;
		}

		public function getIdfromArticle($title, $author, $content){
		
			$myIDfromArticle = new Article;
			$db = SPDO::getInstance();
			
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
		
		public function deleteArticle($idArticle){
		
			$db = SPDO::getInstance();
			
			$req = $db->exec("DELETE FROM article WHERE id = $idArticle");
			
		}
}