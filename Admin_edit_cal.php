<?php
require_once('config.php');
session_start();

// page = 0 入力画面
// page = 1 変更確認画面
// page = 2 削除確認画面
// page = 3 エラー画面
$check = 0;

if (isset($_SESSION['ID'])) {
	header('Location: ./Main.php');
	exit();
}
//$db['host'] = DB_HOST;
//$db['user'] = DB_USER;
//$db['pass'] = DB_PASSWORD;
//$db['dbname'] = DB_NAME;
$user = 'root';
$password = '';
$dbName = 'gdss_db';
$host = 'localhost';
$errorMessage = "";

$dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
//'mysql:dbname='.$dbname.';host='.$host.';charset=utf8';

#データベースに接続
try {
$pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_EMULATE_PREPARES => false));
//$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
exit('データベースとの接続に失敗しました。'.$e->getMessage());
}

#データの抽出



//画面遷移
if(isset($_POST['henkou'])) {
	$check = 1;
}
if(isset($_POST['sakujo'])) {
	$check = 2;
}
if(isset($_POST['modo'])) {
	$check = 0;
}
if(isset($_POST['modomodo'])) {
	$check = 0;
}

if(isset($_POST['east1a'])) {$chiku = "東1区";}
if(isset($_POST['east1b'])) {$chiku = "東1区";}
if(isset($_POST['east1c'])) {$chiku = "東1区";}
if(isset($_POST['east1d'])) {$chiku = "東1区";}
if(isset($_POST['east1e'])) {$chiku = "東1区";}
if(isset($_POST['east1f'])) {$chiku = "東1区";}
if(isset($_POST['east1g'])) {$chiku = "東1区";}
if(isset($_POST['east1h'])) {$chiku = "東1区";}

?>

<!DOCTYPE html>
<HTML lang="ja">
	<!--入力画面-->
	<?php
	if($check == 0) {
	?>
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
      <div>
      <h3><a href="Mypage.php">
        <input type="submit" value="マイページに戻る"/>
      </a></h3>
      <table border="1">
      <tr><td colspan="100%">カレンダー編集</td></tr>
      <tr>
        <td width="200px">地区名</td>
        <td width="500px"><?php print $chiku; ?></td>
      </tr>
			<tr>
        <td>種類</td>
        <td>〇〇ゴミ</td>
      </tr>
			<tr>
        <td height="250px">曜日</td>
        <td height="250px">
					<form method="POST" action="">
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第1日曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第2日曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第3日曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第4日曜日
					<br>
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第1月曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第2月曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第3月曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第4月曜日
					<br>
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第1火曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第2火曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第3火曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第4火曜日
					<br>
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第1水曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第2水曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第3水曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第4水曜日
					<br>
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第1木曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第2木曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第3木曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第4木曜日
					<br>
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第1金曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第2金曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第3金曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第4金曜日
					<br>
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第1土曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第2土曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第3土曜日
					<input type="hidden" name="week1[]" value="0">
					<input type="checkbox" onclick="this.form.week1[].value=this.checked ? 1 : 0">第4土曜日
					<!--
					<input type="checkbox" name="week[]" value="sun1">第1日曜日
					<input type="checkbox" name="week[]" value="sun2">第2日曜日
					<input type="checkbox" name="week[]" value="sun3">第3日曜日
					<input type="checkbox" name="week[]" value="sun4">第4日曜日
					<br>
					<input type="checkbox" name="week[]" value="mon1">第1月曜日
					<input type="checkbox" name="week[]" value="mon2">第2月曜日
					<input type="checkbox" name="week[]" value="mon3">第3月曜日
					<input type="checkbox" name="week[]" value="mon4">第4月曜日
					<br>
					<input type="checkbox" name="week[]" value="tue1">第1火曜日
					<input type="checkbox" name="week[]" value="tue2">第2火曜日
					<input type="checkbox" name="week[]" value="tue3">第3火曜日
					<input type="checkbox" name="week[]" value="tue4">第4火曜日
					<br>
					<input type="checkbox" name="week[]" value="wed1">第1水曜日
					<input type="checkbox" name="week[]" value="wed2">第2水曜日
					<input type="checkbox" name="week[]" value="wed3">第3水曜日
					<input type="checkbox" name="week[]" value="wed4">第4水曜日
					<br>
					<input type="checkbox" name="week[]" value="thu1">第1木曜日
					<input type="checkbox" name="week[]" value="thu2">第2木曜日
					<input type="checkbox" name="week[]" value="thu3">第3木曜日
					<input type="checkbox" name="week[]" value="thu4">第4木曜日
					<br>
					<input type="checkbox" name="week[]" value="fri1">第1金曜日
					<input type="checkbox" name="week[]" value="fri2">第2金曜日
					<input type="checkbox" name="week[]" value="fri3">第3金曜日
					<input type="checkbox" name="week[]" value="fri4">第4金曜日
					<br>
					<input type="checkbox" name="week[]" value="sat1">第1土曜日
					<input type="checkbox" name="week[]" value="sat2">第2土曜日
					<input type="checkbox" name="week[]" value="sat3">第3土曜日
					<input type="checkbox" name="week[]" value="sat4">第4土曜日
				  -->
				</td>
      </tr>
      </table>
    </div>
		<h4>
			<a>
				<input type="submit" id="henkou" name="henkou" value="変更"/>
			</a>
		</h4>
		<h5>
			<a>
				<input type="submit" id="sakujo" name="sakujo" value="削除"/>
			</a>
		</h5>
	</form>
	<h6>
		<a href="Admin_list_cal.php">
			<input type="submit" id="modoru" name="modoru" value="カレンダー一覧に戻る"/>
		</a>
	</h6>

    <!-- PAGE TOPに戻るボタン
  ぺーじによっては、コメントアウトして消してください -->
    <a class="pagetop" href="#">PAGE TOP</a>

    <!-- FOOTER -->
    <div class="footer">
      <p class="title">GDSS</p>
      <p class="company">L&P</p>
    </div>
  </BODY>
	<?php
	}
	?>

	<!--変更確認画面-->
	<?php
	if($check == 1) {
	?>
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
	<h3>
		次の通り変更しますか？
	</h3>
	<h4><a href="Admin_edit_cal_comp.php">
		<input type="submit" value="変更"/>
	</a></h4>
	<h4><a>
		<input type="submit" id="modo" name="modo" value="戻る"/>
	</a></h4>


	<!-- PAGE TOPに戻るボタン
ぺーじによっては、コメントアウトして消してください -->
	<a class="pagetop" href="#">PAGE TOP</a>

	<!-- FOOTER -->
	<div class="footer">
		<p class="title">GDSS</p>
		<p class="company">L&P</p>
	</div>
</BODY>
<?php
}
?>

<!--削除確認画面-->
<?php
if($check == 2) {
?>
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
<h3>
	本当に削除しますか？
</h3>
<h4><a href="Admin_edit_cal_comp.php">
	<input type="submit" value="削除"/>
</a></h4>
<h4><a>
	<input type="submit" id="modomodo" name="modomodo"　value="戻る"/>
</a></h4>


<!-- PAGE TOPに戻るボタン
ぺーじによっては、コメントアウトして消してください -->
<a class="pagetop" href="#">PAGE TOP</a>

<!-- FOOTER -->
<div class="footer">
	<p class="title">GDSS</p>
	<p class="company">L&P</p>
</div>
</BODY>
<?php
}
?>

<!--エラー画面-->
<?php
if($check == 3) {
?>
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

<!-- PAGE TOPに戻るボタン
ぺーじによっては、コメントアウトして消してください -->
<a class="pagetop" href="#">PAGE TOP</a>

<!-- FOOTER -->
<div class="footer">
	<p class="title">GDSS</p>
	<p class="company">L&P</p>
</div>
</BODY>
<?php
}
?>
</HTML>
