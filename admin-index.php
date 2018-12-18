<?php 
require_once('startup.php');
require_once('includes/dbconn.php');
$user=$_SESSION['ADMIN_LOGIN'];
$rs = mysqli_query($conn,"select usr_img from gr_admin WHERE admin_login='$user'");
#echo($user);
$row =mysqli_fetch_row($rs);
$res=$row[0];
#echo ($res);
$img="client_images/".$res;
#echo($img);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Administrator Panel Template</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stock_web.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="container">
 <div id="header"><?php include('includes/header.php');?></div>
 <div id="contentarea"> 
 <div id="leftcolumn"><?php include('includes/link.php');?></div>  
  <div id="contents">
  <p><a href="update_user.php" style="display:inline;margin-right:30px;float:right;font-size:13px">Update Account Details</a></p>
  <img src=<?php echo($img);?> style="height:30px;width:30px;display:inline;margin-right:10px;float:right">
  
  <h1 style="display:inline;margin-top:-8px"> Welcome:- <?php echo $_SESSION['ADMIN_LOGIN'];?></h1>

            
    </div>
	<div style="clear:both "></div>
  </div>
  <div id="footer"><?php include('includes/footer.php');?></div></div>
</body>
</html>
