<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connschoola = "localhost";
$database_connschoola = "schoola";
$username_connschoola = "web";
$password_connschoola = "";
$connschoola = mysql_pconnect($hostname_connschoola, $username_connschoola, $password_connschoola) or die(mysql_error());
?>