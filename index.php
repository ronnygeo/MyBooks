<?php session_start();
require("functions.php");
pageheader();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>My Books Inc.</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript" src="scripts/crawler.js"></script>
<script type="text/javascript" src="scripts/jquery.s3slider.js"></script>
<script type="text/javascript" src="scripts/jquery.s3slider.setup.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.9.2.custom.min.js"></script>
<script type="text/javascript" src="scripts/jquery.jcoverflip.js"></script>
<script>
  $(function(){
    $('#flip').jcoverflip();
  });
</script>
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
		<div id="header" class="container">

            <?php
siteName();
?>
                       
     
   <div id="loginform">
   <?php 
	if (isset($_SESSION['uid']))
	logoutpane();
else
{
	loginwide();
	}
		?>
        
        </div>  
            <?php 
			showMenu(1);
			?>

    	</div>

 
       
		<div id="banner">

     
        
			<div class="content">

</div>

<div id='featured_slide_'>
    <ul id='featured_slide_Content'>
	
    <?php 

$bslidecon=createSQL();

$qrymain="SELECT * FROM books ORDER BY bookid DESC LIMIT 0,5";

$sqlmain=mysql_query($qrymain,$bslidecon);
	
while($allbooks=mysql_fetch_array($sqlmain))
{
	echo "<li class='featured_slide_Image'><a href='viewbook.php?id=".$allbooks['bookid']."'><img src=".$allbooks['bookpic']." alt='".$allbooks['name']."' /></a>
        <div class='introtext'>
          <h2>".$allbooks['name']."</h2>
		  <h4>".$allbooks['author']."</h4>
          <p>".$allbooks['description'].".. <BR /><a href='viewbook.php?id=".$allbooks['bookid']."'>Click here for more details..</a></p>
        </div>
      </li>";
}

mysql_close($bslidecon);

echo "</ul>
  </div>
 
</div>
 ";
?>
    


	</div>
	<!-- end #header -->
	<div id="page">
		<div class="post">
			<h2 class="title">Welcome to My Books</h2>
			<div class="entry">
				<p> Welcome to My Books Incorporated. We have all the books in the world. If you dont find what you are looking for, please send us an email and we will reply with the estimated delivery date for your book.. Enjoy browsing! </p>
			</div>
            <div class="marquee" id="mycrawler">
			
<?php 
$sslid1c=createSQL();
$qy="SELECT bookid,name, description, bookthpic FROM books ORDER BY bookid ASC";
$sql=mysql_query($qy,$sslid1c);
echo " ";
while($it=mysql_fetch_array($sql))
{
	echo "
<a href='viewbook.php?id=".$it['bookid']."'><img src='".$it['bookthpic']."' align='top' width='130px' height='200px' alt='".$it['name']."'/>&nbsp;</a>";
}

mysql_close($sslid1c);

?>
</div>

<script type="text/javascript">
marqueeInit({
	uniqueid: 'mycrawler',
	style: {
		'padding': '5px',
		'width': '1000px',
		'height': '200px'
	},
	inc: 3, //speed - pixel increment for each iteration of this marquee's movement
	mouse: 'cursor driven', //mouseover behavior ('pause' 'cursor driven' or false)
	moveatleast: 2,
	neutral: 150,
	savedirection: true,
	random: true
});
</script>
		</div>
	</div>
	<!-- end #page --> 


</div>
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

<?php 
showFooter();
?>
</body>
</html>
