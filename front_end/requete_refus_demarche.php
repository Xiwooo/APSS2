<?php
session_start();
$nom_entreprise = $_SESSION['entreprise_nom'];
$db = new PDO('mysql:host=localhost;dbname=ppenr', "root", "");
$query = "UPDATE entreprise SET refus_anneesio1 = 1 WHERE nom_entreprise = UPPER(:nom_entreprise);";
$stmt = $db->prepare($query);
$stmt->bindValue(':nom_entreprise', $nom_entreprise, PDO::PARAM_STR);
$variablerandom = $stmt->fetch(PDO::FETCH_BOTH);
try{
    $stmt->execute();
    echo "L'entreprise n'est plus démarchable.";
    echo '<form action=lister_creer_entreprises.php method="POST"><input type="submit" value="Retour à la liste des entreprises."></form>';
}
catch(Exception $e) {
    echo "Erreur, l'entreprise est toujours démarchable. Si l'erreur persiste, contacter un professeur. ";   
}

?>