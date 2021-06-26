<?php 
	session_start();
	require "config.php";
	require "models/db.php";
	require "models/order.php";
	require "models/orderdetail.php";
	$order = new Order;
	$orderdetail = new Orderdetail;
	if(!empty($_SESSION['cart']))
	{	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phonenumber = $_POST['number'];
		$message = $_POST['message'];
		$order->insertOrder($name,$email,$phonenumber,$message);
		//xu li gio hang 
		$getNewestOrder = $order->getNewestOrder();
		//lay ra order_id cua tale order
		//$orderdetail->insertOrderdetail()
		foreach ($_SESSION['cart'] as $value) {
			$total = 0;
			$sum=$value['Price']*$value['quantity'];
			$orderdetail->insertOderDetail($getNewestOrder['order_id'],$value['Pro_image'],$value['Name'],$value['Price'],$value['quantity'],$total);
		}
		echo "Your cart is being processed .<a href='javascript: history.go(-1)'>Go Back</a>";
	}
	else {
		echo "Your Cart Is Empty .<a href='javascript: history.go(-1)'>Go Back</a>";
		die();
	}
?>