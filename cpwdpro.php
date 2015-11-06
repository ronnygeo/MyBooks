<?php session_start();
$url="usercp.php";
header("location:$url");
require("functions.php");
$sqlcon=createSQL();
$qry="UPDATE users SET password='".$_POST['npassword']."' WHERE userid=".$_SESSION['uid'];
if(!mysql_query($qry,$sqlcon)){
	die ("Error: ".mysql_error);
	}
	mysql_close();
	$_SESSION['pstat']=1;
?>
