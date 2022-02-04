<?php
/**
 * * NR le 24/12/2020
 *   ce fichier permet de récupérer pour toutes les entreprises de la bases
 *   les caractéristiques des entreprises et le nombre de démarches 
 *    déjà effectuées par des étudiants
 **/ 
$req1="SELECT ENTREPRISE.ID_ENTREPRISE,NOM_ENTREPRISE,VILLE_ENTREPRISE, 
TEL_ENTREPRISE,EMAIL_ENTREPRISE,REFUS_ANNEESIO1,COUNT(ID_DEMARCHE) AS NB_ET  
   FROM entreprise 
  INNER JOIN SALARIE ON ENTREPRISE.ID_ENTREPRISE=SALARIE.ID_ENTREPRISE 
  LEFT JOIN demarche ON SALARIE.ID_SALARIE=DEMARCHE.ID_SALARIE  
  GROUP BY ENTREPRISE.VILLE_ENTREPRISE   
  ORDER BY NOM_ENTREPRISE DESC";
$stmt = $db->prepare($req1);
$stmt->execute(); 
$entreprises = $stmt->fetchAll(PDO::FETCH_BOTH);
$countEntreprises = count($entreprises);
