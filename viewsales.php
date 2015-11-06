<?php session_start();
require("functions.php");
pageheader();
restricted();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Sales</title>
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

echo "<h3>SALES HISTORY</h3>";

$sql_co=createSQL();
$qry="SELECT date,time,bookname, author, username, quantity,uprice FROM sales ORDER BY date ASC";

$sqldata=mysql_query($qry,$sql_co);

?>

<table>
<tr><th>Date Purchased</th><th>Name</th><th>Author</th><th>User</th><th>Quantity</th><th>Unit Price</th></tr>

<?php 
while ($sale=mysql_fetch_array($sqldata)){
echo "<tr><td>".$sale['date']." ".$sale['time']."</td><td>".$sale['bookname']."</td><td>".$sale['author']."</td><td>".$sale['username']."</td><td>".$sale['quantity']."</td><td>".$sale['uprice']."</td></tr>";
}
mysql_close($sql_co);
 
?>
<tfoot></tfoot>
</table>

<BR class="clear" />
<BR class="clear" />

<h3>Top Customers</h3>

<table>
<tr><th>Username</th><th>Amount</th></tr>
<?php 
$sco=createSQL();
$qry="SELECT DISTINCT username,sum(uprice) FROM sales GROUP BY username ORDER BY sum(uprice) DESC LIMIT 0,10";
$sqd=mysql_query($qry,$sco);
while($tc=mysql_fetch_array($sqd))
{
echo "<tr><td>".$tc[0]."</td><td>".$tc[1]."</td></tr>";
}
?>
</table>
<BR class="clear" />



<h3>Email List</h3>

<?php
echo "<form action='mail.php' method='post'>
<h4>Send this list as an email..</h4>
Email: <input type='text' id='email' name='email' />&nbsp;
<input type='submit' name='send' id='send' value='Send!' />
</form>";
?>

</div>

</div>
<?php showFooter(); ?>
</body>
</html>