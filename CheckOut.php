<?php
require'dbconfig/config.php';
include("action/action.php");
session_start();
if(!isset($_SESSION['Email'])){
 include("customer_login.php");
}else{
	include("Payment.php");
}
?>