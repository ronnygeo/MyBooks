<?php session_start();
require("functions.php");
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Shopping Cart</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="styles/main.css" />
<link rel="stylesheet" type="text/css" href="styles/tables.css" />
 <script type="text/javascript">

	function checkqty(stk)
		{
		if(document.getElementById("qty").value<=stk&&stk!=0)
		return true;
		else 
		{
		alert("Please enter a valid Quantity..");
		return false;
		}
		}
		
		function checkout(){
			if(document.getElementById("chkout").innerHTML!=0)
			return true;
			else
			{
				document.getElementById("result").innerHTML="<h3>There are no items in your cart.. Please add something to your cart and come here. Thank you.</h3>";
				return false;
			
			}
			}

</script>

</head>

<body>

<div id="wrapper">
	
		<div id="header" class="container">
			<?php siteName();
			?>
                       
     
     	<div id="loginform">
        <?php 
		if (!isset($_SESSION['uid']))
		loginwide();
		else
		{
		logoutpane();
		}
		?>

        </div>  
			<?php showMenu(3);?>

    	</div>

 
       
		
	<div id="page">
		<div class="post">
			<h2 class="title">Your Shopping Cart</h2>

		</div>
		<div id="result"></div>
    </div>
	<!-- end #page --> 
	
        
    <?php
		$mailcontents="<html><body><h1>Order Summary</h1><p>List of the books you ordered for your reference.</p>";
		if (isset($_SESSION['uid']))
		{

	if ((!empty($_SESSION['qty']))&&($_SESSION['qty']!=0))
		{
		$sqlc=createSQL();
	
	$price[]=array();
			
		echo "<table style='border-collapse:collapse;width:900px;border:1px solid #999; margin:auto;'>";
	echo "<thead><tr><th>Book</th><th>Quantity</th><th>Unit Price</th><th>Price</th><th>Delete</th></tr></thead><tbody style='background-color:#FFF;'>";

	$mailcontents.="<table style='border-collapse:collapse;width:900px;border:1px solid #999; margin:auto;'><thead><tr><th>Book</th><th>Quantity</th><th>Unit Price</th><th>Price</th></tr></thead><tbody style='background-color:#FFF;'>";

	for($i=0;$i<(sizeof($_SESSION['cart']));$i++)
	{
		//echo $_SESSION['cart'][$i];
		//echo $_SESSION['qty'][$i];
		$qry="SELECT * FROM books WHERE bookid='".$_SESSION['cart'][$i]."'";
		$sqldt=mysql_query($qry,$sqlc);
		$details=mysql_fetch_array($sqldt);
		
		array_push($price,$_SESSION['qty'][$i]*$details['uprice']);
		
		echo "<tr>";
			echo "<td><strong>".$details['name']."</strong> <BR />".$details['author']."&nbsp; &nbsp; <em> Book ID: ".$details['bookid']."</em></td>";
			echo "<td align='center' valign='middle'><form action='chgqty.php?id=".$i."' name='chgqty' onsubmit='return checkqty(".$details['stock'].");' method='post'><input type='text' id='qty' name='qty' size='2' value='".$_SESSION['qty'][$i]."' />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='image' src='images/edit.png' alt='Change Quantity' width=50px /></form></td>"; 
			echo "<td align='center' valign='middle'>".$details['uprice']."</td>";
			echo "<td align='center' valign='middle'>".$_SESSION['qty'][$i]*$details['uprice']."</td>";
			echo "<td align='center' valign='middle'><a href='deletec.php?id=".$i."'><img src='images/delete.png' alt='Delete' height=50px /></a></td>";
			echo "</tr>";
			
			$mailcontents.="<tr><td><strong>".$details['name']."</strong> <BR />".$details['author']."&nbsp; &nbsp; <em> Book ID: ".$details['bookid']."</em></td><td align='center' valign='middle'>".$_SESSION['qty'][$i]."</td><td align='center' valign='middle'>".$details['uprice']."</td><td align='center' valign='middle'>".$_SESSION['qty'][$i]*$details['uprice']."</td></tr>";
			
	}
	
	$totalamt=0;
	$totalamt=array_sum($price);


		echo "</tbody><tfoot><tr><th></th><th></th><th>Total: AED</th><th><strong><div id='chkout'>".$totalamt."</div></strong></th><th><form action='pay.php' name='cout' method='post'><input type='hidden' name='amt' id='amt' value='".$totalamt."' /><input type='image' onclick='return checkout();' src='images/checkout.png' /></form></th></tr></tfoot>";

		echo "</table>";
		
		$mailcontents.= "</tbody><tfoot><tr><th></th><th></th><th>Total: AED</th><th><strong><div id='chkout'>".$totalamt."</div></strong></th></tr></tfoot></table>";
		$mailcontents.="</body></html>";
		
		$_SESSION['emsg']=array();
		$_SESSION['emsg']=$mailcontents;
		
		/*$myFile = "mail".$_SESSION['uname'].".html";
		$fh = fopen($myFile, 'w') or die("can't open file");
		fwrite($fh, $mailcontents);
		fclose($fh);*/
	
	}
		else
		{
		echo "<div id='page' style='text-align=center'><h3>There are no items in your cart.. Please add something to your cart and come back to this page. Thank you.</h3></div>";
			}

		}
		else
		{
			echo "<div id='page' style='text-align=center'>
		<h3>Please login, Add something to your cart and come back to this page to view your cart..</h3>
    </div>";
		//	echo "<div style='display:inline; position:relative;margin-left:50px;'></div>";
			}



		?>
        
			

		

    
<div id="footer-content-wrapper">
	
 <div id="footer-content">
		<div id="fbox1">
			<h2>Quick Links</h2>
			<ul class="style1">
				<li class="first"><a href="catalog.php">Browse All</a></li>
				<li><a href="search.php">Search</a></li>
				<li><a href="cart.php">Your Shopping Cart</a></li>
				<?php
               if(isset($_SESSION['uid']))
			   if($_SESSION['admin']==1)
			   echo "<li><a href='admin.php'>Administration Area</a></li>";
				else
				echo "<li><a href='usercp.php'>User Control Panel</a></li>";
				?>
				<li><a href="about.html">Contact Us</a></li>
			</ul>
		</div>
		<div id="fbox3">
			<h2>Contact Us</h2>
			<ul class="style1">
				<li class="first"><a href="http://www.facebook.com/mybooksinc">Facebook</a></li>
				<li><a href="http://www.twitter.com/mybooksinc">Twitter</a></li>
				<li><a href="http://www.linkedin.com/mybooksinc">LinkedIn</a></li>
				<li><a href="http://www.yelp.com/mybooksinc">Yelp</a></li>
				<li><a href="mailto:info@mybooks.inc">Email</a></li>
			</ul>
		</div>

	</div>
</div>


</div>
<?php 
showFooter();
?>
</body>
</html>