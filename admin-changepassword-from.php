<?php 
require_once('startup.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>change password</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stock_web.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">
  <div id="header"><?php include('includes/header.php');?></div>
  <div id="contentarea"> 
    <div id="leftcolumn"><?php include('includes/link.php');?></div>  
    <div id="contents">
      <h1>Change Password </h1>
       <p>&nbsp;</p>
       <?php  getErrMsg('error'); ?> 
       <form name="form1" method="post" action="admin-changepassword-change-exec.php">
         <table width="100%"  border="0" cellpadding="2" cellspacing="0" class="formtable">
           
           <tr>
             <th class="grid">Old Password<span class="error">*</span></td>
             <td width="81%" height="26">               <input name="oldpasswd" type="password" class="inputtext" id="oldpasswd" size="27"></td>
           </tr>
           <tr>
             <th class="grid">Password <span class="error">*</span></td>
             <td height="26"><input name="passwd" type="password" class="inputtext" id="passwd" size="27"></td>
           </tr>
           <tr>
             <th class="grid">Confirm Password <span class="error">*</span> </td>
             <td height="27"><input name="confirmpasswd" type="password" class="inputtext" id="confirmpasswd" size="27"></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td><span class="error">*</span> <span class="style3">Fields required to be filled</span></td>
           </tr>
           <tr>
             <td>&nbsp;</td>
             <td>
               <div align="left">
                 <input name="Submit" type="submit" class="inputtext" value="Submit">
               </div></td>
           </tr>
         </table>
       </form>
          </div>
	<div style="clear:both "></div>
  </div>
  <div id="footer"><?php include('includes/footer.php');?></div>
</div>
</body>
</html>
