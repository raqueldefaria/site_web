<?php
session_start();

/* ------------------- On vérifie que c'est bien un nombre qui
                  est transmis dans l'adresse ------------------- */
$id = htmlspecialchars($_GET['modify']);
if(is_numeric($id) == FALSE)
{
  header('Location: adminView.php');
}

/* ------------------- BDD ------------------- */
require("../../model/adminmodifyModel.php");

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['utilisateur_login'])
{
  $newpseudo = htmlspecialchars($_POST['newpseudo']);
  updatepseudo($id, $newpseudo);
  header('Location: adminView.php');
}

if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['utilisateur_mail'])
{
  $newmail = htmlspecialchars($_POST['newmail']);
  updatemail($id, $newmail);
  header('Location:  adminView.php');
}

if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['utilisateur_prenom'])
{
  $newprenom = htmlspecialchars($_POST['newprenom']);
  updateprenom($id, $newprenom);
  header('Location:  adminView.php');
}

if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['utilisateur_nom'])
{
  $newnom = htmlspecialchars($_POST['newnom']);
  updatenom($id, $nom);
  header('Location:  adminView.php');
}

if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['logement_adresse'])
{
  $newadresse = htmlspecialchars($_POST['newadresse']);
  updateadresse($_POST['idlogement'], $newadresse);
  header('Location:  adminView.php');
}

if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['logement_ville'])
{
  $newville = htmlspecialchars($_POST['newville']);
  updateville($_POST['idlogement'], $newville);
  header('Location: adminView.php');
}

if(isset($_POST['newcodePostal']) AND !empty($_POST['newcodePostal']) AND $_POST['newcodePostal'] != $user['logement_codePostal'])
{
  $newcodePostal = htmlspecialchars($_POST['newcodePostal']);
  updatecodePostal($_POST['idlogement'], $newcodePostal);
  header('Location:  adminView.php');
}

if(isset($_POST['newpays']) AND !empty($_POST['newpays']) AND $_POST['newpays'] != $user['logement_pays'])
{
  $newpays = htmlspecialchars($_POST['newpays']);
  updatepays($_POST['idlogement'], $newpays);
  header('Location:  adminView.php');
}

/* ------------------- Affichage des logements de l'utilisateur sélectionné ------------------- */
function show_logements()
{
  $id = $_GET['modify'];
  $data = table_logements($id);
  $count = 0;
  while($logements = $data->fetch())
  {
    $count++;
    ?>
    <h2>Logement <?php echo $count; ?> </h2>

    <form method="POST" action="adminmodifyView.php?modify=<?php echo $id; ?>">

    <table>
      <tr>
        <td align="right">
           <strong> Adresse </strong> :
        </td>
        <td>
          <input type="text" placeholder="Adresse" id="newadresse" name="newadresse" value="<?php echo $logements['logement_adresse']; ?>" required />
        </td>
      </tr>
      <tr>
        <td align="right">
           <strong> Ville </strong> :
        </td>
        <td>
          <input type="text" placeholder="Ville" id="newville" name="newville" value="<?php echo $logements['logement_ville']; ?>" required />
        </td>
      </tr>
      <tr>
        <td align="right">
           <strong> Code postal </strong> :
        </td>
        <td>
          <input type="text" placeholder="Code postal" id="newcodePostal" name="newcodePostal" value="<?php echo $logements['logement_codePostal']; ?>" required/>
        </td>
      </tr>
      <tr>
        <td align="right">
           <strong> Pays </strong> :
        </td>
        <td>
          <input type="text" placeholder="Pays" id="newpays" name="newpays" value="<?php echo $logements['logement_pays']; ?>" required />
        </td>
      </tr>

          <input type="hidden" placeholder="idlogement" id="idlogement" name="idlogement" value="<?php echo $logements['id_Logement']; ?>" required />

    </table>

    <br />
    <input type="submit" value="Mettre à jour le logement !" class="boutton" id="bouenvoie"/>

    </form>

    <?php
  }
}

?>
