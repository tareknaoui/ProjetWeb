<?php
session_start();

$host = "localhost";
$user = 'root';
$pass = '';
$db = 'projetweb';

$link = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Add any additional validation as needed

        // Check the login credentials
        $stmt = $link->prepare("SELECT * FROM etudiants WHERE AdresseEmail = ? AND MotDePasse = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Login successful
            $_SESSION['email'] = $email;
            echo "success";
            exit();
        } else {
            // Login failed
            echo "error";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "error";
    }
}

// Close the connection
mysqli_close($link);
?>
