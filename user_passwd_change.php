<?php
include('page_header.php');//画面出力開始
require_once('db_inc.php');

if ( isset($_SESSION['urole']) and $_SESSION['urole']==9 ) {
	//管理者としてログインしているなら
	//	$uname = $_GET['uid']; // 認証済みのパスワード
	echo '<h2>パスワード変更</h2>';
}else { // その以外は
	die('エラー：この機能を利用する権限がありません');
}
if(isset($_GET['uid'])){
	$uid  = $_GET['uid'];   // 認証済みのユーザID
}else{
	die('エラー：ユーザIDは与えられてません。');
}
echo '<form action="user_passwd_save.php" method="post">';
echo '<input type="hidden" name="uid" value="'.  $uid.'">'; //非表示送信

echo "ユーザID: $uid";
echo '<br>';
echo '<br>';
echo '新しいパスワード　　　:';
echo '  <input type="password" name="upass1" value=""/>';
echo '<br>';
echo '<br>';
echo '新しいパスワード（再）:';
echo '  <input type="password" name="upass2" value=""/>';
echo '<br>';
echo '<br>';
echo '<input type="submit" value="パスワードを変更"/>';
echo '　　';
echo '<input type="reset" value="キャンセル">';

echo '<p><a href="user_passwd.php">戻る</a>';

include('page_footer.php');//画面出力終了
?>