<?php 

include_once('includes/cart_view.php');
include_once('includes/head.php');

if(!isset($_SESSION['currentuser'])){
	header('location:login_page.php');
	exit;
}

$cart = $_SESSION['cart'];

$cv = new Cart_View();

$cart_html = $cv->render_cart($cart);

echo $cart_html;




include_once('includes/foot.php');

?>