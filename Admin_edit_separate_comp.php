<?php
require_once('config.php');
session_start();
date_default_timezone_set('Asia/Tokyo');
if (!isset($_SESSION['ID'])) {
	header('Location: ./Main.php');
	exit();
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
			<a href="Mypage.php">マイページに戻る</a>
			<p>分別編集</p>
			<p>編集が完了しました。</p>
			<a href="Admin_separate_list.php">ゴミ分別一覧に戻る</a>
    </div>

    <!-- FOOTER -->
    <div class="footer">
      <p class="title">GDSS</p>
      <p class="company">L&P</p>
    </div>
  </BODY>
</HTML>
