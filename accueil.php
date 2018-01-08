<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel="stylesheet" href="css/style.css"/>
		<title>Bienvenue sur mon Blog.</title>
	</head>
	
	<body>
	
		<h1>Blog des PD's</h1>
		<div id="blocgauche"></div>
		<div id="blocdroite"></div>
		<div id="center">
		
	
		<?php
		
		require "/models/dao/ArticleDAO.php";
		
		echo "<form method=\"get\" name=\"edit\" action=\"edit.php\">";
		echo "<input type=\"submit\" value=\"Modifier\"/>";
		echo "</form></br></br>";
		

		?>
		
		</div>
		
		
	</body>
</html>