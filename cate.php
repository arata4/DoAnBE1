<!DOCTYPE html>
<html lang="en">
<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/manufacture.php";
$product = new Product;
$protypes=new Protypes;
$manufactures=new Manufacture;
if(isset($_GET['Manu_id'])){
    $getProductsManu=$product->getProductsManu($_GET['Manu_id']);
}
if(isset($_GET['Type_id'])){
    $getProductsProtypes=$product->getProductsProtypes($_GET['Type_id']);
}
$getAllManufacture=$manufactures->getAllManufacture();
$getAllProtypes=$protypes->getAllProtypes();
?>
<style>
    .productinfo img{
        width: 250px;
        height: 250px;
    }
    .productinfo p{
        height: 45px;
    }
</style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Mobile Shopping</title>
    <link rel="icon" href="./images/logo.png" type="image/icon type">
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/font-awesome.min.css" rel="stylesheet">
    <link href="public/css/prettyPhoto.css" rel="stylesheet">
    <link href="public/css/price-range.css" rel="stylesheet">
    <link href="public/css/animate.css" rel="stylesheet">
    <link href="public/css/main.css" rel="stylesheet">
    <link href="public/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>
    <div class="header-bottom">
        <!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                        </button>
                        <div class="logo"> <a href="index.php"><img src="public/images/logo.png" alt="" /></a> </div>
                    </div>
                    <div class="mainmenu pull-right">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="index.php" class="active">Home</a></li>
                            <li class="dropdown"><a href="index.php">Products<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                <?php foreach($getAllProtypes as $value){ ?>
                                    <li><a href="cate.php?Type_id=<?= $value['Type_id']?>"><?= $value['Type_name']?></a></li>
                                    <?php }?>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Blog List</a></li>
                                    <li><a href="#">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="cart.php?">Cart</a></li>
                        </ul>
                        <div class="search_box pull-right">
                            <form action="result.php" method="get">
                                <input type="text" placeholder="Search" name="key" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/header-bottom-->
    </header>
    <!--/header-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Category</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <div class="panel panel-default">
                            <?php foreach($getAllManufacture as $value){ ?>
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="cate.php?Manu_id=<?=$value['Manu_id']?>"><?=$value['Manu_name']?></a></h4>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        
                        <?php if(isset($getProductsManu[0]['Manu_name'])){?>
                        <h2 class="title text-center"><?= $getProductsManu[0]['Manu_name']?></h2>
                            <?php foreach($getProductsManu as $value){ ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center"> <img
                                                src="public/images/<?= $value['Pro_image']?>" alt="" />
                                                <h2><?=number_format($value['Price'])?> VND</h2>
                                                <p><a href="detail.php?id=<?=$value['id']?>"><?= $value['Name']?></a></p>
                                                <a href="cart.php?45" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <!-- <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2><?=number_format($value['Price'])?> VND</h2>
                                                <p><a href="detail.php?id=<?=$value['id']?>"><?= $value['Name']?></a></p>
                                                <a href="cart.html?45" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        <?php } } else{?>

                        <!--protypes-->
                        <?php if(isset($getProductsProtypes[0]['Type_name'])){?>
                        <h2 class="title text-center"><?= $getProductsProtypes[0]['Type_name']?></h2>
                            <?php foreach($getProductsProtypes as $value){ ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center"> <img
                                                src="public/images/<?= $value['Pro_image']?>" alt="" />
                                            <h2><?=number_format($value['Price']) ?> VND</h2>
                                            <p><?= $value['Name']?></p>
                                            <a href="cart.php?45" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2><?=number_format($value['Price'])?> VND</h2>
                                                <p><a href="detail.php?id=<?=$value['id']?>"><?= $value['Name']?></a></p>
                                                <a href="cart.php?45" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } } }?>
                    </div>
            </div>

        </div>
        </div>
    </section>
</body>

</html>