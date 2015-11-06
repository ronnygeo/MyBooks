<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editing Book</title>
<?php 
header('refresh: 3;bookman.php');
require("functions.php");
pageheader();
?>



</head>

<body>

<div class="wrapper col1">
<div id="header">

<?php siteName();?>
   
<?php showMenu(0); ?>

</div>
 <br class="clear" />
  <br class="clear" />
</div>



<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; margin:auto; opacity:.8; padding:20px;">

<p>We are processing your request.. </p>

<p> Please Wait.. </p>


<?php
$sql_conn=createSQL();
$qry="UPDATE books SET name='".$_POST['bname']."',author='".$_POST['author']."',category='".$_POST['category']."',publisher='".$_POST['publisher']."',description='".$_POST['description']."',stock='".$_POST['stock']."',uprice='".$_POST['price']."' WHERE bookid='".$_POST['bookid']."'";

if (!mysql_query($qry,$sql_conn))
{ 
	die ('Error: '.mysql_error());
	}
	
echo "Book Updated Successfully...  <br /><p> You will be forwarded to the Book Manager shortly.. <br />";



mysql_close($sql_conn);

?>

</div>
</div>
<?php showfooter();?>

</body>
</html>