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
  $updateSQL = sprintf("UPDATE tbpeople SET Username=%s, Telephone=%s, Address=%s, Email=%s, Userpwd=%s WHERE ID=%s AND Userid=%s",
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString($_POST['Telephone'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Userpwd'], "text"),
                       GetSQLValueString($_POST['hiddenID'], "int"),
                       GetSQLValueString($_POST['hiddenUserID'], "text"));

  mysql_select_db($database_connschoola, $connschoola);
  $Result1 = mysql_query($updateSQL, $connschoola) or die(mysql_error());

  $updateGoTo = "mdfscu.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsTb2 = "1";
if (isset($_GET['mID'])) {
  $colname_rsTb2 = (get_magic_quotes_gpc()) ? $_GET['mID'] : addslashes($_GET['mID']);
}
mysql_select_db($database_connschoola, $connschoola);
$query_rsTb2 = sprintf("SELECT * FROM tbpeople WHERE ID = %s", $colname_rsTb2);
$rsTb2 = mysql_query($query_rsTb2, $connschoola) or die(mysql_error());
$row_rsTb2 = mysql_fetch_assoc($rsTb2);
$totalRows_rsTb2 = mysql_num_rows($rsTb2);
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>修改會員</title>
</head>

<body>
<H1>修改會員資料</H1>
<form action="<?php echo $editFormAction; ?>" name="form1" method="POST">
  <table width="89%" border="0">
    <tr> 
      <td width="31%">使用者姓名：</td>
      <td width="40%"><input name="Username" type="text" id="Username" value="<?php echo $row_rsTb2['Username']; ?>" size="20" maxlength="20"></td>
      <td width="29%">流水號：<?php echo $row_rsTb2['ID']; ?>
        <input name="hiddenID" type="hidden" id="hiddenID" value="<?php echo $row_rsTb2['ID']; ?>"></td>
    </tr>
    <tr> 
      <td>使用者帳號：</td>
      <td><?php echo $row_rsTb2['Userid']; ?>
        <input name="hiddenUserID" type="hidden" id="hiddenUserID" value="<?php echo $row_rsTb2['Userid']; ?>"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>電話：</td>
      <td><input name="Telephone" type="text" id="Telephone" value="<?php echo $row_rsTb2['Telephone']; ?>" size="15" maxlength="15"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>地址：</td>
      <td><input name="Address" type="text" id="Address" value="<?php echo $row_rsTb2['Address']; ?>" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>E-Mail：</td>
      <td><input name="Email" type="text" id="Email" value="<?php echo $row_rsTb2['Email']; ?>" maxlength="50"></td>
      <td><center>
        </center></td>
    </tr>
    <tr> 
      <td>使用者密碼：</td>
      <td><input name="Userpwd" type="password" id="Userpwd" value="<?php echo $row_rsTb2['Userpwd']; ?>" size="20" maxlength="20"> 
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="修改"> 
        <input name="clear1" type="reset" id="clear12" value="原始"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
</form>
</body>
</html>
<?php
mysql_free_result($rsTb2);
?>

