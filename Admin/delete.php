<?php
$host = "localhost";
$user = 'root';
$pass = '';
$db = 'projetweb';

$link = mysqli_connect($host, $user, $pass, $db);

if (mysqli_connect_error()) {
    die("Connection failed");
}

$id = $_POST['id'];

$stmt0 = $link->prepare("DELETE FROM tachesprojet WHERE ProjetID = ?");
$stmt0->bind_param("i", $id);
if ($stmt0->execute()) {
    echo 'Deleted from tachesprojet';
} else {
    echo 'Failed to delete from tachesprojet: ' . $stmt0->error;
}
$stmt0->close();

$stmt1 = $link->prepare("DELETE FROM projet WHERE EncadreurID = ?");
$stmt1->bind_param("i", $id);
if ($stmt1->execute()) {
    echo 'Deleted from projet';
} else {
    echo 'Failed to delete from projet: ' . $stmt1->error;
}
$stmt1->close();

$stmt2 = $link->prepare("DELETE FROM sujet WHERE encadreur_id = ?");
$stmt2->bind_param("i", $id);
if ($stmt2->execute()) {
    echo 'Deleted from sujet';
} else {
    echo 'Failed to delete from sujet: ' . $stmt2->error;
}
$stmt2->close();

$stmt3 = $link->prepare("DELETE FROM etudiants WHERE id = ?");
$stmt3->bind_param("i", $id);
if ($stmt3->execute()) {
    echo 'Deleted from etudiants';
} else {
    echo 'Failed to delete from etudiants: ' . $stmt3->error;
}
$stmt3->close();

$stmt4 = $link->prepare("DELETE FROM encadreurs WHERE id = ?");
$stmt4->bind_param("i", $id);
if ($stmt4->execute()) {
    echo 'Deleted from encadreurs';
} else {
    echo 'Failed to delete from encadreurs: ' . $stmt4->error;
}
$stmt4->close();

mysqli_close($link);

echo 'success';
?>