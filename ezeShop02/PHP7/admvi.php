<?php require ("admcheck.php");?> 
<?php require_once('Connections/connschoola.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsTb1 = 10;
$pageNum_rsTb1 = 0;
if (isset($_GET['pageNum_rsTb1'])) {
  $pageNum_rsTb1 = $_GET['pageNum_rsTb1'];
}
$startRow_rsTb1 = $pageNum_rsTb1 * $maxRows_rsTb1;

mysql_select_db($database_connschoola, $connschoola);
$query_rsTb1 = "SELECT * FROM tbpeople";
$query_limit_rsTb1 = sprintf("%s LIMIT %d, %d", $query_rsTb1, $startRow_rsTb1, $maxRows_rsTb1);
$rsTb1 = mysql_query($query_limit_rsTb1, $connschoola) or die(mysql_error());
$row_rsTb1 = mysql_fetch_assoc($rsTb1);

if (isset($_GET['totalRows_rsTb1'])) {
  $totalRows_rsTb1 = $_GET['totalRows_rsTb1'];
} else {
  $all_rsTb1 = mysql_query($query_rsTb1);
  $totalRows_rsTb1 = mysql_num_rows($all_rsTb1);
}
$totalPages_rsTb1 = ceil($totalRows_rsTb1/$maxRows_rsTb1)-1;

$queryString_rsTb1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsTb1") == false && 
        stristr($param, "totalRows_rsTb1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsTb1 = "&" . implode("&", $newParams);
  }
}
$queryString_rsTb1 = sprintf("&totalRows_rsTb1=%d%s", $totalRows_rsTb1, $queryString_rsTb1);
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>瀏覽使用者</title>
</head>

<body>
<table border="0" cellpadding="1" cellspacing="1">
  <tr bgcolor="#CCCCFF"> 
    <td>編號</td>
    <td>姓名</td>
    <td>帳號</td>
    <td>電話</td>
    <td>地址</td>
    <td>Email</td>
    <td>密碼</td>
  </tr>
  <? $i = 0 ?>
  <?php do{ 
  $i+=1;
  if ($i % 2 == 0){
  $P="CCFFCC";
  }else{
  $P="CCFFFF";
  }
  ?>
  
  <tr bgcolor="#<?php echo $P; ?>"> 
    <td><?php echo $row_rsTb1['ID']; ?></td>
    <td width="80"><?php echo $row_rsTb1['Username']; ?></td>
    <td width="80"><?php echo $row_rsTb1['Userid']; ?></td>
    <td width="100"><?php echo $row_rsTb1['Telephone']; ?></td>
    <td width="200"><?php echo $row_rsTb1['Address']; ?></td>
    <td width="160"><?php echo $row_rsTb1['Email']; ?></td>
    <td width="80"><?php echo $row_rsTb1['Userpwd']; ?></td>
  </tr>
  
  <?php } while ($row_rsTb1 = mysql_fetch_assoc($rsTb1)); ?>
</table>
<p>版權<font color="#99FFFF"> Copyleft</font> <font color="#CCFFCC">GNU GPL 2003/04/20</font> 
</p>
<p>&nbsp; 記錄 <?php echo ($startRow_rsTb1 + 1) ?> 到 <?php echo min($startRow_rsTb1 + $maxRows_rsTb1, $totalRows_rsTb1) ?> 總共有 <?php echo $totalRows_rsTb1 ?> &nbsp;位使用者
<table border="0" width="58%" align="center">
  <tr> 
    <td width="23%" align="center"> <?php if ($pageNum_rsTb1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_rsTb1=%d%s", $currentPage, 0, $queryString_rsTb1); ?>">第一頁</a> 
      <?php } // Show if not first page ?> </td>
    <td width="23%" align="center"> <?php if ($pageNum_rsTb1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_rsTb1=%d%s", $currentPage, max(0, $pageNum_rsTb1 - 1), $queryString_rsTb1); ?>">上一頁</a> 
      <?php } // Show if not first page ?> </td>
    <td width="23%" align="center"> <?php if ($pageNum_rsTb1 < $totalPages_rsTb1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_rsTb1=%d%s", $currentPage, min($totalPages_rsTb1, $pageNum_rsTb1 + 1), $queryString_rsTb1); ?>">下一頁</a> 
      <?php } // Show if not last page ?> </td>
    <td width="23%" align="center"> <?php if ($pageNum_rsTb1 < $totalPages_rsTb1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_rsTb1=%d%s", $currentPage, $totalPages_rsTb1, $queryString_rsTb1); ?>">最後一頁</a> 
      <?php } // Show if not last page ?> </td>

     <td width="8%" align="center"> 
     <A href="admshop.php">H</A>
     </td>
  </tr>
</table></p>
</body>
</html>
<?php
mysql_free_result($rsTb1);
?>

