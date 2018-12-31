<?php
require_once('config.php');
session_start();

//エラーメッセージの初期化
$errorMessage = "";

//セッションがセットされていない場合はMain.phpへ
//if (!isset($_SESSION['ID'])) {
//    header('Location: ./Main.php');
//    exit();
//}

$db['host'] = DB_HOST;
$db['user'] = DB_USER;
$db['pass'] = DB_PASSWORD;
$db['dbname'] = DB_NAME;
$errorMessage = "";

//「削除」を押したとき
if(isset($_POST['del_user'])){

	//DBの情報を格納
	$dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $db['host'], $db['dbname']);
	try {
		$db = new PDO($dsn, $db['user'], $db['pass']);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt=$pdo->prepare('DELETE FROM users WHERE id = ?');
		$stmt->execute($_SESSION['ID']);

        } catch(PDOException $e){
        $errorMessage = 'データベースエラー';
	}
}





?>

<!doctype html>
<html>
    <head>
    <title>利用者削除</title>
		<meta charset="utf-8"/>
    </head>
    <body>
        <!--規定画面-->
        <p id="back_main"><input type="button" onClick="location.href='./Mypage.php'" value="マイページへ戻る" style="WIDTH:150px; HEIGHT:30px"></p>
        <center><h1>利用者削除</h1></center>
        <div align="center">
            <h2><?php echo $errorMessage; ?></h2><br>
                <form action="" method="POST">
                   <input type="submit" value="削除" id="del_user" name="del_user" style="WIDTH:150px; HEIGHT:30px">
                </form>
                <br>
	</div>
    </body>    
</html>