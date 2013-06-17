<?php 
include_once('includes/head.php');
include_once('includes/form.php');
include_once('includes/customer.php');


$form = new Form();

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