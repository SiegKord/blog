<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Formulaire de création d'article</h1>
	
		<form method="post" action="traitement.php" name="formulaire">
		
			<p>Nom de l'article : <input type="text" name="titre" /></p>
			</br>
			<p>Nom de l'auteur (peut être laissé vide) : <input type="text" name="auteur" /></p>
			</br>
			<p>Tapez votre article : <textarea name="contenu">
			</textarea></p>
			<input type="submit" value="Envoyer"/>		
			<input type="reset" value="Effacer" />
		
		</form>
		
		
	</body>
</html>