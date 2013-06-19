<?php 
include_once('includes/head.php');
include_once('includes/product.php');
include_once('includes/product_manager.php');
include_once('includes/catalog_view.php');

$cv = new Catalog_View();
$pm = new Product_Manager();

$aProducts = $pm->load_all_products();


echo $cv->render_all_products($aProducts);


include_once('includes/foot.php');
?>