<!DOCTYPE html>
<html lang="en">

<?php
    $title = "Statistiques";
    include_once 'includes/header.php';
    include_once 'middlewares/professeur.php';
    include_once 'scripts/show-data.php';
?>

<body>

<?php
    include_once 'includes/leftbar.php';
    include_once 'includes/topbar.php';
?>

    <div class="lime-container">
        <div class="lime-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Répartition des élèves avec un stage pour l'année scolaire 2019/2020</h5>
                                <canvas id="graph1"></canvas>
                                <script>

                                $(document).ready(function() {

                                    <?php
                                        $non_stage = sql_fetch_column("SELECT COUNT(etudiant.id) AS nb_NonStage FROM etudiant WHERE etudiant.id NOT IN (SELECT etudiant_id FROM stage)");
                                        $stage = sql_fetch_column("SELECT COUNT(etudiant_id) AS nb_Stage FROM stage");
                                        $data = [(int)$non_stage, (int)$stage];
                                    ?>
                                    var ctx = document.getElementById('graph1').getContext('2d');

                                    var data = {
                                        datasets: [{
                                            data: <?= json_encode($data); ?>
                                        }],

                                        // These labels appear in the legend and in the tooltips when hovering different arcs
                                        labels: [
                                            'Sans stage',
                                            'Avec un stage',
                                        ]
                                    };

                                    var options;

                                    var config = {
                                        type: 'pie',
                                        data: data,
                                        options: options
                                    };

                                    var graph1 = new Chart(ctx, config);

                                });
                                </script>
                                <br>
                                <h5 class="card-title">Liste des étudiants n'ayant pas de stage</h5>
                                <div class="table-responsive">
                                <?php $non_stage = sql_fetch_all("SELECT * FROM etudiant WHERE etudiant.id NOT IN (SELECT etudiant_id FROM stage)"); ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prénom</th>
                                        <?php foreach( $non_stage as $row ) {
                                                echo '
                                            <tbody>
                                                <tr>
                                                    <td>'. $row['id'] .'</td>
                                                    <td>'. $row['nom'] .'</td>
                                                    <td>'. $row['prenom'] .'</td>
                                                </tr>
                                                '; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <h5 class="card-title">Liste des étudiants ayant un stage</h5>
                                <div class="table-responsive">
                                <?php $stage = sql_fetch_all("SELECT * FROM etudiant JOIN stage ON etudiant.id = stage.etudiant_id"); ?>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nom</th>
                                                <th scope="col">Prénom</th>
                                        <?php foreach( $stage as $row ) {
                                                echo '
                                            <tbody>
                                                <tr>
                                                    <td>'. $row['id'] .'</td>
                                                    <td>'. $row['nom'] .'</td>
                                                    <td>'. $row['prenom'] .'</td>
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

    <?php include 'includes/footer.php' ?>

</body>

</html>