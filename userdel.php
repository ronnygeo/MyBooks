<?php session_start();
require("functions.php");
$url="userman.php";
header("Location: $url");
$uid=$_GET['uid'];
if($_SESSION['admin']==1)
{
	$sqlc=createSQL();
	$qry="DELETE FROM users WHERE userid='".$uid."'";
	if(!mysql_query($qry,$sqlc))
{
	die ('Error: '.mysql_error());
	}
	mysql_close();
	}
else
{
	echo "Please no hacking...";	// if a non admin user tries to change
	}

?>