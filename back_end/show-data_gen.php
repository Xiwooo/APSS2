<?php 
include '../back_end/Fonction.php';

/**
 * * NR le 24/12/2020
 *   ce fichier permet de retrouver les informations générales
 *    du tableau de bord. Informations statistiques  affichées 
 * // aux étudiants et professeurs pour mesurer l'avancement général
 *  d   des recherches de la classe
 **/ 
// recherche des étudiants  ceux de SIO1
// ainsi que le nombre d'étudiants
$stmt = $db->prepare("SELECT * FROM etudiant ORDER BY nom_etudiant ASC");
$stmt->execute(); 
$etudiants = $stmt->fetchAll(PDO::FETCH_BOTH);
$countEtudiants = count($etudiants);

// recherche des entreprises sans salarié associées
//           aux entreprises avec salariés démarchées ou non
$req="
   SELECT ENTREPRISE.ID_ENTREPRISE, NOM_ENTREPRISE,ADRESSE_ENTREPRISE,
      VILLE_ENTREPRISE,REFUS_ANNEESIO1,TEL_ENTREPRISE,EMAIL_ENTREPRISE,0 AS NB_ET 
      FROM entreprise 
      WHERE ID_ENTREPRISE 
            NOT IN (
                SELECT ID_ENTREPRISE FROM SALARIE) 
    UNION 
   SELECT ENTREPRISE.ID_ENTREPRISE,NOM_ENTREPRISE,ADRESSE_ENTREPRISE,VILLE_ENTREPRISE
      ,REFUS_ANNEESIO1, TEL_ENTREPRISE,EMAIL_ENTREPRISE,COUNT(ID_DEMARCHE) AS NB_ET 
      FROM entreprise INNER JOIN SALARIE ON ENTREPRISE.ID_ENTREPRISE=SALARIE.ID_ENTREPRISE 
          LEFT JOIN demarche ON SALARIE.ID_SALARIE=DEMARCHE.ID_SALARIE 
    GROUP BY ENTREPRISE.ID_ENTREPRISE;";

$stmt = $db->prepare($req);
$stmt->execute(); 
$entreprisesAvecNbDem = $stmt->fetchAll(PDO::FETCH_BOTH);

// recherche et comptage des entreprises 
//       qui acceptent encore de répondre à des stages
$stmt = $db->prepare("SELECT * FROM entreprise WHERE REFUS_ANNEESIO1=0 ");
$stmt->execute(); 
$entreprises = $stmt->fetchAll(PDO::FETCH_BOTH);
$countEntreprises = count($entreprises);

// recherche et comptage des entreprises 
//       qui réfusent de répondre à des stages
$stmt = $db->prepare("SELECT * FROM entreprise WHERE REFUS_ANNEESIO1=1 ");
$stmt->execute(); 
$entrepriseRefus = $stmt->fetchAll(PDO::FETCH_BOTH);
$countEntreprisesRefus = count($entrepriseRefus);

//  comptage de toutes les  entreprises 
//       qui refusent de répondre à des stages
$countEntrepriseTotal = sql_fetch_column("SELECT COUNT(*) FROM entreprise");

// recherche et comptage des stages obtenus par les stagiaires
//       qui réfusent de répondre à des stages
$stmt = $db->prepare("SELECT * FROM stage WHERE ETAT='OK';");
$stmt->execute();
$etudiantStage = $stmt->fetchAll(PDO::FETCH_BOTH);
$countEtudiantStage = count($etudiantStage);
?>