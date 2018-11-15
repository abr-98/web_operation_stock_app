<?php 
require_once('includes/dbconn.php');
require_once('includes/functions.php');

//variable delaration
$usr_name=$_POST['usr_name'];
$phn_no=trim($_POST['phn_no']);
$email=trim($_POST['email']);
header('location: send_otp.php');

//acess data from table
$rs = mysqli_query($conn, "select * from gr_admin where admin_login='$usr_name'");
$row = mysqli_fetch_assoc($rs);

//check for error conditions

if(!empty($phn_no) && ($phn_no != $row['Phone_number']))
{
	$message = "phone_number does not match";
    echo "<script type='text/javascript'>alert('$message');window.location.href='forgot_password.html';</script>";
	
	  session_write_close();
	  
  
  exit();
  
}
if(!empty($email) && ($email!=$row['email']))

	{
	$message = "email does not match";
    echo "<script type='text/javascript'>alert('$message');window.location.href='forgot_password.html';</script>";
	
	  session_write_close();
	  
  
  exit();
	}

  header('location: otp.html');
  
?>