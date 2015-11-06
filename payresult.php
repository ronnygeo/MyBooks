<?php session_start();
require("functions.php");
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Payment Result</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="styles/main.css" />
</head>

<body>


<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">
			<?php siteName();?>
                       
     
     	<div id="loginform">
        </div>  
<?php 
showMenu(0);
?>

    	</div>

 
       
<div id="page">
		<div class="post">
			<?php
     if ($_GET['status']==1){
            echo "<h2 class='title'>Congratulations..</h2>
            <BR />
			<div class='entry'>
				<p>Your purchase was successful. Please feel free to continue browsing and order more books from our site. 
				You will receive an email with the order summary shortly.
                <BR /><BR />
                THANK YOU.
</p></div>";

		//Send email with order summary
		$email=$_SESSION['email'];
		if(isset($_SESSION['emsg'])){
		$Content=$_SESSION['emsg'];
		$Subject="Order Summary";
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
	
}

/* 
Perform CRUD operations to remove all items from shopping cart for the user and reduce the stock of all purchased books from inventory.
*/
			$sqlc=createSQL();
			
date_default_timezone_set('Asia/Dubai');
$dt = date('Y-m-d');
$tm=date('H:i:s');
$uid=$_SESSION['uid'];
$uname=$_SESSION['uname'];

for($i=0;$i<(sizeof($_SESSION['cart']));$i++)
	{
		//echo $_SESSION['cart'][$i];
		//echo $_SESSION['qty'][$i];
		$sqlco=createSQL();
		$sqlcon=createSQL();
		$qry="SELECT * FROM books WHERE bookid='".$_SESSION['cart'][$i]."'";
		$sqldt=mysql_query($qry,$sqlc);
		$book=mysql_fetch_array($sqldt);
		
if (!mysql_query("INSERT INTO sales(bookid,bookname,author,userid,username,uprice,quantity,date,time) VALUES('".$book['bookid']."','".$book['name']."','".$book['author']."','".$_SESSION['uid']."','".$_SESSION['uname']."','".$book['uprice']."','".$_SESSION['qty'][$i]."','".$dt."','".$tm."')",$sqlco))
			{
			die ('Error: '.mysql_error());
			}
			
	if(!mysql_query("UPDATE books SET stock=stock-".$_SESSION['qty'][$i]." WHERE bookid=".$_SESSION['cart'][$i],$sqlcon))
			{
				die ('Error: '.mysql_error());
				}
		
	}

$_SESSION['cart']=array();
$_SESSION['qty']=array();


/*	if(!mysql_query("DELETE FROM cart WHERE userid=".$_SESSION['uid'],$sqlcon))
	{
		die ('Error: '.mysql_error());
		}
*/


			}
			else
			{
				//Incase the payment was unsuccessful.
				echo "<h2 class='title'>Oops..</h2>
            <BR />
			<div class='entry'>
				<p>Your purchase was not successful. There was some error in your payment. Please restart the payment process from the cart.
                <BR /><BR />
                THANK YOU.
</p></div>";
				
				}

mysql_close();
?>
		</div>
	</div>

</div>


</div>
</div>

<?php 
showFooter();
?>
</body>
</html>