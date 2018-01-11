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
			$myDAO->deleteArticle($_GET['id']);
			
			header('Location: accueil.php');
			
		?>
		
	</body>
</html>

