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
		
			require "/article.php";
			require "/includes/conf.php";
		
			$monArticle = new Article;
			$monArticle->setTitle("Voyage en haute mer");
			$monArticle->setDatepost(date('11/24/2017'));
			$monArticle->setAuthor("Nicolas");
			$monArticle->setContent("J'ai trouvé ça assez plaisant de me balader en haute mer avec mes amis");
			
			echo "L'article " . $monArticle->getTitle() . " date du " . $monArticle->getDatepost() . " de l'auteur " . $monArticle->getAuthor() . " contenant : " . $monArticle->getContent();
			
			
			
			
			$connect = new mysqli($servername, $username, $password, $dbname); //ouvre la connexion au serveur MySQL
			
			if($connect->connect_error) {
					die("connection failed: " . $conn->connect_error); //envoie un message d'erreur si la connexion échoue
			}
			
			$connect->query("SET NAMES UTF8"); //permet l'encodage en UTF-8
			$sql = "SELECT titre, auteur, date, contenu FROM article ORDER BY date DESC"; //creation d'une variable contenant la requête MySQL
			$result = $connect->query($sql); //execution de la requête SELECT et resultat envoyé dans la variable result
			
			if($result->num_rows > 0) {	//si il existe au moins une ligne contenant un résultat de requête 
				while($row = $result->fetch_assoc()) { //tant que la variable row récupère un résultat par la fonction fetch_assoc
					echo "<div id=article>";																																				
					echo "<h2>Titre du post : ". $row["titre"] . "</h2><p>" . "par " . $row["auteur"] . " écrit le " . $row["date"] . "<br><br>" . $row["contenu"] . "</p><br><br><br>";	   
					echo "<HR></div>"; 																																						   
				}
			} 
			else {
				echo "Aucun article n'a été écris !";
			}
			
			$connect->close(); //fermeture de la connexion
		
		?>
		
		</div>
		
		
	</body>
</html>