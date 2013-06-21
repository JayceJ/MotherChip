<?php 

include_once('includes/cart_view.php');
include_once('includes/head.php');

$cart = $_SESSION['cart'];

$cv = new Cart_View();

$cart_html = $cv->render_cart($cart);

echo $cart_html;




include_once('includes/foot.php');

?>