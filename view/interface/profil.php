<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/profil.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <title> DomOnline - Profil </title>
    </head>


    <body>

    <?php include("header.php"); ?>

    <!-- Le corps -->
    <div id="corps">

        <div id="main_block">
            <h2>Votre profil</h2>
            <p>

            Prénom : <!-- [utilisateur_prenom] -->  <br />
            Nom : <!-- [utilisateur_nom] -->  <br />
            Date de naissance : <!-- [utilisateur_dateDeNaissance] -->  <br />
            Mail : <!-- [utilisateur_mail] -->  <br />

            </p>
            <p> <a href="#">Editer votre profil</a> </p>


        </div>


    </div>

    <?php include("footer.php"); ?>

    </body>


</html>
