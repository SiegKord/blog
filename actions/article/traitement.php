<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Formulaire</title>
	</head>
	
	<body>
	
		<h1>Article créé</h1>
	
			<?php 
				require_once "../../models/dao/ArticleDAO.php";

				echo "Votre titre d'article est <b>" . $_POST['titre'] . "</b>. L'auteur de l'article est <b>";
				if(empty($_POST['auteur'])) 
					echo "Anonyme";
				else
					echo $_POST['auteur'];

				echo "</b> et son contenu est : <b>" . $_POST['contenu'] . "</b>";
				echo "</br></br></br>";

				try {
					 $dateTime = new DateTime("now", new DateTimeZone('Europe/Paris'));
				} catch (Exception $e) {
					echo $e->getMessage();
				}
				$date = $dateTime->format('Y-m-d H:i:s');
			
				$myDAO = new ArticleDAO;
				$created = new Article;
				$created->setTitle($_POST['titre']);
				$created->setAuthor($_POST['auteur']);
				$created->setContent($_POST['contenu']);

				$newArticle = $myDAO->setArticle($created);

				// $myID = $myDAO->getIdfromArticle($_POST['titre'], $_POST['auteur'], $_POST['contenu']);

				// echo "L'ID de cet article est le numéro " . $myID . ".</br></br>";
				
				// $titleDate = $myDAO->getTitleDate($myID);
				
				$date = $newArticle->getDatepost();
				$maStringDate = $myDAO->dateToString($date);
				
				echo "La date de l'article '<b>" . $newArticle->getTitle() . "</b>' est le " . $maStringDate . "</br></br></br>";
				
				echo "<a href = '../../accueil.php'>Retour à l'accueil</a>";
				
				// $date = $titleDate->getDatepost();
				
				// $timestamp = strtotime($date);
				// setlocale(LC_TIME, "fr");
		
				// echo "La date de l'article '<b>" . $titleDate->getTitle() . "</b>' est le " . strftime("%A %d %B %Y", $timestamp); // affichage de la date
				// echo " à " . strftime("%H", $timestamp) . "h" . strftime("%M", $timestamp); // affichage de l'heure
				

			?>
		
	</body>
</html>