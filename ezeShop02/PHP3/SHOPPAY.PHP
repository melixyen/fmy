<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>收銀機</title>

</head>

<body>
<?php include("upbar.php")?>
<p><font color="#333399" size="+4">您的購物已經完成</font></p>
<p><font color="#a37399" size="+4">請輸入帳號交易</font></p>
<form name="form1" action="afpay.php?Userid1=$Userid1&Userpwd1=$Userpwd1" method="post">
帳號:
  <input name="Userid1" type="text" id="Userid1" size="20" maxlength="20">
  <p>
密碼:
    <input name="Userpwd1" type="password" id="Userpwd1" size="20" maxlength="20">
  
  <p>d_b 
    <input type="submit" name="Submit" value="登入">
</form><center>
 
</body>
</html>
