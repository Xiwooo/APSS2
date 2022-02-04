<?php 
/**
 * NR le 24/12/2020
 * *  ce fichier permet d'éviter qu'un type d'utilisateur non prévu puisse utiliser l'application
 * *il est chargé systématiquement à chaque début de page!
 **/
if (!isset($_SESSION['rank']) ||( $_SESSION['rank'] != "etudiant" && $_SESSION['rank'] != "professeur")) { 
    header('Location: lobby.php');
    exit();
} 