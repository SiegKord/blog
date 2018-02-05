<?php
	
	require_once "/../models/dao/userDAO.php";
	
	$myDAO = new userDAO;
		
	if (session_status() == PHP_SESSION_NONE) {
    session_start();
	}
	
	
	if(empty($_SESSION['userID'])){
		if(isset($_POST['submit'])) {
			if(!empty($_POST['identifiant']) && !empty($_POST['mdp'])) {
				$connect = $myDAO->getConnect($_POST['identifiant'], $_POST['mdp']);
				if($connect == true) {
					header('Location: ../accueil.php');
				}
				else {
					echo "Une ou plusieurs informations sont incorrectes.";
				}
				
			}
			
		}
		else {
			echo "<form method='post' name='connexion' action=''>";
			echo "<p>Email : <input type='text' name='identifiant' /></p></br>";
			echo "<p>Mot de passe : <input type='text' name='mdp' /></p></br>";
			echo "<button value='submit' name='submit'>Se connecter</button>";
			echo "</form>";
		}
	}
	else {
		
	}
	
	
	
?>