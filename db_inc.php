<?php
///////////////////////////////////////////////////////////////////////
$env = "run"; //

if(isset($env) and $env==="run"){
	$conn = mysql_connect("localhost", "k13jk124","joho2016");
	mysql_select_db("wpk13jk124", $conn);
}
///////////////////////////////////////////////////////////////////////
else {
	$conn = mysql_connect("localhost","root","");//MySQLサーバへ接続
	mysql_select_db("dbk2016", $conn);    // 使用するデータベースを指定
}
mysql_query('set names utf8', $conn); //文字コードをutf8に設定（文字化け対策）
?>