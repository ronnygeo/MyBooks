<?php session_start();
require("functions.php");
pageheader();
$sqlc=createSQL();
$qry="SELECT * FROM users WHERE userid=".$_SESSION['uid'];
$sqldata=mysql_query($qry,$sqlc);
$row=mysql_fetch_array($sqldata);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="scripts/livevalidation.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>Edit Profile</title>

<link rel="stylesheet" href="styles/tables.css" type="text/css" />

<script type="text/javascript">
function valFull(){
	f=0;
	 if (document. getElementById("f1").value=="")
f=1;
if(document. getElementById("f30").value=="")
f=1;
if(document. getElementById("dob").value=="")
f=1;
if(document. getElementById("f25").value=="")
f=1;
if(document. getElementById("country").value=="")
f=1;
if(document. getElementById("e2").value=="")
f=1;

if(f==0)
return true;
else
return false;

	 }
</script>
      
      <script type="text/javascript" src="scripts/jquery-1.4.3.min.js"></script>
</head>

<body>
 
<div id="wrapper">
		<div id="header" class="container">
	<?php siteName();
	showMenu(6);
	?>
		</div>


<div id="regpage">
<div class="post">

<!--<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">
-->
<p>Welcome to My Books Inc. </p>
 <p>You can edit your profile from here.. </p>
</div>

<div style="background-color:#CCC;">
<form action="editpropr.php" name="editprofile" method="post" onsubmit="return valFull();">
<table width="70%" bordercolor="#CCCCCC" border="1px dotted" style="text-align:left">
<tr><th width="30%"> Details</th> <th width="70%">Input </th></tr>
<tr> <td> Full name* </td><td>
<input type="text" name="fname" value='<?php echo $row['fullname'] ?>' id="f1" />
<script type="text/javascript">
		            var f1 = new LiveValidation('f1');
		            f1.add(Validate.Length, { minimum: 8 } );
		          </script></td></tr>
<tr>
  <td>Email* </td><td>
 <input type="text" name="email" value='<?php echo $row['email'] ?>' id="f30" /></td></tr>
 <script type="text/javascript">
var f20 = new LiveValidation('f30');
f20.add( Validate.Email );
</script>


    <td> Date of Birth* (yyyymmdd)</td><td>
<input type="text" name="dob" id="dob" value='<?php echo $row['dob'] ?>' /></td></tr>
<script type="text/javascript">
var f27 = new LiveValidation('dob');
f27.add( Validate.Length, { is: 10 } );

</script>
<tr> <td>Shipping Address*</td><td><textarea rows="5" cols="50" name="address" id="f25" wrap="physical"><?php echo $row['address'] ?></textarea><script type="text/javascript">
var f25 = new LiveValidation('f25');
 f25.add(Validate.Length, { minimum: 10 } );
</script></td></tr>
<tr> <td>Country*</td><td><input type="text" name="country" id="country" value='<?php echo $row['country'] ?>'  /><script type="text/javascript">
var f43 = new LiveValidation('country');
 f43.add(Validate.Length, { minimum: 5 } );
</script></td></tr>
<tr><td>Contact Number*</td><td><input type="text" name="tel" value='<?php echo $row['tel'] ?>' id="e2" /><script type="text/javascript">
var e2 = new LiveValidation('e2');
 fe2.add(Validate.Length, { minimum: 5 } );
fe2.add( Validate.Numericality, { onlyInteger: true } );
</script></td></tr>
<tr><td></td><td><input type="submit" value="Update" /></td></tr>
</table>

</form>
<BR class="clear" />
</div>
<BR class="clear" />
</div>

<BR class="clear" />
</div>
<?php showFooter();?>
</body>
</html>