<?php 

include('type_manager.php');
include('menu_view.php');

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

			<img id="logo" src="assets/images/logo.jpg" alt="logo">

			<div id="userNav">

				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Account</a></li>
					<li><a href="#">Shopping cart</a></li>
					<li><a href="register_page.php">Register / Log in</a></li>
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