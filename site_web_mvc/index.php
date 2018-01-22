<?php

require('controller/frontend.php');

if(isset($_GET['action'])){
    $action = htmlspecialchars($_GET['action']);
}


try{
    if(isset($_SESSION['userID'])){
        $idUser = htmlspecialchars($_SESSION['userID']);
    }
    if(isset($action)){
        if($action == 'goToRegister'){
            $error = null;
            if(empty($idUser)){
                register($error);
            }
            else{
                housing($idUser,$error);
            }
        }
        elseif($action == 'register'){
            $login = htmlspecialchars($_POST['pseudo']);
            $password = sha1(htmlspecialchars($_POST['mdp']));
            $password2 = sha1(htmlspecialchars($_POST['mdp2']));
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
            if(!empty($login) AND !empty($password) AND !empty($password2) AND !empty($type) AND !empty($firstName)
                AND !empty($lastName) AND !empty($birthday) AND !empty($mail) AND !empty($adress)
                AND !empty($zipCode) AND !empty($city) AND !empty($country)) {

                if($password == $password2){
                    $user = new UserManager();
                    $user->setLogin($login);
                    $user->setPassword($password);
                    $user->setMail($mail);
                    $user->setFirstName($firstName);
                    $user->setLastName($lastName);
                    $user->setBirthday($birthday);
                    $user->setType($type);

                    $userExistence = $user->checkUserExistence($user);

                    if(empty($userExistence)){
                        $affectedUser = $user->registerUser($user);

                        if ($affectedUser === false) {
                            ?>
                            <?php ob_start(); ?>
                            <p><span class="msg_erreur">Un probleme est survenu. Veuillez reessayer ulterieurement.</span></p>
                            <?php $error = ob_get_clean(); ?>
                            <?php
                            register($error);
                        }
                        else {
                            $housing = new HousingManager();
                            $housing->setAdress($adress);
                            $housing->setZipCode($zipCode);
                            $housing->setCity($city);
                            $housing->setCountry($country);

                            $idUser = $user->getUserIdFromMail($user->getMail());

                            $affectedHousing = $housing->registerHousing($housing,$idUser);
                            if($affectedHousing === false){
                                ?>
                                <?php ob_start(); ?>
                                <script>alert("Votre logement n'a pas pu être enregistré. Veuillez le faire depuis l'espace Logements de votre compte")</script>
                                <?php $error = ob_get_clean(); ?>
                                <?php
                                housing($idUser,$error);
                            }
                            else{
                                header('Location: index.php?action=goToLogIn');
                            }
                        }
                    }
                    else{
                        ?>
                        <?php ob_start(); ?>
                        <p><span class="msg_erreur">L'utilisateur existe déja</span></p>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        register($error);
                    }
                }
                else{
                    ?>
                    <?php ob_start(); ?>
                    <p><span class="msg_erreur">Les 2 mots de passe ne correspondent pas</span></p>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    register($error);
                }
            }
            else {
                ?>
                <?php ob_start(); ?>
                <p><span class="msg_erreur">Tous les champs ne sont pas remplis</span></p>
                <?php $error = ob_get_clean(); ?>
                <?php
                register($error);
            }

        }
        elseif($action == 'goToLogIn'){
            $error = null;
            if(empty($idUser)){
                logIn($error);
            }
            else{
                housing($idUser,$error);
            }

        }
        elseif ($action == 'logIn'){
            $login = htmlspecialchars($_POST['pseudo']);
            $password = sha1(htmlspecialchars($_POST['mdp']));
            //$hash = password_hash($password, PASSWORD_DEFAULT);
            if(!empty($login) AND !empty($password)){
                $userLogIn = new UserManager;
                $userLogIn->setLogin($login);
                $userLogIn->setPassword($password);

                $userExistence = $userLogIn->checkUserExistenceLogIn($userLogIn);

                if(!empty($userExistence)){
                    if($userExistence['utilisateur_motDePasse']==$userLogIn->getPassword()){
                        session_start();
                        $_SESSION['login'] = $login;
                        $_SESSION['userID'] = $userExistence['id_Utilisateur'];
                        $_SESSION['firstName'] = $userExistence['utilisateur_prenom'];
                        $_SESSION['lastName'] = $userExistence['utilisateur_nom'];
                        $_SESSION['type'] = $userExistence['utilisateur_type'];
                        header('Location: index.php?action=goToHousing');
                    }
                    else{
                        ?>
                        <?php ob_start(); ?>
                        <p><span class="msg_erreur">Le mot de passe utilisé est incorrect</span></p>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        logIn($error);
                    }

                }
                else{
                    ?>
                    <?php ob_start(); ?>
                    <p><span class="msg_erreur">Cet identifiant n'existe pas</span></p>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    //throw new Exception("Identifiant ou mdp incorrect" );
                    logIn($error);
                }

            }
            else{
                if (!isset($_COOKIE['username']) && isset($login)) {
                    setcookie('username_temp',$_POST['pseudo'], time() + 300, "/site_web", "localhost", false, true);
                    throw new Exception("Champs non remplis" );
                }
                ?>
                <?php ob_start(); ?>
                <p><span class="msg_erreur">Un des champs n'a pas été rempli</span></p>
                <?php $error = ob_get_clean(); ?>
                <?php
                //throw new Exception("Identifiant ou mdp incorrect" );
                logIn($error);
            }

        }
        elseif ($action == 'logOut'){
            $error=null;
            logOut();
            logIn($error);
        }
        elseif($action == 'goToHousing'){
            $error = null;
            housing($idUser,$error);
        }
        elseif ($action == 'addHousing'){
            $adress = htmlspecialchars($_POST['adresse']);
            $zipCode = htmlspecialchars($_POST['codePostal']);
            $city = htmlspecialchars($_POST['ville']);
            $country = htmlspecialchars($_POST['pays']);

            if(!empty($adress) AND !empty($zipCode) AND !empty($city) AND !empty($country)){
                $newHousing = new HousingManager();
                $newHousing->setAdress($adress);
                $newHousing->setZipCode($zipCode);
                $newHousing->setCity($city);
                $newHousing->setCountry($country);

                $housingInDb = $newHousing->checkHousingExistence($newHousing);

                if(empty($housingInDb)){
                    $addingNewHousing = $newHousing->registerHousing($newHousing, $idUser);
                    if($addingNewHousing === false){
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Un probléme est survenu. Veillez ajouter un logement ultérieurement.")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        housing($idUser,$error);
                    }
                    else{
                        header('Location: index.php?action=goToHousing');
                    }
                }
                elseif ($housingInDb['id_Utilisateur']!=$idUser){
                    $addingNewHousing = $newHousing->registerHousing($newHousing, $idUser);
                    if($addingNewHousing === false){
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Un probléme est survenu. Veillez ajouter un logement ultérieurement.")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        housing($idUser,$error);
                    }
                    else{
                        header('Location: index.php?action=goToHousing');
                    }
                }
                else{
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Ce logement est deja enregistré sur votre compte")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    housing($idUser,$error);
                }

            }
            else{
                ?>
                <?php ob_start(); ?>
                <script>alert("Tous les champs ne sont pas remplis")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                housing($idUser,$error);
            }
        }
        elseif($action == 'goToRooms'){
            $error=null;
            //conditions idHousing
            $idHousing = htmlspecialchars($_GET['id']);
            room($idUser,$idHousing,$error);
        }
        elseif($action == 'addRoom'){
            $idHousing = htmlspecialchars($_GET['id']);
            $room = htmlspecialchars($_POST['piece']);
            $roomName = htmlspecialchars($_POST['nomPiece']);

            if(!empty($room) AND !empty($roomName)){
                $newRoom = new RoomManager();
                $newRoom->setRoomName($roomName);
                $newRoom->setRoomType($room);

                $check = $newRoom->checkRoomExistence($roomName,$room,$idHousing);

                if(empty($check)){
                    $addingNewRoom = $newRoom->registerRoom($idHousing,$newRoom->getRoomName(),$newRoom->getRoomType(),$idUser);
                    if($addingNewRoom === false){
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Un probléme est survenu. Veillez ajouter une piece ultérieurement")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        room($idUser,$idHousing,$error);
                    }
                    else{
                        header('Location: index.php?action=goToRooms&id='.$idHousing);

                    }
                }
                else{
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Cette piece existe déjà dans votre logement")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    room($idUser,$idHousing,$error);
                }

            }
            else{
                ?>
                <?php ob_start(); ?>
                <script>alert("Tous les champs ne sont pas remplis. Veillez reessayer")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                room($idUser,$idHousing,$error);
            }

        }
        elseif($action == 'goToSensors'){
            $error = null;
            //conditions idHousing
            $idRoom = htmlspecialchars($_GET['id']);
            sensor($idRoom,$error);
        }
        elseif($action == 'addSensor'){
            $idRoom = htmlspecialchars($_GET['id']);
            $sensor = htmlspecialchars($_POST['capteurActionneur']);
            $sensorType = htmlspecialchars($_POST['type']);
            $cemacName = htmlspecialchars($_POST['nomCemac']);

            if(!empty($sensor) AND !empty($sensorType) AND !empty($cemacName) ){
                $newSensor = new SensorManager();
                $newSensor->setFunction($sensor);
                $newSensor->setType($sensorType);

                $newCemac = new CemacManager();
                $newCemac->setName($cemacName);

                $checkCemac = $newCemac->checkCemacExistence($cemacName);

                // if the CemacManager does not exist
                if(empty($checkCemac)){
                    $saveCemac=$newCemac->registerCemac($cemacName,$idRoom);
                    if(!empty($saveCemac)){
                        $idCemac=$newCemac->getCemacIdFromRoomId($idRoom);
                        $addingNewSensor = $newSensor->registerSensor($newSensor->getFunction(),$newSensor->getType(),$idCemac['id_Cemac']);
                        if(!empty($addingNewSensor)){
                            header('Location: index.php?action=goToSensors&id='.$idRoom);
                        }
                        else{
                            ?>
                            <?php ob_start(); ?>
                            <script>alert("Un probléme est survenu. Veillez ajouter un capteur/actionneur ultérieurement")</script>
                            <?php $error = ob_get_clean(); ?>
                            <?php
                            sensor($idRoom,$error);
                        }
                    }
                    else{
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Le Cemac n'a pas pu être ajouté. Veillez réessayer ultérieurement")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        sensor($idRoom,$error);
                    }
                }
                // if the CemacManager is not in another room
                elseif($checkCemac['Piece_idPiece']==$idRoom){
                    $idCemac=$newCemac->getCemacIdFromRoomId($idRoom);
                    if(!empty($idCemac)){
                        $addingNewSensor = $newSensor->registerSensor($newSensor->getFunction(),$newSensor->getType(),$idCemac['id_Cemac']);
                        if(!empty($addingNewSensor)){
                            header('Location: index.php?action=goToSensors&id='.$idRoom);
                        }
                        else{
                            ?>
                            <?php ob_start(); ?>
                            <script>alert("Un probléme est survenu. Veillez ajouter un capteur/actionneur ultérieurement")</script>
                            <?php $error = ob_get_clean(); ?>
                            <?php
                            sensor($idRoom,$error);
                        }
                    }
                    else{
                        ?>
                        <?php ob_start(); ?>
                        <script>alert("Le Cemac n'a pas pu être ajouté. Veillez réessayer ultérieurement")</script>
                        <?php $error = ob_get_clean(); ?>
                        <?php
                        sensor($idRoom,$error);
                    }

                }
                else{
                    ?>
                    <?php ob_start(); ?>
                    <script>alert("Ce Cemac est déjà utilisé dans une autre piece")</script>
                    <?php $error = ob_get_clean(); ?>
                    <?php
                    sensor($idRoom,$error);

                }

            }
            else{
                ?>
                <?php ob_start(); ?>
                <script>alert("Tous les champs ne sont pas remplis. Veillez réessayer")</script>
                <?php $error = ob_get_clean(); ?>
                <?php
                sensor($idRoom,$error);
            }

        }
        elseif ($action == 'goToListSensors'){
            showAllSensorsAndActuators($idUser);
        }
        elseif ($action == 'goToAlarm'){
            alarm($idUser);
        }
        elseif ($action == 'goToProfile'){

            if(!isset($idUser) AND empty($idUser))
            {
                header('Location: index.php?action=goToLogIn');
            }
            profile();
        }
        elseif ($action == 'profile'){
            //logOut();
        }
        elseif ($action == 'goToTeam'){
            showTeam();
        }
        elseif ($action == 'goToOffers'){
            showOffers();
        }
        elseif ($action == 'contact'){
            contact();
        }

    }
    else{
        homepage();
    }



}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}