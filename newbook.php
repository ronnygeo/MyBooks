<?php session_start();
require("functions.php");
restricted();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="scripts/jquery-1.4.3.min.js">
</script>
<script type="text/javascript">
	function fillAuthor(){
	var tb=document.getElementById("authordd");
	var aut=tb.options[tb.selectedIndex].text;
	document.getElementById("author").value=aut;
	}
	function fillPublisher(){
		var pubtb=document.getElementById("publisherdd");
		var pub=pubtb.options[pubtb.selectedIndex].text;
	document.getElementById("publisher").value=pub;
		}
	
 function valFull(){
	f=0;
	 if (document. getElementById("name").value=="")
f=1;
if(document. getElementById("author").value=="")
f=1;
if (document. getElementById("publisher").value=="")
f=1;
if(document. getElementById("file").value=="")
f=1;
if(document. getElementById("f25").value=="")
f=1;
if(document. getElementById("stock").value=="")
f=1;
if(document. getElementById("price").value=="")
f=1;

if(f==0)
return true;
else
return false;

	 }
</script>

<script type="text/javascript" src="scripts/livevalidation.js">
</script>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add a new Book..</title>
<link href="styles/layout.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="styles/tables.css" type="text/css" />

<?php pageheader();?>


</head>

<body>


<div class="wrapper col1">
<div id="header">
<?php siteName();
showMenu(6);
?>
</div>
 <br class="clear" />
  <br class="clear" />
</div>


<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">

<h3 align="center">Add a new Book</h3>

<p align="right">Logged in as <?php echo $_SESSION['fname'];?>..</p>

<p> Please enter all the details to add a new book... </p>

<form action="addbookpro.php" method="post" enctype="multipart/form-data" onsubmit="return valFull();">
<table border="1px dashed" bordercolor="#3366FF" align="center">
<thead><tr>
<th>Name</th>
<th>Details</th>
</tr>
</thead>

<tbody>
<tr>
<td>Category*</td>
<td>
<?php 
	$xml = simplexml_load_file("category.xml");
	//echo $xml->getName() . "<br>";
	echo "<select name='category' onchange='fillCategory()'>";
foreach($xml->children() as $child)
  {
  echo "<option value='".$child."'>".$child."</option>";
  }
	echo "</select>";
	?>
</td>
</tr>

<tr>
<td>Name of Book*</td>
<td><input type="text" name="bname" id="name"/></td>
<script type="text/javascript">
var f11 = new LiveValidation('name');
f11.add( Validate.Length, { minimum: 2 } );
</script>
</tr>
<tr>
<td>Name of Author*</td>
<td>
<select name="authordd" id="authordd" onchange="fillAuthor()">
<option value=""></option>
<?php 
$sqlc=createSQL();
$sqlda=mysql_query("SELECT DISTINCT author FROM books",$sqlc);
while($item=mysql_fetch_array($sqlda)){
echo "<option value=".$item[0]."> ".$item[0]." </option>";
} ?>
</select>
<input type="text" name="author" id="author"/>
</td>
</tr>
<script type="text/javascript">
var f20 = new LiveValidation('author');
f20.add( Validate.Length, { minimum: 4 } );
</script>
<tr>
<td>Name of Publisher*</td>
<td>
<select name="publisherdd" id="publisherdd" onchange="fillPublisher()">
<option value=""></option>
<?php 
$sqlc=createSQL();
$sqlda=mysql_query("SELECT DISTINCT publisher FROM books",$sqlc);
while($item=mysql_fetch_array($sqlda)){
echo "<option value=".$item[0]."> ".$item[0]." </option>";
} ?>
</select>
<input type="text" name="publisher" id="publisher"/></td>
</tr>
<script type="text/javascript">
var f12 = new LiveValidation('publisher');
f12.add( Validate.Length, { minimum: 4 } );
</script>

<tr>
<td>Upload Image*</td>
<td>
<input type="file" name="file" id="file" />
</td>
</tr>


<tr>
<td>Description*</td>
<td>

<textarea rows="5" cols="50" name="description" id="f25" wrap="physical"></textarea>

</td>

</tr>
<script type="text/javascript">
var f25 = new LiveValidation('25');
f25.add( Validate.Length, { minimum: 15 } );
</script>
<tr>
<td>Stock Available*</td>
<td><input type="text" name="stock" id="stock"></td>
</tr>
<script type="text/javascript">
var f28 = new LiveValidation('stock');
f28.add( Validate.Length, { minimum: 1 } );
f28.add( Validate.Numericality, { onlyInteger: true } );
</script>
<tr>
<td>Unit Price*</td>
<td><input type="text" name="price" id="price"></td>
</tr>
<script type="text/javascript">
var f31 = new LiveValidation('price');
f31.add( Validate.Length, { minimum: 1 } );
f31.add( Validate.Numericality, { onlyDecimal: true } );
</script>

</tbody>


<tfoot>
<tr> <td></td><td align="right">
<input type="submit" value="Add Book" /></td>
</tr>
</tfoot>

</table>
</form>
</div>

</div>

<?php 

showFooter();

?>

</body>
</html>