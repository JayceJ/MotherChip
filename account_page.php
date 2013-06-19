<?php 
include_once('includes/head.php');
include_once('includes/form.php');
include_once('includes/customer.php');
include_once('includes/account_view.php');

$av = new Account_View();

$customer = new Customer();
$customer->load($_SESSION["currentuser"]);

echo $av->render_details($customer);


include_once('includes/foot.php');
?>