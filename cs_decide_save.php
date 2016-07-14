<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続
echo "<h2>コース決定</h2>";

//echo $_SESSION['urole'];

$cid=$_GET['cid'];
if ( !isset($_SESSION['urole']) || $_SESSION['urole']!=2 ) {
	// 教員としてログインしていなければ
}else{
	if($cid==2){
		$uid=$_GET['uid'];
		$sql = "UPDATE tb_entry SET decide=2 WHERE uid='$uid' ";
		//echo $sql;
		$rs = mysql_query($sql, $conn); //SQL文を実行
		echo "<h2>情報科学総合コースに決定しました。</h2>";
	}else if($cid==1){
		$uid=$_GET['uid'];
		$sql = "UPDATE tb_entry SET decide=1 WHERE uid='$uid' ";
		//echo $sql;
		$rs = mysql_query($sql, $conn); //SQL文を実行
		echo "<h2>情報技術応用コースに決定しました。</h2>";
	}
}
include('page_footer.php');
?>