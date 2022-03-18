<?php
session_start();
require "../back_end/connexion.php";
require "../back_end/db.php";
require "../back_end/show-data_etudiant.php";

?>
<div class="row">
    <div class="col-md-12"> 
        <div class="card">
            <div class="card-body">
                 <h1 class="card-title">Démarches</h1>
                 <div class="table-responsive">
                 <table class="table">
                        <thead>
                            <tr>
                                                <th scope="col">Date démarche</th>
                                                <th scope="col">Nom entreprise</th>
                                                <th scope="col">Ville entreprise</th>
                                                <th scope="col">nom du contact</th>
                                                <th scope="col">tel du contact</th>
                                                <th scope="col">moyen de communication</th>
                                                <th scope="col">commentaire</th>
                                                
                             </tr>
                        </thead>
                        <tbody>
<?php 

  foreach( $demarches as $row ) {  
     echo ' 
     <tr>
        
         <td>'. join('-',array_reverse(explode('-',substr($row['DATE_DEMARCHE'],0,10)))).'</td>
         <td>'. $row['NOM_ENTREPRISE'].'</td>
         <td>'. $row['VILLE_ENTREPRISE'].'</td>
         <td>'. $row['NOM_SALARIE'].'</td>
         <td>'. $row['TEL_SALARIE'].'</td>
         <td>'. $row['LIBELLE_MOYEN'].'</td>
         <td>'. $row['COMMENTAIRE'].'</td>
     </tr> 
 '; }  ?> 