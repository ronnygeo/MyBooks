<?php session_start();
require("functions.php");
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Purchases</title>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />

</head>

<body>
<div class="wrapper col1">
<div id="header">
<?php
siteName();
showMenu(6);
?>


</div>
 <br class="clear" />
  <br class="clear" />
</div>



<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">


<?php 

echo "<h3>PURCHASE HISTORY</h3>";

$sql_co=createSQL();
$qry="SELECT date,time,bookname, author, quantity,uprice FROM sales WHERE userid='".$_SESSION['uid']."' ORDER BY date ASC";

$sqldata=mysql_query($qry,$sql_co);

?>

<table>
<tr><th>Date Purchased</th><th>Name</th><th>Author</th><th>Quantity</th><th>Unit Price</th></tr>

<?php 
while ($sale=mysql_fetch_array($sqldata)){
echo "<tr><td>".$sale['date']." ".$sale['time']."</td><td>".$sale['bookname']."</td><td>".$sale['author']."</td><td>".$sale['quantity']."</td><td>".$sale['uprice']."</td></tr>";
}
mysql_close($sql_co);
 
?>
<tfoot></tfoot>
</table>

</div>

</div>
<?php showFooter(); ?>
</body>
</html>