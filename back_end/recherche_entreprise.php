<?php 
/**
 * * NR le 24/12/2020
 *   ce fichier permet de modifer de rechercher une entreprise 
 *     àconnaissant son identifiant passé dans le GET
 **/ 
$id= $_GET['id'];

$stmt = $db->prepare(
    "SELECT  NOM_ENTREPRISE,ADRESSE_ENTREPRISE, CP_ENTREPRISE,
       VILLE_ENTREPRISE,TEL_ENTREPRISE,EMAIL_ENTREPRISE,REFUS_ANNEESIO1  
       FROM entreprise  
       WHERE ENTREPRISE.ID_ENTREPRISE=:id;"
);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute(); 
$entreprise = $stmt->fetch(PDO::FETCH_BOTH);

// recherche des  salariés contact pour cette entreprise
// à présenter dans un menu déroulant
$stmt = $db->prepare(
    "SELECT  ID_SALARIE,NOM_SALARIE,PRENOM_SALARIE,TEL_SALARIE,EMAIL_SALARIE  
      FROM salarie INNER JOIN entreprise 
          ON SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE 
      WHERE ENTREPRISE.ID_ENTREPRISE=:id;"
);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt->execute(); 
$contacts = $stmt->fetchAll(PDO::FETCH_BOTH);

// recherche des  moyens de communication
// à présenter dans un menu déroulant
$stmt = $db->prepare("SELECT  ID_MOYEN,LIBELLE_MOYEN  FROM moyencom;");
$stmt->execute(); 
$moyens = $stmt->fetchAll(PDO::FETCH_BOTH);
?>