<?php
// Paramètres de connexion à la base de données
$host = "localhost";
$dbname = "jo2024-fofana-abdoulaye";
$username = "root";
$password = "root";

try {
    // Création d'une nouvelle connexion PDO
    $connexion = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Définir l'attribut PDO pour générer des exceptions en cas d'erreur
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'erreur de connexion, afficher l'erreur
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    // Vous pouvez également rediriger l'utilisateur vers une page d'erreur
    // header("Location: erreur.php");
    // exit();
}
// Afficher les erreurs en PHP
// (fonctionne à condition d’avoir activé l’option en local)
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>