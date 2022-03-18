<?php
/**
 * * NR le 24/12/2020
 *   ce fichier sddsdspermet de réinitialiserles variables de session et 
 *    déconnecté l'utisdlisateurzeefzfzezef
 *    L'affichage propose de nouyveau les deux types d'utilisateur
 **/ 
 session_start();
 session_destroy();
 header('Location: lobby.php');
 exit();
?>