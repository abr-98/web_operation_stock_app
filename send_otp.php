<?php 
require_once('includes/dbconn.php');
require_once('includes/functions.php');
$usr_name=$_POST['usr_name'];
$rs = mysqli_query($conn, "select Phone_number from gr_admin where admin_login='$usr_name'");

$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$string_shuffled = str_shuffle($string);
$password = substr($string_shuffled, 1, 7);

file_get_contents("http://login.smsgatewayhub.com/smsapi/pushsms.aspx?user=$usr_name&pwd=$password&to=$rs&sid=stock_app&msg=test%20message&fl=0");

$password_set=md5($password);
$rs = mysqli_query($conn, "Update gr_admin set admin_passwd ='$password_set'where admin_login='$usr_name'");
?>