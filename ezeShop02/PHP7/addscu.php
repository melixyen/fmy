<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>加入成功</title>
</head>

<body>
<p><font color="#339933" size="+2">加入會員成功</font></p>
<p> 
  <?php 
echo $_GET['Username'] ;


?>
  &nbsp; <font color="#0033CC">先生</font>/<font color="#FF0000">小姐</font> 
<p>以下是您的聯絡資料 
<p>地址：<?php echo $_GET['Address'] ?>&nbsp; 
<p>電話：<?php echo $_GET['Telephone'] ?>&nbsp; 
<p>E-Mail：<?php echo $_GET['Email'] ?>&nbsp; 
<P><font color="#660066" size="+3">歡迎使用本系統</font></P>
<P><a href="index.php">請回到首頁重新登入</a></P>
&nbsp; </p> 
</body>
</html>
