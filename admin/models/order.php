<?php
class Order extends DB
{
    public function insertOrder($name,$email,$phone,$message){
        $sql=self::$connection->prepare("INSERT INTO `order`(`name`, `email`, `phone`, `message`) VALUES(?,?,?,?)");
        $sql->bind_param("ssis",$name,$email,$phone,$message);
        return $sql->execute();
    }
    public function getNewestOrder(){
        $sql = "SELECT * FROM order ORDER BY order_id DESC LIMIT 1";
		$item = mysqli_query(self::$connection,$sql);
		$item1 = mysqli_fetch_assoc($item);
		return $item1;
    }
    function getAllOrder()
	{
		$sql = self::$connection->prepare("SELECT * FROM order");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
	}
}

