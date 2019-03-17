<?php
require 'dbconfig/config.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Insert Product</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body style="height:1000px;" background="city.jpg">

<form method="post" action="insertproduct.php" enctype="multipart/form-data">
<table border="2"align="center" style="background-color:#3E4651;color:white;position:relative;width:800px;">
<tr>
<td><center><h2>Insert Product</h2></center></td>
</tr>
<tr>
<td>Product Title </td>
<td><input type="text" name="product_title"/></td>
</tr>
<tr>
<td>Product Categories </td>
<td><select name="cat_idc">
<option>Select Categories</option>
<?php
$check="select * from categories";
$run=mysqli_query($con,$check);
while($rowcat=mysqli_fetch_array($run)){
$catid=$rowcat['cat_id'];
$cat_title=$rowcat['cat_title'];
echo "<option value='$catid'>$cat_title</option>";
}
 ?>
</select>
</td>
</tr>
<tr>
<td>Product Brand </td>
<td><select name="brand_id">
<option>Select Brands</option>
<?php
$check="select * from brand";
	$run=mysqli_query($con,$check);
	while($rowbrand=mysqli_fetch_array($run)){
		$brand_id=$rowbrand['brand_id'];
		$brand_title=$rowbrand['brand_title'];
	echo "<option value='$brand_id'>$brand_title</option>";
	}
	?>
</select></td>
</tr>
<tr>
<td>Product image1 </td>
<td><input type="file" name="img1"/></td>
</tr>
<tr>
<td>Product image2 </td>
<td><input type="file" name="img2"/></td>
</tr>
<tr>
<td>Product price</td>
<td><input type="text" name="product_price"/></td>
</tr>
<tr>
<td>Product description </td>
<td><textarea name="description" cols="35" rows="10"></textarea></td>
</tr>
<tr>
<td>Product Keyword </td>
<td><input type="text" name="keyword"/></td>
</tr>
<tr>
<td colspan="4"><center><input name="insert_btn" type="submit" value="Insert" style="background-color:#FFC153;width:150px;height:40px;color:white;"/></center> </td>
</tr>
</table border="2">
</form>
</body>
</html>
<?php 
if(isset($_POST['insert_btn'])){
	$product_title=$_POST['product_title'];
	$cat_idc=$_POST['cat_idc'];
	$brand_id=$_POST['brand_id'];
	$product_price=$_POST['product_price'];
	$description=$_POST['description'];
	$keyword=$_POST['keyword'];
	$status='on';
	//image//
	$product_img1=$_FILES['img1']['name'];
	$product_img2=$_FILES['img2']['name'];
	//temp name of images//
    $tempname1=$_FILES['img1']['tmp_name'];
    $tempname2=$_FILES['img2']['tmp_name'];
//file path//
$filepath="productphotos/$product_img1";
$filepath1="productphotos/$product_img2";	
		move_uploaded_file($tempname1,$filepath);
		move_uploaded_file($tempname2,$filepath1);
		$yash="insert into products(cat_id,brand_id,date,product_title,img1,img2,product_price,description,status,keyword) values('$cat_idc','$brand_id',NoW(),'$product_title','$product_img1','$product_img2','$product_price','$description','$status','$keyword')";
		$runyash=mysqli_query($con,$yash);
		if($runyash){
			echo'<script>alert("Product has been inserted successfully")</script>';
		}
	
	
}


?>