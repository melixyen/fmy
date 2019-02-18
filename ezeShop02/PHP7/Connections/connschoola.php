<?php require_once('Connections/php7mysql_pconnect.php'); ?>
<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connschoola = "localhost";
$database_connschoola = "schoola";
$username_connschoola = "web";
$password_connschoola = "abc";
//$connschoola = mysql_pconnect($hostname_connschoola, $username_connschoola, $password_connschoola) or die(mysql_error()); # This is for PHP 3 
$connschoola = mysql_p2connect($hostname_connschoola, $username_connschoola, $password_connschoola, $database_connschoola) or die(mysql_error()); # This is for PHP 7
?>