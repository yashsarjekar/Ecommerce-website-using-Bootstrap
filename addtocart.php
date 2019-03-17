<?php 
require'dbconfig/config.php';
include("action/action.php");
if(isset($_GET['p_id'])){
	global $con;
	$ip=getUserIpAddr();
		$prod_id=$_GET['p_id'];
		$query12="select * from cart where cart_id='$prod_id' AND ip_add='$ip'";
		$runquery12=mysqli_query($con,$query12);
		if(mysqli_num_rows($runquery12)>0){
			echo"";
		}
        else{
			$tt="insert into cart(cart_id,ip_add,qty) values('$prod_id','$ip','1')";
			$runtt=mysqli_query($con,$tt);
			if($runtt){
				echo'<script>alert("Product added to cart")</script>';
				echo"<script>window.open('index.php','_self')</script>";
			}
		}	
}

?>