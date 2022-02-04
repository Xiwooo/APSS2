
<!DOCTYPE html>
<html lang="en">
    
    <?php 
    $title = "Actualiser les démarches ";    
    include '../includes/header.php';   
    include '../middlewares/etudiant.php'; 
    include '../back_end/show-data_etudiant.php';   
    ?>

    <body> 
    <?php  include '../includes/barnav.php';
           include 'lister_dern_dem_et.php'; ?> 
    <div class="container">
        <div class="row">
          <div class="col-sm-12"> 

            <button type="button" name="creer_entreprise" >
            <a href="creer_entreprise.php" class="btn btn-block btn-primary btn-lg">Pour créer une démarche avec une entreprise qui n'est pas dans la liste, il faut d'abord créer l'entreprise.</a>
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
 