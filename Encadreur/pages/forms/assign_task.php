<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'web';
$port = 3307;

$link = new mysqli($servername, $username, $password, $database, $port);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_errorO);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectId = $_POST['project'];
    $studentId = $_POST['student'];
    $taskDescription = $_POST['task'];

    // Check if the student ID exists
    $sql = "SELECT ID FROM etudiants WHERE ID = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $studentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // The student ID exists, proceed with the insert operation
        $sql = "INSERT INTO tachesprojet (ProjetID, DescriptionTache, ResponsableTacheID, EtatTache) VALUES (?, ?, ?, 'To do')";

        $stmt = $link->prepare($sql);
        $stmt->bind_param("isi", $projectId, $taskDescription, $studentId);

        if ($stmt->execute() === TRUE) {
            echo "New task assigned successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $link->error;
        }
    } else {
        // The student ID does not exist, do not proceed with the operation
        echo "Error: The student ID does not exist.";
    }
}

$link->close();

?>