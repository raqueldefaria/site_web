<?php
/**
 * Created by PhpStorm.
 * UserManager: Raquel De Faria
 * Date: 18/01/2018
 * Time: 10:16
 */

class CemacManager
{
    private $name;

    /**
     * CemacManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
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

    function checkCemacExistence($cemacName){
        $db = $this->dbConnect();

        // un cemac ne peut pas etre dans plusieurs pieces au meme temps
        $cemac = $db->prepare("SELECT id_Cemac, Piece_idPiece FROM cemac WHERE cemac_nom= ?");
        $cemac->execute(array($cemacName));
        $response = $cemac->fetch();

        return $response;
    }

    function registerCemac($cemacName,$idRoom){
        $db = $this->dbConnect();

        $insertCemac = $db->prepare("INSERT INTO cemac(cemac_nom, Piece_idPiece) VALUES (:cemacName,:idRoom)") or die(print_r($db->errorInfo()));
        $insertCemac->bindParam(':cemacName', $cemacName);
        $insertCemac->bindParam(':idRoom', $idRoom);
        $response = $insertCemac->execute() or die(print_r($insertCemac->errorInfo()));

        $insertCemac->closeCursor();

        return $response;
    }

    function getCemacIdFromRoomId($idRoom){
        $db = $this->dbConnect();

        $data = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece=".$idRoom) or die($db->errorInfo());
        $idCemac = $data->fetch() or die($idCemac->errorInfo());

        $data->closeCursor();

        return $idCemac;
    }


}