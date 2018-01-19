<?php
session_start();
include("../../controller/accessDenied.php"); // on vérifie que l'utilisateur n'est pas déjà connecté
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/connexion.css" />
    <link rel="stylesheet" href="../view/css/connexion.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../view/css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../view/css/footer.css" />

    <title>DomOnline - Connexion</title>

</head>



<body>

<!--*************** Header ***************-->
<?php include("header.php"); ?>

<!--*************** Le corps ***************-->
<div class="corps">

    <form method="post" action="../../controller/connexion.php">
        <p>
            <input type="text" name="pseudo" id="identifiant" placeholder="Identifiant" size="30" maxlength="20" value="<?php if (isset($_COOKIE['username']) && !isset($_COOKIE['username_temp'])){echo $_COOKIE['username'];} elseif (isset($_COOKIE['username_temp'])){echo $_COOKIE['username_temp'];} ?>" />
            <br /><br />

            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" size="30" maxlength="20" /><br />
        <div id="box">
            <label for="boxSouvenir" id="souvenir">Se souvenir de moi</label> <input type="checkbox" name="souvenir" id="boxSouvenir" /> <br />
            <input type="submit" value="Se connecter" class="boutton" />
        </div>
        <a href="#" id="mdpOublie"> Mot de passe oublié </a> <br />
        <?php
        if($_GET['erreur']==1)
        {
            ?>
            <p><span class="msg_erreur">Cet identifiant n'existe pas</span></p>
            <?php
        }
        elseif($_GET['erreur']==2)
        {
            ?>
            <p><span class="msg_erreur">Le mot de passe utilisé est incorrect</span></p>
            <?php
        }
        elseif($_GET['erreur']==3)
        {
            ?>
            <p><span class="msg_erreur">Un des champs n'a pas été rempli</span></p>
            <?php
        }
        elseif($_GET['erreur']!=1 && $_GET['erreur']!=2 && $_GET['erreur']!=3)
        {
            header("Location:../interface/connexion.php");
        }
        ?>

        </p>
    </form>

</div>



<!--*************** Footer ***************-->
<?php include("footer.php"); ?>



</body>

</html>
