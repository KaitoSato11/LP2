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

// 文字化け対策
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");

// PHPのエラーを表示するように設定
error_reporting(E_ALL & ~E_NOTICE);

$dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $db['host'], $db['dbname']);

try {
    // データベース接続
    $pdo = new PDO($dsn, $db['user'], $db['pass']);
} catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage()); //エラー処理
}

//データベース操作

//$nameにクリックされた50音の文字を格納
$name = $_GET['head'];

//SQL作成
$sql = ("SELECT * FROM separate WHERE reading like '$name%'"); //->アロー演算子 データを引っ張ってくる likeはあいまい検索

//セッション削除
// unset($_SESSION['head']);

//SQL実行
$stmt = $pdo->query($sql); //query:prepare使わないやつ

//データ取得
while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) { //FETCH_ASSOC:実行したSQLの中を連想配列で取得する
$result2[] = $result;
}
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="./css/design_satozaki.css">
  <title>GDSS ゴミ出し支援システム</title>
    <link rel="icon" href="iconG.ico">
    <meta name="description" content="高知県香美市土佐山田町を対象とした、ゴミ出しを支援するサイトです。">
    <!-- <link rel="stylesheet" href="design.css"> -->
</head>


<body>
<!-- HEADER -->
<div class="header">
  <p class="title">GDSS</p>
  <p class="wayaku">ゴミ出し支援システム</p>
  <p class="desc">このサイトは、高知県香美市土佐山田町が対象となっています。</p>
</div>

<!-- メインコンテンツエリア -->
    <div class="content">
      <!-- ここに各ページの中身いれてください -->
      <div class="bb1">

        <div class="b1">
          <h4><a href="Normal_rule.php" style="text-decoration:none;">分別ルールはこちら</h4>
        </div>

        <div class="b2">
          <h4><a href="Special_rule.php" style="text-decoration:none;">粗大ゴミ情報はこちら</h4>
        </div>

        <div class="b3">
          <h4><a href="Mypage.php" style="text-decoration:none;">マイページに戻る</h4>
        </div>

      </div>

      <div class="bb2">
        <h4></h4>
      </div>

    <!-- table作成 -->
      <table border='1' width="100%">
        <tr>
          <th colspan="3" align="left" bgcolor="#8fc27a"><?php echo "$name" ?></th>
        </tr>
        <tr>
          <th>名称</th>
          <th>分別</th>
          <th>分別ルール</th>
        </tr>

        <?php
    foreach ($result2 as $result) { //fireach:forみたいなの
        ?>
        <tr>
          <td>
            <?php echo $result['garbage_name']; ?>
          </td>
          <td>
            <?php echo $result['type']; ?>
          </td>
          <td>
            <?php echo $result['garbage_remarks']; ?>
          </td>
        </tr>
        <?php
    }
    ?>
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
</body>
</html>
