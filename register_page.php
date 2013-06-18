<?php 
include_once('includes/head.php');
include_once('includes/form.php');
include_once('includes/customer.php');

$customer = new Customer();
$form = new Form();

if(isset($_POST['submit'])){

	$form->dataArray = $_POST;
	$form->check_required('username');
	$form->check_required('firstName');
	$form->check_required('lastName');
	$form->check_required('address');
	$form->check_required('telephone');
	$form->check_required('email');
	$form->check_required('password');
	$form->check_required('confirmPassword');

	//new customer object
	$test_customer = new Customer();

	//store boolean in load_result by running the load_by_username function
	$load_result = $test_customer->load_by_username($_POST['username']);

	//if returns true output taken
	if($load_result == true){
		$form->raise_custom_error('username', 'Username has already been taken');
	}

	if($form->valid == true){

		$customer->userName = $_POST['username'];
		$customer->firstName = $_POST['firstName'];
		$customer->lastName = $_POST['lastName'];
		$customer->address = $_POST['address'];
		$customer->telephone = $_POST['telephone'];
		$customer->email = $_POST['email'];		
		$customer->password = $_POST['password'];
		$customer->confirmPassword = $_POST['confirmPassword'];
		$customer->save();

		//redirect
		header('Location: index.php');
	}
}

$form->make_input('username', 'User Name:');
$form->make_input('firstName', 'First Name:');
$form->make_input('lastName', 'Last Name:');
$form->make_input('address', 'Address:');
$form->make_input('telephone', 'Telephone:');
$form->make_input('email', 'Email:');
$form->make_password('password', 'Password:');
$form->make_password('confirmPassword', 'Confirm Password:');
$form->make_submit('submit', 'Submit');

echo $form->html;

include_once('includes/foot.php');
?>