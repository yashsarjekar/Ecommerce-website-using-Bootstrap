<?php
require'dbconfig/config.php';
include("action/action.php");
if(isset($_GET['forget_pass'])){
echo"<div align='center' style='position:relative;top:250px;'>
<b style='color:#E0E4CC;'>Enter your Email,will send you your password on your Email</b></br>
<form action='' method='post'>
<input type='text' name='c_email' placeholder='Enter your email' required/>
<input type='submit' name='send' value='Send'/>
</form>
</div>
";	
if(isset($_POST['send'])){
	$c_email=$_POST['c_email'];
	$qr="select * from customer where Email='$c_email'";
	$runquery1=mysqli_query($con,$qr);
	$c_em=mysqli_num_rows($runquery1);
	$row=mysqli_fetch_array($runquery1);
	$email=$row['Email'];
	$c_name=$row['customer_name'];
	$c_password=$row['password'];
if($c_em==0){
	echo'<script>alert("Email does not found in database")</script>';
	exit();
}else{
echo'<script>alert("Email has found")</script>';   
   require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 0;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'yashsarjekar007@gmail.com';                 // SMTP username
$mail->Password = 'yash@123456';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('yashsarjekar007@gmail.com', 'Support');
$mail->addAddress($c_email);     // Add a recipient
               // Name is optional
$mail->addReplyTo('yashsarjekar007@gmail.com', 'Information');

   // Optional name
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = 'SUPPORT';
$mail->Body= '<b>Hello Sir your request for password </b></br>'
.'Password: '.$c_password.'</br>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
} else {
    echo '<script>alert("Sir your Password has been send to your Email please check your Email")</script>';
}   
}	
}
}
?>