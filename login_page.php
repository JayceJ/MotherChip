<?php 
include_once('includes/head.php');
include_once('includes/form.php');
include_once('includes/customer.php');

	$form = new Form();

	//new customer object
	$test_customer = new Customer();

	//store boolean in load_result by running the load_by_username function
	$load_result = $test_customer->load_by_username($_POST['username']);

	if($load_result == ''){
		//do nothing
	}else{

		//if returns true output taken
		if($load_result == false){
			$form->raise_custom_error('username', 'Incorrect username');
		}else{

			if($test_customer->password != $_POST['password']){

				$form->raise_custom_error('password', 'Incorrect password');
			}else{
				$_SESSION['currentuser'] = $test_customer->ID;
				header('Location: index.php');
				exit;
			}
		}
	}

		

	$form->make_input('username', 'User Name:');
	$form->make_password('password', 'Password:');
	$form->make_submit('submit', 'Submit');

	echo $form->html;


	include_once('includes/foot.php');
 ?>