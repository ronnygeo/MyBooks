<script type="text/javascript" src="scripts/php_ajax_framework.js"></script>
<?php
require("functions.php");
$username = trim($_POST['p']);
if (usernameExists($username)) {
  echo '<span style="color:red";>Username Taken</span>';
}
else {
  echo '<span style="color:green;">Username Available</span>';
}
  
function usernameExists($input) {

		$sql_conn=createSQL();
	$qry="SELECT username FROM users";
	$sqldata=mysql_query($qry,$sql_conn);
	$users = array();
while ($row = mysql_fetch_array($sqldata)) {
    array_push($users, $row['username']);
}

 mysql_close($sql_conn);
   
  if (in_array($input, $users)) {
    return true;
  }
  else {
    return false;
  }
}


?>
