<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Processing Payment</title>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Abel|Satisfy' rel='stylesheet' type='text/css' />
<link rel="stylesheet" type="text/css" href="styles/main.css" />
<?php 
$code=1;
$url="payresult.php?status=".$code;
header("refresh: 4;$url");
$amt=$_POST['amt'];
?>

</head>

<body>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>

<div style="background-color:#FFC; width:200px;height:100px; margin:auto;text-align:center; font-size:14px">
<p>Total amount to pay: AED&nbsp;<?php  echo $amt;?></p>
<p>Forwarding you to the payment portal... Please wait.....</p>
<p>&nbsp;</p>

This page simulates a payment gateway..

</div>
</body>
</html>