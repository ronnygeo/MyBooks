<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<?php require("functions.php"); 
pageheader();
?>
<script type="text/javascript">
function callRegister(){
window.location.href="register.php";
}
</script>


<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="scripts/jquery.s3slider.js"></script>
<script type="text/javascript" src="scripts/jquery.s3slider.setup.js"></script>

</head>

<body>


<div class="wrapper col1">
<div id="header">

<?php siteName();
showMenu(0);
?>

</div>
 <br class="clear" />
  <br class="clear" />
</div>



<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">

<p align="center">Welcome to My Books Inc. </p>
<br />
<?php 
if(isset($_SESSION['uname']))
{
	echo "Already logged in as ".ucfirst($_SESSION['uname']).".. <br /><br />";
	 logoutbutton();
	}
else
{
	echo "<div class='wrapper col2'><div class='center'>
    <form action='welcome.php' name='login' style='width:50%;margin:auto;margin-right:auto; margin-left:auto; border:2px dotted #0099FF; opacity:.7;' method='post'>";
	echo "Please login to continue browsing.. <br /> <br />";

   echo "Username: &nbsp; &nbsp;<input type='text' name='userlogin' value='username' /><br />
   Password: &nbsp; &nbsp;<input type='password' name='passlogin' value='pass' /> <br />
   <input type='submit' value='Login!' />
    	<input type='button' value='Register' onclick='callRegister();' />
		</form>

    </div>
	
	</div>";
	
	}
?>

</div>
</div>

<?php showFooter();?>
</body>
</html>