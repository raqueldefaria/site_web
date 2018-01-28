<?php
/**
 * Created by PhpStorm.
 * UserManager: Raquel De Faria
 * Date: 15/01/2018
 * Time: 21:37
 */

class UserManager
{
    private $login;
    private $password;
    private $mail;
    private $firstName;
    private $lastName;
    private $birthday;
    private $type;
    private $tok;
    //...

    //----------------Constructor----------------//


    /**
     * UserManager constructor.
     */
    public function __construct()
    {
    }

    //----------------Getters & Setters----------------//

    /**
     * @return mixed
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param mixed $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getTok()
    {
        return $this->tok;
    }

    /**
     * @param mixed $tok
     */
    public function setTok($tok)
    {
        $this->tok = $tok;
    }





    //----------------Methods----------------//

    function dbConnect(){
        try{
            $db = new PDO('mysql:host=localhost;dbname=site_web;charset=utf8', 'root', '');
        }
        catch(Exception $e){
            die('Erreur : '.$e->getMessage());
        }
        return $db;
    }

    function getUserIdFromMail($mail){
        $db = $this->dbConnect();
        $dataUser = $db->prepare("SELECT id_Utilisateur FROM utilisateur WHERE utilisateur_mail=?");
        $dataUser->execute(array($mail));
        $idUser = $dataUser->fetch();
        $dataUser->closecursor();
        return $idUser;
    }

    function checkUserExistence($user){
        $db = $this->dbConnect();
        $response = $db->prepare('SELECT utilisateur_login, utilisateur_mail FROM utilisateur
                         WHERE utilisateur_login=:pseudo OR utilisateur_mail=:mail');


        $response->bindParam(':pseudo', $user->login);
        $response->bindParam(':mail', $user->mail);
        $response->execute();

        $data = $response->fetch();

        $response->closecursor();

        return $data;
    }


    function registerUser($user){
        $db = $this->dbConnect();

        $insertUser = $db->prepare('INSERT INTO utilisateur(utilisateur_type,utilisateur_login, utilisateur_motDePasse,
                                                        utilisateur_prenom, utilisateur_nom, utilisateur_dateDeNaissance,
                                                        utilisateur_mail)
                                VALUES(?, ?, ?, ?, ?, ?, ?)');
        $addedUser = $insertUser->execute(array(
            $user->type,
            $user->login,
            $user->password,
            $user->firstName,
            $user->lastName,
            $user->birthday,
            $user->mail
        ));
        $insertUser->closeCursor();
        return $addedUser;

    }


    function checkUserExistenceLogIn($user){
        $db = $this->dbConnect();

        $login = $user->login;

        $response = $db->prepare("SELECT id_Utilisateur, utilisateur_motDePasse, utilisateur_prenom, utilisateur_nom, utilisateur_type FROM utilisateur WHERE utilisateur_login=?") or die(print_r($db->errorInfo()));
        $response->execute(array($login))or die(print_r($response->errorInfo()));

        $data = $response->fetch();

        $response->closecursor();

        return $data;
    }

    function showAllInfo(){

        $db = $this->dbConnect();

        $response = $db->prepare('SELECT utilisateur_nom, utilisateur_prenom, utilisateur_mail, utilisateur_login, utilisateur_type FROM utilisateur WHERE id_Utilisateur = ?');
        $response->execute(array($_SESSION['userID']));
        $userInfo = $response->fetch();

        $response->closecursor();

        return $userInfo;
    }


    function checkMailExistence($user){
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT utilisateur_mail FROM utilisateur WHERE utilisateur_mail = ?') or die(print_r($db->errorInfo()));
        $req->execute(array($user->mail)) or die(print_r($req->errorInfo()));
        $response = $req->fetch();

        $req->closeCursor();

        return $response;
    }

    function addTokToDb($user){
        $db = $this->dbConnect();

        $requete = $db->prepare("UPDATE utilisateur SET tok = ? WHERE utilisateur_mail = ? ") or die(print_r($db->errorInfo()));
        $response = $requete->execute(array($user->tok,$user->mail)) or die(print_r($requete->errorInfo()));

        $requete->closeCursor();

        return $response;

    }

    function gettingMailFromTok($user){
        $db = $this->dbConnect();

        $mail=$db->prepare("SELECT utilisateur_mail FROM utilisateur WHERE tok = ?");
        $mail->execute(array($user->tok));
        $getMail = $mail->fetch();

        $mail->closeCursor();

        return $getMail;
    }

    function updateTok($user){
        $db = $this->dbConnect();

        $updateTok = $db->prepare("UPDATE utilisateur SET tok = ? WHERE utilisateur_mail = ? ") or die(print_r($db->errorInfo()));
        $response = $updateTok->execute(array($user->tok,$user->mail)) or die(print_r($updateTok->errorInfo()));

        $updateTok->closeCursor();

        return $response;
    }

    function updatePassword($user){
        $db = $this->dbConnect();

        $updatePassword = $db->prepare("UPDATE utilisateur SET utilisateur_motDePasse =? WHERE utilisateur_mail =?") or die(print_r($db->errorInfo()));
        $response = $updatePassword->execute(array($user->password,$user->mail)) or die(print_r($updatePassword->errorInfo()));

        return $response;

    }

    function gettingPassword($idUser){
        $db = $this->dbConnect();

        $currentPassword = $db->prepare("SELECT utilisateur_motDePasse FROM utilisateur WHERE id_Utilisateur=?");
        $currentPassword->execute(array($idUser));

        $response = $currentPassword->fetch();

        return $response;
    }

    function updateUser($user,$idUser){
        $db = $this->dbConnect();

        $request = $db->prepare("UPDATE utilisateur SET utilisateur_motDePasse=?, utilisateur_mail=?, utilisateur_login=?,  utilisateur_nom=?,  utilisateur_prenom=? WHERE id_Utilisateur = ? ") or die(print_r($db->errorInfo()));
        $response = $request->execute(array($user->password,$user->mail,$user->login,$user->lastName,$user->firstName,$idUser)) or die(print_r($request->errorInfo()));

        $request->closeCursor();

        return $response;
    }



}
