<?php
include('page_header.php');//画面出力開始
require_once('db_inc.php');

if ( isset($_SESSION['urole']) and $_SESSION['urole']==2 ) {
	//教員としてログインしているなら
	echo '<h2>成績登録</h2>';
}else { // その以外は
	die('エラー：この機能を利用する権限がありません');
}
/*
//変数の初期化
$act = 'insert';  //初回登録?（insert: 初回登録; update: 再登録）;
// ログイン中のユーザ($uid)の希望状況を検索する
$uid = $_GET['uid'];
$sql = "select * from tb_performance WHERE uid='{$uid}'" ;
$rs = mysql_query($sql, $conn);
if (!$rs) {
	die ('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs) ;
echo $row['uid'];
echo $uid;
if ($row) {
	echo 1;
	$cid = $row['cid']; // 現在登録しているコースのID
	$act = 'update';    // すでに登録したため「再登録」とする
}
echo $act;
*/
echo "<form action='performance_save.php' method='post'>";
//echo "<input type='hidden' name='act' value='{$act}'>"; //非表示送信

echo '<br>';
echo '<br>';
echo '<br>';

echo '学生ID';
echo '<br>';
echo '<input type="text" name="uid">';
echo '<br>';
echo '<br>';
echo '<br>';

echo '単位数';
echo '<br>';
echo '<input type="text" name="credit">';
echo '<br>';
echo '<br>';
echo '<br>';

echo 'GPA';
echo '<br>';
echo '<input type="text" name="gpa">';
echo '<br>';
echo '<br>';
echo '<br>';

echo '<input type="submit" value="送信"/>';
echo '</form>';


include('page_footer.php');//画面出力終了
?>