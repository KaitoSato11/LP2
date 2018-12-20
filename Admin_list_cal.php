<?php
require_once('config.php');
session_start();
if (isset($_SESSION['ID'])) {
	header('Location: ./main.php');
	exit();
}
$db['host'] = DB_HOST;
$db['user'] = DB_USER;
$db['pass'] = DB_PASSWORD;
$db['dbname'] = DB_NAME;
$errorMessage = "";

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");

error_reporting(E_ALL & ~E_NOTICE);

$dsn = 'mysql:dbname='.$dbname.';host='.$host.';charset=utf8';

#データベースに接続
try {
$pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
exit('データベースとの接続に失敗しました。'.$e->getMessage());
}

#データの抽出
try{
	$sql = ("SELECT * FROM week WHERE area_id=?");
	$stmt = $pdo->query($sql);
} catch (PDOException $e) {
  exit('データベースの抽出に失敗しました。'.$e->getMessage());
}

?>


<!DOCTYPE html>
<HTML lang="ja">
  <HEAD>
    <meta charset="utf-8">
    <title>GDSS ゴミ出し支援システム</title>
    <link rel="icon" href="iconG.ico">
    <meta name="description" content="高知県香美市土佐山田町を対象とした、ゴミ出しを支援するサイトです。">
    <link rel="stylesheet" href="design.css">
    <style type="text/css">
    table {text-align: center;}
    </style>
  </HEAD>
  <BODY>
    <!-- HEADER -->
    <div class="header">
      <p class="title">GDSS</p>
      <p class="wayaku">ゴミ出し支援システム</p>
      <p class="desc">このサイトは、高知県香美市土佐山田町が対象となっています。</p>
    </div>

    <!-- メインコンテンツエリア -->
    <div class="content">
      <!-- ここに各ページの中身いれてください -->
      <div>
      <h3><a href="Mypage.php">
        <input type="submit" value="マイページに戻る"/>
      </a></h3>

      <table border="1">
      <tr><td colspan="100%">カレンダー一覧</td></tr>
      <tr>
        <td width="200px">地区名</td>
        <td width="100px">燃える</td><td width="100px">金属類</td>
        <td width="100px">ビン類</td><td width="100px">他不燃</td>
        <td width="100px">ペット</td><td width="100px">プラ</td>
        <td width="100px">紙類</td><td width="100px">衣類</td>
      </tr>
      <tr>
        <td id="east01">東1区</td>
        <td id="east0101"><a href="Admin_edit_cal.php">
					<?php echo $stmt; ?>
          <input type="submit" value="編集"/>
        </a></td>
        <td id="east0102"><input type="submit" value="編集"/></td>
        <td id="east0103"><input type="submit" value="編集"/></td>
        <td id="east0104"><input type="submit" value="編集"/></td>
        <td id="east0105"><input type="submit" value="編集"/></td>
        <td id="east0106"><input type="submit" value="編集"/></td>
        <td id="east0107"><input type="submit" value="編集"/></td>
        <td id="east0108"><input type="submit" value="編集"/></td>
      </tr>
      <tr>
        <td id="east02">東2区</td>
        <td id="east0201"><input type="submit" value="編集"/></td>
        <td id="east0202"><input type="submit" value="編集"/></td>
        <td id="east0203"><input type="submit" value="編集"/></td>
        <td id="east0204"><input type="submit" value="編集"/></td>
        <td id="east0205"><input type="submit" value="編集"/></td>
        <td id="east0206"><input type="submit" value="編集"/></td>
        <td id="east0207"><input type="submit" value="編集"/></td>
        <td id="east0208"><input type="submit" value="編集"/></td>
      </tr>
      <tr>
        <td id="east03">東3区</td>
        <td id="east0301"><input type="submit" value="編集"/></td>
        <td id="east0302"><input type="submit" value="編集"/></td>
        <td id="east0303"><input type="submit" value="編集"/></td>
        <td id="east0304"><input type="submit" value="編集"/></td>
        <td id="east0305"><input type="submit" value="編集"/></td>
        <td id="east0306"><input type="submit" value="編集"/></td>
        <td id="east0307"><input type="submit" value="編集"/></td>
        <td id="east0308"><input type="submit" value="編集"/></td>
      </tr>
      <tr>
        <td id="west01">西1区</td>
        <td id="west0101"><input type="submit" value="編集"/></td>
        <td id="west0102"><input type="submit" value="編集"/></td>
        <td id="west0103"><input type="submit" value="編集"/></td>
        <td id="west0104"><input type="submit" value="編集"/></td>
        <td id="west0105"><input type="submit" value="編集"/></td>
        <td id="west0106"><input type="submit" value="編集"/></td>
        <td id="west0107"><input type="submit" value="編集"/></td>
        <td id="west0108"><input type="submit" value="編集"/></td>
      </tr>
      <tr>
        <td id="west02">西2区</td>
        <td id="west0201"><input type="submit" value="編集"/></td>
        <td id="west0202"><input type="submit" value="編集"/></td>
        <td id="west0203"><input type="submit" value="編集"/></td>
        <td id="west0204"><input type="submit" value="編集"/></td>
        <td id="west0205"><input type="submit" value="編集"/></td>
        <td id="west0206"><input type="submit" value="編集"/></td>
        <td id="west0207"><input type="submit" value="編集"/></td>
        <td id="west0208"><input type="submit" value="編集"/></td>
      </tr>
      <tr>
        <td id="west03">西3区</td>
        <td id="west0301"><input type="submit" value="編集"/></td>
        <td id="west0302"><input type="submit" value="編集"/></td>
        <td id="west0303"><input type="submit" value="編集"/></td>
        <td id="west0304"><input type="submit" value="編集"/></td>
        <td id="west0305"><input type="submit" value="編集"/></td>
        <td id="west0306"><input type="submit" value="編集"/></td>
        <td id="west0307"><input type="submit" value="編集"/></td>
        <td id="west0308"><input type="submit" value="編集"/></td>
      </tr>
      </table>
    </div>

    <!-- PAGE TOPに戻るボタン
  ぺーじによっては、コメントアウトして消してください -->
    <a class="pagetop" href="#">PAGE TOP</a>

    <!-- FOOTER -->
    <div class="footer">
      <p class="title">GDSS</p>
      <p class="company">L&P</p>
    </div>
  </BODY>
</HTML>
