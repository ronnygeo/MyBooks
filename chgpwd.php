<?php session_start();
require("functions.php");
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
 <script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="scripts/livevalidation.js"></script>
<script type="text/javascript">
function checkval(){
	f=0;
	 if (document. getElementById("cpassword").value=="")
f=1;
if(document. getElementById("npassword").value=="")
f=1;
if (document. getElementById("npassword2").value=="")
f=1;
if(document.getElementById("pwdval").value!=document.getElementById("cpassword").value)
{
	f=1;
	document.getElementById("pwdresbox").innerHTML="Wrong Password";
	document.getElementById("cpassword").value="";
	document.getElementById("npassword").value="";
	document.getElementById("npassword2").value="";
}
if(f==0)
return true;
else
return false;

	 }
</script>
</head>

<body>

<div id="wrapper">
		<div id="header" class="container">
        
<?php 
siteName();
showMenu(6);

?>

</div>
</div>

<br class="clear" />
<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">

<h3 align="center">Change Password Wizard</h3>

<?php 
if(isset($_SESSION['uid'])){
echo "<div class='right' style='padding:10px;'>Logged in as ".ucfirst($_SESSION['fname']);
	
	logoutbutton();
	echo "</div> <br />"; 


$sqlc=createSQL();
$qry="SELECT password FROM users WHERE userid=".$_SESSION['uid'];
$sqldata=mysql_query($qry,$sqlc);

$pwd=mysql_fetch_array($sqldata);

echo "<br class='clear'  /><table align='center' cellpadding='5' cellspacing='5' width='600px'>

<form action='cpwdpro.php' method='post' onsubmit='return checkval();'><tr width='30%'><td>Enter current Password*: </td><td><input type='hidden' id='pwdval' value='".$pwd['password']."' /><input type='password' id='cpassword' name='cpassword' />
<div id='pwdresbox' style='display:inline;position:relative;'></div></td></tr>

<tr><td>Enter New Password*: </td><td><input type='password' id='npassword' name='npassword' /><script type='text/javascript'>
		            var f12 = new LiveValidation('npassword');
		            f12.add(Validate.Length, { minimum: 5 } );
		          </script></td></tr>

<tr><td>Confirm New Password*: </td><td><input type='password' id='npassword2' name='cpassword2' /><script type='text/javascript'>
var e2 = new LiveValidation('npassword2');
e2.add( Validate.Confirmation, { match: 'npassword' } );</script></td></tr>
<tr>
<td></td><td align='center'><input type='submit' value='Change!' />

</form>

</table>
<br class='clear'  />
<br class='clear'  />
";

}
else
{
	echo "Please login to proceed..";
	}

?>

</div>
</div>

</div>
<br class="clear" />

<br class="clear" />
<?php showFooter(); ?>
</body>
</html>