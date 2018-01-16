<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>

	<body>

		<h1>Suppression d'utilisateur</h1>


		<?php	

			require_once "../../models/dao/UserDAO.php";

			$myDAO = new UserDAO;
			$myDAO->deleteUser($_GET['id']);

			header('Location: ../../gestionUser.php');

		?>

	</body>
</html>

