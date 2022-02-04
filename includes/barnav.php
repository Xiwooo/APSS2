<!--   NR le 24/12/2020
  affichage de la barre de navigation avec plusieurs zones
   et selon le type d'utilisateurs
-->

<nav class="navbar navbar-expand-lg">
<?php
//  affichage des fonctionnalités accessibles aux étudiants
if ($_SESSION['rank'] == "professeur") { 
    echo'
    
    <h2 class="navbar-brand nav-link" >
      <a
        href="tdb_professeur.php">
           iStage  pour les  professeurs. 
      </a>
    </h2>
    <ul class=" collapse navbar-collapse">
        <li class="nav-link dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                 Lister les étudiants et leurs démarches
            </a>

              <ul class="dropdown-menu">
                  <li>
                  <a href="lister_entreprises.php?classe=SIO1"> BTS SIO1</a>
                  </li>
                  <li>
                  <a href="lister_entreprises.php?classe=SIO2"> BTS SIO2</a>
                  </li>
              </ul>
       </li>
        <li class="nav-link dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                Gérer les visites de stages
              </a>

              <ul class="dropdown-menu">
                  <li>
                  <a href="emettre_voeux.php"> émettre des voeux de visites</a>
                  </li>
                  <li>
                  <a href="afficher_visites.php"> afficher les visites fixées</a>
                  </li>
              </ul>  
        </li>
  </ul>
  ';
}    
//  affichage des fonctionnalités accessibles aux étudiants
if ($_SESSION['rank'] == "etudiant") {
     echo '
       <h2 class="navbar-brand nav-link" >
       <a
         href="tdb_etudiant.php">
            iStage  pour les  étudiants. 
       </a>
     </h2>
    <ul class=" collapse navbar-collapse">
             <li class="nav-link ">
              <a  href="lister_demarches.php">Actualiser/créer tes démarches</a>
              </li>
              <li class="nav-link ">
                 <a  href="lister_creer_entreprises.php">Chercher une entreprise</a>
             </li>
   </ul>
    
   ';
}  
?>
<!--   NR le 24/12/2020
//  affichage de la barre de navigation commune aux étudiants et professeurs
//  affichage des éléments d'identification et de la possibilité de les consulter 
// et les modifier!
// ainsi quie la déconnexion à l'application avec RAZ des variables de session
-->
    <ul class=" collapse navbar-collapse">
          <li class=" nav-link dropdown">    
             <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                 <i class="fad fa-user-tag mr-3"></i> 
             <?php echo ucfirst($_SESSION['prenom'])." ".ucfirst($_SESSION['nom']); ?>
             </a>
             <ul class="dropdown-menu">
                <li>
                    <a class="dropdown-item" href="profil.php">
                           <i class="fad fa-user mr-3"></i>
                                 Mon Profil
                    </a>
                </li>
                <li><a class="dropdown-item" href="deconnexion.php">
                       <i class="fad fa-sign-out mr-3"></i> 
                       Se déconnecter
                    </a> 
                </li>
             </ul>
          </li>       
    </ul>
</nav>
