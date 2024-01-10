<?php
    // Database connection
    $host = "localhost:3307";
    $user = "root";
    $password = "";
    $database = "projetweb";

    $conn = new mysqli($host, $user, $password, $database);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    session_start();
    $_SESSION['encadreurID'] = 8; // replace $value with the actual value you want to assign

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $titreProjet = $_POST['TitreProjet'];
        $descriptionProjet = $_POST['DescriptionProjet'];
        $encadreurID = $_SESSION['encadreurID']; // Get the logged in encadreur's ID from the session
        $etatProjet = 'New'; // Set the initial project state
        $dateCreation = date('Y-m-d'); // Set the creation date to today's date
    
        // Prepare an SQL statement for execution
        $stmt = $conn->prepare("INSERT INTO projet (TitreProjet, DescriptionProjet, EncadreurID, EtatProjet, DateCreation) VALUES (?, ?, ?, ?, ?)");
    
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("ssiss", $titreProjet, $descriptionProjet, $encadreurID, $etatProjet, $dateCreation);
    
        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "Project added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    
        // Close statement
        $stmt->close();
    }
    
    // Close connection
    $conn->close();
?>