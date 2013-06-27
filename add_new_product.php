<?php 	

include_once('includes/head.php');
include_once('includes/product.php');
include_once('includes/form.php');


// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
$form = new Form();
if(isset($_POST['submit'])){

	$form->dataArray = $_POST;
	$form->filesArray = $_FILES;

	$form->check_required('productName');
	$form->check_required('description');
	$form->check_required('price');
	$form->check_required('type');
	$form->check_required('stockLevel');
	$form->check_required('active');

	$form->check_image_upload('photoPath');


	if($form->valid==true){
	
		$new_name = time().".jpg";
		$form->move_file("photoPath",$new_name);

		$product = new Product();
		$product->productName = $_POST['productName'];
		$product->description = $_POST['description'];
		$product->price = $_POST['price'];
		$product->typeID = $_POST['type'];
		$product->stockLevel = $_POST['stockLevel'];
		$product->photoPath = $new_name;
		$product->active = $_POST['active'];
		$product->save();

		header('location:type_page.php?typeID='.$product->typeID);
		exit;


	}
}





$form->make_input('productName','Product Name:');
$form->make_input('description','Description:');
$form->make_input('price','Price:');
$form->make_input('type','Type:');
$form->make_input('stockLevel','Stock:');
$form->make_file_upload('photoPath','Add Photo:');
$form->make_input('active','Active:');
$form->make_submit('submit','Add Product');

echo $form->html;


include_once('includes/foot.php');

 ?>