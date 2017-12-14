<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Article créé</h1>
	
			<?php 
				if(empty($_POST['auteur']))
					$_POST['auteur'] = "Anonyme";
				
				echo "Votre titre d'article est <b>" . $_POST['titre'] . "</b>. L'auteur de l'article est <b>" . $_POST['auteur'] . "</b> et son contenu est : <b>" . $_POST['contenu'] . "</b>";
			?>
		
	</body>
</html>