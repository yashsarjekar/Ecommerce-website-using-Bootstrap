<?php
require'dbconfig/config.php';

function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function Normaldisplay(){
	global $con;
	if(!isset($_GET['cat_id'])){
		if(!isset($_GET['brand_id'])){
	$query="select * from products order by rand() LIMIT 0,6";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<div class='col-md-4'>
<div class='panel panel-info'>
<div class='panel-heading'>$product_title <button type='button' class='btn btn-warning btn-xs' style='float:right;'><a href='Details.php?prod_id=$product_id' style='color:white;'>Details</a></button></div>
<div class='panel-body'>
<img src='adminarea/productphotos/$product_img'>
</div>
<div class='panel-heading'>$$product_price <button type='button' class='btn btn-danger btn-xs' style='float:right;'><a href='index.php?product_id=$product_id' style='color:white;'>Add to Cart</a></button></div>
</div>
</div>
";
}
		}
	}
}
function Normaldisplay1(){
	global $con;
	if(!isset($_GET['cat_id'])){
		if(!isset($_GET['brand_id'])){
	$query="select * from products order by rand() LIMIT 0,3";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<div class='col-md-4'>
<div class='panel panel-info'>
<div class='panel-heading'>$product_title <button type='button' class='btn btn-warning btn-xs' style='float:right;'><a href='Details.php?prod_id=$product_id' style='color:white;'>Details</a></button></div>
<div class='panel-body'>
<img src='adminarea/productphotos/$product_img'>
</div>
<div class='panel-heading'>$$product_price <button type='button' class='btn btn-danger btn-xs' style='float:right;'><a href='index.php?product_id=$product_id' style='color:white;'>Add to Cart</a></button></div>
</div>
</div>
";
}
		}
	}
}
function Normaldisplaybrand(){
	global $con;
	if(isset($_GET['brand_id'])){
     $brand_id=$_GET['brand_id'];
	$query="select * from products where brand_id='$brand_id'";
$runquery=mysqli_query($con,$query);
while($rowdata=mysqli_fetch_array($runquery)){
$product_title=$rowdata['product_title'];
$product_id=$rowdata['product_id'];
$product_img=$rowdata['img1'];
$product_price=$rowdata['product_price'];
echo"
<div class='col-md-4'>
<div class='panel panel-info'>
<div class='panel-heading'>$product_title <button type='button' class='btn btn-warning btn-xs' style='float:right;'><a href='Details.php?prod_id=$product_id' style='color:white;'>Details</a></button></div>
<div class='panel-body'>
<img src='adminarea/productphotos/$product_img'>
</div>
<div class='panel-heading'>$$product_price <button type='button' class='btn btn-danger btn-xs' style='float:right;'><a href='index.php?product_id=$product_id' style='color:white;'>Add to Cart</a></button></div>
</div>
</div>
";
}
}
}
function Brand1(){
	global $con;
		$i=0;
		$query1="select * from brand where cat_id='1'";
		$runquery1=mysqli_query($con,$query1);
		while($row1=mysqli_fetch_array($runquery1)){
			$brand=$row1['brand_title'];
			$brand_id=$row1['brand_id'];
			$i++;
		echo "<div class='col-md-3'>$i</div>
		 <div class='col-md-3'><a href='index.php?brand_id=$brand_id'>$brand</a></div>";
		}
}
function Brand2(){
	global $con;
		$i=0;
		$query1="select * from brand where cat_id='2'";
		$runquery1=mysqli_query($con,$query1);
		while($row1=mysqli_fetch_array($runquery1)){
			$brand=$row1['brand_title'];
			$brand_id=$row1['brand_id'];
			$i++;
		echo "<div class='col-md-3'>$i</div>
		 <div class='col-md-3'><a href='index.php?brand_id=$brand_id'>$brand</a></div>";
		}
}
function Brand3(){
	global $con;
		$i=0;
		$query1="select * from brand where cat_id='3'";
		$runquery1=mysqli_query($con,$query1);
		while($row1=mysqli_fetch_array($runquery1)){
			$brand=$row1['brand_title'];
			$brand_id=$row1['brand_id'];
			$i++;
		echo "<div class='col-md-3'>$i</div>
		 <div class='col-md-3'><a href='index.php?brand_id=$brand_id'>$brand</a></div>";
		}
}
function Brand4(){
	global $con;
		$i=0;
		$query1="select * from brand where cat_id='4'";
		$runquery1=mysqli_query($con,$query1);
		while($row1=mysqli_fetch_array($runquery1)){
			$brand=$row1['brand_title'];
			$brand_id=$row1['brand_id'];
			$i++;
		echo "<div class='col-md-3'>$i</div>
		 <div class='col-md-3'><a href='index.php?brand_id=$brand_id'>$brand</a></div>";
		}
}
if(isset($_GET['product_id'])){
	$ip=getUserIpAddr();
		$product_id=$_GET['product_id'];
		$query="select * from cart where cart_id='$product_id' AND ip_add='$ip'";
		$runquery=mysqli_query($con,$query);
		if(mysqli_num_rows($runquery)>0){
			echo"";
		}
        else{
			$tt="insert into cart(cart_id,ip_add,qty) values('$product_id','$ip','1')";
			$runtt=mysqli_query($con,$tt);
		}	
}
function item(){
	if(isset($_GET['prod_id'])){
		global $con;
		$ip=getUserIpAddr();
		$tq="select * from cart where ip_add='$ip'";
		$runtq=mysqli_query($con,$tq);
		$count=mysqli_num_rows($runtq);
		
	}
	else{
		global $con;
		$ip=getUserIpAddr();
		$tq="select * from cart where ip_add='$ip'";
		$runtq=mysqli_query($con,$tq);
		$count=mysqli_num_rows($runtq);
	}
	echo $count;
}
function delete_cart(){
	global $con;
	if(isset($_GET['product_id'])){
		$cart_id=$_GET['product_id'];
	$query="delete from cart where cart_id='$cart_id'";
	$runquery=mysqli_query($con,$query);
	if($runquery){
		echo"<script>alert('product has been Deleted')</script>";
		echo"<script>window.open('cart.php','_self')</script>";
	}
	}
	}
function cartdisplay1(){
	global $con;
	$ip=getUserIpAddr();
	$query="select * from cart where ip_add='$ip'";
	$runquery=mysqli_query($con,$query);
	$nettotal=0;
if(isset($_POST['save'])){
		$quantity=$_POST['qty'];
		foreach($quantity as $key=>$value){
			$update="update cart set qty='$value' where cart_id='$key'";
			$run=mysqli_query($con,$update);
			if($run){
				echo"<script>window.open('cart.php','_self')</script>";
			}
		}
	}
	while($row=mysqli_fetch_array($runquery)){
	$prod_id=$row['cart_id'];
	$qty=$row['qty'];
	$tt="select * from products where product_id='$prod_id'";
	$at=mysqli_query($con,$tt);
	while($rowdata=mysqli_fetch_array($at)){
		$product_id=$rowdata['product_id'];
		$product_title=$rowdata['product_title'];
		$product_price=$rowdata['product_price'];
		$product_img=$rowdata['img1'];
		echo"<tr>
		<td><a href='Delete.php?product_id=$product_id'><img src='dustbin.png' style='width:50px;height:50px;'/></a></td>
		<td><img src='adminarea/productphotos/$product_img' style='width:120px; height:180px;'></td>
		<td>$product_title</td>
		<form action='cart.php' method='post' enctype='multipart/form-data'>
		<td><input type='text' name='qty[".$row['cart_id']."]' value='$qty' size='2' style='height:25px;border-radius:10%; '/><input type='submit' name='save'  value='save' class='btn btn-danger btn-md' style='height:30px;'/></td></from>
		<td>$$product_price</td>
		<td>";
		$subtotal=$product_price*$qty;
		echo "$".$subtotal;
		$nettotal=$nettotal+$subtotal;
		echo"</td>
		</tr>
		";
	}
	}
	echo"<tr>
	<td><button class='btn btn-default btn-lg' style='width:180px;'><a href='index.php'>Continue Shopping</a></button></td>
	<td><button class='btn btn-warning btn-lg' style='background-color:#67e814;width:150px;'><a href='CheckOut.php' style='color:white;'>CheckOut</a></button></td>
	<td style='float:right; position:relative;left:50px;top:15px;'>TOTAL:  $$nettotal</td>
	</tr>";
}
?>