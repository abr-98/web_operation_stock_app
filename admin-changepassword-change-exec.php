<?php 
require_once('startup.php');

//variable delaration
$id=$_SESSION['ADMIN_ID'];
$oldpasswd=trim($_POST['oldpasswd']);
$passwd=trim($_POST['passwd']);
$confirmpasswd=trim($_POST['confirmpasswd']);

//acess data from table
$rs = mysqli_query($conn, "select * from gr_admin where admin_id='$id'");
$row = mysqli_fetch_assoc($rs);

//check for error conditions
if(empty($oldpasswd) ||empty($passwd) ||empty($confirmpasswd))setErrMsg('* filds are blank');
if(!empty($oldpasswd) && (md5($oldpasswd) != $row['admin_passwd']))setErrMsg('old password doesnot match with database');
if(!empty($confirmpasswd) && $confirmpasswd != $passwd) setErrMsg('password does not match with each other');

//print error
if (getErrCount() > 0)
{
   session_write_close();
   //$xxx=(md5($oldpasswd));
   //echo ("Database Password $row[admin_passwd]<br>");
   //echo $xxx;
  header('location: admin-changepassword-from.php');
  exit();
}

//change password
if(!empty($passwd))
{
$sql = "UPDATE gr_admin SET admin_passwd='".md5($passwd)."' WHERE admin_id='$id'";
$result = @mysqli_query($conn,$sql);

if(!$result)
{
  setErrMsg('Failed to update record in database. Please try again.');
  session_write_close();
  header('location: admin-changepassword-from.php');
  exit();
  }
  
    setErrMsg('Password changed');
	session_write_close();
    header('location:admin-passwordchange-from.php');
  
}
?>