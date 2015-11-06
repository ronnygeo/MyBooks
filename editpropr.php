<?php
header('refresh: 3;usercp.php');
session_start();
require("functions.php");
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editing Profile</title>
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
if(isset($_SESSION['uid'])){
$sql_conn=createSQL();
$qry="UPDATE users SET fullname='".$_POST['fname']."',email='".$_POST['email']."',dob='".$_POST['dob']."',address='".$_POST['address']."',country='".$_POST['country']."',tel='".$_POST['tel']."' WHERE userid='".$_SESSION['uid']."'";

if (!mysql_query($qry,$sql_conn))
{ 
	die ('Error: '.mysql_error());
	}
	
echo "User edited successfully...  <br /><p> You will be forwarded to the Book Manager shortly.. <br />";



mysql_close($sql_conn);
}
else
{
	echo "Please no hacking.. THANK YOU.";
	}

?>

</div>
</div>
<?php showfooter();?>

</body>
</html>