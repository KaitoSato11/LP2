<?php
session_start();
$errorMessage ="";
$_SESSION = array();
// session destroy
@session_destroy();
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>ユーザ削除完了</title>
</head>
<body>
<center>
<h2>ユーザ削除が完了しました</h2>
</center>
<div id="event">
<a href="./Main.php">メインメニューへ戻る</a>
</div>
</body>
</html>