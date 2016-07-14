<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

//変数の初期化
$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
// ログイン中のユーザ($uid)の希望状況を検索する
$uid = $_POST['uid']; //送信されたuidを受け取り、$uidに代入
$sql = "select * from tb_performance WHERE uid='{$uid}'" ;
$rs = mysql_query($sql, $conn);
if (!$rs) {
	die ('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs) ;
if ($row) {
	//$cid = $row['cid']; // 現在登録しているコースのID
	$act = 'update';    // すでに登録したため「再登録」とする
}

if ( !isset($_SESSION['urole']) || $_SESSION['urole']!=2 ) {
	// 教員としてログインしていなければ
	die('<h2>エラー：この機能を利用する権限がありません</h2>');
} else {
	//$act = $_POST['act'];//送信されたactを受け取り、$actに代入
	//$uid = $_POST['uid']; //送信されたuidを受け取り、$uidに代入
	$credit = $_POST['credit']; //送信されたcreditを受け取り、$creditに代入
	$gpa = $_POST['gpa']; //送信されたgpaを受け取り、$gpaに代入
	if ($act == 'insert'){//新規登録の場合
		$sql = "INSERT INTO tb_performance VALUES('{$uid}', $credit,'$gpa')";
	} else {//再登録の場合
		$sql = "UPDATE tb_performance SET credit='{$credit}', gpa={$gpa} WHERE uid='$uid'" ;
	}
	$rs = mysql_query($sql, $conn); //SQL文を実行
	if (!$rs){
		echo "<h2>登録が失敗しました</h2>";
		echo mysql_error();
	}else{
		echo "<h2>登録が成功しました</h2>";
	}
}
?>