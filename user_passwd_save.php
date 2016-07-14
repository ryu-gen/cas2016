<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if ( !isset($_SESSION['urole']) || $_SESSION['urole']!=9 ) {
	// 管理者としてログインしていなければ
	die('<h2>エラー：この機能を利用する権限がありません</h2>');
}else {

	if (isset($_POST['uid'])){
		$uid  = $_POST['uid']; //ログイン中のユーザのuidを$uidに代入
		$upass1  = $_POST['upass1'] ;//送信されたupassを受け取り、$upassに代入
		$upass2  = $_POST['upass2'] ;//送信されたupassを受け取り、$upassに代入
		if ($upass1==$upass2){

			$sql = "UPDATE tb_user SET upass='{$upass1}' WHERE uid='{$uid}'";

			//echo $sql;
			$rs = mysql_query($sql, $conn); //SQL文を実行
			echo "<h2>パスワードを変更しました。</h2>";
		}else {
			echo "<h2>パスワードが一致しません。もう一度入力してください。</h2>";
			echo '<p><a href="user_passwd.php?uid='.$uid.'">戻る</a>';
		}

	}else{ //エラーを表示
		echo '<h2>エラー：パスワードが入力されていません。</h2>';
		echo '<p><a href="user_passwd.php?uid='.$uid.'">戻る</a>';

	}
}
include('page_footer.php');
?>