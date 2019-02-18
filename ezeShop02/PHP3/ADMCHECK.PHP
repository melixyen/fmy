<? 
session_start();
global $admgo;
if($admgo!="admok"){ 
if($admid!="adm" or $admpwd!="1234"){ 


echo "很抱歉您的管理員資格認證有問題！<P>如果您使用回到上一頁請重新整理"; 

exit; 

}
}
?> 

