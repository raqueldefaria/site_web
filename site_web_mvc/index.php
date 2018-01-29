<?php

require('controller/frontend.php');

if (isset($_GET['action'])) {
    $action = htmlspecialchars($_GET['action']);
}


try {
    if (isset($_SESSION['userID'])) {
        $idUser = htmlspecialchars($_SESSION['userID']);
    }
    if (isset($action)) {

        if ($action == 'goToRegister') {
            $error = null;
            if (empty($idUser)) {
                register($error);
            } else {
                housing($idUser, $error);
            }
        }

        elseif ($action == 'register') {
            $login = htmlspecialchars($_POST['pseudo']);
            $password = htmlspecialchars($_POST['mdp']);
            $password2 = htmlspecialchars($_POST['mdp2']);
            //$hash = password_hash($password, PASSWORD_DEFAULT);
            //$hash2 = password_hash($password2, PASSWORD_DEFAULT);
            $mail = htmlspecialchars($_POST['mail']);
            $firstName = htmlspecialchars($_POST['prenom']);
            $lastName = htmlspecialchars($_POST['nom']);
            $birthday = htmlspecialchars($_POST['dateNaissance']);
            $type = htmlspecialchars($_POST['type']);
            $adress = htmlspecialchars($_POST['adresse']);
            $zipCode = htmlspecialchars($_POST['codePostal']);
            $city = htmlspecialchars($_POST['ville']);
            $country = htmlspecialchars($_POST['pays']);
            if (!empty($login) and !empty($password) and !empty($password2) and !empty($type) and !empty($firstName)
                and !empty($lastName) and !empty($birthday) and !empty($mail) and !empty($adress)
                and !empty($zipCode) and !empty($city) and !empty($country)) {
                if ($password == $password2) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $user = new UserManager();
                    $user->setLogin($login);
                    $user->setPassword($password);
                    $user->setMail($mail);
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setBirthday($birthday);
                    $user->setType($type);

                    $userExistence = $user->checkUserExistence($user);

                    if (empty($userExistence)) {
                        $affectedUser = $user->registerUser($user);

                        if ($affectedUser === false) {
                            ?>
                            <?php ob_start(); ?>
                            <p><span class="msg_erreur">Un probleme est survenu. Veuillez reessayer ulterieurement.</span></p>
                            <?php $error = ob_get_clean(); ?>
                            <?php
                            register($error);
                        } else {
                            $housing = new HousingManager();
                            $housing->setAddress($adress);
                            $housing->setZipCode($zipCode);
                            $housing->setCity($city);
                            $housing->setCountry($country);

                            $idUser = $user->getUserIdFromMail($user->getMail());

                            $affectedHousing = $housing->registerHousing($housing, $idUser['id_Utilisateur']);
                            if ($affectedHousing === false) {
                                ?>
                                <?php ob_start(); ?>
                                <script>alert("Votre logement n'a pas pu être enregistré. Veuillez le faire depuis l'espace Logements de votre compte")</script>
                                <?php $error = ob_get_clean(); ?>
                                <?php
                                housing($idUser['id_Utilisateur'], $error);
                            }
                            else {
                                ini_set('display_errors', 1);

                                $header="MIME-Version: 1.0\r\n";
                                $header.='From:"Domonline.com"<domonline.isep@gmail.com>'."\n";
                                $header.='Content-Type:text/html; charset=UTF-8'."\n";
                                $header.='Content-Transfer-Encoding: 8bit';

                                error_reporting(E_ALL);

                                $from = "domonline.isep@gmail.com";

                                $to = $user->getMail();

                                $subject = "Inscription à DomOnline";

                                $message = "Bonjour " . $user->getFirstName(). " " . $user->getLastName() . "\n \n";
                                $message .= "Vous êtes bien inscrit sur DomOnline. \n \n";
                                $message .= "Votre pseudo : " . $user->getLogin() . "\n \n";
                                $message .= "Cordialement, \n";
                                $message .= "L'équipe Domonline.";

                                $headers = "From:" . $from;

                                mail($to, $subject, $message, $headers);
                                header('Location: index.php?action=goToLogIn');
                            }
                        }
                    }
                    else {
                        ?>
                        <?php ob_start(); ?>
                        <p><span class="msg_erreur">L'utilisateur existe déja</span></p>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        register($error);
                    }
                }
                else {
                    ?>
                    <?php ob_start(); ?>
                    <p><span class="msg_erreur">Les 2 mots de passe ne correspondent pas</span></p>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    register($error);
                }
            } else {
                ?>
                <?php ob_start(); ?>
                <p><span class="msg_erreur">Tous les champs ne sont pas remplis</span></p>
                <?php $error = ob_get_clean(); ?>
                <?php
                register($error);
            }
        }

        elseif ($action == 'goToLogIn') {
            $error = null;
            if (empty($idUser)) {
                logIn($error);
            } else {
                housing($idUser, $error);
            }
        }

        elseif ($action == 'logIn') {
            $login = htmlspecialchars($_POST['pseudo']);
            $password = sha1(htmlspecialchars($_POST['mdp']));
            //$hash = password_hash($password, PASSWORD_DEFAULT);
            if (!empty($login) and !empty($password)) {
                $userLogIn = new UserManager;
                $userLogIn->setLogin($login);
                $userLogIn->setPassword($password);

                $userExistence = $userLogIn->checkUserExistenceLogIn($userLogIn);

                if (!empty($userExistence)) {
                    if ($userExistence['utilisateur_motDePasse']==$userLogIn->getPassword()) {
                        session_start();
                        $_SESSION['login'] = $login;
                        $_SESSION['userID'] = $userExistence['id_Utilisateur'];
                        $_SESSION['firstName'] = $userExistence['utilisateur_prenom'];
                        $_SESSION['lastName'] = $userExistence['utilisateur_nom'];
                        $_SESSION['type'] = $userExistence['utilisateur_type'];
                        header('Location: index.php?action=goToHousing');
                    } else {
                        ?>
                        <?php ob_start(); ?>
                        <p><span class="msg_erreur">Le mot de passe utilisé est incorrect</span></p>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        logIn($error);
                    }
                } else {
                    ?>
                    <?php ob_start(); ?>
                    <p><span class="msg_erreur">Cet identifiant n'existe pas</span></p>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    //throw new Exception("Identifiant ou mdp incorrect" );
                    logIn($error);
                }
            } else {
                if (!isset($_COOKIE['username']) && isset($login)) {
                    setcookie('username_temp', $_POST['pseudo'], time() + 300, "/site_web", "localhost", false, true);
                    throw new Exception("Champs non remplis");
                } ?>
                <?php ob_start(); ?>
                <p><span class="msg_erreur">Un des champs n'a pas été rempli</span></p>
                <?php $error = ob_get_clean(); ?>
                <?php
                //throw new Exception("Identifiant ou mdp incorrect" );
                logIn($error);
            }
        }

        elseif ($action == 'logOut') {
            $error=null;
            logOut();
            logIn($error);
        }

        elseif ($action == 'goToHousing') {
            $error = null;
            housing($idUser, $error);
        }

        elseif ($action == 'addHousing') {
            $adress = htmlspecialchars($_POST['adresse']);
            $zipCode = htmlspecialchars($_POST['codePostal']);
            $city = htmlspecialchars($_POST['ville']);
            $country = htmlspecialchars($_POST['pays']);

            if (!empty($adress) and !empty($zipCode) and !empty($city) and !empty($country)) {
                $newHousing = new HousingManager();
                $newHousing->setAddress($adress);
                $newHousing->setZipCode($zipCode);
                $newHousing->setCity($city);
                $newHousing->setCountry($country);

                $housingInDb = $newHousing->checkHousingExistence($newHousing);

                if (empty($housingInDb)) {
                    $addingNewHousing = $newHousing->registerHousing($newHousing, $idUser);
                    if ($addingNewHousing === false) {
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Un probléme est survenu. Veillez ajouter un logement ultérieurement.")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        housing($idUser, $error);
                    } else {
                        header('Location: index.php?action=goToHousing');
                    }
                } elseif ($housingInDb['id_Utilisateur']!=$idUser) {
                    $addingNewHousing = $newHousing->registerHousing($newHousing, $idUser);
                    if ($addingNewHousing === false) {
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Un probléme est survenu. Veillez ajouter un logement ultérieurement.")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        housing($idUser, $error);
                    } else {
                        header('Location: index.php?action=goToHousing');
                    }
                } else {
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Ce logement est deja enregistré sur votre compte")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    housing($idUser, $error);
                }
            } else {
                ?>
                <?php ob_start(); ?>
                <script>alert("Tous les champs ne sont pas remplis")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                housing($idUser, $error);
            }
        }

        elseif ($action == 'goToRooms') {
            $error=null;
            //conditions idHousing
            $idHousing = htmlspecialchars($_GET['id']);
            room($idUser, $idHousing, $error);
        }

        elseif ($action == 'addRoom') {
            $idHousing = htmlspecialchars($_GET['id']);
            $room = htmlspecialchars($_POST['piece']);
            $roomName = htmlspecialchars($_POST['nomPiece']);

            if (!empty($room) and !empty($roomName)) {
                $newRoom = new RoomManager();
                $newRoom->setRoomName($roomName);
                $newRoom->setRoomType($room);

                $check = $newRoom->checkRoomExistence($roomName, $room, $idHousing);

                if (empty($check)) {
                    $addingNewRoom = $newRoom->registerRoom($idHousing, $newRoom->getRoomName(), $newRoom->getRoomType(), $idUser);
                    if ($addingNewRoom === false) {
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Un probléme est survenu. Veillez ajouter une piece ultérieurement")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        room($idUser, $idHousing, $error);
                    } else {
                        header('Location: index.php?action=goToRooms&id='.$idHousing);
                    }
                } else {
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Cette piece existe déjà dans votre logement")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    room($idUser, $idHousing, $error);
                }
            } else {
                ?>
                <?php ob_start(); ?>
                <script>alert("Tous les champs ne sont pas remplis. Veillez reessayer")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                room($idUser, $idHousing, $error);
            }
        }

        elseif ($action == 'goToSensors') {
            $error = null;
            //conditions idHousing
            $idRoom = htmlspecialchars($_GET['id']);
            sensor($idRoom, $error);
        }

        elseif ($action == 'addSensor') {
            $idRoom = htmlspecialchars($_GET['id']);
            $sensor = htmlspecialchars($_POST['capteurActionneur']);
            $sensorType = htmlspecialchars($_POST['type']);
            $cemacName = htmlspecialchars($_POST['nomCemac']);

            if (!empty($sensor) and !empty($sensorType) and !empty($cemacName)) {
                $newSensor = new SensorManager();
                $newSensor->setFunction($sensor);
                $newSensor->setType($sensorType);

                $newCemac = new CemacManager();
                $newCemac->setName($cemacName);

                $checkCemac = $newCemac->checkCemacExistence($cemacName);

                // if the CemacManager does not exist
                if (empty($checkCemac)) {
                    $saveCemac=$newCemac->registerCemac($cemacName, $idRoom);
                    if (!empty($saveCemac)) {
                        $idCemac=$newCemac->getCemacIdFromRoomId($idRoom);
                        $addingNewSensor = $newSensor->registerSensor($newSensor->getFunction(), $newSensor->getType(), $idCemac['id_Cemac']);
                        if (!empty($addingNewSensor)) {
                            header('Location: index.php?action=goToSensors&id='.$idRoom);
                        } else {
                            ?>
                            <?php ob_start(); ?>
                            <script>alert("Un probléme est survenu. Veillez ajouter un capteur/actionneur ultérieurement")</script>
                            <?php $error = ob_get_clean(); ?>
                            <?php
                            sensor($idRoom, $error);
                        }
                    } else {
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Le Cemac n'a pas pu être ajouté. Veillez réessayer ultérieurement")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        sensor($idRoom, $error);
                    }
                }
                // if the CemacManager is not in another room
                elseif ($checkCemac['Piece_idPiece']==$idRoom) {
                    $idCemac=$newCemac->getCemacIdFromRoomId($idRoom);
                    if (!empty($idCemac)) {
                        $addingNewSensor = $newSensor->registerSensor($newSensor->getFunction(), $newSensor->getType(), $idCemac['id_Cemac']);
                        if (!empty($addingNewSensor)) {
                            header('Location: index.php?action=goToSensors&id='.$idRoom);
                        } else {
                            ?>
                            <?php ob_start(); ?>
                            <script>alert("Un probléme est survenu. Veillez ajouter un capteur/actionneur ultérieurement")</script>
                            <?php $error = ob_get_clean(); ?>
                            <?php
                            sensor($idRoom, $error);
                        }
                    } else {
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Le Cemac n'a pas pu être ajouté. Veillez réessayer ultérieurement")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        sensor($idRoom, $error);
                    }
                } else {
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Ce Cemac est déjà utilisé dans une autre piece")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    sensor($idRoom, $error);
                }
            } else {
                ?>
                <?php ob_start(); ?>
                <script>alert("Tous les champs ne sont pas remplis. Veillez réessayer")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                sensor($idRoom, $error);
            }
        }

        elseif ($action == 'goToListSensors') {
            showAllSensorsAndActuators($idUser);
        }

        elseif ($action == 'goToAlarm') {
            alarm($idUser);
        }

        elseif ($action == 'goToProfile') {
            // the user cannot edit his profile if he is not connected
            if (!isset($idUser) and empty($idUser)) {
                header('Location: index.php?action=goToLogIn');
            } else {
                profile();
            }
        }

        elseif ($action == 'goToEditProfile') {
            $error = null;
            goToEditProfile($error);
        }

        elseif ($action == 'editUser') {
            $newLogin = htmlspecialchars($_POST['newpseudo']);
            $newMail = htmlspecialchars($_POST['newmail']);
            $newFirstName = htmlspecialchars($_POST['newprenom']);
            $newLastName = htmlspecialchars($_POST['newnom']);
            $currentPassword = sha1( htmlspecialchars($_POST['mdpactuel']));
            $newPassword = sha1( htmlspecialchars($_POST['newmdp1']));
            $newPassword2 = sha1( htmlspecialchars($_POST['newmdp2']));


            if(!empty($newLogin) AND !empty($newMail) AND !empty($newFirstName) AND !empty($newLastName) AND
                !empty($currentPassword) AND !empty($newPassword) AND !empty($newPassword)){
                $updatedUser = new UserManager();

                $passwordInDb = $updatedUser->gettingPassword($idUser);

                if($newPassword == $newPassword2 AND $currentPassword==$passwordInDb['utilisateur_motDePasse'] ){
                    $updatedUser->setFirstName($newFirstName);
                    $updatedUser->setLastName($newLastName);
                    $updatedUser->setLogin($newLogin);
                    $updatedUser->setMail($newMail);
                    $updatedUser->setPassword($newPassword );

                    $updatingInDb = $updatedUser->updateUser($updatedUser,$idUser);

                    if($updatingInDb===false){
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Une erreur est survenue. Veuillez réessayer ultérieurement")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        goToEditProfile($error);
                    }
                    else{
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Vos modifications ont bien été prises en compte")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        goToEditProfile($error);
                    }
                }
                else{
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Veuillez vérifier que les mots de passe rentrés sont bien les bons.")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    goToEditProfile($error);
                }
            }

            else{
                ?>
                <?php ob_start(); ?>
                <script>alert("Tous les champs n'ont pas été remplis. Veuillez réessayer.")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                goToEditProfile($error);
            }

        }

        elseif ($action == 'editHousing') {
            $idHousing=htmlspecialchars($_GET['id']);
            $newAddress = htmlspecialchars($_POST['newadresse']);
            $newCity = htmlspecialchars($_POST['newville']);
            $newZipCode = htmlspecialchars($_POST['newcodePostal']);
            $newCountry = htmlspecialchars($_POST['newpays']);


            if(!empty($newAddress) AND !empty($newCity) AND !empty($newZipCode) AND !empty($newCountry)){
                $updatedHousing = new HousingManager();
                $updatedHousing->setAddress($newAddress);
                $updatedHousing->setCity($newCity);
                $updatedHousing->setZipCode($newZipCode);
                $updatedHousing->setCountry($newCountry);

                $updatingInDb = $updatedHousing->updateHousing($updatedHousing,$idHousing);

                if($updatingInDb===false){
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Une erreur est survenue. Veuillez réessayer ultérieurement")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    goToEditProfile($error);
                }
                else{
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Vos modifications ont bien été prises en compte")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    goToEditProfile($error);
                }

            }

            else{
                ?>
                <?php ob_start(); ?>
                <script>alert("Tous les champs n'ont pas été remplis. Veuillez réessayer.")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                goToEditProfile($error);
            }

        }

        elseif ($action == 'goToForgottenPassword') {
            $error = null;
            forgottenPassword($error);
        }

        elseif ($action == 'forgottenPassword') {
            $mail = htmlspecialchars($_POST['mail_recup']);
            if (isset($mail) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $mail)) {
                $newUser = new UserManager();
                $newUser->setMail($mail);

                $userExistence = $newUser->checkMailExistence($newUser);

                if ($userExistence === false) {
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Cet adresse mail n'existe pas")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    forgottenPassword($error);
                }
                else {
                    $tok = mt_rand(0, 10000);
                    $newUser->setTok($tok);
                    $addingTok = $newUser->addTokToDb($newUser);

                    if ($addingTok === false) {
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Un probléme est survenu. Veuillez réessayer ultérieurement")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        forgottenPassword($error);
                    }
                    else {
                        ini_set('display_errors', 1);

                        $header="MIME-Version: 1.0\r\n";
                        $header.='From:"Domonline.com"<domonline.isep@gmail.com>'."\n";
                        $header.='Content-Type:text/html; charset="uft-8"'."\n";
                        $header.='Content-Transfer-Encoding: 8bit';

                        error_reporting(E_ALL);

                        $from = "domonline.isep@gmail.com";

                        $to = $mail;

                        $subject = "Vérification du mail";

                        $message = "Bonjour, Pour récuperer votre mot de passe sur le site, taper ce code :" . $tok;

                        $headers = "From:" . $from;

                        mail($to, $subject, $message, $headers);

                        header("Location: index.php?action=goToNewPassword&tok=".$newUser->getTok());
                    }
                }
            }
            else {
                ?>
                <?php ob_start(); ?>
                <script>alert("Cette adresse mail n'est pas valide")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                forgottenPassword($error);
            }
        }

        elseif ($action == 'goToNewPassword') {
            $tok = htmlspecialchars($_GET['tok']);
            $error = null;
            newPassword($tok, $error);
        }

        elseif ($action == 'changePassword') {
            $tok = htmlspecialchars($_GET['tok']);
            $tokInput = htmlspecialchars($_POST['tok2']);
            $password = sha1(htmlspecialchars($_POST['pass_recup']));
            $passwordVerification = sha1(htmlspecialchars($_POST['pass_recup2']));
            if (!empty($tokInput) and !empty($password) and !empty($passwordVerification)) {
                if ($tok == $tokInput) {
                    if ($password==$passwordVerification) {
                        $newUser = new UserManager();
                        $newUser->setTok($tokInput);
                        $newUser->setPassword($password);
                        $gettingMail = $newUser->gettingMailFromTok($newUser);

                        if ($gettingMail === false) {
                            ?>
                            <?php ob_start(); ?>
                            <script>alert("Le code rentré n'est pas valide. Veuillez réessayer")</script>
                            <?php $error = ob_get_clean(); ?>
                            <?php
                            newPassword($tok, $error);
                        }
                        else {
                            $newUser->setMail($gettingMail['utilisateur_mail']);
                            $newUser->setTok(null);
                            $updateTok = $newUser->updateTok($newUser);

                            if ($updateTok === false) {
                                ?>
                                <?php ob_start(); ?>
                                <script>alert("Un probléme est survenu. Veuillez réessayer")</script>
                                <?php $error = ob_get_clean(); ?>
                                <?php
                                newPassword($tok, $error);
                            }
                            else {
                                $updatePassword = $newUser->updatePassword($newUser);
                                if ($updatePassword===false) {
                                    ?>
                                    <?php ob_start(); ?>
                                    <script>alert("Un probléme est survenu. Veuillez réessayer")</script>
                                    <?php $error = ob_get_clean(); ?>
                                    <?php
                                    newPassword($tok, $error);
                                }
                                else {
                                    ?>
                                    <?php ob_start(); ?>
                                    <script>alert("Votre mot de passe a bien été modifié !")</script>
                                    <?php $error = ob_get_clean(); ?>
                                    <?php
                                    logIn($error);
                                }
                            }
                        }
                    }
                    else {
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Les 2 mots de passe rentrés ne sont pas les mêmes")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        newPassword($tok, $error);
                    }
                }
                else {
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Le code rentré n'est pas valide")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    newPassword($tok, $error);
                }
            }
            else {
                ?>
                <?php ob_start(); ?>
                <script>alert("Veuillez remplir tous les champs")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                newPassword($tok, $error);
            }
        }

        elseif ($action == 'goToTeam') {
            showTeam();
        }

        elseif ($action == 'goToOffers') {
            showOffers();
        }

        elseif ($action == 'contact') {
            contact();
        }
    }

    else {
        homepage();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
