<HTML><HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD><BODY>
<?PHP
echo $_GET['Prdname'];
?>
<P>請輸入您購買的數量</P>
<P><font color="#800000">如果只購買一件產品請直接按確定</font></P>
<P><font color="#FF0000">如果不小心將沒有要購買的產品放入購物車</font></P>
<form name="form2" method="post" action="shop1.php">→→→→請按這裡消除記錄→→→→
  <input type="submit" name="Submit2" value="我放錯產品到購物車了，我要把產品放回架上去">
</form>
<HR>
<form method="post" name="form1" action="sebuy2.php?Shopid=$Shopid&Prdname=$Prdname">您想要丟幾件產品進購物車？
<input name="mabq" type="text" id="mabq" maxlength="4" size="4" value="1">
<input name="Shopid" type="hidden" id="Shopid" value="<?php echo $_GET["Shopid"]; ?>">
<input name="Prdname" type="hidden" id="Prdname" value="<?php echo $_GET["Prdname"]; ?>">
  <input type="submit" name="Submit" value="數量確定了，我要把購物車推回去繼續購買產品">
</form>
</HTML>