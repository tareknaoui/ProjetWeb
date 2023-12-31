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
        if (
            isset($_POST['Nom']) && isset($_POST['Prenom']) && isset($_POST['DateNaissance']) &&
            isset($_POST['Email']) && isset($_POST['MotDePasse']) && isset($_POST['ConfirmerMotDePasse']) &&
            isset($_POST['Universite']) && isset($_POST['Faculte']) && isset($_POST['Specialite'])
        ) {
            $nom = $_POST['Nom'];
            $prenom = $_POST['Prenom'];
            $date_naissance = $_POST['DateNaissance'];
            $email = $_POST['Email'];
            $password = $_POST['MotDePasse'];
            $confirm_password = $_POST['ConfirmerMotDePasse'];
            $universite = $_POST['Universite'];
            $faculte = $_POST['Faculte'];
            $specialite = $_POST['Specialite'];

            // Generate a random and unique Matricule
            $matricule = generateUniqueMatricule($link);

            // Ajoutez ici des vérifications supplémentaires selon vos besoins, par exemple, vérification d'email, de mot de passe, etc.

            // Vérification de l'existence de l'utilisateur
            $stmt = $link->prepare("SELECT * FROM etudiants WHERE AdresseEmail = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "L'adresse e-mail est déjà utilisée.";
            } else {
                // Insertion dans la base de données
                $stmt = $link->prepare("INSERT INTO etudiants (`Nom`, `Prenom`, `AdresseEmail`, `DateNaissance`, `MotDePasse`, `Universite`, `Faculte`, `Specialite`, `Matricule`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssss", $nom, $prenom, $email, $date_naissance, $password, $universite, $faculte, $specialite, $matricule);

                if ($stmt->execute()) {
                    session_start();
                    $_SESSION['Nom'] = $nom;
                    header("Location: login.html");
                    exit();
                } else {
                    $error_message = "Erreur lors de l'insertion de l'utilisateur : " . $stmt->error;
                    echo $error_message;
                }

                // Fermer la déclaration
                $stmt->close();
            }
        } else {
            $error_message = "Veuillez remplir tous les champs du formulaire.";
            echo $error_message;
        }
    }

    // Fermer la connexion
    mysqli_close($link);
}

function generateUniqueMatricule($link)
{
    $matricule = generateRandomMatricule();

    // Vérifier si le matricule est déjà utilisé
    $stmt = $link->prepare("SELECT * FROM etudiants WHERE Matricule = ?");
    $stmt->bind_param("s", $matricule);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($result->num_rows > 0) {
        // Regénérer un nouveau matricule jusqu'à ce qu'il soit unique
        $matricule = generateRandomMatricule();
        $stmt->bind_param("s", $matricule);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    return $matricule;
}

function generateRandomMatricule()
{
    // Générer un matricule aléatoire, vous pouvez personnaliser la logique selon vos besoins
    $characters = '0123456789';
    $length = 8;
    $matricule = '';

    for ($i = 0; $i < $length; $i++) {
        $matricule .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $matricule;
}
?>
