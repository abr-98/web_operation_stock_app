<?php
session_start();
include('includes/functions.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Login</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stock_web.css" rel="stylesheet" type="text/css">
</head>
<body>
<p align="center">&nbsp;</p>
<h1 align="center" class="style1">Administrator Panel</h1>
<p align="center" class="style1">&nbsp;</p>
<p align="center" class="style1"><strong>Login Form </strong></p>
<?php getErrMsg('error'); ?>
<form name="form1" method="post" action="login-exec.php">
  <table width="32%"  border="0" align="center" cellpadding="2" cellspacing="0" class="formtable">
    <tr>
      <th width="31%">User ID</th>
      <td width="69%"><input name="login" type="text" class="inputtext" id="login2"></td>
    </tr>
    <tr>
      <th>Password</th>
      <td><input name="passwd" type="password" class="inputtext" id="passwd2"></td>
    </tr>
    <tr>
      <th>(Spam Check) 4x5=</th>
      <td><input name="spam_check" type="number" class="inputtext" id="spam_check"></td>
    </tr>
    <tr>
      <th>&nbsp;</th>
      <td><input name="Submit" type="submit" class="inputtext" value="Submit"></td>
    </tr>
  </table>
</form>
<p align="center" class="style1">&nbsp;</p>
<p align="center"><a href="http://localhost/stock_app_web/admin-signup.html">New?Sign up?</a></p>
<p align="center"><a href="http://localhost/stock_app_web/forgot-password.html">Forgot Password?</a></p>
</body>
</html>
