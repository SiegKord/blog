<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Modification d'utilisateur</h1>

		<?php
		
		require_once "/../../models/dao/userDAO.php";
		require_once "/../../models/entities/user.php";
		
		$myDAO = new userDAO;

		$nbArticle = $myDAO->nbArticle($_GET['id']);
		
		echo "Nombre : " . $nbArticle . ".";
		
		?>
		
	</body>
</html>