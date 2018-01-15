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
		require_once "/controllers/Utils.php";
		
		$myDao = new ArticleDAO;	
		$article = $myDao->getArticle(5);
		
		echo "Le titre de cet article est : <b>" . $article->getTitle() . "</b>, son auteur est <b>" . $article->getAuthor() . "</b> publié le <b>" . $article->getDatepost() . "</b>. </br> Son contenu est : <b>" . $article->getContent() . "</b>";
		
		echo '<br><br><br>';
		echo "------------";
		echo '<br><br><br>';
		
		echo "<a href= 'ajout.php'>Créer un article</a></br></br>";
		
		
		$articles = $myDao->get5Articles();
		$i = 1;
		
		foreach($articles as $eachArt) {
			echo "<b>Article " . $i . ":</b></br>";
			echo "Titre : <b> <a href='showArticle.php?id=" . $eachArt->getId() . "'>" . $eachArt->getTitle() . "</a></b></br>";
			echo "Date : <b>" . $eachArt->getDatepost() . "</b></br>";
			if($eachArt->getDateEdit())
				echo "Edité le : " . Utils::getDateTime("Europe/Paris", $eachArt->getDateEdit()) . ".</br>";
			echo "<form method=\"post\" name=\"edit\" action=\"edit.php?id=" . $eachArt->getId() . "\">";
			echo "<input type=\"submit\" value=\"Modifier\"/>";	
			echo "</form>";
			echo "<a href = 'delete.php?id=" . $eachArt->getId() . "'>Supprimer l'article</a></br></br>";
			$i++;
			
		}

		?>
		
		<script type="text/javascript">		
			// function deleteArticle(){
					// if(confirm("Voulez-vous vraiment supprimer cet article?")){
					// }
			// }
		</script>	
		
		
		</div>
		
		
	</body>
</html>