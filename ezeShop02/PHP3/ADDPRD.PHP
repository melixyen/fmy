 
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

$editFormAction = $HTTP_SERVER_VARS['PHP_SELF'];
if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
  $editFormAction .= "?" . $HTTP_SERVER_VARS['QUERY_STRING'];
}

if ((isset($HTTP_POST_VARS["MM_insert"])) && ($HTTP_POST_VARS["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tbshop (Prdname, Prdprice, Prdmany, Prdtype, Prdtext, Prdpic) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($HTTP_POST_VARS['Prdname'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['Prdprice'], "int"),
                       GetSQLValueString($HTTP_POST_VARS['Prdmany'], "int"),
                       GetSQLValueString($HTTP_POST_VARS['Prdtype'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['Prdtext'], "text"),
                       GetSQLValueString($HTTP_POST_VARS['Prdpic'], "text"));

  mysql_select_db($database_connschoola, $connschoola);
  $Result1 = mysql_query($insertSQL, $connschoola) or die(mysql_error());

  $insertGoTo = "admshop.php";
  if (isset($HTTP_SERVER_VARS['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $HTTP_SERVER_VARS['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>加入商品</title>
</head>

<body>
<form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline"> 
      <td nowrap align="right">產品名稱</td>
      <td><input type="text" name="Prdname" value="" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">價格</td>
      <td><input type="text" name="Prdprice" value="" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">數量</td>
      <td><input type="text" name="Prdmany" value="" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">類別</td>
      <td><input type="text" name="Prdtype" value="" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">註</td>
      <td><input type="text" name="Prdtext" value="" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">圖片</td>
      <td><input type="text" name="Prdpic" value="" size="32"></td>
    </tr>
    <tr valign="baseline"> 
      <td nowrap align="right">&nbsp;</td>
      <td><input name="submit" type="submit" id="submit" value="插入記錄">
        <input name="Clear" type="reset" id="Clear" value="清除"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
<p>&nbsp;</p>
  

</body>
</html>
