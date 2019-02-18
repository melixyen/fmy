<?php require ("admcheck.php");?> 
<?php require_once('Connections/connschoola.php'); ?>
<?php
$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rstd1 = 20;
$pageNum_rstd1 = 0;
if (isset($_GET['pageNum_rstd1'])) {
  $pageNum_rstd1 = $_GET['pageNum_rstd1'];
}
$startRow_rstd1 = $pageNum_rstd1 * $maxRows_rstd1;

mysql_select_db($database_connschoola, $connschoola);
$query_rstd1 = "SELECT * FROM tbsell WHERE Do = 'NO'";
$query_limit_rstd1 = sprintf("%s LIMIT %d, %d", $query_rstd1, $startRow_rstd1, $maxRows_rstd1);
$rstd1 = mysql_query($query_limit_rstd1, $connschoola) or die(mysql_error());
$row_rstd1 = mysql_fetch_assoc($rstd1);

if (isset($_GET['totalRows_rstd1'])) {
  $totalRows_rstd1 = $_GET['totalRows_rstd1'];
} else {
  $all_rstd1 = mysql_query($query_rstd1);
  $totalRows_rstd1 = mysql_num_rows($all_rstd1);
}
$totalPages_rstd1 = ceil($totalRows_rstd1/$maxRows_rstd1)-1;

$queryString_rstd1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rstd1") == false && 
        stristr($param, "totalRows_rstd1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rstd1 = "&" . implode("&", $newParams);
  }
}
$queryString_rstd1 = sprintf("&totalRows_rstd1=%d%s", $totalRows_rstd1, $queryString_rstd1);
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>訂單出貨管理</title>
</head>

<body>
<table border="1" cellpadding="1" cellspacing="1">
  <tr> 
    <td width="40">訂單編號</td>
    <td width="80">帳號</td>
    <td width="30">產品編號</td>
    <td width="160">產品名稱</td>
    <td width="80">日期</td>
    <td width="30">訂購量</td>
    <td width="80">姓名</td>
    <td width="90">電話</td>
    <td width="170">地址</td>
    <td width="40">送出</td>
  </tr>
  <?php do { ?>
  <tr> 
    <td><?php echo $row_rstd1['Od']; ?></td>
    <td><?php echo $row_rstd1['Userid']; ?></td>
    <td><?php echo $row_rstd1['Shopid']; ?></td>
    <td><?php echo $row_rstd1['Prdname']; ?></td>
    <td><?php echo $row_rstd1['Date']; ?></td>
    <td><?php echo $row_rstd1['Prdsmany']; ?></td>
    <td><?php echo $row_rstd1['Username']; ?></td>
    <td><?php echo $row_rstd1['Telephone']; ?></td>
    <td><?php echo $row_rstd1['Address']; ?></td>
    <td><a href="ckover.php?Od=<?php echo $row_rstd1['Od']; ?>"><?php echo $row_rstd1['Do']; ?></a></td>
  </tr>
  <?php } while ($row_rstd1 = mysql_fetch_assoc($rstd1)); ?>
</table>


<p>&nbsp; 記錄 <?php echo ($startRow_rstd1 + 1) ?> 到 <?php echo min($startRow_rstd1 + $maxRows_rstd1, $totalRows_rstd1) ?> 共 <?php echo $totalRows_rstd1 ?>筆交易記錄</p>
<p>&nbsp; 
<table border="0" width="50%" align="center">
  <tr> 
    <td width="23%" align="center"> <?php if ($pageNum_rstd1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_rstd1=%d%s", $currentPage, 0, $queryString_rstd1); ?>">第一頁</a> 
      <?php } // Show if not first page ?> </td>
    <td width="31%" align="center"> <?php if ($pageNum_rstd1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_rstd1=%d%s", $currentPage, max(0, $pageNum_rstd1 - 1), $queryString_rstd1); ?>">上一頁</a> 
      <?php } // Show if not first page ?> </td>
    <td width="23%" align="center"> <?php if ($pageNum_rstd1 < $totalPages_rstd1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_rstd1=%d%s", $currentPage, min($totalPages_rstd1, $pageNum_rstd1 + 1), $queryString_rstd1); ?>">下一頁</a> 
      <?php } // Show if not last page ?> </td>
    <td width="23%" align="center"> <?php if ($pageNum_rstd1 < $totalPages_rstd1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_rstd1=%d%s", $currentPage, $totalPages_rstd1, $queryString_rstd1); ?>">最後一頁</a> 
      <?php } // Show if not last page ?> </td>
  </tr>
</table></p>
</body>
</html>
<?php
mysql_free_result($rstd1);
?>

