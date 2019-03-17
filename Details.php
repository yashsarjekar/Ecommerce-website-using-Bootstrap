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
<div class="container">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Details</div>
<div class="panel-body">
<?php
	if(isset($_GET['prod_id'])){
     $product_id=$_GET['prod_id'];
	$query="select * from products where product_id='$product_id'";
$runquery=mysqli_query($con,$query);
$rowdata=mysqli_fetch_array($runquery);
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$brand_id=$rowdata['brand_id'];
$product_price=$rowdata['product_price'];
$product_desc=$rowdata['description'];
$product_img1=$rowdata['img2'];
$product_status=$rowdata['status']; 
$query1="select * from brand where brand_id='$brand_id'";
$runquery1=mysqli_query($con,$query1);
$row=mysqli_fetch_array($runquery1);
$brand_title=$row['brand_title'];
	}
 ?>
 <div class="col-md-4">
<div class="panel panel-info">
<div class="panel-heading"><?php echo $product_title;?></div>
<div class="panel-body">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <a href="#"><img src="adminarea/productphotos/<?php echo $product_img;?>" alt="Los Angeles" style="width:100%;"></a>
      </div>

      <div class="item">
        <a href="#"><img src="adminarea/productphotos/<?php echo $product_img1;?>" alt="Chicago" style="width:100%;"></a>
      </div>
    
      
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
</div>
</div>
</div>
<div class="col-md-8">
<div class="panel panel-default">
<div class="panel-heading"><?php echo $product_title;?> Details</div>
<div class="panel-body">
<div class="well well-sm">
Size : <select>
<option>select the size<option>
<option>small<option>
<option>large<option>
<option>xl<option>
<option>2xl<option>
</select>
</div>
<a href="addtocart.php?p_id=<?php echo $product_id;?>"><input type="submit" class="btn btn-danger" value="Add To Cart" name="add" style="background-color:#0c0908;color:white;width:150px;"/></a>
<button type="button" class="btn btn-default" style="width:150px;" ><a href="index.php" style="color:#0c0908;">Go Back</a></button>
<ul class="nav nav-tab">
  <li class="active" style="border-bottom:1px solid #0c0908;"><a data-toggle="tab" href="#home" style="width:100px;">Description</a></li>
</ul>
 <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3></h3>
      <p><?php echo $product_desc;?></p>
    </div>
</div>
<div class="panel-heading"><b>Product Price:</b> $<?php echo $product_price;?><br><br>
<b>Brand:</b> <?php echo $brand_title;?><br><br>
<b>Status:<b> <?php echo $product_status;?>
	
</div>
</div>
</div>
</div>
</div>
<div class="panel-footer">&copy;2018 Yash Sarjekar</div>
</div>
</div>
</div>
<div class="container">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Related Products </div>
<div class="panel-body">
<?php Normaldisplay1();
 ?>
</div>
<div class="panel-footer">&copy;2018 Yash Sarjekar</div>

</div>
</div>
</div>
</body>  
</html>
  