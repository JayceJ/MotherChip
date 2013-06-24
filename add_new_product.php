<?php 	

include_once('includes/head.php');
include_once('includes/product.php');
include_once('includes/form.php');

$product = new Product();

if(isset($_POST['submit'])){

	$product->productName = $_POST['productName'];
	$product->description = $_POST['description'];
	$product->price = $_POST['price'];
	$product->typeID = $_POST['type'];
	$product->stockLevel = $_POST['stockLevel'];
	$product->photoPath = $_POST['photoPath'];
	$product->active = $_POST['active'];
	$product->save();

	header('location:index.php');
	exit;

}



$form = new Form();

$form->make_input('productName','Product Name:');
$form->make_input('description','Description:');
$form->make_input('price','Price:');
$form->make_input('type','Type:');
$form->make_input('stockLevel','Stock:');
$form->make_input('photoPath','Add Photo:');
$form->make_input('active','Active:');
$form->make_submit('submit','Add Product');

echo $form->html;


include_once('includes/foot.php');

 ?>