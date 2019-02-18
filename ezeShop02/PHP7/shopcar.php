<?php session_start();?>
<?php require_once('Connections/connschoola.php'); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>購物車</title>
</head>

<body>
<form method="POST" action="changen.php">
  <table border="1" cellpadding="0" cellspacing="1">
    <tr> 
      <td height="19">NO.</td>
      <td>種類</td>
      <td>名稱</td>
      <td>其他</td>
      <td>單價</td>
      <td>數量</td>
      <td>總計</td>
      <td>附註</td>
    </tr>
    <?php

		
	function output($result,$i)
	{
		global $Sbq;
		$gha=$Sbq[$i];
		$ghb=$result["Prdprice"];
		$ghc=$gha * $ghb;
		echo "      <tr>\n";
		echo "        <td width=\"30\" bgcolor=\"#FFFFFF\" align=\"center\" height=\"25\"><font color=\"#000000\">".$result["Shopid"]."</font></td>\n";
		echo "        <td width=\"80\" bgcolor=\"#FFFFFF\" align=\"center\" height=\"25\"><font color=\"#000000\">".$result["Prdtype"]."</font></td>\n";
		echo "        <td width=\"200\" bgcolor=\"#FFFFFF\" align=\"center\" height=\"25\"><font color=\"#000000\">".$result["Prdname"]."</font></td>\n";
		echo "        <td width=\"200\" bgcolor=\"#FFFFFF\" align=\"center\" height=\"25\"><font color=\"#000000\">".$result["Prdtext"]."</font></td>\n";
		echo "        <td width=\"80\" bgcolor=\"#FFFFFF\" align=\"center\" height=\"25\"><font color=\"#000000\">".$result["Prdprice"]."</font></td>\n";
		echo "        <td width=\"45\" bgcolor=\"#FFFFFF\" align=\"center\" height=\"25\"><font color=\"#000000\"><input type=\"text\" name=\"fm_bt".$i."\" size=\"3\" value=\"".$Sbq[$i]."\"></font></td>\n";    
		echo "        <td width=\"80\" bgcolor=\"#FFFFFF\" align=\"center\" height=\"25\"><font color=\"#000000\">$ghc</font></td>\n";
		echo "        <td width=\"40\" bgcolor=\"#FFFFFF\" align=\"center\" height=\"25\"><font color=\"#00CCCC\">無</font></td>\n";
		echo "      </tr>\n";
				global $ghd;
				$ghd=$ghc+$ghd;
		
	}
	
	// 連線MySQL
	if(!$connschoola)
	{
		echo "<p>MySQL資料庫連線錯誤,請稍後再試</p>";
		exit();
	}
$Stk = $_SESSION["Stk"];
if(!isset($_SESSION["Sbb"])){
	echo "<p>購物車內無物品</p>";
}else{
	$Sbb = $_SESSION["Sbb"];
	$Sbq = $_SESSION["Sbq"];

		for($i=0;$i<$Stk;$i++)
		{
			if($Sbb[$i]!="")
			{
				$query=mysql_db_query("schoola","SELECT * FROM tbshop WHERE Shopid=".$Sbb[$i]);	

				$result=mysql_fetch_array($query);
				output($result,$i);
			}
		}
}
?>
  </table>
<?php if(!isset($_GET['list'])){ ?>
<input type="submit" value="付款" name="B2">
<?php } ?>
  您所訂購的產品合計 ：<font color=blue>
  <?php
  global $ghd; 
  echo $ghd; 
  ?> </font>元
</form>
</body>
</html>


