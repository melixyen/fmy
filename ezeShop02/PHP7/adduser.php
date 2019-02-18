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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO tbpeople (Username, Userid, Telephone, Address, Email, Userpwd) VALUES (%s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['Username'], "text"),
                       GetSQLValueString($_POST['Userid'], "text"),
                       GetSQLValueString($_POST['Telephone'], "text"),
                       GetSQLValueString($_POST['Address'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Userpwd'], "text"));

  mysql_select_db($database_connschoola, $connschoola);
  $Result1 = mysql_query($insertSQL, $connschoola) or die(mysql_error());

  $insertGoTo = "addscu.php?Telephone=".$_POST['Telephone']."&Username=".$_POST['Username']."&Address=".$_POST['Address']."&Email=".$_POST['Email'];
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  exit(header(sprintf("Location: %s", $insertGoTo)));
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>加入會員</title>
</head>

<body>
<H1>加入會員可享線上購物</H1>
<form name="form1" method="POST" action="<?php echo $editFormAction; ?>">
  <table width="89%" border="0">
    <tr> 
      <td width="31%">使用者姓名：</td>
      <td width="40%"><input name="Username" type="text" id="Username" size="20" maxlength="20"></td>
      <td width="29%">&nbsp;</td>
    </tr>
    <tr> 
      <td>使用者帳號：</td>
      <td><input name="Userid" type="text" id="Userid" size="20" maxlength="20"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>電話：</td>
      <td><input name="Telephone" type="text" id="Telephone" size="15" maxlength="15"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>地址：</td>
      <td><input name="Address" type="text" id="Address" maxlength="50"></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>E-Mail：</td>
      <td><input name="Email" type="text" id="Email" maxlength="50"></td>
      <td><center>
        </center></td>
    </tr>
    <tr> 
      <td>使用者密碼：</td>
      <td><input name="Userpwd" type="password" id="Userpwd" size="20" maxlength="20"> 
      </td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="送出"> <input name="clear1" type="reset" id="clear12" value="清除"></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
</form>
</body>
</html>
