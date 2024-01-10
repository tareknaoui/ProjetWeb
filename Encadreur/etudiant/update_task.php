<?php
session_start(); // Démarrer la session

$host = "localhost:3307";
$user = "root";
$password = "";
$database = "web";

$link = new mysqli($host, $user, $password, $database);

if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

$taskId = $_POST['taskId'];
$newEtat = $_POST['newEtat'];

if ($newEtat === 'In progress') {
    $stmt = $link->prepare("UPDATE tachesprojet SET EtatTache = ? WHERE ID = ?");
    $stmt->bind_param("si", $newEtat, $taskId);
    $stmt->execute();
    $stmt->close();
} else if ($newEtat === 'To do') {
    $stmt = $link->prepare("DELETE FROM tachesprojet WHERE ID = ?");
    $stmt->bind_param("i", $taskId);
    $stmt->execute();
    $stmt->close();

    // Get the project ID associated with the student
    $studentId = $_SESSION['studentId']; // Récupérer l'ID de l'étudiant de la session
    $stmtProject = $link->prepare("
        SELECT ProjetID 
        FROM equipesprojet 
        WHERE EtudiantID = ?
    ");
    $stmtProject->bind_param("i", $studentId);
    $stmtProject->execute();
    $stmtProject->bind_result($projectId);
    $stmtProject->fetch();
    $stmtProject->close();

    // Check if projectId is valid
    if ($projectId) {
        // Get the supervisor ID associated with the project
        $stmtSupervisor = $link->prepare("
            SELECT EncadreurID 
            FROM projet 
            WHERE ID = ?
        ");
        $stmtSupervisor->bind_param("i", $projectId);
        $stmtSupervisor->execute();
        $stmtSupervisor->bind_result($supervisorId);
        $stmtSupervisor->fetch();
        $stmtSupervisor->close();

        // Insert a notification after deleting the task
        $message = "Task with ID $taskId has been deleted.";
        $sender = strval($studentId); // Convertir l'ID de l'étudiant en chaîne de caractères
        $stmt = $link->prepare("INSERT INTO notification (sender, message, etudiant_id, encadreur_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $sender, $message, $studentId, $supervisorId);
        $stmt->execute();
        $stmt->close();
    } else {
        echo "Project ID not found for the student.";
    }
}
?>
