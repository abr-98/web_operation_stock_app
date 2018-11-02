<?php
$dbconnected = false;

$link = @mysqli_connect('localhost','root','');
if(!$link) {
    die("Connection failed: " . mysqli_connect_error());
} else {
	$status = @mysqli_select_db('excel_project');
	$dbconnected = $status;
}
$conn = @mysqli_connect('localhost','root','','excel_project');
?>