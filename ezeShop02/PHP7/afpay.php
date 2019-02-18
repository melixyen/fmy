<?php require_once('Connections/connschoola.php'); ?>
<?php
$Userid1 = mysql_real_escape_string($_POST['Userid1']);
$Userpwd1 = mysql_real_escape_string($_POST['Userpwd1']);
mysql_select_db($database_connschoola, $connschoola);
$query_rsTc1 = "SELECT * FROM tbpeople WHERE Userid = '".$Userid1."' AND Userpwd = '".$Userpwd1."'";
$rsTc1 = mysql_query($query_rsTc1, $connschoola) or die(mysql_error());
$row_rsTc1 = mysql_fetch_assoc($rsTc1);
$totalRows_rsTc1 = mysql_num_rows($rsTc1);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>確認送件資料</title>
</head>

<body>

<p>帳號使用者</p>
<p> <font color=blue size="+2"><?php echo $Userid1; ?> </font>
  <?php do { 
  
    $aid=$row_rsTc1['ID']; 
    $aui=$row_rsTc1['Userid']; 
    $aup=$row_rsTc1['Userpwd']; 
	if($Userid1==$aui)
	{
	 if($Userpwd1==$aup)
	 {
	 $trda="";
	 ?>
</p>
<form name="form1" action="dopay.php?Userid=$Userid&ID=$ID&Username=$Username&Telephone=$Telephone&Address=$Address" method="post">
  <p> 
    <input name="ID" type="hidden" value="<?php echo $row_rsTc1['ID']; ?>">
    收件者姓名 
    <input name="Username" type="text" id="Username" value="<?php echo $row_rsTc1['Username']; ?>" size="20">
    <input type="reset" name="Submit2" value="按此恢復原始值">
    <BR>
    <input name="Userid" type="hidden" value="<?php echo $row_rsTc1['Userid']; ?>">
    收件者電話 
    <input name="Telephone" type="text" id="Telephone" value="<?php echo $row_rsTc1['Telephone']; ?>" size="20">
    <BR>
    收件者地址 
    <input name="Address" type="text" id="Address" value="<?php echo $row_rsTc1['Address']; ?>" size="50">
  </p>
  <p><font color="#FF0000"><strong>立即核對您的姓名電話地址沒有錯誤</strong></font></p>
  <p><strong><font color="#FF0000">如有錯誤或改寄送其他地方請立即更正</font></strong> <BR>
    <input type="submit" name="Submit" value="您的使用者帳號與密碼通過驗證，為保障用戶安全與資料正確請按此完成交易">
  </p>
  </form>
	 <?php
	 }
	 else
	 {
	  $trda="您的密碼輸入錯誤";
	  
	 }
	}
	else
	{
	 
	 $trda="沒有這個使用者帳號請先註冊";
	
	}
   
 
   } while ($row_rsTc1 = mysql_fetch_assoc($rsTc1)); ?>
<?php echo $trda; ?>
</body>
</html>
<?php
mysql_free_result($rsTc1);
?>
 

