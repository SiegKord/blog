<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Formulaire de création d'article</h1>
		
		<?php
		
			require_once "../../models/dao/userDAO.php";
			
			$myDAO = new userDAO;
			$myUsers = $myDAO->getAllUsers();
			$i;
		?>
	
		<form method="post" name="formulaire" action="traitement.php">
		
			<p>Nom de l'article : <input type="text" name="titre" /></p>
			</br>
			<label for="auteur">Identifiant de l'auteur : </label></br>
			<select name="auteur">
				<?php
					foreach($myUsers as $eachUser){
						echo "<option value='" . $eachUser->getId() . "'>" . $eachUser->getPseudo() . "</option>";
						$i++;
					}				
				?>
			</select>
			<p>Tapez votre article : <textarea name="contenu">
			</textarea></p>
			<input type="submit" value="Envoyer" onClick="NoAuthor(); return false;"/>		
			<input type="reset" value="Effacer" />		
		</form>
		</br>
		<script type="text/javascript">		
			function NoAuthor(){
				if (typeOf($_POST['auteur'])=='undefined' or !$_POST['auteur']) {
					if (confirm("Vous n'avez pas renseigné le champ \"auteur\", voulez-vous publier l'article anonymement ?")){
						formulaire.submit();
					}
				}
			}
		</script>	
		
		
		<?php	
			echo "<a href=\"../../accueil.php\"><b>Retour à l'accueil</b></a>";
		?>
		
	</body>
</html>