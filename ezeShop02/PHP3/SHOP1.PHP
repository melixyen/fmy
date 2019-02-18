<?php require_once('Connections/connschoola.php'); ?>
<?php
$currentPage = $HTTP_SERVER_VARS["PHP_SELF"];

$maxRows_rsTb1 = 10;
$pageNum_rsTb1 = 0;
if (isset($HTTP_GET_VARS['pageNum_rsTb1'])) {
  $pageNum_rsTb1 = $HTTP_GET_VARS['pageNum_rsTb1'];
}
$startRow_rsTb1 = $pageNum_rsTb1 * $maxRows_rsTb1;

mysql_select_db($database_connschoola, $connschoola);
$query_rsTb1 = "SELECT * FROM tbshop";
$query_limit_rsTb1 = sprintf("%s LIMIT %d, %d", $query_rsTb1, $startRow_rsTb1, $maxRows_rsTb1);
$rsTb1 = mysql_query($query_limit_rsTb1, $connschoola) or die(mysql_error());
$row_rsTb1 = mysql_fetch_assoc($rsTb1);

if (isset($HTTP_GET_VARS['totalRows_rsTb1'])) {
  $totalRows_rsTb1 = $HTTP_GET_VARS['totalRows_rsTb1'];
} else {
  $all_rsTb1 = mysql_query($query_rsTb1);
  $totalRows_rsTb1 = mysql_num_rows($all_rsTb1);
}
$totalPages_rsTb1 = ceil($totalRows_rsTb1/$maxRows_rsTb1)-1;

$queryString_rsTb1 = "";
if (!empty($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $params = explode("&", $HTTP_SERVER_VARS['QUERY_STRING']);
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
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>選擇商品</title>
</head>

<body>
<table border="0" cellpadding="1" cellspacing="1">
  <tr bgcolor="#CCCCFF"> 
    <td height="19">NO.</td>
    <td>名稱</td>
    <td>價格</td>
    <td>庫存</td>
    <td>類別</td>
    <td>其他</td>
    <td>&nbsp;</td>
    <td>選購</td>
  </tr>
  <? $i = 0 ?>
  <?php do { 
  $i+=1;
  if ($i % 2 == 0){
  $P="CCFFCC";
  }else{
  $P="CCFFFF";
  }
  ?>
  <tr bgcolor="#<?php echo $P; ?>"> 
    <td><?php echo $row_rsTb1['Shopid']; ?></td>
    <td><?php echo $row_rsTb1['Prdname']; ?></td>
    <td><?php echo $row_rsTb1['Prdprice']; ?></td>
    <td><?php echo $row_rsTb1['Prdmany']; ?></td>
    <td><?php echo $row_rsTb1['Prdtype']; ?></td>
    <td><?php echo $row_rsTb1['Prdtext']; ?></td>
    <td><?php echo $row_rsTb1['Prdpic']; ?></td>
    <td width="90"><a href="sebuy.php?Shopid=<?php echo $row_rsTb1['Shopid']; ?>&Prdname=<?php echo $row_rsTb1['Prdname']; ?>">放入購物車</a></td> 
    
  </tr>
  <?php } while ($row_rsTb1 = mysql_fetch_assoc($rsTb1)); ?>
</table>
<p>&nbsp; 商品<?php echo ($startRow_rsTb1 + 1) ?> 到 <?php echo min($startRow_rsTb1 + $maxRows_rsTb1, $totalRows_rsTb1) ?> 
  共 <?php echo $totalRows_rsTb1 ?> 種產品 
<form name="form2" method="post" action="shopcar.php">
  <input type="submit" name="Submit" value="結帳">
  <a href="shopcar2.php" target="_blank">E</a> 第一次使用購物車結帳可能有問題請重新放產品進入購物車 
</form>
<table border="0" width="50%" align="center">
  <tr> 
    <td width="23%" align="center"> 
      <?php if ($pageNum_rsTb1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_rsTb1=%d%s", $currentPage, 0, $queryString_rsTb1); ?>">第一頁</a> 
      <?php } // Show if not first page ?>
    </td>
    <td width="31%" align="center"> 
      <?php if ($pageNum_rsTb1 > 0) { // Show if not first page ?>
      <a href="<?php printf("%s?pageNum_rsTb1=%d%s", $currentPage, max(0, $pageNum_rsTb1 - 1), $queryString_rsTb1); ?>">上一頁</a> 
      <?php } // Show if not first page ?>
    </td>
    <td width="23%" align="center"> 
      <?php if ($pageNum_rsTb1 < $totalPages_rsTb1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_rsTb1=%d%s", $currentPage, min($totalPages_rsTb1, $pageNum_rsTb1 + 1), $queryString_rsTb1); ?>">下一頁</a> 
      <?php } // Show if not last page ?>
    </td>
    <td width="23%" align="center"> 
      <?php if ($pageNum_rsTb1 < $totalPages_rsTb1) { // Show if not last page ?>
      <a href="<?php printf("%s?pageNum_rsTb1=%d%s", $currentPage, $totalPages_rsTb1, $queryString_rsTb1); ?>">最後一頁</a> 
      <?php } // Show if not last page ?>
    </td>
  </tr>
</table></p>
</body>
</html>
<?php
mysql_free_result($rsTb1);
?>

