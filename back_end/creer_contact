<?php
include '../back_end/db.php';
if (isset($_POST['creer_contact'])) {
    
        
        $query3 = "INSERT INTO SALARIE (ID_ENTREPRISE,NOM_SALARIE,PRENOM_SALARIE,TEL_SALARIE, EMAIL_SALARIE) VALUES (:id_entreprise, :nom_salarie,:prenom_salarie,:tel,:courriel);";
    
            $stmt = $db->prepare($query3);
            $stmt->bindValue(':id_entreprise', $_POST['id_entreprise'], PDO::PARAM_INT);
            $stmt->bindValue(':nom_salarie', $_POST['nom_salarie'], PDO::PARAM_STR);
            $stmt->bindValue(':prenom_salarie', $_POST['prenom_salarie'], PDO::PARAM_STR);
            $stmt->bindValue(':tel', $_POST['tel'], PDO::PARAM_STR);
            $stmt->bindValue(':courriel', $_POST['courriel'], PDO::PARAM_STR);

        try {    
              $stmt->execute();
             header("refresh:1; ../front_end/tdb_etudiant.php");
        } 
        catch    (Exception $e){
            $message= $e;
            $success = false;
            $message ="pas d'ajout.";
        }
    } 