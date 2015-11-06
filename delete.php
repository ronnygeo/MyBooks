<?php session_start();
require("functions.php");
if($_SESSION['admin']==1){
$qry="DELETE FROM books WHERE bookid=".$_GET['id'];
$sqlc=createSQL();
if(!mysql_query($qry,$sqlc))
{
	die ('Error: '.mysql_error());
	}
	mysql_close();
}
else
{
	echo "Please no hacking..";
	}
$url="bookman.php";
header("Location: $url");
?>
