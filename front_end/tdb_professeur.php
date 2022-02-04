<!DOCTYPE html>
<html lang="en">

<?php 
    $title = "Tableau de Bord Professeur";    
    include '../includes/header.php';   
    include '../middlewares/professeur.php';     
    include '../back_end/show-data_gen.php';    
    include '../back_end/show-data_prof.php';    

    ?>

<body>
    <?php 
    include '../includes/barnav.php'; 
    include 'tbd_gen.php'; 
    ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stages en attente</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nom Stagiaire</th>
                                                <th scope="col">Prénom Stagiaire</th>
                                                <th scope="col">Nom entreprise</th>
                                                <th scope="col">Ville entreprise</th>
                                                <th scope="col">Nom contact</th>
                                                <th scope="col">Tel contact</th>
                                                <th scope="col">Date début</th>
                                                <th scope="col">Date fin</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        foreach( $stageAttente as $row ) { 
                                                echo '
                                            
                                                <tr>
                                                    <td>'. $row['ID_STAGE'] .'</td>    
                                                    <td>'. $row['NOM_ETUDIANT'] .'</td>
                                                    <td>'. $row['PRENOM_ETUDIANT'] .'</td>
                                                    <td>'. $row['NOM_ENTREPRISE'] .'</td>
                                                    <td>'. $row['VILLE_ENTREPRISE'] .'</td>
                                                    <td>'. $row['NOM_SALARIE'] .'</td>
                                                    <td>'. $row['TEL_SALARIE'] .'</td>
                                                    <td>'. $row['DATE_DEBUT'] .'</td>
                                                    <td>'. $row['DATE_FIN'] .'</td>
                                                    <td>
                                                        <a href="scripts/statut-stage.php?id='.$row['ID_STAGE'].'"><span class="badge badge-success">Valider</span></a>
                                                        <a href="scripts/refuser-stage.php?id='.$row['ID_STAGE'].'"><span class="badge badge-danger">Refuser</span></a>
                                                    </td>
                                                </tr> 
                                                '; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Etudiants  de SIO1 et synthèse de leurs démarches</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                                            <tr>

                                                <th scope="col">Nom</th>
                                                <th scope="col">Prénom</th>
                                                <th scope="col">Nombres de démarches </th>
                                                <th scope="col">Actions</th>
                                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ( $demarches as $row ) { 
                            echo' 
                                     <tr>
                                         <td>'. $row['NOM_ETUDIANT'].'</td>
                                         <td>'. $row['PRENOM_ETUDIANT'].'</td>
                                         <td>'. $row['NB_DEM'].'</td>
                                         <td>
                                            <a href="" data-toggle="modal" data-target="#exampleModalCenter"><span class="badge badge-success">Voir</span></a>
                                         </td>
                                      </tr> 
                         ';  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="lime-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="footer-text">2020 © iStage</span>
                    </div>
                </div>
            </div>
        </div>
 
    
    


    <?php include '../includes/footer.php' ?>

</body>

</html>