<?php 
require_once('includes/dbconn.php');
require_once('includes/functions.php');
#require("/home/site/libs/PHPMailer-master/src/PHPMailer.php");
  #require("/home/site/libs/PHPMailer-master/src/SMTP.php");

//variable delaration
$ip=$_SERVER['REMOTE_ADDR'];
$usr_name=trim($_POST['usr_name']);
$passwd=md5(trim($_POST['passwd']));
$phn_no=trim($_POST['phn_no']);
$email=trim($_POST['email']);
$spam_check=trim($_POST['spam_check']);
$load_time=trim($_POST['l_time']);
$image=trim($_POST['admin-image']);
$load_time_2=time();

echo($image);
$l_time=(int)$load_time;
if($load_time_2-$l_time<=7)
{
  $message = "You are too fast to for a human.Please try again";
      echo "<script type='text/javascript'>alert('$message');window.location.href='admin-signup.html';</script>";
	  session_write_close();
  
  //header('location: admin_signup.html');
  exit();
}

  	$sql = "SELECT * FROM gr_admin WHERE admin_login='$usr_name'";
  	$results = mysqli_query($conn,$sql);
  	if (mysqli_num_rows($results) > 0) {
      $message = "User_name exists";
      echo "<script type='text/javascript'>alert('$message');window.location.href='admin-signup.html';</script>";
	  session_write_close();
  
  //header('location: admin_signup.html');
  exit();
  	
  }
if(!empty($spam_check)&& ($spam_check!=12))
  {
    $message = "Please enter the captcha correctly";
    echo "<script type='text/javascript'>alert('$message');window.location.href='admin-signup.html';</script>";
    session_write_close();
  }
//change password

  if($image =="camera" )
  {
    $output=shell_exec("python3 image_cap_func.py $usr_name ");
    
    $value="frame_".$usr_name.".jpg";
    
  
  }
  if($image=="file")
  {
    $output=shell_exec("python3 choose_picture.py $usr_name ");
    $value="frame_".$usr_name.".jpg"; 
  }
  if($image=="")
  {
    $value="image_icon.png";
  }
  
  
    if(!empty($passwd))
{
$sql = "INSERT INTO gr_admin (admin_login, admin_passwd,Phone_number,email,IP,usr_img) VALUES ('$usr_name','$passwd','$phn_no','$email','$ip','$value')";
$result = @mysqli_query($conn,$sql);

if(!$result)
{
  $message = "Registration failed";
  echo "<script type='text/javascript'>alert('$message');window.location.href='admin-signup.html';</script>";
  session_write_close();
 
  exit();
  }
 else{
  $message = "You are registered successfully.Please confirm your e-mail to continue within 24hrs to confirm your registration .Thank you";
  echo "<script type='text/javascript'>alert('$message');window.location.href='admin-signup.html';</script>";
    session_write_close();
   
  }
    $mail =new PHPMailer\PHPMailer\PHPMailer(true);

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
  "Email:$email n".
  "Phone-no:$phn_no n".
  "IP:$ip n".
  "<a href='http://localhost/stock_app_web/index.php'>Please click here to confirm your email</a> n".
  "Thank you";
  

  $mail->Setfrom("myac.abhijit@gmail.com","Abhijit Roy @ Stock_Apps") ;
  
  try{
  $mail->Send();
  echo "Success!";
  }catch(Exception $e){
    echo "Failed";
  }
  
  //header('location: index.php');
  
	session_write_close();
    //header('location:admin_signup.html');
  
}
?>