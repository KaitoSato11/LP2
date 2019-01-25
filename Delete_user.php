<?php
require_once('config.php');
session_start();

//エラーメッセージの初期化
$errorMessage = "";

//セッションがセットされていない場合はMain.phpへ
if (!isset($_SESSION['ID'])) {
   header('Location: ./Main.php');
   exit();

}

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
		$stmt = $db->prepare('DELETE FROM users WHERE user_id = ?');
		$stmt->execute(array($_SESSION['ID']));
		header('Location: ./Delete_user_comp.php');
		exit();

        } catch(PDOException $e){
        $errorMessage = 'データベースエラー';
	exit();
	}
}

?>

<!doctype html>
<html>
  <head>
    <title>GDSS ゴミ出し支援システム</title>
    <link rel="icon" href="iconG.ico">
    <meta name="description" content="高知県香美市土佐山田町を対象とした、ゴミ出しを支援するサイトです。">
    <link rel="stylesheet" href="design.css">
  </head>
  <body>
    <!-- HEADER -->
    <div class="header">
      <p class="title">GDSS</p>
      <p class="wayaku">ゴミ出し支援システム</p>
      <p class="desc">このサイトは、高知県香美市土佐山田町が対象となっています。</p>
    </div>
    <!-- メインコンテンツエリア -->
    <p id="back_main"><input type="button" onClick="location.href='./Mypage.php'" value="マイページへ戻る" style="WIDTH:150px; HEIGHT:30px"></p>
    <div class="content">
      <!--規定画面-->
      <div class="title">
        <h2>ユーザ削除</h2>
      </div>
      <div align="center">
        <h2><?php echo $errorMessage; ?></h2><br>
        <p><font size="4" color="#ff0000">このアカウントを削除します。<br> 削除したあと、このアカウントを復旧することはできません。</font></p>
        <form action="" method="POST">
          <input type="submit" value="削除" id="del_user" name="del_user" style="WIDTH:150px; HEIGHT:30px">
        </form>
        <br>
      </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
      <p class="title">GDSS</p>
      <p class="company">L&P</p>
    </div>
  </body>
</html>
