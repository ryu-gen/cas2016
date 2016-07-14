<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

echo "<h2>ユーザアカウント一覧</h2>";
$where = ' WHERE 1'; // 条件なしSQLのWHERE部分を作る
$sql ="select * from tb_user  ". $where;//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) {
	die ('エラー: ' . mysql_error());
}

$row = mysql_fetch_array($rs) ;

echo '<table border=1>';
echo '<tr><th>ユーザID</th><th>氏名</th><th>種別</th><th>操作</th></tr>';
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['uname']. '</td>';
	//echo '<td>' . $row['cname'] . '</td>';
	$roles = array( 1=>'学生', 2=>'教員', 9=>'管理者');
	$r= $row['urole'];        // 種別のコード（数字）を$rに代入
	$urole = $roles [ $r ];   // 種別の名前（配列要素）を$uroleに代入
	echo '<td>' . $urole . '</td>';
	echo '<td><a href="user_passwd_change.php?uid='.$row['uid'] .'">パスワード変更</a></td>';
	echo '</tr>';

	$row = mysql_fetch_array($rs) ;
}
echo '<table>';

echo '<p><a href="index.php">戻る</a>';

include('page_footer.php');  //画面出力終了
?>