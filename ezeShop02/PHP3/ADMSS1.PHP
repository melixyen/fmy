<?php session_start(); ?>
<?php require ("admcheck.php");?> 

<?php
if(!isset($admgo))
$admgo="admok";

session_register("admgo");

?>
<a href="admshop.php">�q�L</a>