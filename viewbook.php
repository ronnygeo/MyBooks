<?php session_start();
require("functions.php");
if(!isset($_SESSION['uname']))
{
    $_SESSION['url'] = "viewbook.php?id=".$_GET['id'];
    echo "<h1 style='color:red'>Please login before proceeding...</h1>";
    $url="login.php";
    //header('refresh: 3; "login.php"');
    header("Location: $url");
}
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="styles/layout.css">
<title>View the Book</title>
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
<!-- FancyBox -->
<script type="text/javascript" src="scripts/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="scripts/fancybox/jquery.fancybox-1.3.2.js"></script>
<script type="text/javascript" src="scripts/fancybox/jquery.fancybox-1.3.2.setup.js"></script>
<link rel="stylesheet" href="scripts/fancybox/jquery.fancybox-1.3.2.css" type="text/css" />
<?php
$_SESSION['url'] = "viewbook.php?id=".$_GET['id'];
$sqcon=createSQL();
$qry="SELECT * FROM books WHERE bookid='".$_GET['id']."'";

$sqldata=mysql_query($qry,$sqcon);
$book=mysql_fetch_array($sqldata);

 $stock=$book['stock'];
 $index=-1;
 for($g=0;$g<sizeof($_SESSION['cart']);$g++)
 {
	 if($_SESSION['cart'][$g]==$_GET['id'])
	 {
		 $index=$g;
		 }
	 }

//echo $book['name'];
//echo "<img src='"+$book['bookpic']+"'/>";
  ?>
  <script type="text/javascript">

function checkqty()
{
	if(document.getElementById("qty").value<=<?php if($index!=-1)
	echo $stock-$_SESSION['qty'][$index];
	else echo $stock;?>&&<?php if($index!=-1)
	echo $stock-$_SESSION['qty'][$index];
	else echo $stock;?>!=0)
	return true;
	else 
	{
		alert("Please enter a valid Quantity..");
		return false;
	}
	}

</script>

</head>

<body>


<div id="wrapper">
	
		<div id="header" class="container">
			<?php siteName();
			showMenu(0);
			?>
                       
     	<div id="loginform">
<?php 
if(isset($_SESSION['uname']))
	{
	logoutpane();
		}
	else
	loginwide();  
		?>
        </div>  


 </div>

<!--------------------------------------##################-------------------------------------------------->

<div class="wrapper col2">
    <div id="container" style="padding-top:0px;border:none;">
  <div id="offer">
<div id="offer_image">
  <?php echo "<img src='".$book['bookpic']."' width='320' height='450' />"; ?>
  
  </div>
 <?php
 echo "<div id='offerfl2'>
  <h1 style='color:#09F;'><b>".$book['name']."</b></h1>
 <h4 style='color:#0CF'>".$book['author']."</h4>
 <p style='color:#0CF;font-size:16px;'> Publisher: ".$book['publisher']."</p>
 <p style='color:#0FC;font-size:18px;'> Price: AED ".$book['uprice']." </p>
 <p style='color:#FFF;font-size:18px;'> Stock Available: ".$stock."</p>";
 

  ?>

  <?php 
if($stock>0)
{
	echo "<div id='offer_float'><form action='addtocart.php?bid=".$_GET['id']."' id='addcart' method='post' onsubmit='return checkqty();'>";
	  echo "Quantity: <input type='text' size=2 id='qty' name='qty' value='1' /><BR class='clear' />
	  <input type='image' src='images/addtocart.png' id='addcart' alt='Add to Cart' />
  </form></div>";
	}
	else
	{
		  echo "<div id='offer_float' style='height:80px;margin-top:120px'><p style='font-size:20px;color:#0066FF; text-align:center'>Sorry.. Out of Stock!</p></div>";
		}
		

  echo "<div class='offerdetails'> <BR />
  <p>".$book['description']."</p></div>"; 
  echo "</div>";
  
  ?>
  
  </p>
  


    </div>

  
  <div id="offerside">
  
  <marquee direction="up" behavior="scroll" height="575" width="220" align="left" scrollamount="4" onmouseover="this.setAttribute('scrollamount',2,0);" onmouseout="this.setAttribute('scrollamount',4,0);">
 
<?php 

$sql_conn2=createSQL();

$qy="SELECT bookid,name, author, bookthpic FROM books WHERE category='".$book['category']."'";
//echo $book['category'];
$sqlother=mysql_query($qy,$sql_conn2);

while($items=mysql_fetch_array($sqlother))
{
	echo "<br /><br /><a href='viewbook.php?id=".$items['bookid']."'>
<img src='".$items['bookthpic']."' align='middle' width='220'/><div class='offsidebox'>
<h3>".$items['name']."</h3>
".$items['author']."</div></a>
<br /> <br />
";

}
mysql_close($sql_conn2);
?>

</marquee>

    </div>
    
    </div>
<br class="clear" />
</div>

</div>
<?php 
showFooter();

?>
</body>
</html>