<?php
class Orderdetail extends DB
{
    public function insertOderDetail($order_id,$img,$name,$price,$quantity,$total){
        $sql=self::$connection->prepare("INSERT INTO `orderdetail`(`order_id`, `img`,`name`, `price`, `quantity`,`total`) VALUES(?,?,?,?,?,?)");
        $sql->bind_param("issiiii",$order_id,$img,$name,$price,$quantity,$total);
        return $sql->execute();
    }
}