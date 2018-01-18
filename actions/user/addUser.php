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
		// if(isset($_POST['submit'])) {
			// if(!empty($_POST['pseudo']) && !empty($_POST['nom']) && !empty($_POST['mdp']) && !empty($_POST['prenom']) && !empty($_POST['birthdate']) && !empty($_POST['email'])) {
				// if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // vérification du format de l'adresse mail
					// if(!$myDAO->alreadyUsedPseudo($_POST['pseudo'])){
						// if(!$myDAO->alreadyUsedEmail($_POST['email'])){
							// $created->setPseudo($_POST['pseudo']);
							// $created->setMdp($_POST['mdp']);
							// $created->setNom($_POST['nom']);
							// $created->setPrenom($_POST['prenom']);
							// $created->setBirthdate($_POST['birthdate']);
							// $created->setEmail($_POST['email']);
						
							// $newUser = $myDAO->setUser($created);
							// echo "Votre utilisateur a été créé avec succès !";
						// }
						// else {
							// echo "Cet email est déjà utilisé.";
						// }
					// }
					// else {
						// echo "Ce pseudo est déjà utilisé.";
					// }
				// }
				// else {
					// echo "L'adresse mail n'est pas valide";
				// }
			// }
			// else {
				// echo "<b>Tous les champs ne sont pas complétés.</b>";
			// }
		// }
		
		if(isset($_POST['submit'])) {
			if(empty($_POST['pseudo']) || empty($_POST['mdp']) || empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['birthdate']) || empty($_POST['email'])) {
				echo "Un des champs du formulaire est vide.</br>";
				$error = true;
			}
			if(isset($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
				echo "L'adresse mail n'est pas valide</br>";
				$error = true;
			}
			if($myDAO->alreadyUsedPseudo($_POST['pseudo'])){
				echo "Ce pseudo est déjà utilisé.</br>";
				$error = true;
			}
			if($myDAO->alreadyUsedEmail($_POST['email'])){
				echo "Cet email est déjà utilisé.</br>";
				$error = true;
			}
			if($error == false) {
				$created->setPseudo($_POST['pseudo']);
				$created->setMdp($_POST['mdp']);
				$created->setNom($_POST['nom']);
				$created->setPrenom($_POST['prenom']);
				$created->setBirthdate($_POST['birthdate']);
				$created->setEmail($_POST['email']);
						
				$newUser = $myDAO->setUser($created);
				echo "Votre utilisateur a été créé avec succès !</br>";
			}
		}
		
		echo "<form method=\"post\" name=\"formulaire\" action=\"\">";
		
		echo "<p>Pseudo de l'utilisateur : <input type=\"text\" name=\"pseudo\"></p>";
		echo "</br>";
		echo "<p>Mot de passe : <input type=\"text\" name=\"mdp\"></p>";
		echo "</br>";
		echo "<p>Nom de l'utilisateur : <input type=\"text\" name=\"nom\"></p>";
		echo "</br>";
		echo "<p>Prenom de l'utilisateur : <input type=\"text\" name=\"prenom\"></p>";
		echo "<p>Date de naissance :<input type=\"date\" name=\"birthdate\"></p>";
		echo "<p>Email : <input type=\"text\" name=\"email\"></p>";
		echo "<input type=\"submit\" name=\"submit\" value=\"Envoyer\"/>";
		echo "<input type=\"reset\" value=\"Effacer\" />";
		
		echo "</form>";
		echo "</br></br>";
		
		echo "<a href=\"../../gestionUser.php\"><b>GESTION UTILISATEURS</b></a>";
		
		?>
		
	</body>
</html>