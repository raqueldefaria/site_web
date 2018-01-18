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


    <form method="post" action="MDP_POST.php">

    <p>
       <label for="mail_recup"> Votre mail :</label>
       <input type="email" name="mail_recup" id="mail_recup" />
       <input type="submit" value="Envoyer" />
    </p>

    </form>
    </div>

        
    </body>
</html>
