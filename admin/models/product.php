<?php
class Product extends Db{
    function getAllProductID($id){
        $sql=self::$connection->prepare("SELECT * FROM products WHERE id =?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
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
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * FROM `products`
        ORDER BY `id` DESC");
        $sql->execute(); //return an object
        $items=array();
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;//return an array;
    }
    function deleteProduct($id){
        $sql=self::$connection->prepare("DELETE FROM products WHERE id =?");
        $sql->bind_param("i",$id);
        return $sql->execute();
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
    public function insertProduct($name,$manu_id,$type_id,$price,$pro_image,$description,$feature){
        $sql=self::$connection->prepare("INSERT INTO `products`(`Name`, `Manu_id`, `Type_id`, `Price`, `Pro_image`, `Description`, `Feature`)
        VALUES(?,?,?,?,?,?,?)");
        $sql->bind_param("siiissi",$name,$manu_id,$type_id,$price,$pro_image,$description,$feature);
        return $sql->execute();
    }
    public function getProductsManu($Manu_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products,manufactures where products.Manu_id=manufactures.Manu_id and manufactures.Manu_id = ? ");
        $sql->bind_param("i", $Manu_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductsProtypes($Type_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products,protypes where products.Type_id=protypes.Type_id and protypes.Type_id = ? ");
        $sql->bind_param("i", $Type_id);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function updateProduct($name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $id)
    {
        if($pro_image!=null){
            $sql = self::$connection->prepare("UPDATE `products` SET 
            `Name`=?,`Manu_id`=?,`Type_id`=?,`Price`=?,`Pro_image`=?, `Description`=?,`Feature`=?
            WHERE id=?");
            $sql->bind_param("siiissii", $name, $manu_id, $type_id, $price, $pro_image, $description, $feature, $id);
        }else{
            $sql = self::$connection->prepare("UPDATE `products` SET 
            `Name`=?,`Manu_id`=?,`Type_id`=?,`Price`=?,`Description`=?,`Feature`=?
            WHERE id=?");
            $sql->bind_param("siiisii", $name, $manu_id, $type_id, $price,$description, $feature, $id);
        }
        return  $sql->execute();
    }
}