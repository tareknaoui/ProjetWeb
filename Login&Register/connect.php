<?php
$host = "localhost:3307";
$user = 'root';
$pass = '';
$db = 'votrebasededonnees';

$link = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    die("Connection failed");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['AdresseEmail']) && isset($_POST['MotDePasse'])) {
            $userName = $_POST['AdresseEmail'];
            $password = $_POST['MotDePasse'];

            $stmt = $link->prepare("SELECT * FROM etudiants WHERE AdresseEmail = ?");
            $stmt->bind_param("s", $userName);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $password_user = $row['MotDePasse'];

                if ($password === $password_user) {
                    session_start();
                    $_SESSION['AdresseEmail'] = $userName;
                    echo "ce compte il existe";
                } else {
                    echo "exite pas.";
                }
            } else {
                echo "existe pas.";
            }
        } else {
            echo "Veuillez remplir tous les champs du formulaire.";
        }
    }

    mysqli_close($link);
}
?>