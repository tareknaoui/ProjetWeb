<?php
// Replace these variables with your actual database credentials
$servername = "localhost";
$username = 'root';
$port = 3307; // Port modifié à 3307

$password = '';
$database = 'votrebasededonnees';

// Create connection
$conn = new mysqli($servername, $username, $password, $database,$port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the POST request
    $title = $_POST["title"];
    $description = $_POST["description"];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO sujet (theme, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Invalid request method";
}

// Close connection
$conn->close();
?>
