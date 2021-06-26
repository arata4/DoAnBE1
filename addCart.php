
<?php
	session_start();
    require "models/db.php";
    require "config.php";
    require "models/product.php";    
    $product = new Product();
    	$action = (isset($_GET['action'])) ? $_GET['action'] : '';   	
    	$id = $_GET['id'];
    	$getProductIDFromCart = $product->getProductIDFromCart($id);
    	$qty = (isset($_GET['quantity'])) ? $_GET['quantity'] : 1;
		if(empty($_SESSION['cart']) || !array_key_exists($id, $_SESSION['cart'])){	
			$getProductIDFromCart = $product->getProductIDFromCart($id);		
			$getProductIDFromCart['quantity'] = $qty;
			//gan session = product
			$_SESSION['cart'][$id] = $getProductIDFromCart;
		}
		else {	
			if(isset($_GET['id']) && $action == 'tru') {						
				$getProductIDFromCart['quantity'] = $_SESSION['cart'][$id]['quantity'] - $qty;	
				$_SESSION['cart'][$id] = $getProductIDFromCart;
			}
			else {		
				$getProductIDFromCart['quantity'] = $_SESSION['cart'][$id]['quantity'] + $qty;	
				$_SESSION['cart'][$id] = $getProductIDFromCart;	
			}				
		}	
		header('location:cart.php');		
?>

