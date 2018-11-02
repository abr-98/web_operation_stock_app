<?php
require_once('includes/auth.php');
require_once('includes/functions.php');
unset($_SESSION['LOGIN_STATUS']);
unset($_SESSION['ADMIN_LOGIN']);
unset($_SESSION['ADMIN_ID']);
setErrMsg('You have been logged out');
session_write_close();
header('location: index.php');
exit();
?>