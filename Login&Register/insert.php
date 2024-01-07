<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "web";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$nom = mysqli_real_escape_string($conn, $_POST['nom']);
$prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$specialisation = mysqli_real_escape_string($conn, $_POST['specialisation']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql = "INSERT INTO encadreurs (Nom, Prenom, AdresseEmail, Specialisation, MotDePasse)
VALUES ('$nom', '$prenom', '$email', '$specialisation', '$password')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>