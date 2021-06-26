<?php
class Product extends Db
{
    //Lay tat ca san pham
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,`protypes`,`manufactures` WHERE `products`.`Manu_id`=`manufactures`.`Manu_id` AND
        `products`.`Type_id`=`protypes`.`Type_id` ORDER BY  `products`.`id`");
        $sql->execute(); //return an object
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;//return an array;
    }
    //Lay san pham noi bat
    public function getAllFeatureProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE Feature=1 LIMIT 4");
        $sql->execute(); //return an object
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;//return an array;
    }
    //Lay 3 san pham moi nhat
    public function getAllCreatedProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM products ORDER by Created_at DESC LIMIT 4");
        $sql->execute(); //return an object
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;//return an array;
    }
    public function getProductsManu($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products,manufactures where products.Manu_id=manufactures.Manu_id and manufactures.Manu_id = ? ");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductsProtypes($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products,protypes where products.Type_id=protypes.Type_id and protypes.Type_id = ? ");
        $sql->bind_param("i", $id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`,protypes,manufactures WHERE products.Type_id=protypes.Type_id and products.Manu_id=manufactures.Manu_id and id=?");
        $sql->bind_param("i",$id);
        $sql->execute(); //return an object
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;//return an array;
    }
    public function getSearchProduct($key){
        $sql =self::$connection->prepare("SELECT * FROM products WHERE `Name` LIKE '%$key%'");
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductPagination($page,$prePage){
        $firstLink=($page-1)*$prePage;
        $sql=self::$connection->prepare("SELECT * FROM `products`,`protypes`,`manufactures` WHERE `products`.`Manu_id`=`manufactures`.`Manu_id` AND
        `products`.`Type_id`=`protypes`.`Type_id` ORDER BY  `products`.`id` DESC LIMIT $firstLink,$prePage");
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductPaginationWithKey($name,$page,$prePage){
        $firstLink=($page-1)*$prePage;
        $sql=self::$connection->prepare("SELECT * FROM `products`,`protypes`,`manufactures` WHERE `products`.`Manu_id`=`manufactures`.`Manu_id` AND
        `products`.`Type_id`=`protypes`.`Type_id` AND `products`.`Name` LIKE '%$name%' LIMIT $firstLink,$prePage");
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductPaginationWithManu($manu,$page,$prePage){
        $firstLink=($page-1)*$prePage;
        $sql=self::$connection->prepare("SELECT * FROM `products`,`manufactures` WHERE `products`.`Manu_id`=`manufactures`.`Manu_id` LIMIT $firstLink,$prePage");
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductPaginationWithType($type,$page,$prePage){
        $firstLink=($page-1)*$prePage;
        $sql=self::$connection->prepare("SELECT * FROM `products`,`protypes` WHERE `products`.`Type_id`=`protypes`.`Type_id` LIMIT $firstLink,$prePage");
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductIDFromCart($id)
    {
        $sql = "SELECT * FROM products WHERE id = $id";
        $item = mysqli_query(self::$connection,$sql); 
        $item1 = mysqli_fetch_assoc($item);
        return $item1;
    }
    public function Random()
        {
            $sql = self::$connection->prepare("SELECT * FROM products ORDER BY RAND() LIMIT 3");
            $sql->execute();
            $items = array();
            $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
            return $items; 
        } 
}
?>