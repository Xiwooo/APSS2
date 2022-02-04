<?php
/**
 * * NR le 24/12/2020
 *   ce fichier permet de modifer le profil d'un utilisateur.
 *     Les caractéristiques : nom;prénom, tel et courriel
 *   Les modifications du mot de passe sont séparées
 **/ 
$show = false;
$showMdp = false;
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$email = $_SESSION['email'];
$telephone = $_SESSION['telephone'];
// 
if (isset($_POST['modifier-profil'])) {
    // Récupération des données et stockage
    $id = $_SESSION['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    
    if (!empty($nom) && !empty($prenom) && !empty($email) & !empty($telephone)) {
        if (preg_match('%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i', $telephone) && strlen($telephone) >= 10) {             
            // Insertion des données en base
            if ($_SESSION['rank']=='etudiant') {
                $req="UPDATE etudiant 
                       SET NOM_ETUDIANT=:nom, prenom_ETUDIANT=:prenom, 
                            email=:email,tel_ETUDIANT=:telephone 
                       WHERE id_ETUDIANT=:id;";
            } else {
                $req="UPDATE professeur 
                        SET NOM_PROF=:nom, prenom_PROF=:prenom, 
                             email=:email, tel_PROF=:telephone 
                        WHERE id_PROF=:id;";
            }
            
            try {
                $stmt = $db->prepare($req);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->bindValue(':nom', $nom, PDO::PARAM_STR);
                $stmt->bindValue(':prenom', $prenom, PDO::PARAM_STR);
                $stmt->bindValue(':email', $email, PDO::PARAM_STR);
                $stmt->bindValue(':telephone', $telephone, PDO::PARAM_STR);
                $stmt->execute();
                $show = true;
                $color = "success";
                $message = "Modification réussie."; 
            }
            catch    (Exception $e){
                $message =$e;
                $show = true;
                $color = "danger";
            }
        } else {
            $show = true;
            $color = "danger";
            $message = "Le numéro de téléphone est incorrecte. Exemple: 0123456789";
        }
    } else {
        $show = true;
        $color = "danger";
        $message = "Il faut remplir tous les champs.";
    }
}

if (isset($_POST['modifier-mdp'])) {
    // Récupération des données et stockage
    $id = $_SESSION['id'];
    $motdepasse = $_POST['motdepasse'];
    $motdepassec = $_POST['motdepassec'];


    if (!empty($motdepasse)) {
        if ($motdepasse == $motdepassec) {
            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{8,})/", $motdepasse)) {
                // hashage du mot de passe
                $hashed = password_hash($motdepasse, PASSWORD_DEFAULT);
                if ($_SESSION['rank']=='etudiant') {
                    $reqmdp="UPDATE etudiant 
                              SET MDP_ETUDIANT=:motdepasse 
                              WHERE id_ETUDIANT=:id;";
                } else {
                    $reqmdp="UPDATE etudiant 
                              SET MDP_ETUDIANT=:motdepasse
                              WHERE id_ETUDIANT=:id;";
                }
                 
                // Insertion des données en base
                try {
                    $stmt = $db->prepare($reqmdp);
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                    $stmt->bindValue(':motdepasse', $hashed, PDO::PARAM_STR);
                    $stmt->execute();
                    
                    $showMdp = true;
                    $colorMdp = "success";
                    $messageMdp = "Modification réussie.";           
                } 
                catch    (Exception $e){
                    $message =$e;
                    $show = true;
                    $color = "danger";
                }
            } else {
                $showMdp = true;
                $colorMdp = "danger";
                $messageMdp = "Le mot de passe doit être composé de 8 caractères, 1 majuscule, 1 minuscule et un chiffre.";
            }  
        } else {
            $showMdp = true;
            $colorMdp = "danger";
            $messageMdp = "Les deux mots de passe doivent être identiques.";
        } 
    } else {
        $showMdp = true;
        $colorMdp = "danger";
        $messageMdp = "Il faut remplir tous les champs.";
    }
}