<?php session_start(); ?>
<?php
session_unset();
 $Stk=0;
 $_SESSION["Stk"] = $GLOBALS["Stk"];//session_register("Stk");
?>
<?php require_once('Connections/connschoola.php'); ?>
<?php
$colname_rsShop1 = "1";
if (isset($_GET['Shopid'])) {
  $colname_rsShop1 = (get_magic_quotes_gpc()) ? $_GET['Shopid'] : addslashes($_GET['Shopid']);
}
mysql_select_db($database_connschoola, $connschoola);
$query_rsShop1 = sprintf("SELECT * FROM tbshop WHERE Shopid = %s", $colname_rsShop1);
$rsShop1 = mysql_query($query_rsShop1, $connschoola) or die(mysql_error());
$row_rsShop1 = mysql_fetch_assoc($rsShop1);
$totalRows_rsShop1 = mysql_num_rows($rsShop1);
?>
 
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>歡迎光臨電子商店</title>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);

function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
//-->
</script>
</head>

<body bgcolor="#FEFFDD">
<?php include("upbar.php"); ?><P></P>
<table width="720" border="1" cellpadding="1" cellspacing="0" bordercolor="#3333FF">
  <tr align="left" valign="top" bgcolor="#C1F0F9"> 
    <td height="320" colspan="2" bordercolor="#3333FF"> 
      <p>
        <center>
          eZ!電子購物說明 
        </center>
      </p>
      <p> 
      <ol>
        <li>選擇完商品後以會員帳號購物 </li>
        <li>非會員可瀏覽商品再決定要不要註冊加入會員</li>
        <li>消耗品一經使用恕不退換</li>
        <li>本公司取得訂單後將以電話聯絡確認訂單</li>
        <li>一律採用貨到付款方式保障消費者權益</li>
        <li>依照消費者保護法，消費者於購買後有七天鑑賞期</li>
        <li>如果您需要到府架設請選購到府架設這項服務</li>
        <li>訂單一經電話確認後恕不接受退件</li>
        <li>如有任何疑問請來電 (02)2345-6789將有專人為您服務</li>
      </ol>
      <p>&nbsp;</p></td>
  </tr>
  <tr bgcolor="#99FF99"> 
    <td width="354" align="right" bordercolor="#3333FF"> 
      <form name="form1" method="post" action="shop1.php">
        <input type="submit" name="Submit" value="了解！Shopping去">
      </form></td>
    <td align="left"><a href="shop1.php" onMouseOver="MM_popupMsg('請打開cookie的設定')">非常重要的注意事項</a></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($rsShop1);
?>

