<!--   NR le 24/12/2020
//  Ce fichier comporte les affichages de la page de consultation des entreprises
// Comme tout fichier d'affichage, il comporte des réutilisations 
//de la définition du header et du footer
-->
<!DOCTYPE html>
<html lang="en">

<?php 
    $title = "Liste des Entreprises";    
    // inclusion des fichiers hedaer, tt du type d'utilisateur
    include '../includes/header.php';   
   include '../middlewares/etudiant.php';  
    // inclusion des fichiers de traitements de données   
    include '../back_end/lister_entreprises.php'; 
    include '../back_end/show-data_gen.php';    
    ?>

<body>

    <?php 
    include '../includes/barnav.php'; 
    ?>
    
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Liste des Entreprises déjà crées</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nom</th>
                                                <th scope="col">VILLE</th>
                                                <th scope="col">Téléphone</th>
                                                <th scope="col">Courriel</th>
                                                <th scope="col">NB Démarche étudiant(s) </th>
                                                
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <!-- parcours de toutes  les entrepreises de la BDR
                                        et affichages des caractéristiques trouvées
                                        L'utilisateur pourra choisir l'ent pour créer
                                        la démarche de recherche effectuée auprès d'elle-->
                                        <?php foreach( $entreprisesAvecNbDem as $row ) { 
                                            if ($row['REFUS_ANNEESIO1']==0)
                                                echo '
                                                  <tr>
                                                    <td>'. escape($row['NOM_ENTREPRISE']) .'</td>
                                                    <td>'. escape($row['VILLE_ENTREPRISE']) .'</td>
                                                    <td>'. escape($row['TEL_ENTREPRISE']) .'</td>
                                                    <td>'. escape($row['EMAIL_ENTREPRISE']) .'</td>
                                                    <td>'. escape($row['NB_ET']) .'</td>
                                                    <td>
                                                        <a href="creer_demarche.php?id='.$row['ID_ENTREPRISE'].'" ><span class="badge badge-success">Démarcher</span></a>
                                                    </td>
                                                </tr> 
                                                '; 
                                                else
                                                echo '
                                                  <tr>
                                                    <td>'. escape($row['NOM_ENTREPRISE']) .'</td>
                                                    <td>'. escape($row['VILLE_ENTREPRISE']) .'</td>
                                                    <td>'. escape($row['TEL_ENTREPRISE']) .'</td>
                                                    <td>'. escape($row['EMAIL_ENTREPRISE']) .'</td>
                                                    <td>'. escape($row['NB_ET']) .'</td>
                                                    <td></td>
                                                  </tr> 
                                                  ';
                                                   }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <div class="row">
          <div class="col-sm-12"> 
            <button type="button" name="creer_entreprise" >
            <a href="creer_entreprise.php" class="btn btn-block btn-primary btn-lg">Créer une nouvelle entreprise qui n'est pas dans la liste</a>
            </button>
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
    </div>
 
    <?php include '../includes/footer.php' ?>

</body>

</html>