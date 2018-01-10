<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Modification</h1>
		
		
		<?php	
		
			require "/models/dao/ArticleDAO.php";
		
			if(empty($_POST['titleModified']) || empty($_POST['contentModified']))
				echo "Un ou plusieurs champs sont manquants, veuillez resaisir les informations en cliquant <a href=edit.php?id=\"" . $_GET['id'] . "\">ICI</a></br>";
				
			
		?>
		
	</body>
</html>