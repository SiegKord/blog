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
		
		echo "<a href=\"actions/addUser.php\"><b>Créer un utilisateur</b></a></br></br></br></br>";
		
		echo "---------------------------------------------</br>";
		echo "<u>Fonction getUser(\$idUser) :</u></br>";
		echo "<b>Utilisateur :</b></br>";
		echo $user->getPseudo() . "</br>" . $user->getNom() . $user->getPrenom() . "</br>";
		echo "Né le " . $user->getBirthdate() . "</br>";
		echo "Email : " . $user->getEmail() . "</br>";
		
		echo "---------------------------------------------</br></br>";
		
		$users = $myDAO->get5Users();
		$i = 1;
		
		echo "<u>Fonction get5Users(\$user) : </u></br>";
		
		foreach($users as $eachUser){
			echo "<b>Utilisateur " . $i . "</b></br>";
			echo $user->getPseudo() . "</br>" . $user->getNom() . $user->getPrenom() . "</br>";
			echo "Né le " . $user->getBirthdate() . "</br>";
			echo "Email : " . $user->getEmail() . "</br>";
			$i++;
		}

		?>
		
		</div>		
	</body>
</html>