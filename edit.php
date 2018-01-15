<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Modification</h1>
		
		
		<?php	
		
			require "/models/dao/ArticleDAO.php";
		
			$myDAO = new ArticleDAO;
			
			$article = $myDAO->getArticle($_GET['id']);

				
			echo "<h2>Veuillez modifier les informations :</h2></br></br>";
			
			echo "<form method=\"post\" name=\"modify\" action=\"\"";
			echo "<p>Nom de l'article : <input type=\"text\" name=\"titleModified\" value=\"" . $article->getTitle() . "\"/></p></br>";
			echo "<p>Contenu de l'article : <textarea name=\"contentModified\">" . $article->getContent() . "</textarea></p></br>";
			echo "<input type=\"submit\" name = \"submit\" value=\"Valider\"/>";
			echo "</form></br></br>";
			if(isset($_POST['submit'])) {
				if(!empty($_POST['titleModified']) && !empty($_POST['contentModified'])) {
					$article->setTitle($_POST['titleModified']);
					$article->setContent($_POST['contentModified']);
					$myDAO->setArticle($article);
					echo "Les changements ont bien été effectué, veuillez retourner à l'accueil <a href=\"accueil.php\">ICI</a>.";
				
				}
				else {
					echo "Un ou plusieurs champs sont manquants, veuillez resaisir les informations.";
				}
			}
			
		
		?>
		
	</body>
</html>