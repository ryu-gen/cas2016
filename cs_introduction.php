<?php
include('page_header.php');//画面出力開始
require_once('db_inc.php');

echo '<h2>コース紹介</h2>';

echo '情報学部では、２年生からコースに登録されます。';
echo '<br>';
echo '情報科学科にはつぎのようなコースが置かれています。';
echo '<br>';

//$where = 'WHERE 1'; // 条件なしSQLのWHERE部分を作る
$sql = "SELECT * FROM tb_course ";//検索条件を適用したSQL文を作成
$rs = mysql_query($sql, $conn);
if (!$rs) die ('エラー: ' . mysql_error());

$row = mysql_fetch_array($rs) ;
echo '<table border=1>';
echo '<tr><th>コース名</th><th>紹介</th></tr>';
while ($row) {
 echo '<tr>';

 $cids = array( 1=>'情報技術応用コース', 2=>'情報科学総合コース');
 $r= $row['cid'];        // 種別のコード（数字）を$rに代入
 $cid = $cids [ $r ];   // 種別の名前（配列要素）を$uroleに代入
 echo '<td>' . $cid . '</td>';
 echo '<td>' . $row['detail']. '</td>';

 echo '</tr>';
 $row = mysql_fetch_array($rs) ;

}
echo '</table>';

echo '<p><a href="index.php">戻る</a>';

include('page_footer.php');//画面出力終了
?>