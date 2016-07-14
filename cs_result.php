<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

if ( isset($_SESSION['urole']) and $_SESSION['urole']==1 ) {
	//学生としてログインしているなら
	$uid   = $_SESSION['uid'];   // 認証済みのユーザID
	$uname = $_SESSION['uname']; // 認証済みのユーザ名
}else { // その以外は
	die('エラー：この機能を利用する権限がありません');
}
echo "<h2>結果確認</h2>";

$sql = "select decide from tb_entry WHERE uid='$uid'" ;
//echo $sql;
$rs = mysql_query($sql, $conn);
if (!$rs) {
	die ('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs) ;
if ($row) {
	$decide = $row['decide']; // 現在登録しているコースのID
}

if($decide==0){
	echo 'まだコースが決定されていません。' ;
}
if($decide==1){
	echo 'あなたは情報技術応用コースに決定しました。' ;
}
if($decide==2){
	echo 'あなたは情報科学総合コースに決定しました。' ;
}

echo '<p><a href="index.php">戻る</a>';

include('page_footer.php');  //画面出力終了
?>