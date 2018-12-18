<?php 
require_once('includes/dbconn.php');
require_once('includes/functions.php');

//variable delaration
$ip=$_SERVER['REMOTE_ADDR'];
$usr_name=$_POST['usr_name'];
$phn_no=trim($_POST['phn_no']);
$email=trim($_POST['email']);


//acess data from table
$rs = mysqli_query($conn, "select * from gr_admin where admin_login='$usr_name'");
$row = mysqli_fetch_assoc($rs);

//check for error conditions

if(!empty($phn_no) && ($phn_no != $row['Phone_number']))
{
	$message = "phone_number does not match";
    echo "<script type='text/javascript'>alert('$message');window.location.href='forgot-password.html';</script>";
	
	  session_write_close();
	  
  
  exit();
  
}
if(!empty($email) && ($email!=$row['email']))

	{
	$message = "email does not match";
    echo "<script type='text/javascript'>alert('$message');window.location.href='forgot-password.html';</script>";
	
	  session_write_close();
	  
  
  exit();
	}
if($ip!=$row['IP'])
{
	$message = "IPs does not match.Try accessing from the registered IP";
    echo "<script type='text/javascript'>alert('$message');window.location.href='forgot-password.html';</script>";
	
	  session_write_close();
	  
  
  exit();
}
$rs = mysqli_query($conn, "select email from gr_admin where admin_login='$usr_name'");

$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
$string_shuffled = str_shuffle($string);
$password = substr($string_shuffled, 1, 7);

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

// Send mail using Gmail
if($send_using_gmail){
    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->SMTPAuth = true; // enable SMTP authentication
    $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com"; // sets GMAIL as the SMTP server
    $mail->Port = 465; // set the SMTP port for the GMAIL server
    $mail->Username = "myac.abhijit@gmail.com"; // GMAIL username
    $mail->Password = "Abhijit@2"; // GMAIL password
}
$mail->AddAdress($email,$usr_name);
$mail->Subject ="OTP FOR STOCK_APP";
$mail->Body = "Welcome to the world of stock marketing redisgned width Stock App n".
  "User-name:$usr_name n".
  "YOUR OTP is :$password n".
  "Thank you";
  

  $mail->Setfrom("myac.abhijit@gmail.com","Abhijit Roy @ Stock_Apps") ;
  
  try{
  $mail->Send();
  echo "Success!";
  }catch(Exception $e){
    echo "Fail";
  }
  //header('location: index.php');
  
	//session_write_close();
$password_set=md5($password);
$rs = mysqli_query($conn, "Update gr_admin set admin_passwd ='$password_set'where admin_login='$usr_name'");
  header('location: otp.php');
  
?>