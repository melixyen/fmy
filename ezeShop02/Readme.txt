真是不好意思!!小弟弟初次撰寫購物車程式碼!!
這個程式小弟採用 GNU GPL 授權方式
故您可免費使用它 名為 schoola 的eZ!購物

解壓縮後在PHP資料夾內的請將它放到網站目錄下
解壓縮後在MySQL資料夾內的請將它放到MySQL的data下

管理員的帳號密碼為 adm 和 1234
可以到 admcheck.php 中做修改或新增
進入管理員的方法為在主頁中左下方的 SU (Super User)

index.php ==>網站首頁

其他的部分都可以在連結之中一一找到
本程式採用 session 的儲存購物車內容
再在最後將 session 寫入MySQL資料庫

資料表說明
tbpeople 儲存會員資料
tbsell 儲存訂單資料
tbshop 儲存商品資料

本程式可直接使用 DreamWeaver MX 編輯
資料庫著連結設定檔在 connections 之下
但是有幾頁不是連結到這個設定檔的
請手動修改 php 中的帳號密碼與位置
*******************************************
* 原作者 : Melix                          *
* 信箱 : melix@ms9.url.com.tw             *
* 本程式受 GNU GPL 之保護                 *
*******************************************

本程式 V0.2 版僅作為更新支援 PHP 7 可以正常運作，
讓現代 Server 可以運行 PHP 3 時代的 code 研究用

檔案結構
====Readme.txt
|
|===MySQL
|   |
|   ====schoola.sql (資料結構)
|   ====*.MYD, *.MUI, *.frm (資料庫檔)
|
|
|===PHP3 (PHP3時代的 code)
|   |
|   ===Connections
|      |
|      ===connschoola.php (資料庫主機帳號 IP 定義檔)
|
|
|===PHP7 (PHP7可運行的 code) 
|   |
|   ===Connections
|      |
|      ===connschoola.php (資料庫主機帳號 IP 定義檔)
|      ===php7mysql_pconnect.php (