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

if ((isset($_GET['Shopid'])) && ($_GET['Shopid'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tbshop WHERE Shopid=%s",
                       GetSQLValueString($_GET['Shopid'], "int"));

  mysql_select_db($database_connschoola, $connschoola);
  $Result1 = mysql_query($deleteSQL, $connschoola) or die(mysql_error());

  $deleteGoTo = "admsdprd.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_rsTbs4a = "1";
if (isset($_GET['Shopid'])) {
  $colname_rsTbs4a = (get_magic_quotes_gpc()) ? $_GET['Shopid'] : addslashes($_GET['Shopid']);
}
mysql_select_db($database_connschoola, $connschoola);
$query_rsTbs4a = sprintf("SELECT * FROM tbshop WHERE Shopid = %s", $colname_rsTbs4a);
$rsTbs4a = mysql_query($query_rsTbs4a, $connschoola) or die(mysql_error());
$row_rsTbs4a = mysql_fetch_assoc($rsTbs4a);
$totalRows_rsTbs4a = mysql_num_rows($rsTbs4a);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>無標題文件</title>
</head>

<body>
</body>
</html>
<?php
mysql_free_result($rsTbs4a);
?>

