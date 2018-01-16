<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<?php 
		
		require_once "/../models/dao/userDAO.php";
		require_once "/../models/entities/user.php";
		
		$myDAO = new UserDAO;
		$created = new User;
			
			
		if(!empty($_POST['pseudo']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['birthdate']) && !empty($_POST['email'])) {
			$created->setPseudo($_POST['pseudo']);
			$created->setNom($_POST['nom']);
			$created->setPrenom($_POST['prenom']);
			$created->setBirthdate($_POST['birthdate']);
			$created->setEmail($_POST['email']);
				
			$newUser = $myDAO->setUser($created);
			echo "Votre utilisateur a été créé avec succès !";
		}
		else {
			echo "<b>Tous les champs ne sont pas complétés. Veuillez revenir au <a href=\"addUser.php\">formulaire</a></b>";
		}		

			?>
		
	</body>
</html>