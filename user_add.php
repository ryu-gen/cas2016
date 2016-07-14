<?php
include('page_header.php');//画面出力開始
require_once('db_inc.php');

if ( isset($_SESSION['urole']) and $_SESSION['urole']==9 ) {
	//管理者としてログインしているなら
	//	$uname = $_GET['uid']; // 認証済みのパスワード
	echo '<h2>アカウント登録</h2>';
}else { // その以外は
	die('エラー：この機能を利用する権限がありません');
}

$act='insert';

echo '<form action="user_save.php" method="post">';
echo '<input type="hidden" name="act" value="'.  $act .'">'; //非表示送信

echo 'ユーザID:　';
echo '<input type="text" name="uid" value="" />';
echo '<br>';
echo '<br>';
echo 'ユーザ名:　';
echo '<input type="text" name="uname" value="" />';
echo '<br>';
echo '<br>';
echo 'パスワード:';
echo '<input type="password" name="upass" value=""/>';
echo '<br>';
echo '<br>';
echo '種別:';
echo '<input type="radio" name="urole" value=1 checked/>学生 ';
echo '<input type="radio" name="urole" value=2 />教員 ';
echo '<input type="radio" name="urole" value=9 />管理者 ';
echo'<br>';
echo '<br>';
echo '<input type="submit" value="登録"/>';
echo '　　';
echo '<input type="reset" value="キャンセル">';
include('page_footer.php');//画面出力終了
?>