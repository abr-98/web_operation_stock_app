<?php
session_start();
require_once('functions.php');
if(!isset($_SESSION['LOGIN_STATUS']) || $_SESSION['LOGIN_STATUS'] != 1) {
  	setErrMsg('Please login to access this area.');
	session_write_close();
	header('location: index.php');
	exit();
}
?>