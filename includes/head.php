<?php 

include_once('type_manager.php');
include_once('menu_view.php');
include_once('customer.php');

//including all pages in a session to store lobal vars such as username
session_start();

$tm = new Type_Manager();
$mv = new Menu_View();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shopping Cart</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/normalize.css">
</head>
<body>

	<div id="container">
		
		
		<div id="header">

			<a href="index.php"><img id="logo" src="assets/images/logo.jpg" alt="logo"></a>

			<div id="userNav">

				<ul>
					<li><a href="index.php">Home</a></li>

					<?php 
					if(isset($_SESSION["currentuser"])){
						echo '<li><a href="account_page.php">Account</a></li>';
					}else{
						echo '<li><a href="login_page.php".php">Account</a></li>';
					}

					 ?>
					
					<li><a href="#">Shopping cart</a></li>
					

					<?php

						if(isset($_SESSION["currentuser"]) == false){
							echo '<li><a href="register_page.php">Register</a></li>';
							echo '<li><a href="login_page.php">Log in</a></li>';
						}else{

							$customer = new Customer();
							$customer->load($_SESSION["currentuser"]);
							echo '<li><a href="logout_page.php">Logout</a></li>';
							echo '<li>Welcome, <b><a href="account_page.php">'.$customer->firstName . ' '. $customer->lastName .'</a></b></li>';
							
						}
					?>
					
					
				</ul>



			</div>

		</div>

		<div id="sidebar">

			<div id="productNav">

				<h2>Departments</h2>
				
				 
				<?php echo $mv->render($tm->load_all_types()); ?>

			</div>
		
		</div>

		<div id="content">