<?php
include('page_header.php');
require_once ('db_inc.php');  // データベース接続

if ( !isset($_SESSION['urole']) || $_SESSION['urole']!=9 ) {
	// 管理者としてログインしていなければ
	die('<h2>エラー：この機能を利用する権限がありません</h2>');
}else {
	if (isset($_POST['uid'])){

		$act  = $_POST['act'];

		$uid  = $_POST['uid']; //ログイン中のユーザのuidを$uidに代入
		if(empty($uid)){
			echo "<h2>ユーザIDが入力されていません。</h2>";
			echo '<p><a href="user_add.php">戻る</a>';
		}else{
			$uname  = $_POST['uname'] ;//送信されたunameを受け取り、$unameに代入
			$upass  = $_POST['upass'] ;//送信されたupassを受け取り、$upassに代入
			$urole  = $_POST['urole'] ;//送信されたuroleを受け取り、$uroleに代入

			$upass=$_POST['upass'];
			if(empty($upass)){
				echo "<h2>パスワードが入力されていません。</h2>";
				echo '<p><a href="user_add.php">戻る</a>';
			}else{
				$uname  = $_POST['uname'] ;//送信されたunameを受け取り、$unameに代入
				$upass  = $_POST['upass'] ;//送信されたupassを受け取り、$upassに代入
				$urole  = $_POST['urole'] ;//送信されたuroleを受け取り、$uroleに代入

				if(empty($uname)){
					echo "<h2>ユーザ名が入力されていません。</h2>";
					echo '<p><a href="user_add.php">戻る</a>';
				}else{
					$uname  = $_POST['uname'] ;//送信されたunameを受け取り、$unameに代入
					$upass  = $_POST['upass'] ;//送信されたupassを受け取り、$upassに代入
					$urole  = $_POST['urole'] ;//送信されたuroleを受け取り、$uroleに代入


					if ($act == 'insert'){//新規登録の場合
						$sql = "INSERT INTO tb_user(uid,uname,upass,urole) VALUES ('{$uid}', '$uname','$upass', $urole)";
						//echo $sql;
						$rs = mysql_query($sql, $conn); //SQL文を実行
						if (!$rs){
							echo "<h2>登録が失敗しました</h2>";
							echo mysql_error();
						}else{
							echo "<h2>アカウントを登録しました。</h2>";
							echo '<p><a href="user_add.php">戻る</a>';
						}
					}else {
						echo "<h2>もう一度入力してください。</h2>";
						echo '<p><a href="user_add.php">戻る</a>';
					}
				}
			}
		}
	}else{ //エラーを表示
		echo '<p><a href="user_add.php">戻る</a>';
	}
}
include('page_footer.php');
?>