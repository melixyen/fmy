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

if ((isset($_GET['dID'])) && ($_GET['dID'] != "")) {
  $deleteSQL = sprintf("DELETE FROM tbpeople WHERE ID=%s",
                       GetSQLValueString($_GET['dID'], "int"));

  mysql_select_db($database_connschoola, $connschoola);
  $Result1 = mysql_query($deleteSQL, $connschoola) or die(mysql_error());

  $deleteGoTo = "admvp.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$colname_rsTb3 = "1";
if (isset($_GET['dID'])) {
  $colname_rsTb3 = (get_magic_quotes_gpc()) ? $_GET['dID'] : addslashes($_GET['dID']);
}
mysql_select_db($database_connschoola, $connschoola);
$query_rsTb3 = sprintf("SELECT * FROM tbpeople WHERE ID = %s", $colname_rsTb3);
$rsTb3 = mysql_query($query_rsTb3, $connschoola) or die(mysql_error());
$row_rsTb3 = mysql_fetch_assoc($rsTb3);
$totalRows_rsTb3 = mysql_num_rows($rsTb3);
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
mysql_free_result($rsTb3);
?>

