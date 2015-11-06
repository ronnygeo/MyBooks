<?php session_start();
header("location: usercp.php");
require("functions.php");
$_SESSION['cart']=array();
$_SESSION['qty']=array();

/*$sqlcon=createSQL();
$qry="DELETE FROM cart WHERE userid='".$_SESSION['uid']."'";

if (!mysql_query($qry,$sqlcon))
{ 
	die ('Error: '.mysql_error());
	}
*/
?>
