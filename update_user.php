<?php 
require_once('startup.php');
$id=$_SESSION['ADMIN_LOGIN'];
#echo($id);
$rs = mysqli_query($conn,"select * from gr_admin WHERE admin_login='$id'");
if(mysqli_num_rows($rs)==0)
{
    $message ="no records found";
    echo "<script type='text/javascript'>alert('$message');window.location.href='admin-index.php';</script>";
    exit();
}

$row = mysqli_fetch_assoc($rs);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Editing Quote Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stock_web.css" rel="stylesheet" type="text/css">

</head>

<body>
    <script type="text/javascript">
    function setValue(field)
    {
    if(''!=field.defaultValue)
    {
    if(field.value==field.defaultValue)
    {
    field.value='';
    }
    else if(''==field.value)
    {
    field.value=field.defaultValue;
    }
    }
    }
    </script>
 
<div id="container">
 <div id="header"><?php include('includes/header.php');?></div>
 <div id="contentarea"> 
 <div id="leftcolumn"><?php include('includes/link.php');?></div>  
  <div id="contents">
<h1>Updating User Details</h1>
<div id="ctxmenu"><a href="admin-index.php">User account</a>	</div>
<br><br>

<form method="post" action="user-edit-exec.php">
<input name="adminid" type="hidden" value="<?php echo ($admin_id); ?>">
<table width="100%"  border="0" cellpadding="2" cellspacing="0" class="formtable">
  
  <tr>
    <th>Email Id </th>
    <td><input type="text" name="email" value="<?php echo $row['email'];?>" onfocus="setValue(this)" onblur="setValue(this)"></td>
  </tr>
  <tr>
    <th>Phone Number </th>
    <td><input type="number" name="phone" value="<?php echo $row['Phone_number'];?>" onfocus="setValue(this)" onblur="setValue(this)"></td>
  </tr>
  <tr>
      <th>Change Image</th>
    <td>
      <select name="admin-image" >
        <option value="">Select</option>
        <optgroup label="Upload image">
        <option value="camera">Capture Image</option>
        <option value="file">Upload From Files</option>
    </optgroup>
        
    </select>
</td>
</tr>
  <tr><th></th>
  <th align="center">  

<input name="save" type="submit" id="save" value="Save">
</form>
 
  </th>
  </tr>
  
  
  
  
  
  
</table>
 </div>
	<div style="clear:both "></div>
  </div>
  <div id="footer"><?php include('includes/footer.php');?></div></div>
</body>
</html> 