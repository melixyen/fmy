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
<title>�T�{�e����</title>
</head>

<body>

<p>�b���ϥΪ�</p>
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
  <p><font color="#FF0000"><strong>�ק�|����ƪ`�N�ƶ�</strong></font></p>
  <p><strong><font color="#FF0000">���U��L�k�ܧ�b���W�١A���O�٦w���n�ܧ�b���Э��s���U</font></strong><BR>
  <p><strong><font color="#FF0000">�����b�Ȧh�A���d��ƥ~���Ф��w����s�z���ϥΪ̱K�X</font></strong><BR>
    <input type="submit" name="Submit" value="�z���ϥΪ̱b���P�K�X�q�L���ҡA���O�٥Τ�w���P��ƥ��T�Ы�����s���">
  </p>
  </form>
	 <?php
	 }
	 else
	 {
	  $trda="�z���K�X��J���~";
	  
	 }
	}
	else
	{
	 
	 $trda="�S���o�ӨϥΪ̱b���Х����U";
	
	}
   
 
   } while ($row_rsTc1 = mysql_fetch_assoc($rsTc1)); ?>
<?php echo $trda; ?>
</body>
</html>
<?php
mysql_free_result($rsTc1);
?>
 

