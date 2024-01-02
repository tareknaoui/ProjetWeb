<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'web';
$port = 3307;

$conn = new mysqli($servername, $username, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$taskNumber = $_POST['taskNumber'];
$taskStatus = $_POST['taskStatus'];
$assignedTo = $_POST['assignedTo'];
$taskPriority = $_POST['taskPriority'];

$sql = "INSERT INTO tachesprojet (DescriptionTache, EtatTache, ResponsableTacheID, AutresInformations) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssis", $taskNumber, $taskStatus, $assignedTo, $taskPriority);
$stmt->execute();

header("Location: project1.php");
?>