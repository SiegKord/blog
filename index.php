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
		
		require "/includes/conf.php";
		require "/models/dao/ArticleDAO.php";
		require "/models/entities/article.php";
		

		
		$myDao = new ArticleDAO;
		
			
		$article = $myDao->getArticle(5);
		
		echo '<br><br><br>';
		
		$idSearch = $myDao->setArticle("Coming-out", "Nann", "2017-11-16 13:25:34", "Je suis gay.");

		echo '<br><br><br>';
		
		$articles = $myDao->get5Articles();	
		
		?>
		
		</div>
		
		
	</body>
</html>