<?php session_start();
require("functions.php");
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search For a Book</title>
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
                     $('#searchcont').html(data);
          }
        });
		
	   });
   });
</script>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>Search for a Book</title>

</head>

<body>

<!--div id="wrapper"-->

	<div id="header">
		<div id="header" class="container">
			<?php siteName();?>
      
     	<div id="loginform" style"width:180px;margin-right:10px;	margin-top:auto;height:100px;float:left;padding:0px;">
      
		<?php 
		if(isset($_SESSION['uname']))
		logoutpane();
		else
		loginwide();
		?>
        
        </div>  
			
            <?php 
			showMenu(4);
			?>

    	</div>
</div>
	<!-- end #header -->
	<div id="page">
		<div class="post">
			<h2 class="title">Welcome to Search.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/search.png" alt="Search" /></h2>
			<div class="entry">
				<p> You can search for your book right here... </p>
                 &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="searchtb" name="searchtb" size="30" />
			</div>
		</div>
	</div>
	
    
    <div id="searchcont">
		</div>
        
    <!-- end #page --> 



<!--/div-->




</body>
</html>