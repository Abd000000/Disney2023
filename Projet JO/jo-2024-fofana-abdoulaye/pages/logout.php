<?php
session_start();
session_unset();
session_destroy();
header('Location: ../index.php');
// Afficher les erreurs en PHP
// (fonctionne à condition d’avoir activé l’option en local)
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>