<!-- ------------- IMAGE ------------- -->
<?php
if (isset($_FILES['file'])) {
    $errors = array();
    $room_name_image = 'Chambre1_image';
	$file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $file_name_parts = explode('.', $_FILES['file']['name']);
    $file_ext = strtolower(end($file_name_parts));

    $extensions = array("jpeg", "jpg", "png");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "Extension non autorisée, veuillez sélectionner un fichier JPEG, JPG ou PNG.";
    }

    if ($file_size > 6291456) {
        $errors[] = 'Fichier trop volumineux, veuillez sélectionner un fichier de moins de 6MB.';
    }

    $destination_folder = "Download/";
    $destination_file = $destination_folder . $room_name_image . '.' . $file_ext;

    // Supprimer le fichier image spécifique s'il existe
	if (!empty($_FILES['file']['name'])) { // Ajout de cette condition
		// Supprimer le fichier image spécifique s'il existe
		$file_names_to_delete = array();
		foreach ($extensions as $extension) {
			$file_names_to_delete[] = $room_name_image . '.' . $extension;
		}

		foreach ($file_names_to_delete as $file_name_to_delete) {
			$file_path = $destination_folder . $file_name_to_delete;
			if (file_exists($file_path)) {
				unlink($file_path);
			}
		}
	}


    // Télécharger le fichier si l'input n'est pas vide
        if (empty($errors) && !empty($_FILES['file']['name'])) {
			move_uploaded_file($file_tmp, $destination_file);
			echo '<script type="text/javascript">alert("Le fichier a bien été téléchargé."); window.location.href = "index.php";</script>';
		} 
}
?>



<!-- ------------- PHRASE ------------- -->
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer le nom du room depuis la requête
    $room_name_text = 'Chambre1_text'; // Remplacer "nom_du_room" par le nom réel du room

    // Récupérer la phrase depuis la requête
    $phrase = trim($_POST['phrase']); // Supprimer les espaces en début et fin de chaîne

    // Vérifier si la phrase n'est pas vide
    if (!empty($phrase)) {
        // Vérifier si le dossier existe, sinon le créer
        $dir = 'Download/';
        if (!file_exists($dir)) {
            mkdir($dir);
        }

        // Vérifier si le fichier existe déjà et le supprimer
        $filename = $dir . $room_name_text . '.txt';
        if (file_exists($filename)) {
            unlink($filename);
        }

        // Créer le nouveau fichier et y ajouter la phrase
        $handle = fopen($filename, 'w');
        fwrite($handle, $phrase);
        fclose($handle);
    }
}
?>

<script type="text/javascript">
    window.location.replace("http://127.0.0.1/css/index.php");
</script>