<!DOCTYPE html>


<html>

<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="public/css/accueil.css" />
    <link rel="stylesheet" href="public/css/footer.css" />
    <?= $styleHeader ?>


    <title> DomOnline - Accueil </title>
</head>


<body>

<?= $header ?>

<!-- Le corps -->
<div id="corps">

    <div id="section">

        <div id="news">

            <div id="news1">
                <h2> La domotique a de l’avenir </h2>
                <p>Selon une étude publiée par McKinsey, 50 milliard d’objets seraient connectés dans le monde en 2025 pour un marché estimé à 6 000 milliards de dollars. Cette technologie permet à des produits d’envoyer et de recevoir des données par l’intermédiaire d’Internet ce qui devrait dans un futur proche transformer le quotidien en créant de nouveaux usages.
                    Les évolutions technologiques sont au cœur du succès de la domotique en réinventant les habitudes de vie au sein de l’habitat ou du logement.</p>
            </div>

            <div id="news2">
                <h2> Nous cherchons à répondre au mieux à vos besoins </h2>
                <p> Les fonctionnalités privilégiées par les utilisateurs sont : </p>
                <ul type="square">
                    <li> la possibilité d’être informé d’un problème technique dans sa maison </li>
                    <li> la possibilité de réduire automatiquement les consommations d’énergie lorsque personne n’est présent dans la maison </li>
                    <li> la possibilité d’être informé en cas de consommation anormale d’énergie </li>
                </ul>
                <p> Selon une autre étude de 2012 publiée par l’Institut de Prospective et d’Etudes de l’Ameublement (IPEA) et le Crédit Agricole : </p>
                <ul type="square">
                    <li> 86 % des propriétaires interrogés s’équiperaient en domotique pour gagner en confort. </li>
                    <li> 87 % des locataires associent en premier la domotique à l’économie d’énergie. </li>
                </ul>

            </div>

        </div>

        <div id="about_domonline">
            <h2>À propos de DomOnline</h2>
            <p>Spécialisée dans les maisons connectées, DomOnline propose une solution domotique de qualité, vous permettant de piloter votre domicile à n'importe quel moment, depuis n'importe quel endroit.</p>
        </div>

    </div>

</div>

<!--    Footer    -->
<?php include("footer.php"); ?>

</body>


</html>
