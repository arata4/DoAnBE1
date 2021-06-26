<?php 
class Manufacture extends Db{
    function getAllManu(){
        $sql=self::$connection->prepare("SELECT * FROM `manufactures`");
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function getAllManuFormId($id){
        $sql=self::$connection->prepare("SELECT * FROM `manufactures`WHERE Manu_id=?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function deleteManu($idManu){
        $sql=self::$connection->prepare("DELETE FROM manufactures WHERE `Manu_id` =?");
        $sql->bind_param("i",$idManu);
        return $sql->execute();
    }
    public function insertManufacture($name){
        $sql=self::$connection->prepare("INSERT INTO `manufactures`(`Manu_name`) VALUES(?)");
        $sql->bind_param("s",$name);
        return $sql->execute();
    }
    function updateManufacture($name,$id){
        $sql=self::$connection->prepare("UPDATE `manufactures` SET `Manu_name`=? WHERE `Manu_id`=?");
        $sql->bind_param("si",$name,$id);
        return $sql->execute();
    }
}
?>