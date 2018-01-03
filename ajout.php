<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Formulaire de création d'article</h1>
	
		<form method="post" name="formulaire" action="traitement.php">
		
			<p>Nom de l'article : <input type="text" name="titre" /></p>
			</br>
			<p>Nom de l'auteur (peut être laissé vide) : <input type="text" name="auteur" /></p>
			</br>
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
		
		require "/models/dao/ArticleDAO.php";
		
		$myDAO = new ArticleDAO;
		$titleDate = new Article;
		$titleDate = $myDAO->getTitleDate(5);
		
		$date = $titleDate->getDatepost();
		
		$timestamp = strtotime($date);
		setlocale(LC_TIME, "fr");
		
		echo "La date de l'article " . $titleDate->getTitle() . " est le " . strftime("%A %d %B %Y", $timestamp); // Affichage de la date
		echo " à " . strftime("%H", $timestamp) . "h" . strftime("%M", $timestamp);

		?>
		
	</body>
</html>