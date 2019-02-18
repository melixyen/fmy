<?php require_once('Connections/connschoola.php'); ?>
<?php
mysql_select_db($database_connschoola, $connschoola);
$query_rsTc1 = "SELECT * FROM tbpeople";
$rsTc1 = mysql_query($query_rsTc1, $connschoola) or die(mysql_error());
$row_rsTc1 = mysql_fetch_assoc($rsTc1);
$totalRows_rsTc1 = mysql_num_rows($rsTc1);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>確認送件資料</title>
</head>

<body>

<p>帳號使用者</p>
<p> <font color=blue size="+2"><? echo $Userid1; ?> </font>
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
<form name="form1" action="mdfuser.php?mUsrId=$Userid&mID=<?php echo $row_rsTc1['ID']; ?>" method="post">
  <p> 
    <input name="ID" type="hidden" value="<?php echo $row_rsTc1['ID']; ?>">
    <input name="Username" type="hidden" id="Username" value="<?php echo $row_rsTc1['Username']; ?>" size="20">
    <BR>
    <input name="Userid" type="hidden" value="<?php echo $row_rsTc1['Userid']; ?>">
    <input name="Telephone" type="hidden" id="Telephone" value="<?php echo $row_rsTc1['Telephone']; ?>" size="20">
    <BR>
    <input name="Address" type="hidden" id="Address" value="<?php echo $row_rsTc1['Address']; ?>" size="50">
  </p>
  <p><font color="#FF0000"><strong>修改會員資料注意事項</strong></font></p>
  <p><strong><font color="#FF0000">註冊後無法變更帳號名稱，為保障安全要變更帳號請重新註冊</font></strong><BR>
  <p><strong><font color="#FF0000">網路駭客多，防範資料外洩請不定期更新您的使用者密碼</font></strong><BR>
    <input type="submit" name="Submit" value="您的使用者帳號與密碼通過驗證，為保障用戶安全與資料正確請按此更新資料">
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
 

