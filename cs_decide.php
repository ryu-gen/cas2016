<?php
include('page_header.php');  //画面出力開始
require_once('db_inc.php');  //データベース接続

echo "<h2>コース決定</h2>";
$where = ' WHERE 1'; // 条件なしSQLのWHERE部分を作る
$sql ="select * from tb_entry natural join tb_user natural join tb_course natural join tb_performance ". $where;//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) {
	die ('エラー: ' . mysql_error());
}
$row = mysql_fetch_array($rs) ;

echo '<table border=3>';
echo '<tr><th>ユーザID</th><th>氏名</th><th>希望コース</th><th>興味のある研究分野や自己PR</th><th>単位数</th><th>GPA</th><th>コース決定</th></tr>';
$get=0;
while ($row) {
	echo '<tr>';
	echo '<td>' . $row['uid'] . '</td>';
	echo '<td>' . $row['uname']. '</td>';
	echo '<td>' . $row['cname'] . '</td>';
	echo '<td>' . $row['impressions'] . '</td>';
	echo '<td>' . $row['credit'] . '</td>';
	echo '<td>' . $row['gpa'] . '</td>';
	echo '<td><a href="cs_decide_save.php?uid='.$row['uid'].'&cid=2">総合コース</a>';
	echo '    ';
	echo '<a href="cs_decide_save.php?uid='.$row['uid'] .'&cid=1">応用コース</a></td>';
	echo '</tr>';
	$row = mysql_fetch_array($rs) ;
}
echo '<table>';

echo '<p><a href="index.php">戻る</a>';

include('page_footer.php');  //画面出力終了
?>