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
		require "/../../controllers/Utils.php";
		
		$myDAO = new UserDAO;
			
		$user = $myDAO->getUser($_GET['id']);

		if(isset($_POST['submit'])) {
			if(!empty($_POST['pseudoModified']) && !empty($_POST['emailModified']) && !empty($_POST['mdpModified'])) {
				$user->setPseudo($_POST['pseudoModified']);
				$user->setMdp($_POST['mdpModified']);
				$user->setEmail($_POST['emailModified']);
				$myDAO->setUser($user);
				echo "Les changements ont bien été effectué, veuillez retourner au gestionnaire <a href=\"../../gestionUser.php\">ICI</a>.";
			
				}
				else {
					echo "Un ou plusieurs champs sont manquants, veuillez resaisir les informations.";
				}
			}
			
			echo "<h2>Veuillez modifier les informations :</h2></br></br>";
			
			echo "<form method=\"post\" name=\"modifyUser\" action=\"\"";
			echo "<p>Pseudo : <input type=\"text\" name=\"pseudoModified\" value=\"" . $user->getPseudo() . "\"/></p></br>";
			echo "<p>Mot de passe : <input type=\"text\" name=\"mdpModified\" value=\"" . $user->getMdp() . "\"/></p></br>";
			echo "<p>Email : <input type=\"text\" name=\"emailModified\" value =\"" . $user->getEmail() . "\"/></p></br>";
			echo "<input type=\"submit\" name = \"submit\" value=\"Valider\"/>";
			echo "</form></br></br>";
			
		
		?>
		
	</body>
</html>