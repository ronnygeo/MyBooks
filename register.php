<?php session_start();
require("functions.php");
pageheader();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="scripts/php_ajax_framework.js"></script>
<script type="text/javascript" src="scripts/livevalidation.js"></script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<title>Register</title>

<link rel="stylesheet" href="styles/tables.css" type="text/css" />
<link rel="stylesheet" href="captcha/captcha.css" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="scripts/jquery-ui.min.js"></script>
<script type="text/javascript" src="captcha/jquery.captcha.js"></script>
<script type="text/javascript" charset="utf-8">
		$(function() {
		$(".ajax-fc-container").captcha({formId: "register"});
		 });
 </script>

<script type="text/javascript">

function valFull(){
	f=0;
	 if (document. getElementById("f1").value=="")
f=1;
if(document. getElementById("uname").value=="")
f=1;
if (document. getElementById("f12").value=="")
f=1;
if(document. getElementById("f40").value=="")
f=1;
if(document. getElementById("f30").value=="")
f=1;
if(document. getElementById("dob").value=="")
f=1;
if(document. getElementById("f25").value=="")
f=1;
if(document. getElementById("country").value=="")
f=1;
if(document. getElementById("tel").value=="")
f=1;
if(document. getElementById("result").innerText=="Username Taken")
f=1;

if(f==0)
return true;
else
return false;

	 }
</script>

<script type="text/javascript">
	
   $(function(){
	   $('#uname').keyup(function(){
		   var inpval=$('#uname').val();
		   $.ajax({
                type: 'POST',
                data: ({p : inpval}),
                url: 'username_exists.php',
                success: function(data) {
                     $('#result').html(data);
          }
        });
		
	   });
   });
</script>

 
<script type="text/javascript">
function chkuser_init() {
  //retrieve username from html input box with the id "name_box"
  var username = document.getElementById('uname');
  var script = 'username_exists.php';
  var queryString = "?username=" + username;
  return script + queryString;
}

function chkuser_ajax(results) {
  var targetDiv = document.getElementById('result');
  var resultHTML=results;
  targetDiv.innerHTML = resultHTML;
}

function chkuser() {
  var user_field = document.getElementById('uname');
  if (user_field.value.length > 0) {
    //call our AJAX function in the PHP AJAX Framework
    ajaxHelper('check_username');
  }
  else {
    //clear results field 
    var results_div = document.getElementById('result');
    results_div.innerHTML = '';
  }
}
</script>
</head>

<body>
 
<div id="wrapper">
		<div id="header" class="container">
	<?php siteName();
	showMenu(0);
	?>
		</div>


<div id="regpage">
<div class="post">

<!--<div id="container" style="background-color:#FFFFFF; width:700px; opacity:.8; padding:20px;">
-->
<p>Welcome to My Books Inc. </p>
 <p>Please register to get full access.. Please enter all the required details..</p>
</div>

<div style="background-color:#CCC;">
<form action="process.php" name="register" id="register" method="post" onsubmit="return valFull();">
<table width="70%" bgcolor="#EEEEEE" bordercolor="#CCCCCC" border="1px dotted" style="text-align:left">
<tr><th width="30%"> Details</th> <th width="70%">Input </th></tr>
<tr> <td> Enter your Full name*</td><td>
<input type="text" name="fname" id="f1" />
<script type="text/javascript">
		            var f1 = new LiveValidation('f1');
		            f1.add(Validate.Length, { minimum: 8 } );
		          </script></td></tr>
<tr>
  <td>Enter desired Username*</td><td>
 <input type="text" name="uname" id="uname" onkeyup="chkuser();" /><div style="display:inline" id="result"></div>
<script type="text/javascript">
		            var user = new LiveValidation('user');
		            user.add(Validate.Length, { minimum: 5 } );
					
		          </script>  </td></tr>
 </td></tr>
<tr>
  <td>Enter password*</td><td>
<input type="password" name="password" id="f12" />
<script type="text/javascript">
		            var f12 = new LiveValidation('f12');
		            f12.add(Validate.Length, { minimum: 5 } );
		          </script>  </td></tr>
<tr>
<tr>
  <td>Confirm password*</td><td>
<input type="password" name="cpassword" id="f40" />
<script type="text/javascript">
var e2 = new LiveValidation('f40');
e2.add( Validate.Confirmation, { match: 'f12' } );</script> </td></tr>
<tr>
  <td>Enter your Email*</td><td>
 <input type="text" name="email" id="f30" /></td></tr>
 <script type="text/javascript">
var f20 = new LiveValidation('f30');
f20.add( Validate.Email );
</script>


    <td> Enter your Date of Birth* (yyyymmdd)</td><td>
<input type="text" name="dob" id="dob" /></td></tr>
<script type="text/javascript">
var f27 = new LiveValidation('dob');
f27.add( Validate.Length, { is: 8 } );

f27.add( Validate.Numericality, { onlyInteger: true } );
</script>
<tr> <td>Enter your Shipping Address*</td><td><textarea rows="5" cols="50" name="address" id="f25" wrap="physical"></textarea><script type="text/javascript">
var f25 = new LiveValidation('f25');
 f25.add(Validate.Length, { minimum: 10 } );
</script></td></tr>
<tr> <td>Enter your Country*</td><td><input type="text" name="country" id="country" value="United Arab Emirates"  /><script type="text/javascript">
var f43 = new LiveValidation('country');
 f43.add(Validate.Length, { minimum: 5 } );
</script></td></tr>
<tr><td>Contact Number*</td><td><input type="text" name="tel" id="tel" /><script type="text/javascript">
var e2 = new LiveValidation('tel');
 e2.add(Validate.Length, { minimum: 5 } );
e2.add( Validate.Numericality, { onlyInteger: true } );
</script></td></tr>
<tr><td>Are you a human*? </td><td>

<!-- Begin of captcha -->
<div class="ajax-fc-container"></div><span><?php
if(isset($_SESSION['cstat'])){
	unset($_SESSION['cstat']);
	}
?></span>
<!-- End of captcha --></td></tr>
<tr><td></td><td>
<!--input id="submit" type="submit" name="submit" value="Register" /-->
<input type="image" src="images/register.png" width="100px" alt="Register" style="width:100px; height:40px;padding: 0px;" /></td></tr>
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