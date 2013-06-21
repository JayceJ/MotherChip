<?php 
include_once('includes/cart.php');
session_start();

$product_id = $_GET['productID'];


$cart = $_SESSION['cart'];
$cart->remove($product_id,1);

header('Location: shopping_cart.php');
exit;

 ?>