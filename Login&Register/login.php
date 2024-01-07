<?php
session_start();

$host = "localhost:3307";
$user = 'root';
$pass = '';
$db = 'web';

$link = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Check the login credentials for students
        $stmt = $link->prepare("SELECT * FROM etudiants WHERE AdresseEmail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($user['MotDePasse'] === $password) {
                // Student login successful
                $_SESSION['email'] = $email;
                echo "success-student";
                exit();
            }
        }

        // If student login failed, check the login credentials for admin
        $stmt = $link->prepare("SELECT * FROM admin WHERE AdresseEmail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($user['MotDePasse'] === $password) {
                // Admin login successful
                $_SESSION['email'] = $email;
                $_SESSION['admin'] = true; // Set a session variable to indicate that this is an admin
                echo "success-admin";
                exit();
            }
        }

        // If student and admin login failed, check the login credentials for encadreurs
        $stmt = $link->prepare("SELECT * FROM encadreurs WHERE AdresseEmail = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if ($user['MotDePasse'] === $password) {
                // Encadreur login successful
                $_SESSION['email'] = $email;
                $_SESSION['encadreur'] = true; // Set a session variable to indicate that this is an encadreur
                echo "success-encadreur";
                exit();
            }
        }

        // Login failed
        echo "error";

        // Close the statement
        $stmt->close();
    }
}

mysqli_close($link);
?>