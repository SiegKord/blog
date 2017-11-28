<?php

require "/../../db/mysqlconnec.php";

class ArticleDAO {
	
	public function getPosts() {
		
		SPDO::getInstance();
		$listeIDs = array();
		
		$req = SPDO::query("SELECT id FROM article ORDER BY date DESC");
		
		while($dat = mysql_fetch_assoc($req)){
			$listeIDs[] = $dat['id'];
		}
		
		
		$mesPosts = new Article;
		$mesPosts = array();
		
		foreach($idArticle as $listeIDs){
			while($data = mysql_fetch_assoc($monArticle)){
			$mesPosts[] = $data['id']['titre']['auteur']['date']['contenu'];
			}
			
			return $mesPosts;
			
		}
	}	
		
	public function getArticleByID($idArticle) {
		
		$monArticle = new Article;
		;
		$monArticle = query("SELECT * FROM article WHERE id = idArticle");
		
		return monArticle;
	}
	
}