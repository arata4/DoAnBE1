<?php
class Order extends DB
{
    public function insertOrder($name,$email,$phone,$message){
        $sql=self::$connection->prepare("INSERT INTO `order`(`name`, `email`, `phone`, `message`) VALUES(?,?,?,?)");
        $sql->bind_param("ssis",$name,$email,$phone,$message);
        return $sql->execute();
    }
 function getNewestOrder(){
        $sql = self::$connection->prepare("SELECT * FROM order ORDER BY order_id DESC LIMIT 1");
        $sql->execute(); //return an object
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;//return an array;
    }
}

