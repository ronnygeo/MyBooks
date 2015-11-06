<?php
session_start();
require("functions.php");
/*
$qry="DELETE FROM cart WHERE id=".$_GET['id'];
$sqlc=createSQL();
if(!mysql_query($qry,$sqlc))
{
	die ('Error: '.mysql_error());
	}
*/

array_splice($_SESSION['cart'],$_GET['id'],1);
array_splice($_SESSION['qty'],$_GET['id'],1);

$url="cart.php";
header("Location: $url");
?>
