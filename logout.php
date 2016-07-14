<?php
 session_start();
 unset($_SESSION);
 session_destroy();
// include('page_header.php');    //ページヘッドを出力
 //echo "<h3>ログアウトしました！</h3>";
 //echo '<a href="index.php">トップページ</a>';
 //include('page_footer.php');    //ページフッタを出力
 $url = 'index.php';           //転送先のURL(TOPページ)
   header('Location:' . $url);   // 画面転送
?>