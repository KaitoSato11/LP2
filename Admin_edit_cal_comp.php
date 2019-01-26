<?php
require_once('config.php');
session_start();
if (!isset($_SESSION['ID'])) {
	header('Location: ./Main.php');
	exit();
}
?>
<!DOCTYPE html>
<HTML lang="ja">
	<!--入力画面-->
	<HEAD>
		<meta charset="utf-8">
		<title>GDSS ゴミ出し支援システム</title>
		<link rel="icon" href="iconG.ico">
		<meta name="description" content="高知県香美市土佐山田町を対象とした、ゴミ出しを支援するサイトです。">
		<link rel="stylesheet" href="design.css">
		<style type="text/css">
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
			<div class="title">
				<h2>カレンダー編集</h2>
			</div>
			<center>
				<h3>完了しました！</h3>
      	<h3><a href="Mypage.php">
      		<input type="submit" value="マイページに戻る"/>
      	</a></h3>
				<h4><a href="Admin_list_cal.php">
      		<input type="submit" value="カレンダー一覧に戻る"/>
      	</a></h4>
			</center>
		</div>
		<!-- FOOTER -->
		<div class="footer">
			<p class="title">GDSS</p>
			<p class="company">L&P</p>
		</div>
	</BODY>
</HTML>
