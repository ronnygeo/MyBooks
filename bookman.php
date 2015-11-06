<?php session_start();
require("functions.php");
pageheader();
restricted();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Manager</title>



</head>

<body>

<div id="wrapper">
		<div id="header" class="container">
        
<?php 
siteName();
showMenu(6);
?>

</div>
</div>
<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">

<h3 align="center">Welcome to the Book Manager </h3>
<?php echo "<div class='right' style='padding:10px;'>Logged in as Admin ".ucfirst($_SESSION['fname']);
	
	logoutbutton();
	echo "</div> <br />"; 

	if(isset($_SESSION['catstat'])){
		print '<script type="text/javascript">'; 
		print 'alert("New Category Added..")'; 
		print '</script>';
		unset($_SESSION['catstat']);
		}

$sqlc=createSQL();
$qry="SELECT * FROM books ORDER BY name ASC";

$sqldata=mysql_query($qry,$sqlc);

echo "<BR /><p>You can edit all the currently available books from here..</p>";
echo "<table style='text-align:center'><thead><tr><th>Image</th><th>Book Name</th><th>Author</th><th>Publisher</th><th>Category</th><th>Stock</th><th>Unit Price</th><th>Actions</th></tr></thead>";
while ($book=mysql_fetch_array($sqldata)){
	echo "<tr>";
	echo "<td><img src='".$book['bookpic']."' alt='".$book['name']."' width=70px></td>";
	echo "<td>".$book['name']."</td><td>".$book['author']."</td><td>".$book['publisher']."</td><td>".$book['category']."</td><td>".$book['stock']."</td><td>".$book['uprice']."</td>";
	echo "<td><a href='edit.php?id=".$book['bookid']."'><img src='images/edit.png' alt='Edit Book' width=30px /></a><a href='delete.php?id=".$book['bookid']."'><img src='images/delete.png' alt='Edit Book' width=30px /></a></td>";
	
	echo "</tr>";
	}


?>
</table>

<br class="clear" />
<table border="0" align="center" cellpadding="10" cellspacing="5">
<tr>
<td>
<?php 

echo "<form action='addcat.php' method='post' style='border:1px dotted; width:200px; text-align:center;'>
<p>Add a new category of books..</p>
<input type='text' id='cat' name='cat' />
<input type='submit' value='Add!' />
</form>";
?>
</td>
<td><a href="newbook.php"><img src="images/newbook.png" alt="Add a New Book" /></a>
</td></tr></table>
</div>
</div>



<?php showFooter(); ?>
</body>
</html>