<?php
/**
 * NR le 24/12/2020
 *  ce fichier permet de créer une démarche quand l'utilisateur est un etudiant
 **/
// Vérification que l'utilisateur a bien saisi les informations attendues
if (isset($_POST['creer_entreprise'])) {
    if (!empty($_POST['nom']) && !empty($_POST['adresse']) 
        && !empty($_POST['ville']) && !empty($_POST['cp'])
        && !empty($_POST['courriel'])&& !empty($_POST['tel'])
    ) {
        // préparation de l'enregistrement de l'entreprise avec les valeurs saisies 
        $query = "INSERT INTO entreprise (NOM_ENTREPRISE,ADRESSE_ENTREPRISE, VILLE_ENTREPRISE, CP_ENTREPRISE,EMAIL_ENTREPRISE,TEL_ENTREPRISE) VALUES (:nom,:adresse,:ville,:cp,:email,:tel);";
        $stmt = $db->prepare($query);
        $stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
        $stmt->bindValue(':ville', $_POST['ville'], PDO::PARAM_STR);
        $stmt->bindValue(':cp', $_POST['cp'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $_POST['courriel'], PDO::PARAM_STR);
        $stmt->bindValue(':tel', $_POST['tel'], PDO::PARAM_STR);
        // protection de la requête par une exception pour afficher à l'utilisateur 
        // un message d'erreur si l'enregistrement n'a pas réussi
        try {
            $execute =$stmt->execute();
            $success = true;
            $message = "L'entreprise' a bien été ajoutée.";
            // à la suite de l'actualisation-création de ses démarches, 
            //l'étudiant est renvoyé sur son tableau de bord
            header("lister_creer_entreprises.php");
        }
        // si l'enregistrement n'a pas été effectué , 
        //traitement d'avertissement de l'utilisateur
        catch    (Exception $e){
            $message =$e;
            $success = false;
            $message ="pas d'ajout.";
        }
    } else {
        $success = false;
        $message = "Il faut remplir tous les champs.";
    }
} 
?>