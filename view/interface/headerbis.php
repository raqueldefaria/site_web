<header>
        <div id="header">
          <div class="logo">
              <a href="accueil.php"><img src="../images/logodomonline.png" alt="Logo du site" id="logoCompanyHeader"></a>
          </div>

          <nav class="menu">

            <a href="notreEquipe.php" class="txtHeader1"> Notre équipe </a>

            <a href="nosOffres.php" class="txtHeader2"> Nos offres </a>
            <a href="contacter.php" class="txtHeader3"> Nous contacter </a>
          </nav>
          <div class="bouttons">
            <div class="bouton_profil" id="boutonProfil">
                <div class="prenom_nom">
                  <?php echo $_SESSION['pseudo'] ; ?>
                </div>
                <div class="avatar">
                  <img id="avatar" src="../images/585e4beacb11b227491c3399.png" />
                </div>
                <div class="dropdown_content">
                  <a href="profil.php">Profil</a>
                  <a href="logements.php">Logements</a>
                </div>
            </div>
            <div class="seConnecter">
              <a href="deconnexion.php" id="boutonSeDeconnecter"> Se Déconnecter </a>
            </div>
          </div>
        </div>


</header>
