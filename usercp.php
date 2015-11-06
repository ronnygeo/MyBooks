<?php session_start();
require("functions.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$sqlc=createSQL();
$qry="SELECT DISTINCT name FROM books";
$sqldata=mysql_query($qry,$sqlc);
$i=0;
while($offers=mysql_fetch_array($sqldata))
{$offerarr[$i]=$offers['name'];
    $i++;
}
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Control Panel</title>
<link href="styles/layout.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
function sure(){
var r=confirm("Sure? You want to clear all from cart?");
if (r==true)
return true;
else
return false;
}
</script>
</head>

<body>
<div class="wrapper col1">
<div id="header">
<?php siteName();
showMenu(6);
?>
        
			

</div>
 <br class="clear" />
  <br class="clear" />
</div>

<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">
<br class='clear' />
<h3 style="text-align:center">Welcome to User Control Panel </h3>

<?php 
if (isset($_SESSION['uname']))
{
	if(isset($_SESSION['pstat'])){
		print '<script type="text/javascript">'; 
		print 'alert("The password has been changed successfully..")'; 
		print '</script>';
		unset($_SESSION['pstat']);
		}
	echo "<div class='right' style='padding:10px;'>Logged in as ".ucfirst($_SESSION['fname']);
	logoutbutton();
	echo "</div> <br />"; 
	
	echo "<br class='clear' /><br class='clear' /><div style='text-align:center'><p style='font-size:large;color:#000; background-color:#FFF'>Choose one option: </p>";

	echo "<table border='0'><tr><td><br /><a href='editprofile.php' style='font-size:24px;color:#00C; background-color:#FFF;text-decoration:none;'><img src='images/editprofile.png' alt='Edit Profile' /><br />Edit Profile</a><br /></td>";
	echo "<td><br /><a href='chgpwd.php' style='font-size:24px;color:#00C; background-color:#FFF;text-decoration:none;'><img src='images/chpass.png' alt='Change Password' /><br />Change Password</a><br /></td>";
		echo "<td><br /><a href='viewhistory.php' style='font-size:24px;color:#00C; background-color:#FFF;text-decoration:none;'><img src='images/viewsales.png' alt='View Past Purchases' /><br />View Past Purchases</a><br /></td>";
	echo "<td><br /><a href='clrcart.php' style='font-size:24px;color:#00C; background-color:#FFF;text-decoration:none;' onclick='return sure();''><img src='images/clearcart.png' alt='Clear Cart' /><br />Clear Cart</a><br /></td></tr></table>";
}
else
{
	echo "<div class='wrapper col2'>
	<div class='center'>
    <form action='welcome.php' name='login' style='width:50%;margin:auto;margin-right:auto; margin-left:auto; border:2px dotted #0099FF; opacity:.7;' method='post'>";
	echo "Please login.. <br /> <br />";

   echo "Username: <input type='text' name='userlogin' /><br />
   Password: &nbsp; &nbsp;<input type='password' name='passlogin'/> <br />
   <input type='submit' value='Login!' />
    </form>
    </div>
	
	</div>";
	
	}
	
	mysql_close($sqlc);
?>
<br class="clear" /><br class="clear" />
</div>
</div>

<div class='wrapper col5'>
<br class="clear" />
<br class="clear" />
<?php
showFooter();
?>
</div>

</body>
</html>