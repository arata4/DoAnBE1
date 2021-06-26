<?php
require "../config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/manufacture.php";
require "../models/user.php";
$product=new Product;
$manu=new Manufacture;
$type=new Protype;
$user=new User;
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete=$product->deleteProduct($id);
    header('location: index.php');
}else if(isset($_GET['Manu_id'])){
    $id = $_GET['Manu_id'];
    $getProductsManu=$product->getProductsManu($id);
    if(count($getProductsManu)<=0){
        $deleteManu=$manu->deleteManu($id);
        header('location: manufactures.php');
    }else{
        $mesa = "Khong the xoa ". count($getProductsManu) ." san pham";
        echo "<script>alert('$mesa')</script>";       
    }
}else if(isset($_GET['Type_id'])){
    $id = $_GET['Type_id'];
    $getProductsProtypes=$product->getProductsProtypes($id);
    if(count($getProductsProtypes)<=0){
        $deleteType=$type->deleteType($id);
        header('location: protypes.php');
    }else{
        $mesa = "Khong the xoa ". count($getProductsProtypes) ." san pham";
        echo "<script>alert('$mesa')</script>";
    }
}

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $deleteUser=$user->deleteUser($id);
    header('location: index.php');
}
?>