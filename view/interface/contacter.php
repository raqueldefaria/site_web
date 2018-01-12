<?php
session_start();
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/contacter.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/footer.css" />

        <title>DomOnline - Nous contacter</title>
    </head>


    <body>

    <!-- Header -->
    <?php
    require("../../controller/headerInclude.php");
    require("../../controller/headerIncludeCSS.php");
    ?>

    <!-- Le corps -->
    <div id="corps">

      <div id="paragraphe">
        <p>Des questions sur notre application ? <br />Vous avez un soucis dans votre installation ?<br /> Le matériel est tombé en panne ?<br /> Nous sommes là <span class="bold">pour vous aider</span>.</p>

        <h2><img src="../images/icone_mail.png" alt"" /> <br />Nous contacter par mail</span></h2>
        <p> Envoyez-nous un mail à notre adresse : <a href="mailto:domonline@gmail.com">domonline@gmail.com</a>. <br/> Un membre de notre équipe vous répondera dans les plus brefs délais.</p>

        <h2><img src="../images/logo_telephone.png" alt"" /> <br />Nous contacter par téléphone</h2>
        <p>Appelez-nous au 06 66 66 66 66 entre 9h et 20h, ligne vocale ouverte du lundi au samedi.<br/> Un membre de notre équipe sera à votre disposition pour répondre à vos questions.</p>
      </div>

    </div>

    <?php include("footer.php"); ?>

    </body>




</html>
