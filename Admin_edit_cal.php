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
	echo "データベースの接続に失敗しました。";
	exit();
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
if(isset($_POST['modo1'])) {
	$check = 0;
}


$chiku1 = "東1区";
$chiku2 = "東2区";
$chiku3 = "東3区";
$chiku4 = "西1区";
$chiku5 = "西2区";
$chiku6 = "西3区";
$gomi1 = "燃える";
$gomi2 = "金属類";
$gomi3 = "ビン類";
$gomi4 = "他不燃";
$gomi5 = "ペット";
$gomi6 = "プラ";
$gomi7 = "紙類";
$gomi8 = "衣類";





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
        <td width="500px">
					<?php
					if(isset($_POST['east1a'])) {print $chiku1; $chikumei = "東1区";}
					if(isset($_POST['east1b'])) {print $chiku1; $chikumei = "東1区";}
					if(isset($_POST['east1c'])) {print $chiku1; $chikumei = "東1区";}
					if(isset($_POST['east1d'])) {print $chiku1; $chikumei = "東1区";}
					if(isset($_POST['east1e'])) {print $chiku1; $chikumei = "東1区";}
					if(isset($_POST['east1f'])) {print $chiku1; $chikumei = "東1区";}
					if(isset($_POST['east1g'])) {print $chiku1; $chikumei = "東1区";}
					if(isset($_POST['east1h'])) {print $chiku1; $chikumei = "東1区";}
					if(isset($_POST['east2a'])) {print $chiku2; $chikumei = "東2区";}
					if(isset($_POST['east2b'])) {print $chiku2; $chikumei = "東2区";}
					if(isset($_POST['east2c'])) {print $chiku2; $chikumei = "東2区";}
					if(isset($_POST['east2d'])) {print $chiku2; $chikumei = "東2区";}
					if(isset($_POST['east2e'])) {print $chiku2; $chikumei = "東2区";}
					if(isset($_POST['east2f'])) {print $chiku2; $chikumei = "東2区";}
					if(isset($_POST['east2g'])) {print $chiku2; $chikumei = "東2区";}
					if(isset($_POST['east2h'])) {print $chiku2; $chikumei = "東2区";}
					if(isset($_POST['east3a'])) {print $chiku3; $chikumei = "東3区";}
					if(isset($_POST['east3b'])) {print $chiku3; $chikumei = "東3区";}
					if(isset($_POST['east3c'])) {print $chiku3; $chikumei = "東3区";}
					if(isset($_POST['east3d'])) {print $chiku3; $chikumei = "東3区";}
					if(isset($_POST['east3e'])) {print $chiku3; $chikumei = "東3区";}
					if(isset($_POST['east3f'])) {print $chiku3; $chikumei = "東3区";}
					if(isset($_POST['east3g'])) {print $chiku3; $chikumei = "東3区";}
					if(isset($_POST['east3h'])) {print $chiku3; $chikumei = "東3区";}
					if(isset($_POST['east4a'])) {print $chiku4; $chikumei = "西1区";}
					if(isset($_POST['east4b'])) {print $chiku4; $chikumei = "西1区";}
					if(isset($_POST['east4c'])) {print $chiku4; $chikumei = "西1区";}
					if(isset($_POST['east4d'])) {print $chiku4; $chikumei = "西1区";}
					if(isset($_POST['east4e'])) {print $chiku4; $chikumei = "西1区";}
					if(isset($_POST['east4f'])) {print $chiku4; $chikumei = "西1区";}
					if(isset($_POST['east4g'])) {print $chiku4; $chikumei = "西1区";}
					if(isset($_POST['east4h'])) {print $chiku4; $chikumei = "西1区";}
					if(isset($_POST['east5a'])) {print $chiku5; $chikumei = "西2区";}
					if(isset($_POST['east5b'])) {print $chiku5; $chikumei = "西2区";}
					if(isset($_POST['east5c'])) {print $chiku5; $chikumei = "西2区";}
					if(isset($_POST['east5d'])) {print $chiku5; $chikumei = "西2区";}
					if(isset($_POST['east5e'])) {print $chiku5; $chikumei = "西2区";}
					if(isset($_POST['east5f'])) {print $chiku5; $chikumei = "西2区";}
					if(isset($_POST['east5g'])) {print $chiku5; $chikumei = "西2区";}
					if(isset($_POST['east5h'])) {print $chiku5; $chikumei = "西2区";}
					if(isset($_POST['east6a'])) {print $chiku6; $chikumei = "西3区";}
					if(isset($_POST['east6b'])) {print $chiku6; $chikumei = "西3区";}
					if(isset($_POST['east6c'])) {print $chiku6; $chikumei = "西3区";}
					if(isset($_POST['east6d'])) {print $chiku6; $chikumei = "西3区";}
					if(isset($_POST['east6e'])) {print $chiku6; $chikumei = "西3区";}
					if(isset($_POST['east6f'])) {print $chiku6; $chikumei = "西3区";}
					if(isset($_POST['east6g'])) {print $chiku6; $chikumei = "西3区";}
					if(isset($_POST['east6h'])) {print $chiku6; $chikumei = "西3区";}
					?>
				</td>
      </tr>
			<tr>
        <td>種類</td>
        <td>
					<?php
					if(isset($_POST['east1a'])) {print $gomi1; $gomimei = "燃える";}
					if(isset($_POST['east1b'])) {print $gomi2; $gomimei = "金属類";}
					if(isset($_POST['east1c'])) {print $gomi3; $gomimei = "ビン類";}
					if(isset($_POST['east1d'])) {print $gomi4; $gomimei = "他不燃";}
					if(isset($_POST['east1e'])) {print $gomi5; $gomimei = "ペット";}
					if(isset($_POST['east1f'])) {print $gomi6; $gomimei = "プラ";}
					if(isset($_POST['east1g'])) {print $gomi7; $gomimei = "紙類";}
					if(isset($_POST['east1h'])) {print $gomi8; $gomimei = "衣類";}
					if(isset($_POST['east2a'])) {print $gomi1; $gomimei = "燃える";}
					if(isset($_POST['east2b'])) {print $gomi2; $gomimei = "金属類";}
					if(isset($_POST['east2c'])) {print $gomi3; $gomimei = "ビン類";}
					if(isset($_POST['east2d'])) {print $gomi4; $gomimei = "他不燃";}
					if(isset($_POST['east2e'])) {print $gomi5; $gomimei = "ペット";}
					if(isset($_POST['east2f'])) {print $gomi6; $gomimei = "プラ";}
					if(isset($_POST['east2g'])) {print $gomi7; $gomimei = "紙類";}
					if(isset($_POST['east2h'])) {print $gomi8; $gomimei = "衣類";}
					if(isset($_POST['east3a'])) {print $gomi1; $gomimei = "燃える";}
					if(isset($_POST['east3b'])) {print $gomi2; $gomimei = "金属類";}
					if(isset($_POST['east3c'])) {print $gomi3; $gomimei = "ビン類";}
					if(isset($_POST['east3d'])) {print $gomi4; $gomimei = "他不燃";}
					if(isset($_POST['east3e'])) {print $gomi5; $gomimei = "ペット";}
					if(isset($_POST['east3f'])) {print $gomi6; $gomimei = "プラ";}
					if(isset($_POST['east3g'])) {print $gomi7; $gomimei = "紙類";}
					if(isset($_POST['east3h'])) {print $gomi8; $gomimei = "衣類";}
					if(isset($_POST['east4a'])) {print $gomi1; $gomimei = "燃える";}
					if(isset($_POST['east4b'])) {print $gomi2; $gomimei = "金属類";}
					if(isset($_POST['east4c'])) {print $gomi3; $gomimei = "ビン類";}
					if(isset($_POST['east4d'])) {print $gomi4; $gomimei = "他不燃";}
					if(isset($_POST['east4e'])) {print $gomi5; $gomimei = "ペット";}
					if(isset($_POST['east4f'])) {print $gomi6; $gomimei = "プラ";}
					if(isset($_POST['east4g'])) {print $gomi7; $gomimei = "紙類";}
					if(isset($_POST['east4h'])) {print $gomi8; $gomimei = "衣類";}
					if(isset($_POST['east5a'])) {print $gomi1; $gomimei = "燃える";}
					if(isset($_POST['east5b'])) {print $gomi2; $gomimei = "金属類";}
					if(isset($_POST['east5c'])) {print $gomi3; $gomimei = "ビン類";}
					if(isset($_POST['east5d'])) {print $gomi4; $gomimei = "他不燃";}
					if(isset($_POST['east5e'])) {print $gomi5; $gomimei = "ペット";}
					if(isset($_POST['east5f'])) {print $gomi6; $gomimei = "プラ";}
					if(isset($_POST['east5g'])) {print $gomi7; $gomimei = "紙類";}
					if(isset($_POST['east5h'])) {print $gomi8; $gomimei = "衣類";}
					if(isset($_POST['east6a'])) {print $gomi1; $gomimei = "燃える";}
					if(isset($_POST['east6b'])) {print $gomi2; $gomimei = "金属類";}
					if(isset($_POST['east6c'])) {print $gomi3; $gomimei = "ビン類";}
					if(isset($_POST['east6d'])) {print $gomi4; $gomimei = "他不燃";}
					if(isset($_POST['east6e'])) {print $gomi5; $gomimei = "ペット";}
					if(isset($_POST['east6f'])) {print $gomi6; $gomimei = "プラ";}
					if(isset($_POST['east6g'])) {print $gomi7; $gomimei = "紙類";}
					if(isset($_POST['east6h'])) {print $gomi8; $gomimei = "衣類";}
					?>
				</td>
      </tr>
			<tr>
        <td height="250px">曜日</td>
        <td height="250px">
					<form method="POST" action="">

          <input type="hidden" name="week[0]" value="0"/>
					<input type="checkbox" name="week[0]" value="1">第1日曜日
					<input type="hidden" name="week[1]" value="0"/>
					<input type="checkbox" name="week[1]" value="1">第2日曜日
					<input type="hidden" name="week[2]" value="0"/>
					<input type="checkbox" name="week[2]" value="1">第3日曜日
					<input type="hidden" name="week[3]" value="0"/>
					<input type="checkbox" name="week[3]" value="1">第4日曜日
					<br>
					<input type="hidden" name="week[4]" value="0"/>
					<input type="checkbox" name="week[4]" value="1">第1月曜日
					<input type="hidden" name="week[5]" value="0"/>
					<input type="checkbox" name="week[5]" value="1">第2月曜日
					<input type="hidden" name="week[6]" value="0"/>
					<input type="checkbox" name="week[6]" value="1">第3月曜日
					<input type="hidden" name="week[7]" value="0"/>
					<input type="checkbox" name="week[7]" value="1">第4月曜日
					<br>
					<input type="hidden" name="week[8]" value="0"/>
					<input type="checkbox" name="week[8]" value="1">第1火曜日
					<input type="hidden" name="week[9]" value="0"/>
					<input type="checkbox" name="week[9]" value="1">第2火曜日
					<input type="hidden" name="week[10]" value="0"/>
					<input type="checkbox" name="week[10]" value="1">第3火曜日
					<input type="hidden" name="week[11]" value="0"/>
					<input type="checkbox" name="week[11]" value="1">第4火曜日
					<br>
					<input type="hidden" name="week[12]" value="0"/>
					<input type="checkbox" name="week[12]" value="1">第1水曜日
					<input type="hidden" name="week[13]" value="0"/>
					<input type="checkbox" name="week[13]" value="1">第2水曜日
					<input type="hidden" name="week[14]" value="0"/>
					<input type="checkbox" name="week[14]" value="1">第3水曜日
					<input type="hidden" name="week[15]" value="0"/>
					<input type="checkbox" name="week[15]" value="1">第4水曜日
					<br>
					<input type="hidden" name="week[16]" value="0"/>
					<input type="checkbox" name="week[16]" value="1">第1木曜日
					<input type="hidden" name="week[17]" value="0"/>
					<input type="checkbox" name="week[17]" value="1">第2木曜日
					<input type="hidden" name="week[18]" value="0"/>
					<input type="checkbox" name="week[18]" value="1">第3木曜日
					<input type="hidden" name="week[19]" value="0"/>
					<input type="checkbox" name="week[19]" value="1">第4木曜日
					<br>
					<input type="hidden" name="week[20]" value="0"/>
					<input type="checkbox" name="week[20]" value="1">第1金曜日
					<input type="hidden" name="week[21]" value="0"/>
					<input type="checkbox" name="week[21]" value="1">第2金曜日
					<input type="hidden" name="week[22]" value="0"/>
					<input type="checkbox" name="week[22]" value="1">第3金曜日
					<input type="hidden" name="week[23]" value="0"/>
					<input type="checkbox" name="week[23]" value="1">第4金曜日
					<br>
					<input type="hidden" name="week[24]" value="0"/>
					<input type="checkbox" name="week[24]" value="1">第1土曜日
					<input type="hidden" name="week[25]" value="0"/>
					<input type="checkbox" name="week[25]" value="1">第2土曜日
					<input type="hidden" name="week[26]" value="0"/>
					<input type="checkbox" name="week[26]" value="1">第3土曜日
					<input type="hidden" name="week[27]" value="0"/>
					<input type="checkbox" name="week[27]" value="1">第4土曜日


				</td>
      </tr>
      </table>
    </div>
		<h4>
			<a>
				<input type="hidden" name="chikku" value="<?php echo $chikumei; ?>"/>
				<input type="hidden" name="gommi" value="<?php echo $gomimei; ?>"/>
				<input type="submit" name="henkou" value="変更"/>
			</a>
		</h4>
		<!--</form>
		<form method="POST" action="">-->
		<h5>
			<a>
				<input type="hidden" name="chikku" value="<?php echo $chikumei; ?>"/>
				<input type="hidden" name="gommi" value="<?php echo $gomimei; ?>"/>
				<input type="submit" name="sakujo" value="削除"/>
			</a>
		</h5>
		</form>
	<h6>
		<a href="Admin_list_cal.php">
			<input type="submit" name="modoru" value="カレンダー一覧に戻る"/>
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
		$chikku = $_POST['chikku'];
		$gommi = $_POST['gommi'];

		if (isset($_POST['week']) && is_array($_POST['week'])){
			$week = $_POST['week'];
			//print_r($week);
		}
		$week_id = implode($week);
    //print $week_id;
		$week_id = bindec($week_id);
		//print $week_id;
		if ($chikku == "東1区"){$chiku_id = 1;}
		if ($chikku == "東2区"){$chiku_id = 2;}
		if ($chikku == "東3区"){$chiku_id = 3;}
		if ($chikku == "西1区"){$chiku_id = 4;}
		if ($chikku == "西2区"){$chiku_id = 5;}
		if ($chikku == "西3区"){$chiku_id = 6;}
		if ($gommi == "燃える"){$gomi_id = "burn";}
		if ($gommi == "金属類"){$gomi_id = "metal";}
		if ($gommi == "ビン類"){$gomi_id = "bottle";}
		if ($gommi == "他不燃"){$gomi_id = "nonburn";}
		if ($gommi == "ペット"){$gomi_id = "pet";}
		if ($gommi == "プラ"){$gomi_id = "plastic";}
		if ($gommi == "紙類"){$gomi_id = "paper";}
		if ($gommi == "衣類"){$gomi_id = "cloth";}

		if ($week_id == 0){
			$check = 3;
		}else{
			try{
				$sql = "UPDATE week SET $gomi_id=$week_id WHERE area_id=$chiku_id";
				$stmt1 = $pdo->prepare($sql);
				$stmt1->execute();
				header("Location: ./Admin_edit_cal_comp.php");
	      exit();
			} catch (PDOException $e) {
				echo "データベースの抽出に失敗しました。";
				exit();
			}
		}
}
?>

<!--削除確認画面-->
<?php
if($check == 2) {
	$chikku = $_POST['chikku'];
	$gommi = $_POST['gommi'];

	if (isset($_POST['week']) && is_array($_POST['week'])){
		$week = $_POST['week'];
		//print_r($week);
	}
	$week_id = implode($week);
	//print $week_id;
	$week_id = bindec($week_id);
	//print $week_id;
	if ($chikku == "東1区"){$chiku_id = 1;}
	if ($chikku == "東2区"){$chiku_id = 2;}
	if ($chikku == "東3区"){$chiku_id = 3;}
	if ($chikku == "西1区"){$chiku_id = 4;}
	if ($chikku == "西2区"){$chiku_id = 5;}
	if ($chikku == "西3区"){$chiku_id = 6;}
	if ($gommi == "燃える"){$gomi_id = "burn";}
	if ($gommi == "金属類"){$gomi_id = "metal";}
	if ($gommi == "ビン類"){$gomi_id = "bottle";}
	if ($gommi == "他不燃"){$gomi_id = "nonburn";}
	if ($gommi == "ペット"){$gomi_id = "pet";}
	if ($gommi == "プラ"){$gomi_id = "plastic";}
	if ($gommi == "紙類"){$gomi_id = "paper";}
	if ($gommi == "衣類"){$gomi_id = "cloth";}

	try{
		$sql = "UPDATE week SET $gomi_id=0 WHERE area_id=$chiku_id";
		$stmt1 = $pdo->prepare($sql);
		$stmt1->execute();
		header("Location: ./Admin_edit_cal_comp.php");
		exit();
	} catch (PDOException $e) {
		echo "データベースの抽出に失敗しました。";
		exit();
	}
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
	<!-- HEADER -->
	<div class="header">
		<p class="title">GDSS</p>
		<p class="wayaku">ゴミ出し支援システム</p>
		<p class="desc">このサイトは、高知県香美市土佐山田町が対象となっています。</p>
	</div>
	<div class="content">
		<!-- ここに各ページの中身いれてください -->
		<h2><?php print "曜日を1つ以上選択してください。"; ?></h2>
		<h6>
			<a href="Admin_list_cal.php">
				<input type="submit" name="modoru" value="カレンダー一覧に戻る"/>
			</a>
		</h6>
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
<?php
}
?>
</HTML>
