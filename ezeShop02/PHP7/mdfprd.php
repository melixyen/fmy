<?php require_once('Connections/connschoola.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . $_SERVER['QUERY_STRING'];
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tbshop SET Prdname=%s, Prdprice=%s, Prdmany=%s, Prdtype=%s, Prdtext=%s, Prdpic=%s WHERE Shopid=%s",
                       GetSQLValueString($_POST['Prdname'], "text"),
                       GetSQLValueString($_POST['Prdprice'], "int"),
                       GetSQLValueString($_POST['Prdmany'], "int"),
                       GetSQLValueString($_POST['Prdtype'], "text"),
                       GetSQLValueString($_POST['Prdtext'], "text"),
                       GetSQLValueString($_POST['Prdpic'], "text"),
                       GetSQLValueString($_POST['Shopid'], "int"));

  mysql_select_db($database_connschoola, $connschoola);
  $Result1 = mysql_query($updateSQL, $connschoola) or die(mysql_error());

  $updateGoTo = "admshop.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsTbs4 = "1";
if (isset($_GET['Shopid'])) {
  $colname_rsTbs4 = (get_magic_quotes_gpc()) ? $_GET['Shopid'] : addslashes($_GET['Shopid']);
}
mysql_select_db($database_connschoola, $connschoola);
$query_rsTbs4 = sprintf("SELECT * FROM tbshop WHERE Shopid = %s", $colname_rsTbs4);
$rsTbs4 = mysql_query($query_rsTbs4, $connschoola) or die(mysql_error());
$row_rsTbs4 = mysql_fetch_assoc($rsTbs4);
$totalRows_rsTbs4 = mysql_num_rows($rsTbs4);
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>修改商品</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="POST" name="form1">
  <table align="center">
    <tr valign="baseline"> 
      <td nowrap align="right">產品名稱</td>
      <td><input type="text" name="Prdname" value="<?php echo $row_rsTbs4['Prdname']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">價格</td>
      <td><input type="text" name="Prdprice" value="<?php echo $row_rsTbs4['Prdprice']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">數量</td>
      <td><input type="text" name="Prdmany" value="<?php echo $row_rsTbs4['Prdmany']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">類別</td>
      <td><input type="text" name="Prdtype" value="<?php echo $row_rsTbs4['Prdtype']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">註</td>
      <td><input type="text" name="Prdtext" value="<?php echo $row_rsTbs4['Prdtext']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">圖片</td>
      <td><input type="text" name="Prdpic" value="<?php echo $row_rsTbs4['Prdpic']; ?>" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">&nbsp;</td>
      <td><input name="submit" type="submit" id="submit" value="修改記錄"> <input name="Clear" type="reset" id="Clear" value="清除"></td>
    </tr>
  </table>
  <input name="Shopid" type="hidden" id="Shopid" value="<?php echo $row_rsTbs4['Shopid']; ?>">
  <input type="hidden" name="MM_update" value="form1">
</form>
<p>&nbsp;</p>
  

</body>
</html>
<?php
mysql_free_result($rsTbs4);
?>

