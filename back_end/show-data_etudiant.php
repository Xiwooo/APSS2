<?php 
/**
 * * NR le 24/12/2020
 *   ce fichier permet de retrouver les informations nécessaires
 *   à l'affichage du tableau de bord
 *      . savoir si le stagiaire a obtenu un stage
 *      . connaitre les démarches effectuées par le candidat
 **/ 
include 'show-data_prof.php';
$id_et=$_SESSION['id'];

$stmt = $db->prepare("SELECT * FROM stage WHERE ID_ETUDIANT=:id;");
$id_et=$_SESSION['id'];
$stmt->bindValue(':id', $id_et, PDO::PARAM_INT);
$stmt->execute(); 
$stage = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStage = count($stage);

// connaitre une démarche nécessite  non seulement de connaitre ces caractéristiques
// mais aussi les caractéristiques de l'entreprise et les moyens de comm utilsés
// et le salarié contacté au sein de l'entreprise
$stmt = $db->prepare(
    "SELECT ENTREPRISE.ID_ENTREPRISE, NOM_ENTREPRISE,VILLE_ENTREPRISE, NOM_SALARIE, 
           TEL_SALARIE,DATE_DEMARCHE,COMMENTAIRE,LIBELLE_MOYEN
        FROM salarie,demarche,entreprise,moyencom 
        WHERE MOYENCOM.ID_MOYEN=DEMARCHE.ID_MOYEN AND 
              DEMARCHE.ID_SALARIE=SALARIE.ID_SALARIE AND
            ENTREPRISE.ID_ENTREPRISE= SALARIE.ID_ENTREPRISE AND 
            DEMARCHE.ID_ETUDIANT=:id
        ORDER BY DATE_DEMARCHE  DESC"
);
$stmt->bindValue(':id', $_GET['id']);
$stmt->execute(); 
$demarches = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarches= count($demarches);
?>