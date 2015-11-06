<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adding new Book..</title>
<?php 
header('refresh: 5;bookman.php');
require("functions.php");
require("imageconv.php");
pageheader();
?>
</head>

<body>

<div class="wrapper col1">
<div id="header">

<?php siteName();?>
   
<?php showMenu(0); ?>

</div>
 <br class="clear" />
  <br class="clear" />
</div>



<div class="wrapper col2">
<div id="container" style="background-color:#FFFFFF; width:700px; margin:auto; opacity:.8; padding:20px;">

<p>Hello.... Welcome to My Books Inc. </p>

<p> Processing request... </p>

<?php 

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Image error: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
//    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
 //   echo "Type: " . $_FILES["file"]["type"] . "<br />";
 //   echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
 //   echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("images/temp/" . $_FILES["file"]["name"]))
      {
//      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "images/temp/" . $_FILES["file"]["name"]);
     // echo "Stored in: " . "images/temp/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid Image";
  }

$sql_conn=createSQL();
$qry="SELECT max(bookid) from books";
$sqldata=mysql_query($qry,$sql_conn);
$row=mysql_fetch_array($sqldata);
$row[0]++;
$did=$row[0];


$img="images/temp/".$_FILES["file"]["name"];
$image=new SimpleImage();
$image->load($img);
$image->resizeToHeight(400);
$imgloc="images/books/book".$did.".jpg";
$image->save($imgloc);



$image=new SimpleImage();
$image->load($imgloc);
$image->resize(240,170);
$thloc="images/books/thumbs/thumb".$did.".jpg";
$image->save($thloc);


$qry="INSERT INTO books(name,author,category,publisher,description,bookpic,bookthpic,stock,uprice) VALUES ('$_POST[bname]','$_POST[author]','$_POST[category]','$_POST[publisher]','$_POST[description]','$imgloc','$thloc','$_POST[stock]','$_POST[price]')";

if (!mysql_query($qry,$sql_conn))
{
	die ('Error: '.mysql_error());
	}
	
echo "Book Added Successfully...
<BR /><BR />
<p>You will  forwarded to the Book Manager shortly..</p>
";



mysql_close($sql_conn);

?>

</div>
</div>
<?php showfooter();?>

</body>
</html>