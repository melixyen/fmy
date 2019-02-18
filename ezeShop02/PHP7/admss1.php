<?php session_start(); ?>
<?php
if(isset($_GET['logoutadmin'])){
    $_SESSION["admgo"] = NULL;
    $GLOBALS["admgo"] = NULL;
    echo '<a href="index.php">已登出，回到首頁</a>';
    exit();
    
}
$admid = $_POST['admid'];
$admpwd = $_POST['admpwd'];
?>
<?php require ("admcheck.php");?> 

<?php
if(!isset($admgo))
$admgo="admok";

$_SESSION["admgo"] = $GLOBALS["admgo"];

?>
<a href="admshop.php">通過</a>