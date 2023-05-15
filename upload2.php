<?php
if (isset($_POST['phrase'])) {
    $message = $_POST['phrase'];
    $user = "Alexandre";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "familink";

    try {
		if (!empty($message)) {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			// Supprimer l'enregistrement précédent
			$sql_delete = "DELETE FROM message";
			$conn->exec($sql_delete);

			// Insérer la nouvelle phrase
			$sql_insert = "INSERT INTO message (phrase, user) VALUES ('$message', '$user')";
			$conn->exec($sql_insert);
			}
			
		} catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$conn = null;

}
?>


<?php
if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
    $user = "Alexandre";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "familink";

    try{
        //Connection à la base de données
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Supprimer l'enregistrement précédent
        $sql_delete = "DELETE FROM image";
        $conn->exec($sql_delete);

        //Vérifier si l'image a été bien envoyée
        if(isset($_FILES['file']) && $_FILES['file']['error'] == 0){
            $image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
            $sql_insert = "INSERT INTO image (Image, User) VALUES ('$image', '$user')";
            $conn->exec($sql_insert);
        }
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}
?>

<script type="text/javascript">
    window.location.replace("http://127.0.0.1/TEPPAZ/index.php");
</script>