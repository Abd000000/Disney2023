<?php
session_start();
require_once("../../../database/database.php");

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
    header('Location: ../../../index.php');
    exit();
}

// Vérifiez si l'ID du sport est fourni dans l'URL
if (!isset($_GET['id_lieu'])) {
    $_SESSION['error'] = "ID du lieu manquant.";
    header("Location: manage-places.php");
    exit();
} else {
    $id_lieu = filter_input(INPUT_GET, 'id_lieu', FILTER_VALIDATE_INT);
    // Vérifiez si l'ID du lieu est un entier valide
    if (!$id_lieu && $id_lieu !== 0) {
        $_SESSION['error'] = "ID du lieu invalide.";
        header("Location: manage-places.php");
        exit();
    } else {
        try {
            // Récupérez l'ID de l'œuvre à supprimer depuis la requête GET
            $id_lieu = $_GET['id_lieu'];
            // Préparez la requête SQL pour supprimer l'œuvre
            $sql = "DELETE FROM LIEU WHERE id_lieu = :id_lieu";
            // Exécutez la requête SQL avec le paramètre
            $statement = $connexion->prepare($sql);
            $statement->bindParam(':id_lieu', $id_lieu, PDO::PARAM_INT);
            $statement->execute();
            // Redirigez vers la page précédente après la suppression
            header('Location: manage-places.php');
        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }
}
// Afficher les erreurs en PHP (fonctionne à condition d’avoir activé l’option en local)
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>