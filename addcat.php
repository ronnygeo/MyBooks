<?php session_start();
require("functions.php");
$url="bookman.php";
header("Location: $url");
$cat=$_POST['cat'];
if($_SESSION['admin']==1)
{
	//echo $cat;
	
	$xml = simplexml_load_file("category.xml");
	//echo $xml->getName() . "<br>";

	$xml->addChild("category", "$cat");
	echo $xml->asXml('category.xml');
	echo "<select name='category'>";
foreach($xml->children() as $child)
  {
  echo "<option value='".$child."'> ".$child." </option>";
  }
	echo "</select>";
	
	$_SESSION['catstat']=1;
	}
else
{
	echo "Please no hacking...";	// if a non admin user tries to change
	}

?>

