<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>

	<body>

		<h1>Suppression</h1>


		<?php	

			require_once "../../models/dao/ArticleDAO.php";

			$myDAO = new ArticleDAO;
			$myDAO->deleteArticle($_GET['id']);

			header('Location: ../../accueil.php');

		?>

	</body>
</html>

