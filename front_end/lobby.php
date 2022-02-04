<!--   NR le 24/12/2020
//  Ce fichier comporte l'affichage des deux fenêtres pour chosir son type de connexion
-->
<!DOCTYPE html>
<html lang="en">
<?php 
    $title = "Lobby";
    require '../includes/header.php';    
?>

<body class="login-page err-500">
    <div class="container">

    </div>
    <div class="container">
        <div class="login-container">
            <div class="row">
                <div class="col-md-6 lfh">
                    <div class="login-box">
                        <div class="card-deck">
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Accès Professeur</h5>
                                    <img src="../assets/images/teacher.png" alt="">
                                </div>
                                <a href="connexion.php?type=professeur">
                                    <button class="btn btn-block btn-lg btn-primary" id="lobby-card-pres">Connexion Professeur</button>
                                </a>
                        
                            </div>
                            <div class="card text-center">
                                <div class="card-body">
                                    <h5 class="card-title">Accès Etudiant</h5>
                                    <img src="../assets/images/student.png" alt="">
                                </div>
                                <a href="connexion.php?type=etudiant">
                                    <button class="btn btn-block btn-lg btn-primary" id="lobby-card-pres">Connexion Etudiant</button>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require 'includes/footer.php' ?>

</body>

</html>