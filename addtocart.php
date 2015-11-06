<?php
    header("Location: index.php");
    error_reporting(0);
    session_start();
require("functions.php");
pageheader();
    
if(isset($_SESSION['url'])) 
   $url = $_SESSION['url']; // holds url for last page visited.
else 
   $url = "index.php"; // default page for
//echo $_GET['bid'];
//echo "  <BR /> ".$_POST['qty'];

/*
function addtocart($id,$qty){
	$sqlb=createSQL();
$sqldb=mysql_query("SELECT name,author,uprice FROM books WHERE bookid=".$id,$sqlb);
$book=mysql_fetch_array($sqldb);
	$sqlc=createSQL();
$qry="INSERT INTO cart(bookid,bookname,author,quantity,uprice,userid,username) VALUES('".$id."','".$book['name']."','".$book['author']."','".$qty."','".$book['uprice']."','".$_SESSION['uid']."','".$_SESSION['uname']."')";

if (!mysql_query($qry,$sqlc))
{
	die ('Error: '.mysql_error());
}

mysql_close();

	}
	*/
	
	$id=$_GET['bid'];
    $qty=$_POST['qty'];
	addtocart($id,$qty);
?>