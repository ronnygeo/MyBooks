<link rel="stylesheet" href="styles/main.css" type="text/css" />
<?php
require("functions.php");
//echo "Testing searchhhh as always...";
$search=$_POST['p'];
//$cat=$_POST['c'];
//echo $search;
   echo "<div class='gallery'>
      <h2>Search Results</h2>
      <ul>";
	$sqlcon=createSQL();
	$sql = mysql_query("SELECT * FROM books WHERE name like '%$search%' or author like '%$search%' or publisher like '%$search%' or category like '%$search%'",$sqlcon) or die (mysql_error());
	  while($item=mysql_fetch_array($sql))
	  {
		/* echo "<li><a href='viewbook.php?id=".$item['bookid']."' title='".$item['name']."'><img src='".$item['bookpic']."' alt='".$item['name']."' /></a></li>";*/
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
	  echo "</ul>
    </div>";

      
echo "
    <br class='clear' />
	<br class='clear' />
	<br class='clear' />
	<br class='clear' />";
	showFooter();
    echo "<br class='clear' />
	
  ";

?>

