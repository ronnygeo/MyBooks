<?php header("Location: index.php");
        error_reporting(0);
    $uid=$_SESSION['uid'];
//echo $uid;
    $_SESSION = array();
	session_destroy();
	
/*$sqlc=createSQL();
$qry="DELETE FROM cart WHERE userid='".$uid."'";

if (!mysql_query($qry,$sqlc))
{
	die ('Error: '.mysql_error());
}

mysql_close();*/

echo "Logged out successfully";
?>


