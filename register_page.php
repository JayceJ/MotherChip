<?php 
include_once('includes/head.php');
include_once('includes/form.php');
include_once('includes/customer.php');


$form = new Form();

$form->temp_make_form();

echo $form->html;

include_once('includes/foot.php');
?>