<?php session_start();
require("functions.php");
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Creating new user</title>
<link rel="stylesheet" type="text/css" href="styles/layout.css" />
</head>

<body>
<div class="wrapper col1">
<div id="header">
<?php siteName();
showMenu(0);?>
   
			
</div>
 <br class="clear" />
  <br class="clear" />
</div>



<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">

<?php 

if(isset($_POST['captcha']) && $_POST['captcha'] == $_SESSION['captcha'])
	{
		
		//echo "Passed!"; 
		/* YOUR CODE GOES HERE */ 
		
		if(isset($_SESSION['url'])) 
   $url = $_SESSION['url']; // holds url for last page visited.
else 
   $url = "index.php"; // default page for 

header("refresh: 5;$url");
		$sql_conn=createSQL();
$qry="INSERT INTO users (username,password,fullname,email,dob,address,country,tel) VALUES ('$_POST[uname]','$_POST[password]','$_POST[fname]','$_POST[email]','$_POST[dob]','$_POST[address]','$_POST[country]','$_POST[tel]')";
if (!mysql_query($qry,$sql_conn))
{
	die ('Error: '.mysql_error());
	}
echo "<p>Registratrion Complete</p>";

$qry="SELECT * FROM  users WHERE username= '$_POST[uname]' AND password='$_POST[password]'";

$sqluser=mysql_query($qry,$sql_conn);
$row=mysql_fetch_array($sqluser);

	$_SESSION['uname']=$row['username'];
	$_SESSION['fname']=$row['fullname'];
	$_SESSION['uid']=$row['userid'];
	$_SESSION['admin']=$row['admin'];
	$_SESSION['email']=$row['email'];
	$_SESSION['dob']=$row['dob'];
	$_SESSION['cart']=array();
	$_SESSION['qty']=array();
echo "<p>Welcome to My Books Inc., ".ucfirst($_SESSION['fname'])."</p>
	<p>You will be automatically redirected to the Home page in 5 seconds..</p>";


mysql_close($sql_conn);
		/* this line makes session free, we recommend you to keep it */
		unset($_SESSION['captcha']); 
	} 
else
	{
	//	echo "Failed!";
		$url="register.php";
		header("location: $url");
		
		$_SESSION['cstat']=1;
	}
	
	

?>


</div>
</div>
<?php showfooter();?>

</body>
</html>