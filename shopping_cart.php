<?php 

include('includes/header.php');
include_once('includes/catalog_view.php');

$cv = new Catalog_View();

$cart_html = $cv->render_cart();

echo $cart_html;

include_once('includes/footer.php');

?>