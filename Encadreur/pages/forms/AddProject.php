<?php
session_start();

// Remplacez ces variables par vos identifiants de base de données réels
$servername = "localhost";
$username = 'root';
$port = 3307; // Port modifié à 3307
$password = '';
$database = 'web';

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $database, $port);

if (isset($_SESSION['ID'])) {
    $ID = $_SESSION['ID'];
    echo"$ID";
    // Utilisez l'ID comme vous le souhaitez
}
// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Récupérer les autres données du formulaire
    $titlee = $_POST["title"];
    $descriptionn = $_POST["description"];

    echo"$titlee";
    echo"$descriptionn";


    // Préparer et lier l'instruction SQL
    $stmt = $conn->prepare("INSERT INTO projet (TitreProjet,DescriptionProjet,EncadreurID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $titlee,$descriptionn,$ID);

    // Exécuter l'instruction
    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Fermer la déclaration préparée
    $stmt->close();
} else {
    echo "Invalid request method";
}

// Fermer la connexion
$conn->close();
?>
