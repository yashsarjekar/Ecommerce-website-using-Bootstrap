<?php
require'dbconfig/config.php';
include("action/action.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="js/jquery2.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar  navbar-fixed-top navbar-right" style=" background-color:#FFFFF7;color:#344146;width:100%">
<center>
  <div class="container">
    <div class="navbar-header">
	   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" style="background-color:">
       <i class="glyphicon glyphicon-align-justify"></i>                      
      </button>
      <a class="navbar-brand" href="#" style="color:#FCB941;">Sarjekar Shop</a>
    </div>
<div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="#Myaccount">My Account</a></li>
	   </ul>
	     <form method="get" action="search.php" enctype="multipart/form-data">
	    <ul class="nav navbar-nav">  
	  <li><input type="text" name="search" class="form-control" style="width:300px;margin-top:7px;margin-left:20px;" placeholder="Search"></li>
	  <li><input type="submit" class="btn btn-default" name="search_btn" style="margin-top:7px;margin-left:5px;" value="Search"></li>
   </ul>
    </form>
	<ul class="nav navbar-nav">
	     <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>cart <span class="badge"><?php item();?></span></a></li>
		 <?php
		 if(!isset($_SESSION['Email'])){
		     echo"   <li><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-user'></span>SignIn</a>
				<ul class='dropdown-menu'>
				<div style='width:300px;'>
				<div class='panel panel-default'>
				<div class='panel-heading'>SignIn</div>
				<div class='panel-body'>
				<form method='post' enctype='multipart/form-data'>
				<label for='email'>Email:</label>
				<input type='text' class='form-control' placeholder='Email' name='Email' required/>
				<label for='email'>Password:</label>
				<input type='password' class='form-control' placeholder='Password'  name='password' required/>
				<a href='forgot.php?forget_pass' style='color:#CF000F;'>Forgotten Password?</a><input type='submit' name='login' value='Login' class='btn btn-warning' style='margin-left:50px;'>
				</form>
				</div>
				</div>
				</div>
				</ul>
				</li>
				<li><a href='customer_register.php'><span class='glyphicon glyphicon-user'></span>SignUp</</a></li>";

if(isset($_POST['login'])){
$Email=$_POST['Email'];
$password=$_POST['password'];
$query14="select * from customer where Email='$Email' AND password='$password'";
$runquery14=mysqli_query($con,$query14);
if(mysqli_num_rows($runquery14)>0){
	$_SESSION['Email']=$Email;
	echo'<script>alert("Email exist")</script>';
header('location:index.php');
}
else{
	echo '<script>alert("Invalid Username and password")</script>';
}
}
		 }
		 else{
			 echo"<li><a href='#' class='dropdown-toggle' data-toggle='dropdown'><span class='glyphicon glyphicon-user'></span>SignOut</a>
			 	<ul class='dropdown-menu'>
				<div style='width:300px;'>
				<div class='panel panel-default'>
				<div class='panel-heading'>SignIn</div>
					<div class='panel-body'>
					<label for='email'>Email:".$_SESSION['Email']."</label>
					<a href='logout.php'><input type='submit' name='login' value='Logout' class='btn btn-warning' style='margin-left:50px;'></a>
					</div>
				</div>
				</div>
				</ul>";
		 }
?>
				
	</ul>
	</div>
  </div>
  </center>
  </nav>
<br>
<br>
<br>
 <div align="center" >
  <img src="logo.jpg" style="width:200px;height:190px; border-radius:100%;" align="center" >
  <h1 style="color:#FCB941;">MY SHOP TUDS</h1>
  </div>
  <div class="container">
  <nav class="navPages-container" style="border:1px solid #344146;color:#344146;width:100%;">
  <div class="container-fluid" style="align:center;margin-left:100px;width:100%;">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="font-size:25px; color:#FCB941;">Categories</a>
    </div>
    <ul class="nav navbar-nav" >
      <li><a href="index.php?c1_id=1" class="dropdown-toggle" data-toggle="dropdown" style="font-size:25px; color:#344146;">Mens Wear</a>
		 <ul class="dropdown-menu">
		 <div style="width:1000px;">
		 <div class="panel panel-default">
		 <div class="panel-heading">
		 <div class="row">
		<?php Brand1(); ?>
			</div>
		 </div>
		 </div>
		 </div>
		 </ul>
	  </li>
      <li><a href="index.php?c_id=2" class="dropdown-toggle" data-toggle="dropdown" style="font-size:25px;color:#344146;">Female Wear</a>
	   <ul class="dropdown-menu">
		 <div style="width:1000px;">
		 <div class="panel panel-default">
		 <div class="panel-heading">
		 <div class="row">
		<?php Brand2(); ?>
			</div>
		 </div>
		 </div>
		 </div>
		 </ul></li>
      <li><a href="index.php?c_id=3" class="dropdown-toggle" data-toggle="dropdown" style="font-size:25px;color:#344146;">Kids Wear</a>
	   <ul class="dropdown-menu">
		 <div style="width:1000px;">
		 <div class="panel panel-default">
		 <div class="panel-heading">
		 <div class="row">
		<?php Brand3(); ?>
			</div>
		 </div>
		 </div>
		 </div>
		 </ul></li>
      <li><a href="index.php?c_id=4" class="dropdown-toggle" data-toggle="dropdown" style="font-size:25px;color:#344146;">Seasonal Wear</a>
	   <ul class="dropdown-menu">
		 <div style="width:1000px;">
		 <div class="panel panel-default">
		 <div class="panel-heading">
		 <div class="row">
		<?php Brand4(); ?>
			</div>
		 </div>
		 </div>
		 </div>
		 </ul></li>
    </ul>
  </div>
</nav>
</div>
<br>
<br>
<div class="container">
<center>
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th>Remove</th>
<th>Product</th>
<th>Product Title</th>
<th>Quantity</th>
<th>Price</th>
<th>Sub Total</th>
</tr>
</thead>
<tbody>
<?php cartdisplay1();?>
</tbody>
</table>
</div>
</center>
</div>
</body>  
</html>  