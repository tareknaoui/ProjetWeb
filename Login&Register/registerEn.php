<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "projetweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$universite = mysqli_real_escape_string($conn, $_POST['universite']);
$departement = mysqli_real_escape_string($conn, $_POST['departement']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "INSERT INTO encadreurs (Nom, Prenom, AdresseEmail, Universite, Departement, MotDePasse)
VALUES ('$nom', '$prenom', '$email', '$universite', '$departement', '$password')";

if ($conn->query($sql) === TRUE) {
  // Redirect to login page after successful registration
  header('Location: login.php');
  exit;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>