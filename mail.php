<?php session_start();
require("functions.php");
$url="viewsales.php";
header("Location: $url");
restricted();
$email=$_POST['email'];
$sql_co=createSQL();
$qry="SELECT date,time,bookname, author, username, quantity,uprice FROM sales ORDER BY date ASC";

$sqldata=mysql_query($qry,$sql_co);

$mailcontents="<html><body><table>
<tr><th>Date Purchased</th><th>Name</th><th>Author</th><th>User</th><th>Quantity</th><th>Unit Price</th></tr>";

while ($sale=mysql_fetch_array($sqldata)){
$mailcontents+=("<tr><td>".$sale['date']." ".$sale['time']."</td><td>".$sale['bookname']."</td><td>".$sale['author']."</td><td>".$sale['username']."</td><td>".$sale['quantity']."</td><td>".$sale['uprice']."</td></tr>");
}

$mailcontents+="</table></body></html>";



mysql_close($sql_co);

$Content=$mailcontents;
$Subject="Sales History";
	$Headers  = "MIME-Version: 1.0\n";
    $Headers .= "Content-type: text/html; charset=iso-8859-1\n";
    $Headers .= "From: Ronny Mathew <admin@mybooks.inc>\n";
    $Headers .= "X-Sender: <admin@mybooks.inc>\n";
    $Headers .= "X-Mailer: PHP\n"; 
    $Headers .= "X-Priority: 1\n"; 
    $Headers .= "Return-Path: <admin@mybooks.inc>\n"; 





if(mail($email, $Subject, $Content, $Headers) == false) {
        echo "Unable to send mail";
 
    }

?>