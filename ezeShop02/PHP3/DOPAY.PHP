<?php session_start(); ?>

<?php
if(!mysql_pconnect("localhost","web"))
{
	echo "<p>MySQL資料庫連線錯誤,請稍後再試</p>";
	exit();
}

global $Stk;
global $Sbq;
global $Sbb;
	for($i=0;$i<$Stk;$i++)
	{
		if($Sbb[$i]!="")
		{
			mysql_db_query("schoola","INSERT INTO tbsell (Od,Userid,Shopid,Prdname,Date,Prdsmany,Username,Telephone,Address,Do) VALUES ('','$Userid','$Sbb[$i]','$Snn[$i]',CURDATE(),'$Sbq[$i]','$Username','$Telephone','$Address','NO')");
		}
       echo $i;echo ",";
	}
	echo "號產品完成資料庫寫入";
	echo "<p>謝謝你在此訂購產品</p>\n";
	echo "<p>如有任何問題請盡快與管理者聯絡!</p>";
	echo "<p>產品一經訂單送出後恕不取消訂單</p>";


echo $Userid;echo "<BR>";
echo $ID;echo "<BR>";
echo $Username;echo "<BR>";
echo $Telephone;echo "<BR>";
echo $Address;echo "<BR>";
session_unset();

?>
<A href="index.php">回到首頁</a>