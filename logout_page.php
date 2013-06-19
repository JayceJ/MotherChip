<?php 
//includes the session on this page because it does not have a header.php
session_start();

//unsets the "currentuser" key from the session
unset($_SESSION["currentuser"]);

//redirect
header('Location: index.php');
 ?>