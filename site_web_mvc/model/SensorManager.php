<?php
/**
 * Created by PhpStorm.
 * UserManager: Raquel De Faria
 * Date: 18/01/2018
 * Time: 00:09
 */

class SensorManager
{
    private $number;
    private $function;
    private $type;

    /**
     * SensorManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return mixed
     */
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * @param mixed $function
     */
    public function setFunction($function)
    {
        $this->function = $function;
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

    function registerSensor($function,$type,$idCemac){
        $db = $this->dbConnect();

        $insertSensor = $db->prepare("INSERT INTO `capteur/actionneur`(`capteur/actionneur_fonction`, `capteur/actionneur_type`, Cemac_idCemac) VALUES (:function,:type,:idCemac)") or die(print_r($db->errorInfo()));
        $insertSensor->bindParam(':function', $function);
        $insertSensor->bindParam(':type', $type);
        $insertSensor->bindParam(':idCemac', $idCemac);
        $response = $insertSensor->execute() or die(print_r($insertSensor->errorInfo()));

        $insertSensor->closeCursor();

        return $response;

    }


    
    


}