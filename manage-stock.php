<?php 
require_once('startup.php');
require_once('includes/functions.php');
require_once('includes/ps_pagination.php');
$sql = 'SELECT * from STOCK_DETAILSS';
$pager = new PS_Pagination($conn, $sql, 15);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Manage Stock</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="stock_web.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="container">
 <div id="header"><?php include('includes/header.php');?></div>
 <div id="contentarea"> 
 <div id="leftcolumn"><?php include('includes/link.php');?></div>  
  <div id="contents">
<h1 style="margin-top:15px;margin-bottom:10px">MANAGE STOCK</h1>
<tr>
<form method="post" action="search_exec.php">
<p style="display:inline;margin-left:180px">Search Field</p><td> <input style="display:inline" type="text" class="inputtext" name="search_field" id="search_field" ></td>
<p style="display:inline"> for </p><td> <input style="display:inline" type="text" class="inputtext" name="search_condn" id="search_condn" ></td>
<td><input style="display:inline"id="button" type="submit" name="Submit" value="search"></td>
</form>
<form method="post" action="sort_exec.php">
<p style="display:inline;margin-left:225px">Sort Field</p><td> <input style="display:inline" type="text" class="inputtext" name="sort_field" id="sort_field" ></td>
<p style="display:inline">By <select name="formsort">
  <option value="">Select</option>
  <option value="ASC">Asec</option>
  <option value="DESC">Desc</option>
</select>
</p>
<td><input style="display:inline"id="button" type="submit" name="Submit" value="Sort"></td>
</form>
</tr>
    <table style="margin:top:15px" width="100%"  border="0" cellpadding="4" cellspacing="0" class="formtable">
      <tr class="grid">
        <th width="8%">Scrip</th>
		<th width="12%">Date_update</th>
         <th width="8%">sector</th>
         <th width="10%">ACTION</th>
		 <th width="10%">Status</th>
		 <th width="12%">EntryPrice</th>
		 <th width="12%">EntryDate</th>

         <th width="10%">StopLoss</th>
         <th width="10%">ExitPrice</th>
         <th width="12%">ExitDate</th>
         <th width="11%">LTP</th>
         <th width="11%">LastTradingDay</th>
         <th width="11">Profit</th>
        </tr>
	  <?php 
			  $rs = $pager->paginate();
			  while($row =mysqli_fetch_assoc($rs)) {?>
        <td><a href="stock_details.php?mid=<?php echo $row['Scrip'];?>" title="Click to View"><?php echo $row['Scrip'];?></a></td>
        <td><a href="stock_details_date.php?mid_2=<?php echo $row['Date_update'];?>" title="Click to View"><?php echo $row['Date_update'];?></td> 
				<td><?php echo $row['sector'];?></td> 
                	<td><?php echo $row['ACTION'];?></td>
				<td><?php echo $row['status'];?></td>
				<td><?php echo $row['EntryPrice'];?></td>
				<td><?php echo $row['EntryDate'];?></td>
                <td><?php echo $row['StopLoss'];?></td>
                <td><?php echo $row['ExitDate'];?></td>
                <td><?php echo $row['ExitPrice'];?></td>
                <td><?php echo $row['LTP'];?></td>
                <td><?php echo $row['LastTradingDay'];?></td>
                <td><?php echo $row['Profit'];?></td>
        </tr>
	  <?php }?>
    </table>
    <div align="center"><br>
        <br>
	    <?php
	echo $pager->renderFirst()."&nbsp;";
	echo $pager->renderNav()."&nbsp;";
	echo $pager->renderLast()."&nbsp;";
	?>
    </div>
  </div>
	<div style="clear:both "></div>
  </div>
  <div id="footer"><?php include('includes/footer.php');?></div></div>
</body>
</html> 