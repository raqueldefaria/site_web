<?php

// Charging classes
require_once('model/HousingManager.php');
require_once('model/UserManager.php');
require_once('model/RoomManager.php');
require_once('model/SensorManager.php');
require_once('model/CemacManager.php');


// modify admin profile
function modifyAdmin($error,$id){
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1];
    $currentUser = new UserManager();
    $user = $currentUser->showAllInfoAdmin($id);
    ?>
    <?php ob_start(); ?>
    Page Administrateur
    <?php $title = ob_get_clean(); ?>
    <?php ob_start();?>
    <!-- Le corps -->
    <div id="corps">
        <div id="main_block">
            <div align="center">
                <h2>Éditer votre profil</h2>
                <form method="POST" action="index.php?action=modifyProfileAdmin&id=<?php echo $id ?>">
                    <table>
                        <tr>
                            <td align="right">
                                <strong> Pseudo </strong> :
                            </td>
                            <td>
                                <input type="text" placeholder="Pseudo" id="newpseudo" name="newpseudo" value="<?php echo $user['utilisateur_login']; ?>" required />
                                <span id="missPseu"></span>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <strong> Mail </strong> :
                            </td>
                            <td>
                                <input type="mail" placeholder="Mail" id="newmail" name="newmail" value="<?php echo $user['utilisateur_mail']; ?>" required />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <strong> Prénom </strong> :
                            </td>
                            <td>
                                <input type="text" placeholder="Prénom" id="newprenom" name="newprenom" value="<?php echo $user['utilisateur_prenom']; ?>" required />
                            </td>
                        </tr>
                        <tr>
                            <td align="right">
                                <strong> Nom </strong> :
                            </td>
                            <td>
                                <input type="text" placeholder="Nom" id="newnom" name="newnom" value="<?php echo $user['utilisateur_nom']; ?>" required />
                            </td>
                        </tr>
                    </table>
                    <br />
                    <input type="submit" value="Mettre à jour mon profil !" class="boutton" id="bouenvoie"/>
                </form>
            </div>

            <br />
            <a href="index.php?action=goToAdmin"> Retourner à la page d'administration </a>
            <br/>
            <p> </p>
        </div>

        <?php
        if ($error!=null) {
            ?>
            <?= $error ?>
            <?php
        } ?>

    </div>
    <!--************** script **************-->
    <script>
        var formValid = document.getElementById('bouenvoi');
        var prenom = document.getElementById('Pseudo');
        var missPrenom = document.getElementById('missPseu');
        var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;
        formValid.addEventListener('click', validation);
        function validation(event){
            //Si le champ est vide
            if (identifiant.validity.valueMissing){
                event.preventDefault();
                missPseu.textContent = 'login manquant';
                missPseu.style.color = 'red';
                erreur = true
            }else if (identifiantValid.test(identifiant.value) == false){
                event.preventDefault();
                missPrenom.textContent = 'Format incorrect';
                missP.style.color = 'red';

            }else{
            }

        }
    </script>
    <?php $content = ob_get_clean(); ?>

    <?php
    require("view/frontend/template.php");
}

//show all users
function admin($error){
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1];
    $currentUser = new UserManager();
    $data = $currentUser->showAllInfoUsersAdmin();
    ?>
    <?php ob_start(); ?>
    Page Administrateur
    <?php $title = ob_get_clean(); ?>

    <?php ob_start(); ?>
    <link rel="stylesheet" href="public/css/admin.css" />
    <div id="corps">
        <div id="main_block">
            <div align="center">
                <h2>Administration</h2>
                <table>
                    <tr>
                        <th> ID </th>
                        <th> Type</th>
                        <th> Pseudo </th>
                        <th> Prénom </th>
                        <th> Nom </th>
                        <th> </th>
                        <th> </th>
                    </tr>
                    <?php
                    while($users = $data->fetch()){
                        ?>
                        <tr>
                            <td> <?php echo $users['id_Utilisateur']; ?> </td>
                            <td> <?php echo $users['utilisateur_type']; ?> </td>
                            <td> <?php echo $users['utilisateur_login']; ?> </td>
                            <td> <?php echo $users['utilisateur_prenom']; ?> </td>
                            <td> <?php echo $users['utilisateur_nom']; ?> </td>
                            <td> <a href="index.php?action=goToModifyProfileAdmin&id=<?php echo $users['id_Utilisateur']; ?>"> Modifier </a> </td>
                            <td> <a href="index.php?action=deleteUser&delete=<?php echo $users['id_Utilisateur']; ?>"> Supprimer </a> </td>
                        </tr>
                        <?php
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
    <?php $content = ob_get_clean(); ?>
    <?php
    require("view/frontend/template.php");
}

function profileAdmin($error,$id){
$headerList = gettingHeader();
$styleHeader = $headerList[0];
$header = $headerList[1]; ?>
<?php ob_start(); ?>
Profil
<?php $title = ob_get_clean(); ?>
<?php
$user = new UserManager();
$userInfo = $user->showAllInfo($id); ?>

<?php ob_start(); ?>
<!-- Le corps -->
<div id="corps">

    <div id="main_block">

        <div align="center">
            <h2>Votre profil</h2>

            <table>
                <tr>
                    <td align="right">
                        <strong> Pseudo </strong> :
                    </td>
                    <td>
                        <?php echo $userInfo['utilisateur_login']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <strong> Mail </strong> :
                    </td>
                    <td>
                        <?php echo $userInfo['utilisateur_mail']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <strong> Prénom </strong> :
                    </td>
                    <td>
                        <?php echo $userInfo['utilisateur_prenom']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <strong> Nom </strong> :
                    </td>
                    <td>
                        <?php echo $userInfo['utilisateur_nom']; ?>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <strong> Type </strong> :
                    </td>
                    <td>
                        <?php echo $userInfo['utilisateur_type']; ?>
                    </td>
                </tr>
            </table>
        </div>
        <br/>

        <br/>
        <a href="index.php?action=goToModifyProfileAdmin&id=<?php echo $userInfo['id_Utilisateur']?>"> Editer mon profil </a>
        <br/>
        <a href="index.php?action=logOut"> Se déconnecter </a>

    </div>
    <?php
    if ($error!=null) {
        ?>
        <?= $error ?>
        <?php
    } ?>
</div>
    <?php $content = ob_get_clean(); ?>
    <?php
    require("view/frontend/template.php");
}

function editProfileAdmin($error){
$headerList = gettingHeader();
$styleHeader = $headerList[0];
$header = $headerList[1]; ?>
<?php ob_start(); ?>
Edition du profil
<?php $title = ob_get_clean(); ?>
<?php
$user = new UserManager();
$userInfo = $user->showAllInfo(); ?>
<?php ob_start(); ?>
<div id="corps">

    <div id="main_block">

        <div align="center">
            <h2>Éditer votre profil</h2>

            <form method="POST" action="index.php?action=editUser">

                <table>
                    <tr>
                        <td align="right">
                            <strong> Pseudo </strong> :
                        </td>
                        <td>
                            <input type="text" placeholder="Pseudo" id="newpseudo" name="newpseudo" value="<?php echo $userInfo['utilisateur_login']; ?>" required />
                            <span id="missPseu"></span>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <strong> Mail </strong> :
                        </td>
                        <td>
                            <input type="mail" placeholder="Mail" id="newmail" name="newmail" value="<?php echo $userInfo['utilisateur_mail']; ?>" required />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <strong> Prénom </strong> :
                        </td>
                        <td>
                            <input type="text" placeholder="Prénom" id="newprenom" name="newprenom" value="<?php echo $userInfo['utilisateur_prenom']; ?>" required />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <strong> Nom </strong> :
                        </td>
                        <td>
                            <input type="text" placeholder="Nom" id="newnom" name="newnom" value="<?php echo $userInfo['utilisateur_nom']; ?>" required />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <strong> Mot de passe actuel </strong> :
                        </td>
                        <td>
                            <input type="password" placeholder="Mot de passe actuel" id="mdpactuel" name="mdpactuel" required />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <strong> Nouveau mot de passe </strong> :
                        </td>
                        <td>
                            <input type="password" placeholder="Nouveau mot de passe" id="newmdp1" name="newmdp1" required />
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <strong> Confirmer nouveau mot de passe </strong> :
                        </td>
                        <td>
                            <input type="password" placeholder="Nouveau mot de passe" id="newmdp2" name="newmdp2" required />
                        </td>
                    </tr>
                </table>

                <br />
                <input type="submit" value="Mettre à jour mon profil !" class="boutton" id="bouenvoie"/>

            </form>
        </div>

        <br />
        <a href="index.php?action=goToProfile"> Retourner à mon profil </a>
        <br />
        <a href="index.php?action=logOut"> Se déconnecter </a>


    </div>


</div>
    <!--************** script **************-->
    <script>
        var formValid = document.getElementById('bouenvoi');
        var prenom = document.getElementById('Pseudo');
        var missPrenom = document.getElementById('missPseu');
        var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;

        formValid.addEventListener('click', validation);

        function validation(event){
            //Si le champ est vide

            if (identifiant.validity.valueMissing){
                event.preventDefault();
                missPseu.textContent = 'login manquant';
                missPseu.style.color = 'red';
            }else if (identifiantValid.test(identifiant.value) == false){
                event.preventDefault();
                missPrenom.textContent = 'Format incorrect';
                missP.style.color = 'red';

            }else{
            }

        }
    </script>
    <?php
    if ($error!=null) {
        ?>
        <?= $error ?>
        <?php
    } ?>
    <?php $content = ob_get_clean(); ?>
    <?php
    require("view/frontend/template.php");
}