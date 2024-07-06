<?php
session_start(); // Démarre la session PHP pour stocker des variables de session.

require_once("database.php"); // Inclut le fichier de connexion à la base de données.

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Vérifie si la requête est une méthode POST (formulaire soumis).
    $login = $_POST["login"]; // Récupère la valeur du champ "login" du formulaire.
    $password = $_POST["password"]; // Récupère la valeur du champ "password" du formulaire.

    // Prépare la requête SQL pour récupérer les informations de l'utilisateur avec le login spécifié.
    $query = "SELECT id_utilisateur, nom_utilisateur, prenom_utilisateur, login, password FROM UTILISATEUR WHERE login = :login";
    $stmt = $connexion->prepare($query); // Prépare la requête avec PDO.
    $stmt->bindParam(":login", $login, PDO::PARAM_STR); // Lie la variable :login à la valeur du login, évitant les injections SQL.

    if ($stmt->execute()) { // Exécute la requête préparée.
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // Récupère la première ligne de résultat de la requête.

        if ($row && password_verify($password, $row["password"])) {
            // Si une ligne est récupérée et le mot de passe correspond à celui stocké dans la base de données.
            $_SESSION["id_utilisateur"] = $row["id_utilisateur"]; // Stocke l'ID utilisateur dans la session.
            $_SESSION["nom_utilisateur"] = $row["nom_utilisateur"]; // Stocke le nom de l'utilisateur dans la session.
            $_SESSION["prenom_utilisateur"] = $row["prenom_utilisateur"]; // Stocke le prénom de l'utilisateur dans la session.
            $_SESSION["login"] = $row["login"]; // Stocke le login de l'utilisateur dans la session.

            header("location: ../pages/admin/admin.php"); // Redirige vers la page d'administration.
            exit(); // Termine le script.
        } else {
            $_SESSION['error'] = "Login ou mot de passe incorrect.";
            header("location: ../pages/login.php"); // Redirige vers la page de login avec un message d'erreur.
        }
    } else {
        $_SESSION['error'] = "Erreur lors de l'exécution de la requête.";
        header("location: ../pages/login.php"); // Redirige vers la page de login avec un message d'erreur.
    }

    unset($stmt); // Libère la ressource associée à la requête préparée.
}

unset($connexion); // Ferme la connexion à la base de données.

header("location: ../pages/login.php"); // Redirige vers la page de login par défaut.
// Afficher les erreurs en PHP
// (fonctionne à condition d’avoir activé l’option en local)
error_reporting(E_ALL);
ini_set("display_errors", 1);
exit(); // Termine le script.
?>