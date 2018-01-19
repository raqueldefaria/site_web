<?php
/**
 * Created by PhpStorm.
 * UserManager: Raquel De Faria
 * Date: 17/01/2018
 * Time: 21:28
 */

class RoomManager
{
    private $roomName;
    private $roomType;
    private $roomId;

    /**
     * RoomManager constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getRoomName()
    {
        return $this->roomName;
    }

    /**
     * @param mixed $roomName
     */
    public function setRoomName($roomName)
    {
        $this->roomName = $roomName;
    }

    /**
     * @return mixed
     */
    public function getRoomType()
    {
        return $this->roomType;
    }

    /**
     * @param mixed $roomType
     */
    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;
    }

    /**
     * @return mixed
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * @param mixed $roomId
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;
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

    function checkRoomExistence($roomName,$room,$idHousing){
        $db = $this->dbConnect();

        $check = $db->prepare("SELECT id_Piece FROM piece WHERE piece_nom=? AND piece_type=? AND Logement_idLogement=?");
        $check->execute(array($roomName,$room,$idHousing));

        $data = $check->fetch();

        $check->closeCursor();


        return $data;

    }

    function registerRoom($idHousing, $roomName, $roomType, $idUser){

        $db = $this->dbConnect();

        $insertRoom = $db->prepare("INSERT INTO piece(piece_nom, Logement_idLogement, Logement_Utilisateur_idUtilisateur, piece_type) VALUES (:room,:idHousing,:idUser,:type)") or die(print_r($db->errorInfo()));
        $insertRoom->bindParam(':room', $roomName);
        $insertRoom->bindParam(':idHousing', $idHousing);
        $insertRoom->bindParam(':idUser', $idUser);
        $insertRoom->bindParam(':type', $roomType);
        $data = $insertRoom->execute() or die(print_r($insertRoom->errorInfo()));

        $insertRoom->closeCursor();

        return $data;
    }



}