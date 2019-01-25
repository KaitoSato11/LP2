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
    <div class="content">
      <div class="title">
        <h2>ユーザ削除</h2>
      </div>
      <center>
        <br>
        <h2>ユーザ削除が完了しました</h2>
        <div id="event">
          <a href="./Main.php">メインメニューへ戻る</a>
        </div>
      </center>
    </div>

    <!-- FOOTER -->
    <div class="footer">
      <p class="title">GDSS</p>
      <p class="company">L&P</p>
    </div>
  </body>
</html>
