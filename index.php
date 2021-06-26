<!DOCTYPE html>
<html lang="en">
<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/protype.php";
require "models/manufacture.php";
require "pagination/pagination.php";
$product = new Product;
$protypes=new Protypes;
$manufactures=new Manufacture;
$pagination=new pagination();
$getAllFeatureProducts=$product->getAllFeatureProducts();
$getAllCreatedProducts=$product->getAllCreatedProducts();
$getAllProtypes=$protypes->getAllProtypes();
$getAllManufacture=$manufactures->getAllManufacture();
$getAllProducts=$product->getAllProducts();

$total=count($getAllProducts);
$url=$_SERVER['PHP_SELF'];
$getProductPagination=$product->getProductPagination($pagination::$page,$pagination::$perPage);


?>
<style>
    .productinfo img{
        width: 250px;
        height: 250px;
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="public/images/ico/apple-touch-icon-57-precomposed.png">
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
                            <li><a href="cart.php">Cart</a></li>
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
                        <h2 class="title text-center">Features Items</h2>
                        <?php foreach($getAllFeatureProducts as $value){ ?>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="public/images/<?=$value['Pro_image']?>" alt="" />
                                            <h2><?=number_format( $value['Price'])?> VND</h2>
                                            <p><a href="detail.php?id=<?=$value['id']?>"><?=$value['Name']?></a></p>
                                            <a href="addCart.php?id=<?=$value['id']?>"class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?=number_format( $value['Price'])?> VND</h2>
                                            <p><a href="detail.php?id=<?=$value['id']?>"><?=$value['Name']?></a></p>
                                            <a href="addCart.php?id=<?=$value['id']?>"class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">News Items</h2>
                        <?php foreach($getAllCreatedProducts as $value){ ?>
                        <div class="col-sm-3">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="public/images/<?=$value['Pro_image']?>" alt="" />
                                            <h2><?=number_format( $value['Price'])?> VND</h2>
                                            <p><a href="detail.php?id=<?=$value['id']?>"><?=$value['Name']?></a></p>
                                            <a href="addCart.php?id=<?=$value['id']?>"class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?=number_format( $value['Price'])?> VND</h2>
                                            <p><a href="detail.php?id=<?=$value['id']?>"><?=$value['Name']?></a></p>
                                            <a href="addCart.php?id=<?=$value['id']?>"class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="created_at">
                        <!--created_at items-->
                        <h2 class="title text-center">Products</h2>
                        <?php foreach($getProductPagination as $value){ ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"> <img
                                            src="public/images/<?= $value['Pro_image']?>" alt="" />
                                            <h2><?=number_format( $value['Price'])?> VND</h2>
                                            <p><a href="detail.php?id=<?=$value['id']?>"><?=$value['Name']?></a></p>
                                            <a href="addCart.php?id=<?=$value['id']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2><?=number_format( $value['Price'])?> VND</h2>
                                            <p><a href="detail.php?id=<?=$value['id']?>"><?=$value['Name']?></a></p>
                                            <a href="addCart.php?id=<?=$value['id']?>" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="col-sm-12" style="display: flex; justify-content: center;">
                        <ul class="pagination">
                            <?php
                                $previous = $pagination::$page - 1;
                                if ($previous > 0) {
                            ?>
                                <li><a href="<?php echo "$url?&page=$previous" ?>"><<</a> </li>
                            <?php } ?>

                            <?php echo $pagination->pagination("$url?", $total); ?>

                            <?php
                             $next = $pagination::$page + 1;
                             if ($pagination::$page < $total / $pagination::$perPage) {
                             ?> <li><a href="<?php
                                         echo "$url?&page=$next" ?>">>></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
    </section>
    <footer id="footer">
        <!--Footer-->
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>
    </footer>
    <!--/Footer-->
    <script src="public/js/jquery.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/jquery.scrollUp.min.js"></script>
    <script src="public/js/price-range.js"></script>
    <script src="public/js/jquery.prettyPhoto.js"></script>
    <script src="public/js/main.js"></script>
</body>

</html>