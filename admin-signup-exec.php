<?php 
require_once('includes/dbconn.php');
require_once('includes/functions.php');


//variable delaration

$usr_name=trim($_POST['usr_name']);
$passwd=md5(trim($_POST['passwd']));

  	$sql = "SELECT * FROM gr_admin WHERE admin_login='$usr_name'";
  	$results = mysqli_query($conn,$sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "user_name exists";	
	  session_write_close();
  
  //header('location: admin_signup.html');
  exit();
  	
  }

//change password
if(!empty($passwd))
{
$sql = "INSERT INTO gr_admin (admin_login, admin_passwd) VALUES ('$usr_name','$passwd')";
$result = @mysqli_query($conn,$sql);

if(!$result)
{
  echo('Failed to insert record in database. Please try again.');
  session_write_close();
  //header('location: admin_signup.html');
  exit();
  }
  
    echo('records inserted now please log in <a href="index.php">log in</a>');
	
	session_write_close();
    //header('location:admin_signup.html');
  
}
?>