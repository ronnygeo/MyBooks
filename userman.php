<?php session_start();
require("functions.php");
pageheader();
restricted();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Manager</title>
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

<h3 align="center">Welcome to the User Manager </h3>
<?php echo "<div class='right' style='padding:10px;'>Logged in as Admin ".ucfirst($_SESSION['fname']);
	
	logoutbutton();
	echo "</div> <br />"; 


$sqlc=createSQL();
$qry="SELECT userid,username,fullname,admin,email,country FROM users";

$sqldata=mysql_query($qry,$sqlc);

echo "<br class='clear' /><br class='clear' /><table width='700px'><tr><th>Full Name</th><th>Username</th><th>Email</th><th>Country</th><th>Admin</th><th>Action</th></tr>";
while ($user=mysql_fetch_array($sqldata)){
	echo "<tr>";
	if($user['admin']==1)
	$str="Yes";
	else
	$str="No";
	echo "<td>".$user['fullname']."</td><td>".$user['username']."</td><td>".$user['email']."</td><td>".$user['country']."</td><td>".$str."</td>";
	echo "<td><a href='userprocess.php?uid=".$user['userid']."'><img src='images/admin.png' width='40px' alt='Make Administrator' /></a>&nbsp;&nbsp;&nbsp;<a href='userdel.php?uid=".$user['userid']."'><img src='images/delete.png' alt='Delete User' width='40px' /></a></td>";
	echo "</tr>";
	}


?>
</table>
</div>
</div>

</div>
<br class="clear" />

<br class="clear" />
<?php showFooter(); ?>
</body>
</html>