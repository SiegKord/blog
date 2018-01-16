<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css"/>
		<title>Bienvenue sur mon Blog.</title>
	</head>
	
	<body>
	
		<h1>Gestion utilisateur</h1>
		<div id="blocgauche"></div>
		<div id="blocdroite"></div>
		<div id="center">
		
	
		<?php
		
		require_once "/models/dao/userDAO.php";
				
		$myDAO = new UserDAO;
		$user = $myDAO->getUser(1);
		
		echo "<a href=\"actions/user/addUser.php\"><b>Créer un utilisateur</b></a></br></br>";
		echo "<a href=\"accueil.php\"><b>Retour à l'accueil</b></a></br></br>";
		
		echo "---------------------------------------------</br>";
		echo "<u>Fonction getUser(\$idUser = 1) :</u></br>";
		echo "<b>Utilisateur :</b></br>";
		echo $user->getPseudo() . "</br>" . $user->getNom() . $user->getPrenom() . "</br>";
		echo "Mot de passe : " . $user->getMdp() . "</br>";
		echo "Né le " . $user->getBirthdate() . "</br>";
		echo "Email : " . $user->getEmail() . "</br>";
		
		echo "---------------------------------------------</br></br>";
		
		$users = $myDAO->get5Users();
		$i = 1;
		
		echo "<u>Fonction get5Users(\$user) : </u></br>";
		
		foreach($users as $eachUser){
			echo "<b>Utilisateur " . $i . "</b></br>";
			echo "Pseudo : " . $eachUser->getPseudo() . "</br>Identité : " . $eachUser->getNom() . " " . $eachUser->getPrenom() . "</br>";
			echo "Mot de passe : " . $eachUser->getMdp() . "</br>";
			echo "Né le " . $eachUser->getBirthdate() . "</br>";
			echo "Email : " . $eachUser->getEmail() . "</br>";
			echo "<form method=\"post\" name=\"modifyUser\" action=\"actions/user/modifyUser.php?id=" . $eachUser->getId() . "\">";
			echo "<input type=\"submit\" value=\"Modifier l'utilisateur\"/>";	
			echo "</form>";
			echo "<a href=\"actions/user/deleteUser.php?id=" . $eachUser->getId() . "\">Supprimer l'utilisateur</a></br>";
		
			$i++;
		}

		?>
		
		</div>		
	</body>
</html>