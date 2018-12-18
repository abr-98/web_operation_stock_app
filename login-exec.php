<?php
session_start();
require_once('includes/dbconn.php');
require_once('includes/functions.php');
$ip=$_SERVER['REMOTE_ADDR'];
$id = trim($_POST['login']);
$passwd = md5(trim($_POST['passwd']));
$spam_check=trim($_POST['spam_check']);


if(empty($id)) setErrMsg('Login ID missing');
if(empty($passwd)) setErrMsg('Password Missing');
if(empty($spam_check))setErrMsg('Please go through Spam Check');
if(getErrCount() > 0) {
	session_write_close();
	header('location: index.php');
	exit();
}
$selection = "SELECT * FROM gr_admin where admin_login='$id' and admin_passwd='$passwd'";
$rs = mysqli_query($conn, "SELECT * FROM gr_admin where admin_login='$id' and admin_passwd='$passwd' and IP='$ip'");
if(!$rs || mysqli_num_rows($rs) == 0) {
	setErrMsg('Login Failed.Please make sure you access from same IP');
	session_write_close();
	header('location: index.php');
	exit();
}
if($spam_check!=20)
{
	setErrMsg('Login Failed.Please make sure you fill the captcha correctly');
	session_write_close();
	header('location: index.php');
}
$row = mysqli_fetch_assoc($rs);
session_regenerate_id();
$_SESSION['LOGIN_STATUS'] = 1;
$_SESSION['ADMIN_LOGIN'] = $row['admin_login'];
$_SESSION['ADMIN_ID'] = $row['admin_id'];
session_write_close();
header('location: admin-index.php');
?>