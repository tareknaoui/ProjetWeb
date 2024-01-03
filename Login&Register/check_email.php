<?php
$host = "localhost";
$user = 'root';
$pass = '';
$db = 'projetweb';

$link = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    echo "Connection failed";
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];

            $stmt = $link->prepare("SELECT * FROM etudiants WHERE AdresseEmail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "taken";
            } else {
                echo "not_taken";
            }
        }
    }

    // Fermer la connexion
    mysqli_close($link);
}
?>