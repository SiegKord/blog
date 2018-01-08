<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css"/>
		<title>Bienvenue sur mon Blog.</title>
	</head>
	
	<body>
	
		<h1>Blog des PD's</h1>
		<div id="blocgauche"></div>
		<div id="blocdroite"></div>
		<div id="center">
		
	
		<?php
		
			require "/models/dao/ArticleDAO.php";
		
			echo "L'id de l'article demandé est : " . $_GET['id'] . ".</br></br>";
			
			$myDAO = new articleDAO;
			$article = $myDAO->getArticle($_GET['id']);
			
			echo "Titre : " . $article->getTitle() . "</br>";
			echo "Auteur : " . $article->getAuthor() . "</br>";
			echo "Date : " . $article->getDatepost() . "</br>";
			echo "Contenu : " . $article->getContent() . "</br>";
			
		

		
		?>
		
		</div>
		
		
	</body>
</html>