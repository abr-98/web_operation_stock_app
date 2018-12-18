<?php 
require_once('includes/dbconn.php');
require_once('includes/functions.php');
$usr_name=$_POST['usr_name'];
$rs = mysqli_query($conn, "select email from gr_admin where admin_login='$usr_name'");

$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$string_shuffled = str_shuffle($string);
$password = substr($string_shuffled, 1, 7);

$subject ="OTP FOR STOCK_APP";
  $txt = "Welcome to the world of stock marketing redisgned width Stock App n".
  "User-name:$usr_name n".
  "YOUR OTP is :$password n".
  "Thank you";
  $txt = wordwrap($txt, 70, "\r\n");

  $headers = "From: myac.abhijit@gmail.com" ;
  
  mail($email,$subject,$txt,$headers);
  //header('location: index.php');
  
	//session_write_close();
$password_set=md5($password);
$rs = mysqli_query($conn, "Update gr_admin set admin_passwd ='$password_set'where admin_login='$usr_name'");
header('location:otp.html');

?>