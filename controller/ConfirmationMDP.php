<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="MDP.css" />
        <title>mot de passe oublié </title>
    </head>

    <body>
    <div class="bloc">
    <h1>Mot de passe oublié ?</h1>
    <p> Pas de panique ! Nous vous enverrons un nouveau mot de passe sur votre adresse mail associé au compte. </p>


    <form method="post" action="ConfirmationMDP_POST.php">

    <p>
       <label for="code"> Votre mail :</label>
       <input type="text" name="code_recup" id="code_recup" />
       <input type="submit" value="Envoyer" />
    </p>

    </form>
    </div>

        
    </body>
</html>