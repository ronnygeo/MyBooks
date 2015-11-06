<?php session_start();
require("functions.php");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
$sqlc=createSQL();
$qry="SELECT DISTINCT name FROM books";
$sqldata=mysql_query($qry,$sqlc);
$i=0;
	while($offers=mysql_fetch_array($sqldata))
{
	$offerarr[$i]=$offers['name'];
	$i++;
}

pageheader();
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Area..</title>
<link href="styles/layout.css" rel="stylesheet" type="text/css" />
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

<h3 align="center">Welcome to Administration Area </h3>




<?php 
if (isset($_SESSION['uname']))
{
if ($_SESSION['admin']==1)
	{
	echo "<div class='right' style='padding:10px;'>Logged in as Admin ".ucfirst($_SESSION['fname']);
	
	logoutbutton();
	echo "</div> <br />"; 
	echo "<br class='clear' /><br class='clear' /><div style='text-align:center'><p style='font-size:large;color:#000; background-color:#FFF'>Choose a task below: </p>";
      echo    "<table><tr><td><br /> <a href='usercp.php' style='font-size:24px; color:#00C; background-color:#FFF;text-decoration:none;'><img src='images/usercp.png' alt='User Control Panel' /><br />User Control Panel</a><br /></td> ";
	  echo "<td><br /><a href='newbook.php' style='font-size:24px; color:#00C; background-color:#FFF;text-decoration:none;'><img src='images/newbook.png' alt='User Control Panel' /><br />Add a New Book</a><br /></td></tr><tr>";
	 echo "<td><br /><a href='userman.php' style='font-size:24px;color:#00C; background-color:#FFF;text-decoration:none;'><img src='images/userman.png' alt='User Manager' /><br />User Manager</a><br /></td>";
		echo "<td><br /><a href='bookman.php' style='font-size:24px;color:#00C; background-color:#FFF;text-decoration:none;'><img src='images/bookman.png' alt='Book Manager' /><br />Book Manager</a><br /></td></tr><tr>";
		
		echo "<td colspan='2'><br /><a href='viewsales.php' style='font-size:24px;color:#00C; background-color:#FFF;text-decoration:none;'><img src='images/viewsales.png' alt='View Sales' /><br />View All Past Sales</a><br /></td></tr></table>";
	
	echo "<BR /><BR /><BR />";
	}
	else
	{
		echo "<div class='wrapper col2'>
	<div class='center'><h4>Oops..</h4><p>You should be an administrator to access these pages..</p>";
		echo "<div class='right'>";
	echo "Logged in as ".$_SESSION['fname'].".. &nbsp; &nbsp;";
	logoutbutton();
	echo "</div></div>
	
	</div></p>"; 
	}
}
else
{
	echo "<div class='wrapper col2'>
	<div class='center'>
    <form action='welcome.php' name='login' onsubmit='' style='width:50%;margin:auto;margin-right:auto; margin-left:auto; border:2px dotted #0099FF; opacity:.7;' method='post'>";
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