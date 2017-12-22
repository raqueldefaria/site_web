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
            <div class="profil">
                <a href="profil.php" id="boutoninscrire">
                  <?php
                  echo ($_SESSION['nom']);
                  echo ($_SESSION['prenom']);
                  ?>
                  <img src="../images/avatar.png" />


                </a>
            </div>
            <div class="seConnecter">
                <a href="deconnexion.php" id="boutonSeConnecter"> Se Déconnecter </a>
            </div>
          </div>
        </div>

      <!--  <div class="avatar">
          <div class="profil">
          <a href="profil.php" id="avattar"><img src="../images/avatar.png" /> <a/>
        <div/>
      </div>
-->


</header>
