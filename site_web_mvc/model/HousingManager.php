<?php
/**
 * Created by PhpStorm.
 * UserManager: Raquel De Faria
 * Date: 15/01/2018
 * Time: 21:39
 */

class HousingManager
{
    private $address;
    private $zipCode;
    private $city;
    private $country;

    /**
     * HousingManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param mixed $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
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



    function registerHousing($housing,$idUser){

        $db = $this->dbConnect();

        $insertHousing = $db->prepare("INSERT INTO logement(logement_adresse, logement_codePostal, logement_ville, logement_pays,id_Utilisateur)
                    VALUES(:adresse, :codePostal, :ville, :pays, :id)") or die(print_r($db->errorInfo()));
        $insertHousing->bindParam(':adresse', $housing->address);
        $insertHousing->bindParam(':codePostal', $housing->zipCode);
        $insertHousing->bindParam(':ville', $housing->city);
        $insertHousing->bindParam(':pays', $housing->country);
        $insertHousing->bindParam(':id', $idUser);
        $result = $insertHousing->execute() or die(print_r($insertHousing->errorInfo()));

        $insertHousing->closeCursor();

        return $result;

    }

    function showAllInfo($id){
        $db = $this->dbConnect();

        $response = $db->prepare('SELECT * FROM logement WHERE logement.id_Utilisateur = ?');
        $response->execute(array($id));
        $userInfo = $response->fetchAll();

        $response->closecursor();

        return $userInfo;
    }

    function checkHousingExistence($housing){
        $db = $this->dbConnect();
        $response = $db->prepare("SELECT id_Utilisateur FROM logement
                         WHERE logement_adresse=:adress AND logement_codePostal=:zipCode AND logement_ville=:city AND logement_pays=:country")or die(print_r("erreur=".$db->errorInfo()));

        $response->bindParam(':adress', $housing->address);
        $response->bindParam(':zipCode', $housing->zipCode);
        $response->bindParam(':city', $housing->city);
        $response->bindParam(':country', $housing->country);
        $response->execute()or die(print_r("erreur2=".$response->errorInfo()));

        $data = $response->rowCount();

        $response->closecursor();


        return $data;
    }


    function updateHousing($housing,$idHousing){
        $db = $this->dbConnect();

        $request = $db->prepare("UPDATE logement SET logement_adresse=?, logement_codePostal=?, logement_ville=?,  logement_pays=? WHERE id_Logement = ? ") or die(print_r($db->errorInfo()));
        $response = $request->execute(array($housing->address,$housing->zipCode,$housing->city,$housing->country,$idHousing)) or die(print_r($request->errorInfo()));
        $request->closeCursor();

        return $response;
    }

    function checkId($idUser,$idHousing){
        $db = $this->dbConnect();

        $response = $db->prepare('SELECT * FROM logement WHERE id_Utilisateur = ? AND id_Logement = ?');
        $response->execute(array($idUser,$idHousing));

        return $response->rowCount();

    }





}
