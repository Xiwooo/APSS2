<!--   NR le 24/12/2020
//  Ce fichier comporte les afichages de la page de création 
//  d'une entreprise par un étudiant 
// Comme tout fichier d'affichage, il comporte des réutilisations 
//de la définition du header et du footer
-->
<!DOCTYPE html>
<html lang="en">
<?php
    $title = "Créer une nouvelle entreprise";
     // inclusion des fichiers hedaer, tt du type d'utilisateur
    include_once '../includes/header.php';
    include_once '../middlewares/etudiant.php';
     // inclusion des fichiers de traitements de données
    include_once '../back_end/creer_entreprise.php';
?>

<body>
<?php
    include_once '../includes/barnav.php';
?>
    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nouvelle entreprise</h5>
                                <div class="mt-4">
                                            <!-- préparation de l'affichage des erreurs
                                            après soumission-->
                                    <?php if(isset($success)) {
                                    echo '<p class="text-'.($success == true ? 'success' : 'danger').'">'.$message.'</p>';
                                }
                                ?>
                                </div>
                                <!-- affichage du formulaire :
                                     - saisie des caractéristiques de lentreprise, toutes sont obligatoires
                                     - sauf le contact à saisir dans une autre page, fonctionnalité non codée
                                      -->
                                <form method="POST" id="creer_entreprise" name="creer_entreprise" class="mt-4">
                                    <div class="form-group">
                                        <label for="nom">Nom de l'entreprise</label>
                                        <input type="text" class="form-control" id="nom_entreprise"  name="nom"  maxlength="32"   required>
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse">Adresse de l'entreprise</label>
                                        <input type="text" class="form-control " id="adresse_entreprise"  name="adresse" maxlength="32" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="ville">ville de l'entreprise</label>
                                        <input type="text" class="form-control " id="ville_entreprise"  name="ville" maxlength="32" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="cp">code postal de l'entreprise</label>
                                        <input type="text" class="text-center"   id="cp_entreprise"  name="cp" maxlength="5" size="5" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="courriel">courriel de l'entreprise</label>
                                        <input type="email" class="form-control " id="courriel"  name="courriel" size="32" required >
                                    </div>
                                    <div class="form-group">
                                        <label for="tel">téléphone de l'entreprise</label>
                                        <input type="tel"  id="tel"  name="tel" maxlength="10" size="10" required >
                                    </div>
                                    
                                    
                                    <div class="mt-3">
                                        <button type="submit" name="creer_entreprise" id="creer_entreprise"
                                            class="btn btn-block btn-primary btn-lg">Soumettre</button>
                                    </div>
                                </form>
                            </div>
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
    </div>
    </div>

    <?php include '../includes/footer.php' ?>

</body>

</html>