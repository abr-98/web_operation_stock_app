<?php
session_start();
require_once('includes/dbconn.php');
require_once('includes/functions.php');

$id = trim($_POST['login']);
$passwd = md5(trim($_POST['passwd']));


if(empty($id)) setErrMsg('Login ID missing');
if(empty($passwd)) setErrMsg('Password Missing');

if(getErrCount() > 0) {
	session_write_close();
	header('location: index.php');
	exit();
}
$selection = "SELECT * FROM gr_admin where admin_login='$id' and admin_passwd='$passwd'";
$rs = mysqli_query($conn, "SELECT * FROM gr_admin where admin_login='$id' and admin_passwd='$passwd'");
if(!$rs || mysqli_num_rows($rs) == 0) {
	setErrMsg('Login Failed');
	session_write_close();
	header('location: index.php');
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