<?php
session_start();

if(isset($_SESSION["Sbb"])){$Sbb = $_SESSION["Sbb"];}else{$Sbb = []; }
if(isset($_SESSION["Sbq"])){$Sbq = $_SESSION["Sbq"];}else{$Sbq = []; }
if(isset($_SESSION["Stk"])){$Stk = $_SESSION["Stk"];}
if(isset($_SESSION["Snn"])){$Snn = $_SESSION["Snn"];}else{$Snn = []; }
if(!isset($Stk)){
    $Stk=0;
}

// $_SESSION["Sbq"] = $GLOBALS["Sbq"];
// $_SESSION["Stk"] = $GLOBALS["Stk"];
// $_SESSION["Snn"] = $GLOBALS["Snn"];

$Sbb[$Stk]=$_POST['Shopid'];
$Snn[$Stk]=$_POST['Prdname'];
$Sbq[$Stk]=$_POST['mabq'];

$_SESSION["Sbb"] = $Sbb;
$_SESSION["Sbq"] = $Sbq;
$_SESSION["Snn"] = $Snn;
//session_register("Sbb","Sbq","Stk","Snn");
$Stk=$Stk+1;
$_SESSION["Stk"] = $Stk;


header("Location:shop1.php");
exit;

?>



