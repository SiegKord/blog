<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Bienvenue sur mon Blog.</title>
	</head>
	<body>
	
		<h1 style="text-align:center;">Blog des PD's</h1>
	
		<?php
		
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "blog";
			
			$connect = new mysqli($servername, $username, $password, $dbname);
			
			if($connect->connect_error) {
					die("connection failed: " . $conn->connect_error); //envoie un message d'erreur si la connexion échoue
			}
			
			$connect->query("SET NAMES UTF8"); //permet l'encodage en UTF-8
			$sql = "SELECT titre, auteur, date, contenu FROM article";
			$result = $connect->query($sql);
			
			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "Titre du post :" . $row["titre"] . "<br>" . "par " . $row["auteur"] . " écris le " . $row["date"] . "<br><br>" . $row["contenu"] . "<br><br><br>";
				}
			} 
			else {
				echo "Aucun article n'a été écris !";
			}
			
			$connect->close();
		
		?>

		
		
	</body>
</html>