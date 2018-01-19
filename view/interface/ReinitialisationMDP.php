<?php
$tok = htmlspecialchars($_GET['tok']);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/ReinitialisationMDP.css" />
        <title>DomOnlien - Mot de passe oublié </title>
    </head>

    <body>
    <div id="paragraphe">
    <h1> Réinitialisation du mot de passe </h1>



    <form method="post" action="../../controller/ReinitialisationMDP_POST.php?tok=<?php echo $tok ?>">

    <p>
        <table>
    <tr>
        <td>
       <label for="tok2"> Votre code :</label>
        </td>
        <td>
       <input type="text" name="tok2" id="tok2" /> <br />
        </td>
    </tr>
    <tr>
        <td>
       <label for="pass_recup"> Nouveau mot de passe :</label>
        </td>
        <td>
       <input type="password" name="pass_recup" id="pass_recup" /> <br />
        </td>
    </tr>

    <tr>

        <td>
       <label for="pass_recup2"> Confirmation du nouveau mot de passe : </label>
        </td>
        <td>
       <input type="password" name="pass_recup2" id="pass_recup2" /> <br />
       </td>
    </tr>

       <td>
       <input type="submit" value="Envoyer" />
       </td>

       </table>
    </p>

    </form>
    </div>


    </body>
</html>
