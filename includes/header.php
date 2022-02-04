<!--   NR le 24/12/2020
// A INCLURE  SYSTEMATIQUEMENT dans toutes les fichiers d'affichage des pages
// pour initialiser les traitements à effectuer systématiquement au début de chaque page!
// -> ouvrir la connexion à la base
// -> charger des utilitaires 
// -> initialiser le titre
// -> charger les styles et élments de présentations comme les fonts
-->
<?php
require_once '../back_end/db.php';
require_once '../includes/utils.php';
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">

    <!-- Title -->
    <title><?php if (isset($title)) {
                       echo($title);} ?>
         - iStage
    </title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="../assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="../assets/plugins/toastr/toastr.min.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="../assets/css/custom.css" rel="stylesheet">
    <link href="../assets/css/lime.min.css" rel="stylesheet">


</head>
