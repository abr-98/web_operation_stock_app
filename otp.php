<?php 
require_once('includes/functions.php');
$load_time=time();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">


<style>
body{
    background-image:url("banner.jpg");
    opacity: 1;
}

#Forgot_password{
background-color: aliceblue;
background-attachment:fixed;
background-position:center;
margin-top:200px;
margin-bottom:150px;
margin-right:150px;
margin-left:400px;
width:400px;
 
}
#button{
border-radius:10px;
width:100px;
height:40px;
color:darkmagenta;
font-weight: bold;
background-color: steelblue;
font-weight:bold;
font-size:20px;
cursor: pointer;
    width: 100%;
    opacity: 1;
}

#button:hover {
    opacity:0.6;
}
</style>
<html>
<head>
<title>Forgot Password</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stock_web.css" rel="stylesheet" type="text/css">



<script type='text/javascript'>alert("OTP degenerates in 2 minute of sending please try resend OTP");</script>
</head>
<body>
<p style="color:white;font-size: 35px; display: inline; margin-left: 9px;">STOCK APP SOLUTIONS</p>
 <img src="stock_app.png" alt="logo" style="width:50px; height:50px;display: inline; float: left;">
<div id="Forgot_password">
<p style="align:center; margin-left: 40px" >OTP SENT TO THE REGISTERED EMAIL</p>      

<fieldset style="width:400px; align:center">
<form method="post" action="OTP-verification.php">
<table border="0">
        <tr>

                <td>User_name <span class="error">*</span>
                  <br></td><td> <input type="text" class="inputtext" name="usr_name" id="usr_name" required></td>
                </tr>
                
    <tr>

<td>OTP <span class="error">*</span>
  <br></td><td> <input type="text" class="inputtext" name="OTP" id="OTP" required></td>
<td><input type="hidden" value=<?php echo("$load_time")?> name="l_time" id="l_time" ></td>

<tr>
<td><input id="button" type="submit" name="Submit" value="Verify"></td>
</tr>
</form>
</table>
</fieldset>
<p style="align:center; margin-left: 40px; font-weight: bold" >OTP IS YOUR NEW PASSWORD.PLEASE PROCEED AND CHANGE IT FROM PANEL</p>

<p style="align:center; margin-left: 320px" ><a href= "send_otp.php">Resend OTP</a></p>
<p style="align:center; margin-left: 80px">"Time=3 min" </span></div>
</p>
</div>
</body>
</html>
<?php 
if(!$_POST['Submit'])
{
while(1)
{
    if(!$_POST['Submit'])
    {
        $load_time_2=time();
        if(load_time_2-load_time==120)
        {
            $message = "Your OTP has expired please request a resend to proceed";
        echo "<script type='text/javascript'>alert('$message')";
        }
    }
}
}
?>        
