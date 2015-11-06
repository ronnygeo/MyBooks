<?php session_start();
require("functions.php");
$id=$_GET['id'];
$qty=$_POST['qty'];

$_SESSION['qty'][$id]=$qty;

$url="cart.php";
header("Location: $url");
?>
