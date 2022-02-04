<?php 
/**
 * * NR le 24/12/2020
 *   ce fichier permet de retrouver les informations nécessaires
 *   à l'affichage du tableau de bord
 *      . savoir si le stagiaire a obtenu un stage
 *      . connaitre les démarches effectuées par le candidat
 **/ 
// Conservation de l'identifiant  pour  les traitements sur le professeur
$id_courant=$_SESSION['id'];


// Recherche des stages non validés dans la même spécialité  
// que celle du professeur connecté s'il est professeur de spécialité
$stmt = $db->prepare(
    "SELECT ID_STAGE,DATE_FIN,DATE_DEBUT, NOM_ETUDIANT,
            PRENOM_ETUDIANT,NOM_ENTREPRISE,
            VILLE_ENTREPRISE,NOM_SALARIE,TEL_SALARIE 
      FROM stage,entreprise,etudiant,salarie,specialite 
      WHERE SALARIE.ID_SALARIE=STAGE.ID_SALARIE AND 
            SALARIE.ID_ENTREPRISE=ENTREPRISE.ID_ENTREPRISE AND
           STAGE.ID_ETUDIANT=ETUDIANT.ID_ETUDIANT AND 
           ETUDIANT.ID_SPECIALITE=SPECIALITE.ID_SPECIALITE AND 
           SPECIALITE.ID_PROF=:id    AND ETAT !='OK' 
           ORDER BY NOM_ETUDIANT DESC;"
);
$stmt->bindValue(':id', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$stageAttente = $stmt->fetchAll(PDO::FETCH_BOTH);
$countStageAttente = count($stageAttente);

// Recherche des démarches effectuées par les étudiants de BTS SIO1  
// pour le professeur de référence de la classe testeeee
$stmt = $db->prepare(
    "SELECT  NOM_ETUDIANT,PRENOM_ETUDIANT,COUNT(ID_DEMARCHE)  AS NB_DEM  
        FROM etudiant LEFT JOIN demarche ON ETUDIANT.ID_ETUDIANT=DEMARCHE.ID_ETUDIANT 
            INNER JOIN classe ON ETUDIANT.ID_CLASSE=CLASSE.ID_CLASSE 
        WHERE LIBELLE_CLASSE='SIO1' AND CLASSE.ID_PROF=:id_courant 
        GROUP BY ETUDIANT.ID_ETUDIANT   
        ORDER BY NOM_ETUDIANT;"
);
$stmt->bindValue(':id_courant', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$etudiantsProfRefDemarche = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarcheProfref = count($etudiantsProfRefDemarche);

// Recherche des démarches effectuées par les étudiants de BTS SIO1
// décompte des démarches effectuées par chaque étudiant 
// pour un professeur de spécialité
$stmt = $db->prepare(
    "SELECT  NOM_ETUDIANT,PRENOM_ETUDIANT,COUNT(ID_DEMARCHE)  AS NB_DEM  
      FROM etudiant 
          LEFT JOIN demarche ON ETUDIANT.ID_ETUDIANT=DEMARCHE.ID_ETUDIANT 
          INNER JOIN classe ON ETUDIANT.ID_CLASSE=CLASSE.ID_CLASSE 
          INNER JOIN specialite ON SPECIALITE.ID_PROF=ETUDIANT.ID_SPECIALITE 
     WHERE LIBELLE_CLASSE='SIO1' AND SPECIALITE.ID_PROF=:id_courant 
     GROUP BY ETUDIANT.ID_ETUDIANT  
      ORDER BY NOM_ETUDIANT;"
);
$stmt->bindValue(':id_courant', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$etudiantsProfSpeDemarche = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarcheProfspe = count($etudiantsProfSpeDemarche);

// Recherche des démarches effectuées par les étudiants de BTS SIO1
// décompte des démarches effectuées par chaque étudiant associé à un simple professeur
$stmt = $db->prepare(
    "SELECT  NOM_ETUDIANT,PRENOM_ETUDIANT,COUNT(ID_DEMARCHE)  AS NB_DEM  
        FROM etudiant 
         LEFT JOIN demarche ON ETUDIANT.ID_ETUDIANT=DEMARCHE.ID_ETUDIANT 
         INNER JOIN classe ON ETUDIANT.ID_CLASSE=CLASSE.ID_CLASSE  
        WHERE LIBELLE_CLASSE='SIO1' AND ETUDIANT.ID_PROF=:id_courant 
        GROUP BY ETUDIANT.ID_ETUDIANT   
        ORDER BY NOM_ETUDIANT;"
);
$stmt->bindValue(':id_courant', $id_courant, PDO::PARAM_INT);
$stmt->execute(); 
$etudiantsProfSimpleDemarche = $stmt->fetchAll(PDO::FETCH_BOTH);
$countDemarcheProfsimple = count($etudiantsProfSimpleDemarche);

// Conservation des démarches non nulles selon le ype du professeur
if ($countDemarcheProfref>=1) {
    $demarches=$etudiantsProfRefDemarche;
} else if ($countDemarcheProfspe>=1) {
           $demarches=$etudiantsProfSpeDemarche;
} else { 
    $demarches=$etudiantsProfSimpleDemarche;
}




?>