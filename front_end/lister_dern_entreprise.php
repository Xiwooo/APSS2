<!--   NR le 24/12/2020
//  Ce fichier comporte l'affichage de toutes les entreprises saisies
// et du nombre de démarches déjà effectuées ou 0 s'il n'y en a pas.
// cette affichage sera inclus dans le tableau e bord de l'étudiant 
// et celui du professeur 
-->
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Dernières entreprises ajoutées acceptant des stagiaires de SIO1</h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Adresse</th>
                                                <th scope="col">Téléphone</th>
                                                <th scope="col">Etudiant(s) ayant postulé</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                        </thead>
                        <tbody>
                          <!-- parcours des entreprises issues de la BDR
                            et affichages des caractéristiques trouvées
                            dont le nombre de démarches effectuées auprès de l'entreprises-->
                        <?php foreach ( $entreprisesAvecNbDem as $row ) { 
                            echo' 
                                     <tr>
                                         <td>'. $row[ 'ID_ENTREPRISE'].'</td>
                                         <td>'. $row['NOM_ENTREPRISE'].'</td>
                                         <td>'. $row['ADRESSE_ENTREPRISE'].'</td>
                                         <td>'. $row['TEL_ENTREPRISE'].'</td>
                                         <td>'. $row['NB_ET'].'</td>
                                         <td>
                                            <a href="creer_demarche.php?id='.$row['ID_ENTREPRISE'].'" ><span class="badge badge-success">Démarcher</span></a>
                                         </td>
                                      </tr> 
                         '; 
                          } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>