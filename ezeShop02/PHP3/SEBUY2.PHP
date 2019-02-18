<?php
session_start();
if(!isset($Stk))
$Stk=0;


$Sbb[$Stk]=$Shopid;
$Snn[$Stk]=$Prdname;
$Sbq[$Stk]=$mabq;
$Stk=$Stk+1;

session_register("Sbb","Sbq","Stk","Snn");


header("Location:shop1.php");
exit;

?>



