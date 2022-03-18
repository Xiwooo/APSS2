<?php
/**
 * NR le 24/12/2020
 * ce fichier permet  de réaliser les vérifications dans la BDR
 * pour savoir si un professeur ou un étudiant sont autorisés
 * à accéder à l'application
 * * la gestion des erreurs est assurée par les variables show, succès et message zz
 **/
$show = false;

// Prise en compte du type d'utilisateur choisi
if (isset($_GET['type'])) {
    $type = $_GET['type'];
}

//Si l'utilisateur a soumis le formulaire, il est alors possible de
// faire les traitements sur les valeurs saisies 
if (isset($_POST['connexion'])) {
       
    $email = $_POST['email'];
    $motdepasse = $_POST['motdepasse'];
    $rank = $_GET['type'];
    // vérification dans la base selon le type d'utilisateur
    if ($type == "professeur") { 
        $stmt = $db->prepare("SELECT * FROM professeur WHERE EMAIL=:email");
    } else {
        $stmt = $db->prepare("SELECT * FROM etudiant WHERE EMAIL=:email");
    }
    
    // Lier les paramètres à la requête avec vérification du type
    // pour rechercher si l'utilisateur a bien un mot de passe dans la passe
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 

    if (!empty($email) && !empty($motdepasse)) {
        if ($stmt->rowCount() > 0) {    
            // Vérification que les mots de passe et mail soiennt identiques       
            if (strtoUPPER($email) == $row["EMAIL"] && $motdepasse== $row["MDP"]) {
                // ????? dès que les mots de passes sécurisés. 
                //?????password_verify($motdepasse, $row["motdepasse"]))
                $show = true;
                $color = "success";
                $message = "Connexion réussie, redirection dans 3 secondes...";
                // initialisation des variables de session nécessaires
                // à la suite des traitements
                $_SESSION['rank'] = $rank;
                $_SESSION['email'] = $row['EMAIL'];
                if ($type == "professeur") {
                    $_SESSION['id'] = $row['ID_PROF'];
                    $_SESSION['nom'] = $row['NOM_PROF'];
                    $_SESSION['prenom'] = $row['PRENOM_PROF'];
                    $_SESSION['telephone'] = $row['TEL_PROF'];
                    // affichage du tableau de bord du professeur
                    header("refresh:1; tdb_professeur.php");
                } else {  
                    $_SESSION['id'] = $row['ID_ETUDIANT'];
                    $_SESSION['nom'] = $row['NOM_ETUDIANT'];
                    $_SESSION['prenom'] = $row['PRENOM_ETUDIANT'];
                    $_SESSION['telephone'] = $row['TEL_ETUDIANT'];
                    // affichage du tableau de bord du professeur
                    header("refresh:1; tdb_etudiant.php");
                }
            } else {   // affichage des erreurs, cybersécurité??
                $show = true;
                $color = "danger";
                $message = "Identifiants incorrects.";
            }
        } else {   // affichage des erreurs, cybersécurité??
            $show = true;
            $color = "danger";
            $message = "L'email n'existe pas.";
        }
    }        
}