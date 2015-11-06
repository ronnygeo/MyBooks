<?php session_start(); // starts the session
require("functions.php");
$_SESSION['url'] = $_SERVER['REQUEST_URI'];
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<title>View Catalog</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="imagetoolbar" content="no" />
<!--link rel="stylesheet" href="styles/layout.css" type="text/css" /-->
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
<script type="text/javascript">
	
   $(function(){
	   $('#searchtb').keyup(function(){
		   var inpval=$('#searchtb').val();
		   $.ajax({
                type: 'POST',
                data: ({p : inpval}),
                url: 'searchpost.php',
                success: function(data) {
                     $('.gallery').html(data);
          }
        });
		
	   });
   });
</script>

</head>
<body>
<div id="wrapper">

		<div id="header" class="container">
<?php
siteName();
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
            <?php 
			showMenu(2);
			?>

    	</div>

</div>  
<br class="clear" />


</div>
    

    
    



<div class="wrapper col4">

  <div id="container">
  
  <img src="images/search.png" width='25px' alt="You can search for books by Category, Name, Author or by Publisher from this omnibox"> &nbsp;&nbsp;<input type="text" id="searchtb" />
    <div class="gallery">
    <div style=" position:relative;margin-left:600px;clear:both;"></div>
    <br class="clear" />
      <ul>
      <?php 
	  $sqlcon=createSQL();
	  $qry="SELECT * FROM books";
	  $sqldata=mysql_query($qry,$sqlcon);
	  while($item=mysql_fetch_array($sqldata))
	  {
		  
		  	echo "<div class='feat_prod_box'>
            
            	<div class='prod_img'><a href='viewbook.php?id=".$item['bookid']."'><img src='".$item['bookpic']."' alt='".$item['name']."' width='105px' height='160px' border='1' /></a></div>
                
                <div class='prod_det_box' style='background-color:#CCC'>
                	<div class='box_top'></div>
                    <div class='box_center'>
                    <div class='prod_title'><strong style='text-transform:uppercase;'>".$item['name']."</strong></div>
                    <em style='font-size:14px'>".$item['author']."</em><BR /><p class='details' style='font-size:14px'>".$item['description']."</p></p>
                    
                    <div class='clear'></div>
                    </div>
                    
                    <div class='box_bottom'><a href='viewbook.php?id=".$item['bookid']."' class='more'>More Details..</a><BR /></div>
                </div>    
            
			<div class='clear'></div>
            </div>";
		  }
	  mysql_close($sqlcon);
	  ?>
      
      </ul>
      <br class="clear" />
      
	  <br class="clear" />
      <br class="clear" />
      <?php showFooter(); ?>
      
    </div>
  </div>
</div>
<!-- ####################################################################################################### -->
</div>

</body>
</html>