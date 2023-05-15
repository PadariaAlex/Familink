<!DOCTYPE html>

<html>

<meta name="viewport" lang="fr-FR" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8" />
<link rel="stylesheet" href="style2.css">
<meta http-equiv="refresh" content="1">

<title>
	Page • EHPAD
</title>

<body>
	<div class="Image">
		<?php
			$user = "Alexandre";
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "familink";

			try{
				//Connection à la base de données
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				// Afficher l'image enregistrée
				$sql_select = "SELECT Image FROM image WHERE User = '$user'";
				$stmt = $conn->prepare($sql_select);
				$stmt->execute();
				$donnees = $stmt->fetch();
				
				    // Récupérer le texte depuis la base de données
				$sql_select = "SELECT phrase FROM message WHERE user='$user'";
				$stmt = $conn->query($sql_select);
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$phrase = $row['phrase'];
	
	
				echo '<img width=70% src="data:image/jpeg;base64,' . base64_encode($donnees['Image']) . '" />';
				echo "<p class=\"Texte\">" . $phrase . "</p>";

				
			} catch(PDOException $e) {
				echo "Error: " . $e->getMessage();
			}
			$conn = null;
		?>
	</div>
</body>