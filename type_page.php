<?php 
include_once('includes/head.php');
include_once('includes/product.php');
include_once('includes/type_manager.php');
include_once('includes/type.php');
include_once('includes/catalog_view.php');

	$cv = new Catalog_View();
	$tm = new Type_Manager();

	//Initialising the type ID
	$product_id = 1;

	//changes the ID to suit the correct page
	if(isset($_GET['typeID'])){

		$type_id = $_GET['typeID'];

	}

	//load a new type according to the ID as stated above
	$type = new Type();
	$type->load($type_id);

	//Catalog_View renders the new type
	echo $cv->render_type($type);



	include_once('includes/foot.php');
 ?>