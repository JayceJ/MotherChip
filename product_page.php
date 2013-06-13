<?php 
include_once('includes/head.php');
include_once('includes/product.php');
include_once('includes/product_manager.php');
include_once('includes/catalog_view.php');

	$cv = new Catalog_View();
	$pm = new Product_Manager();

	//Initialising the product ID
	$product_id = 1;

	//changes the ID to suit the correct page
	if(isset($_GET['productID'])){

		$product_id = $_GET['productID'];

	}

	//load a new product according to the ID as stated above
	$product = new Product();
	$product->load($product_id);

	//Catalog_View renders the new product
	echo $cv->render_product($product);



	include_once('includes/foot.php');
 ?>