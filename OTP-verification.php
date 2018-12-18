<?php 
require_once('includes/dbconn.php');
require_once('includes/functions.php');
$usr_name=$_POST['usr_name'];
$OTP=$_POST['OTP'];
$load_time=$_POST['l_time'];
$load_time_2=time();

if(load_time_2-load_time>=120)
{
    $message = "Your OTP is outdated.Please try again";
    echo "<script type='text/javascript'>alert('$message');window.location.href='forgot-password.html';</script>";
	
	  session_write_close();
      exit();
}
$rs = mysqli_query($conn, "select * from gr_admin where admin_login='$usr_name' and admin_passwd='$OTP'");
if(!$rs || mysqli_num_rows($rs) == 0) {
	setErrMsg('Login Failed.Please check your OTP and user name');
	session_write_close();
    exit();
}

$row = mysqli_fetch_assoc($rs);
session_regenerate_id();
$_SESSION['LOGIN_STATUS'] = 1;
$_SESSION['ADMIN_LOGIN'] = $row['admin_login'];
$_SESSION['ADMIN_ID'] = $row['admin_id'];
session_write_close();
header('location: admin-index.php');
?>



