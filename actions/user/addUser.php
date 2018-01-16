<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Formulaire de création d'utilisateur</h1>

		<?php
		
		require_once "/../../models/dao/userDAO.php";
		require_once "/../../models/entities/user.php";
		require "/../../controllers/Utils.php";
		
		$myDAO = new UserDAO;
		$created = new User;
		if(isset($_POST['submit'])) {
			if(!empty($_POST['pseudo']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['birthdate']) && !empty($_POST['email'])) {
				if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // vérification du format de l'adresse mail
					if($myDAO->verifPseudo($_POST['pseudo'])==0){
						if($myDAO->verifEmail($_POST['email'])==0){
							$created->setPseudo($_POST['pseudo']);
							$created->setMdp($_POST['mdp']);
							$created->setNom($_POST['nom']);
							$created->setPrenom($_POST['prenom']);
							$created->setBirthdate($_POST['birthdate']);
							$created->setEmail($_POST['email']);
						
							$newUser = $myDAO->setUser($created);
							echo "Votre utilisateur a été créé avec succès !";
						}
						else {
							echo "Cet email est déjà utilisé.";
						}
					}
					else {
						echo "Ce pseudo est déjà utilisé.";
					}
				}
				else {
					echo "L'adresse mail n'est pas valide";
				}
			}
			else {
				echo "<b>Tous les champs ne sont pas complétés.</b>";
			}
		}
		
		echo "<form method=\"post\" name=\"formulaire\" action=\"\">";
		
		echo "<p>Pseudo de l'utilisateur : <input type=\"text\" name=\"pseudo\" value=\"" . Utils::fillChampForm('pseudo') . "\"/></p>";
		echo "</br>";
		echo "<p>Mot de passe : <input type=\"text\" name=\"mdp\" value=\"" . Utils::fillChampForm('mdp') . "\"/></p>";
		echo "</br>";
		echo "<p>Nom de l'utilisateur : <input type=\"text\" name=\"nom\" value = \"" . Utils::fillChampForm('nom') . "\"/></p>";
		echo "</br>";
		echo "<p>Prenom de l'utilisateur : <input type=\"text\" name=\"prenom\" value=\"" . Utils::fillChampForm('prenom') . "\"/></p>";
		echo "<p>Date de naissance :<input type=\"date\" name=\"birthdate\" value=\"" . Utils::fillChampForm('birthdate') . "\"/></p>";
		echo "<p>Email : <input type=\"text\" name=\"email\" value=\"" . Utils::fillChampForm('email') . "\"/></p>";
		echo "<input type=\"submit\" name=\"submit\" value=\"Envoyer\"/>";
		echo "<input type=\"reset\" value=\"Effacer\" />";
		
		echo "</form>";
		echo "</br></br>";
		
		echo "<a href=\"../../gestionUser.php\"><b>GESTION UTILISATEURS</b></a>";
		
		?>
		
	</body>
</html>