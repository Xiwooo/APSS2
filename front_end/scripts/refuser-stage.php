
<?php
require "../../back_end/connexion.php";
require "../../back_end/db.php";
require "../../back_end/show-data_gen.php";

$stage=$db->prepare("UPDATE stage SET ETAT='RE' WHERE ID_STAGE=:id");
$stage->bindValue(':id', $_GET['id']);
$stage->execute(); 
echo "Le stage a été refusé avec succès.";
?>