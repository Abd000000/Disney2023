<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['login'])) {
    header('Location: ../../index.php');
    exit;
}

$login = $_SESSION['login'];
$nom_utilisateur = $_SESSION['prenom_utilisateur'];
$prenom_utilisateur = $_SESSION['nom_utilisateur'];
// Afficher les erreurs en PHP
// (fonctionne à condition d’avoir activé l’option en local)
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/normalize.css">
    <link rel="stylesheet" href="../../css/styles-computer.css">
    <link rel="stylesheet" href="../../css/styles-responsive.css">
    <link rel="shortcut icon" href="../../img/favicon-jo-2024.ico" type="image/x-icon">
    <title>Jeux Olympiques - Paris 2024</title>
</head>

<body>
    <header>
        <nav>
            <!-- Menu vers les pages sports, events, et results -->
            <ul class="menu">
                <li><a href="../admin.php">Accueil Administration</a></li>
                <li><a href="./admin-sports/manage-sports.php">Gestion Sports</a></li>
                <li><a href="./admin-places/manage-places.php">Gestion Lieux</a></li>
                <li><a href="./admin-events/manage-events.php">Gestion Calendrier</a></li>
                <li><a href="./admin-countries/manage-countries.php">Gestion Pays</a></li>
                <li><a href="./admin-gender/manage-gender.php">Gestion Genres</a></li>
                <li><a href="./admin-athletes/manage-athletes.php">Gestion Athlètes</a></li>
                <li><a href="./admin-results/manage-results.php">Gestion Résultats</a></li>
                <li><a href="../../logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <p class="info-login">
            Bonjour
            <?php echo htmlspecialchars($nom_utilisateur) . " " . htmlspecialchars($prenom_utilisateur) ?>
        </p>
        <p class="category-site">
            <a class="link-category" href="./admin-users/manage-users.php">Gestion Administrateurs</a>
            <a class="link-category" href="./admin-sports/manage-sports.php">Gestion Sports</a>
            <a class="link-category" href="./admin-places/manage-places.php">Gestion Lieux</a>
            <a class="link-category" href="./admin-events/manage-events.php">Gestion Calendrier</a>
            <a class="link-category" href="./admin-countries/manage-countries.php">Gestion Pays</a>
            <a class="link-category" href="./admin-countries/manage-countries.php">Gestion Genres</a>
            <a class="link-category" href="./admin-athletes/manage-athletes.php">Gestion Athlètes</a>
            <a class="link-category" href="./admin-results/manage-results.php">Gestion Résultats</a>
        </p>
    </main>
    <footer>
        <figure>
            <img src="../../img/logo-jo-2024.png" alt="logo jeux olympiques 2024">
        </figure>
    </footer>
</body>

</html>