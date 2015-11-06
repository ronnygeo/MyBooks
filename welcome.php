<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
error_reporting(0);
if(isset($_SESSION['url'])) 
   $url = $_SESSION['url']; // holds url for last page visited.
else 
   $url = "index.php"; // default page for
header("refresh: 4; $url");
require("functions.php");
pageheader();
//header('location: index.php'); 	Instant redirection...
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login </title>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />
</head>

<body>
<div class="wrapper col1">
<div id="header">
<div 
<?php siteName();?>
<?php showMenu(0);?>

</div>
 <br class="clear" />
  <br class="clear" />
</div>

<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">

<p>Welcome to My Books Inc. </p>

<?php
$sql_conn=createSQL();
$qry="SELECT * FROM  users WHERE username= '$_POST[userlogin]' AND password='$_POST[passlogin]'";
$sqluser=mysql_query($qry,$sql_conn);
$row=mysql_fetch_array($sqluser);

if($row['username']==NULL){
echo "";

echo "<p>User does not exist... Please <a href='register.php' style='color: #000;background-color:#FFF'> register</a> first.. </p>";

}else
{

	echo "You are logged in as ".$_POST['userlogin']."..";
	
	//setcookie("user",$row['username'],time()+(60*60*24));
	session_start();
	$_SESSION['uname']=$row['username'];
	$_SESSION['fname']=$row['fullname'];
	$_SESSION['uid']=$row['userid'];
	$_SESSION['admin']=$row['admin'];
	$_SESSION['email']=$row['email'];
	$_SESSION['dob']=$row['dob'];
	$_SESSION['cart']=array();
	$_SESSION['qty']=array();
	}
	

mysql_close($sql_conn);
?>

<p>You will be automatically redirected to the page in 5 seconds..</p>

</div>
</div>
<?php showfooter();?>
</body>
</html>