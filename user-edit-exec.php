<?php 
require_once('startup.php');
require_once('includes/dbconn.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Updated User Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stock_web.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="container">
 <div id="header"><?php include('includes/header.php');?></div>
 <div id="contentarea"> 
 <div id="leftcolumn"><?php include('includes/link.php');?></div>  
  <div id="contents">
<h1>Updated User Details</h1>
<div id="ctxmenu"><a href="admin-index.php">User Account</a>	</div>
<br><br>

<?php
$id=$_POST['adminid'];
$email = $_POST['email'];
$phn_no = $_POST['phone'];
$image= $_POST['admin-image'];
#echo ($image);
if($image =="camera" )
  {
    $output=shell_exec("python3 image_cap_func.py $id ");
    
    $value="frame_".$id.".jpg";
    
  
  }
  if($image=="file")
  {
    $output=shell_exec("python3 choose_picture.py $id ");
    $value="frame_".$id.".jpg"; 
  }

$sql = "UPDATE gr_admin SET email='$email', Phone_number='$phn_no', usr_img='$value'  WHERE admin_login='$id'";

//mysql_select_db('grafix_clients');
$retval = mysqli_query($conn,$sql);
if(! $retval )
{
  die('Could not edit data: ' . mysqli_error());
}
$message ="successfully updated";
    echo "<script type='text/javascript'>alert('$message');</script>";
    #exit();
    #window.location.href='admin-index.php';
    
    ?>
</div>
	<div style="clear:both "></div>
  </div>
  <div id="footer"><?php include('includes/footer.php');?></div></div>
</body>
</html> 