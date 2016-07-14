<?php include('page_header.php'); ?>
<form action="check.php" method="post">
<h2>コース分け希望調査システム</h2>
<table>
		<tr>
			<td>ユーザ名：</td>
			<td><input type="text" name="uid"></td>
		</tr>
		<tr>
			<td>パスワード：</td>
			<td><input type="password" name="pass"></td>
		</tr>
	</table>
	<br>
	<input type="submit" value="送信">　　<input type="reset" value="取消">
</form>
<?php include('page_footer.php'); ?>