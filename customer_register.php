<?php
require'dbconfig/config.php';
include("action/action.php");
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
<div class="well well-sm">
<center><h3 style="color:#e87814 ;">REGISTER</h3></center>
</div> 
<div class="container">
<center>
<form  action="customer_register.php" method="post" enctype="multipart/form-data">
<div class="table-responsive">
<table class="table">
<tbody>
<tr>
<th>Customer Name</th>
<td><input type="text" class="form-control" name="customer_name"></td>
</tr>
<tr>
<th>Email</th>
<td><input type="text" class="form-control" name="Email"  /></td>
</tr>
<tr>
<th>Password</th>
<td><input type="password" class="form-control" name="password"  /></td>
</tr>
<tr>
<th>Country</th>
<td><input type="text" class="form-control" name="country"  /></td>
</tr>
<tr>
<th>City</th>
<td><input type="text" class="form-control" name="city"  /></td>
</tr>
<tr>
<th>Contact</th>
<td><input type="text" class="form-control" name="contact"  /></td>
</tr>
<tr>
<th>Address</th>
<td><input type="text" class="form-control" name="address"  /></td>
</tr>
<tr>
<th>Customer image</th>
<td><input type="file" name="img1" /></td>
</tr>
<tr>
<td><input type="submit" name="register_btn" value="REGISTER" class="btn btn-danger btn-lg" style="background-color:#e87814 ;color:white;"/></td>
</tr>
</tbody>
</table>
</div>
</form>
</center>
</div>
</body>  
</html>
<?php
if(isset($_POST['register_btn'])){
$customer_name=$_POST['customer_name'];
$Email=$_POST['Email'];
$password=$_POST['password'];
$country=$_POST['country'];
$city=$_POST['city'];
$contact=$_POST['contact'];
$address=$_POST['address'];
$ip=getUserIpAddr();
$img1=$_FILES['img1']['name'];
$temp_name=$_FILES['img1']['tmp_name'];
$filepath="customerphoto/$img1";
	move_uploaded_file($temp_name,$filepath);
$query="insert into customer (customer_name,Email,password,country,city,contact,address,customer_img,customer_ip) values('$customer_name','$Email','$password','$country','$city','$contact','$address','$img1','$ip')";
$runquery=mysqli_query($con,$query);
if($runquery){
	echo'<script>alert("Account has been register")</script>';
}	
}
?>  