<?php
$menu1 = array(  //学生メニュー
   'コース紹介'  => 'cs_introduction.php'  ,
   '成績確認'  => 'cs_grade.php'  ,
   '希望提出'  => 'cs_wish.php' ,
   '結果確認'  => 'cs_result.php' ,
);
$menu2 = array(  //教員メニュー
   '希望状況一覧'  => 'cs_list.php' ,
   '未提出者一覧'  => 'cs_noentry.php' ,
   '希望状況集計'  => 'cs_summary.php' ,
   '成績登録'  => 'performance_add.php' ,
   'コース決定'      => 'cs_decide.php',
);
$menu3 = array(  //管理者メニュー
   'アカウント登録'  => 'user_add.php' ,
   'アカウント一覧'  => 'user_list.php' ,
   'アカウント削除'  => 'user_delete.php' ,
   'パスワード変更'  => 'user_passwd.php',
);
$menu0 = array(  //共通メニュー
   'ホーム'  => 'index.php',
   'ログアウト'  => 'logout.php',
);
if (isset($_SESSION['uid'])){
	if($_SESSION['urole']==1){
		//学生メニューの出力
		foreach($menu1 as $label=>$url){ //$menu1の要素を調べまわす
			echo '<a href="' .$url. '">' . $label . '</a>　';
		}

	}else if($_SESSION['urole']==2){

		//教員メニューの出力
		foreach($menu2 as $label=>$url){ //$menu1の要素を調べまわす
			echo '<a href="' .$url. '">' . $label . '</a>　';
		}

	}else if($_SESSION['urole']==9){

		//管理者メニューの出力
		foreach($menu3 as $label=>$url){ //$menu1の要素を調べまわす
			echo '<a href="' .$url. '">' . $label . '</a>　';
		}
	}
	//共通メニューの出力
	foreach($menu0 as $label=>$url){ //$menu1の要素を調べまわす
		echo '<a href="' .$url. '">' . $label . '</a>　';
	}
}else{
	echo '<a href="login.php">ログイン</a> ';
	echo '<a href="index.php">ホーム</a> ';
}

?>