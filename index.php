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
		
		$myDao = new ArticleDAO;	
		$article = $myDao->getArticle(5);
		echo "Le titre de cet article est : <b>" . $article->getTitle() . "</b>, son auteur est <b>" . $article->getAuthor() . "</b> publié le <b>" . $article->getDatepost() . "</b>. </br> Son contenu est : <b>" . $article->getContent() . "</b>";
		
		echo '<br><br><br>';
		echo "------------";
		echo '<br><br><br>';
		
		$idSearch = $myDao->setArticle("Coming-out", "Nann", "2017-11-16 13:25:34", "Je suis gay.");
		echo "L'article sélectionné est le numéro <b>" . $idSearch->getId() . "</b> créé depuis le lancement du blog.";
		
		echo '<br><br><br>';
		echo "------------";
		echo '<br><br><br>';
		
		$articles = $myDao->get5Articles();
		$i = 1;
		
		foreach($articles as $eachArt) {
			echo "<b>Article " . $i . ":</b></br>";
			echo "Titre : <b>" . $eachArt->getTitle() . "</b></br>";
			echo "Auteur : <b>" . $eachArt->getAuthor() . "</b></br>";
			echo "Date : <b>" . $eachArt->getDatepost() . "</b></br>";
			echo "Contenu : <b>" . $eachArt->getContent() . "</b></br></br>";
			$i++;
		}
		?>
		
		</div>
		
		
	</body>
</html>