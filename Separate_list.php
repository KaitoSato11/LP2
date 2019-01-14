<?php
require_once('config.php');
session_start();
if (!isset($_SESSION['ID'])) {
    header('Location: ./Main.php');
    exit();
}
$db['host'] = DB_HOST;
$db['user'] = DB_USER;
$db['pass'] = DB_PASSWORD;
$db['dbname'] = DB_NAME;
// 文字化け対策
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET CHARACTER SET 'utf8'");
// 接続時のコードが長くならないよう変数に入れる
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
$sql = ("SELECT * FROM separate WHERE reading collate utf8_unicode_ci like '$name%' ORDER BY reading ASC"); //->アロー演算子 データを引っ張ってくる likeはあいまい検索
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

    <!-- 分別ルール 粗大ごみ マイページ遷移 -->
    <div class="Main_Block1">
      <a class="Block1" href="Normal_rule.php">
        <h3>分別ルールはこちら</h3>
      </a>
      <a class="Block2" href="Special_rule.php">
        <h3>粗大ゴミ情報はこちら</h3>
      </a>
      <a class="Block3" href="Mypage.php">
        <h3>マイページに戻る</h3>
      </a>

    </div>


    <!-- table作成 -->
    <div class="Table_Garbage">
      <table class="Garbage_List" border='1' width="100%">
        <tr>
          <th class="th1" colspan="3">
            <font color="white">
              <?php echo "$name" ?>
            </font>
          </th>
        </tr>
        <tr>
          <th class="th2">名称</th>
          <th class="th2">分別</th>
          <th class="th2">分別ルール</th>
        </tr>

        <?php
        if (!empty($result2)) {
            foreach ($result2 as $result) { //fireach:forみたいなの ?>
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
        }
    ?>

      </table>

      <h3 align="center" style="margin-top:80px;">
        <?php if (empty($result2)) {
        echo "ゴミデータが存在しません";
    }?>
      </h3>


    </div>
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
