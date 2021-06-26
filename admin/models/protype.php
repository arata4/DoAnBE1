<?php 
class Protype extends Db{
    function getAllProtype(){
        $sql=self::$connection->prepare("SELECT * FROM protypes");
     
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function getAllTypeFormId($id){
        $sql=self::$connection->prepare("SELECT * FROM `protypes`WHERE `Type_id`=?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function deleteType($idType){
        $sql=self::$connection->prepare("DELETE FROM protypes WHERE `Type_id` =?");
        $sql->bind_param("i",$idType);
        return $sql->execute();
    }
    function insertProtype($name){
        $sql=self::$connection->prepare("INSERT INTO `protypes`(`Type_name`) VALUES(?)");
        $sql->bind_param("s",$name);
        return $sql->execute();
    }
    function updateProtype($name,$id){
        $sql=self::$connection->prepare("UPDATE `protypes` SET `Type_name`=? WHERE `Type_id`=?");
        $sql->bind_param("si",$name,$id);
        return $sql->execute();
    }
}
?>