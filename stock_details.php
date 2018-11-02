<?php 
require_once('startup.php');
$Index=intval($_GET['mid']);
$rs = mysqli_query($conn,"select * from excel_project WHERE Index='$Index'");
if(mysqli_num_rows($rs)==0)
{
 header('location: manage-stock.php');
 exit();
 }
$row = mysqli_fetch_assoc($rs);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Stock Details</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stock_app.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="container">
 <div id="header"><?php include('includes/header.php');?></div>
 <div id="contentarea"> 
 <div id="leftcolumn"><?php include('includes/link.php');?></div>  
  <div id="contents">
<h1>Viewing / Deleting users Details</h1>
<div id="ctxmenu"><a href="manage-stock.php">STOCK DETAILS</a>	</div>
<br><br>
<table width="100%"  border="0" cellpadding="2" cellspacing="0" class="formtable">
  <tr>
    <th width="15%">Date_update</th>
    <td width="85%"><?php echo $row['Date_update'];?></td>
  </tr>
  <tr>
    <th width="15%">Scrip</th>
    <td width="85%"><?php echo $row['Scrip'];?></td>
  </tr>
  <tr>
    <th>sector</th>
    <td><?php echo $row['sector'];?></td>
  </tr>
  <tr>
    <th>ACTION </th>
    <td><?php echo $row['ACTION'];?></td>
  </tr>
  <tr>
    <th>Status </th>
	<td><?php echo $row['status'];?></td>
  </tr>
  <tr>
    <th>Entry Price</th>
    <td><?php echo $row['EntryPrice'];?></td>
  </tr>
  <tr>
    <th>Entry Date </th>
	<td><?php echo $row['EntryDate'];?></td>
  </tr>
  <tr>
    <th>Stop Loss </th>
	<td><?php echo $row['StopLoss'];?></td>
  </tr>
  <tr>
    <th>Exit Date </th>
	<td><?php echo $row['ExitDate'];?></td>
  </tr>
  <tr>
    <th>Last Traded Price </th>
	<td><?php echo $row['LTP'];?></td>
  </tr>
  <tr>
    <th>Last Trading Day</th>
	<td><?php echo $row['LastTradingDay'];?></td>
  </tr>
  <tr>
    <th>Profit </th>
	<td><?php echo $row['profit'];?></td>
  </tr>
  <tr><td colspan="2" align="left"> 
  
 </div>
	<div style="clear:both "></div>
  </div>
  <div id="footer"><?php include('includes/footer.php');?></div></div>*/
</body>
</html> 