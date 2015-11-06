<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MySQL = "localhost";
$database_MySQL = "bookworld";
$username_MySQL = "spscw";
$password_MySQL = "phpcw";
$MySQL = mysql_pconnect($hostname_MySQL, $username_MySQL, $password_MySQL) or trigger_error(mysql_error(),E_USER_ERROR); 
?>