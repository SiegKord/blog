<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Article créé</h1>
	
			<?php 
				require "/models/dao/ArticleDAO.php";
				
				echo "Votre titre d'article est <b>" . $_POST['titre'] . "</b>. L'auteur de l'article est <b>";
				if(empty($_POST['auteur'])) 
					echo "Anonyme";
				else
					echo $_POST['auteur'];
				
				echo "</b> et son contenu est : <b>" . $_POST['contenu'] . "</b>";
				
				$myDAO = new ArticleDAO;
				$created = new Article; 
				$created->setTitle($_POST['titre']);
				$created->setAuthor($_POST['auteur']);
				$created->setDatepost(date("Y-m-d H:i:s"));
				$created->setContent($_POST['contenu']);
				
				$myDAO->setArticle($created);
				
				
				

			?>
		
	</body>
</html>