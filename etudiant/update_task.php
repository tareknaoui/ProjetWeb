<?php
$host = "localhost:3307";
$user = "root";
$password = "";
$database = "projetweb";

$link = new mysqli($host, $user, $password, $database);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

$taskId = $_POST['taskId'];
$newEtat = $_POST['newEtat'];

if ($newEtat === 'In progress') {
    $stmt = $link->prepare("UPDATE tachesprojet SET EtatTache = ? WHERE ID = ?");
    $stmt->bind_param("si", $newEtat, $taskId);
} else if ($newEtat === 'To do') {
    $stmt = $link->prepare("DELETE FROM tachesprojet WHERE ID = ?");
    $stmt->bind_param("i", $taskId);
    $stmt->execute();
    $stmt->close();

    // Insert a notification after deleting the task
    $studentId = $_SESSION['studentId']; // Get the student ID from the session
$message = "Task with ID $taskId has been deleted.";
$sender = strval($studentId); // Convert the student ID to a string
$stmt = $link->prepare("INSERT INTO notification (sender, message, etudiant_id) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $sender, $message, $studentId);
$stmt->execute();
$stmt->close();
}

$stmt->execute();
$stmt->close();
?>