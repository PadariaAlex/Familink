<?php
// Connexion à la base de données
$host = 'localhost';
$user = 'root';
$mdp = '';
$dbname = 'familink';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $bdd = new PDO($dsn, $user, $mdp, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Initialisation de la variable $message
$message = "";

// Vérification des informations de connexion
if (isset($_POST['user']) && isset($_POST['Password'])) {
    $user = $_POST['user'];
    $Password = $_POST['Password'];
    $stmt = $bdd->prepare('SELECT * FROM Utilisateurs WHERE Login = ? AND Password = ?');
    $stmt->execute([$user, $Password]);
    $userExists = $stmt->rowCount();
    if ($userExists) {
		// Création de la session pour l'utilisateur
        session_start();
        $_SESSION['user'] = $user;

        // Redirection vers la page index.php
        header('Location: index.php');
        exit;
    } else {
        // Affichage d'un message d'erreur si les informations de connexion sont incorrectes
        $message = "Nom d'utilisateur ou mot de passe incorrect.";
		header('Location: login.php');
    }
}
?>