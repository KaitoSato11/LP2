<?php
require_once('config.php');
session_start();
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
try{
	$sql = "SELECT * FROM week WHERE area_id=1";
	$stmt1 = $pdo->prepare($sql);
	$stmt1->execute();
} catch (PDOException $e) {
  exit('データベースの抽出に失敗しました。'.$e->getMessage());
}
$value1 = $stmt1->fetch();

$east1_burn = $value1[1];
$east1_metal = $value1[2];
$east1_bottle = $value1[3];
$east1_nonburn = $value1[4];
$east1_pet = $value1[5];
$east1_plastic = $value1[6];
$east1_paper = $value1[7];
$east1_cloth = $value1[8];

$east1_burn = decbin($east1_burn);
$east1_metal = decbin($east1_metal);
$east1_bottle = decbin($east1_bottle);
$east1_nonburn = decbin($east1_nonburn);
$east1_pet = decbin($east1_pet);
$east1_plastic = decbin($east1_plastic);
$east1_paper = decbin($east1_paper);
$east1_cloth = decbin($east1_cloth);

$east1_a = str_pad($east1_burn, 28, '0', STR_PAD_LEFT);
$east1_b = str_pad($east1_metal, 28, '0', STR_PAD_LEFT);
$east1_c = str_pad($east1_bottle, 28, '0', STR_PAD_LEFT);
$east1_d = str_pad($east1_nonburn, 28, '0', STR_PAD_LEFT);
$east1_e = str_pad($east1_pet, 28, '0', STR_PAD_LEFT);
$east1_f = str_pad($east1_plastic, 28, '0', STR_PAD_LEFT);
$east1_g = str_pad($east1_paper, 28, '0', STR_PAD_LEFT);
$east1_h = str_pad($east1_cloth, 28, '0', STR_PAD_LEFT);
//東1区burn
if ($east1_a[0]==1) {$east1_1[]="第1日曜日";}
if ($east1_a[1]==1) {$east1_1[]="第2日曜日";}
if ($east1_a[2]==1) {$east1_1[]="第3日曜日";}
if ($east1_a[3]==1) {$east1_1[]="第4日曜日";}
if ($east1_a[4]==1) {$east1_1[]="第1月曜日";}
if ($east1_a[5]==1) {$east1_1[]="第2月曜日";}
if ($east1_a[6]==1) {$east1_1[]="第3月曜日";}
if ($east1_a[7]==1) {$east1_1[]="第4月曜日";}
if ($east1_a[8]==1) {$east1_1[]="第1火曜日";}
if ($east1_a[9]==1) {$east1_1[]="第2火曜日";}
if ($east1_a[10]==1) {$east1_1[]="第3火曜日";}
if ($east1_a[11]==1) {$east1_1[]="第4火曜日";}
if ($east1_a[12]==1) {$east1_1[]="第1水曜日";}
if ($east1_a[13]==1) {$east1_1[]="第2水曜日";}
if ($east1_a[14]==1) {$east1_1[]="第3水曜日";}
if ($east1_a[15]==1) {$east1_1[]="第4水曜日";}
if ($east1_a[16]==1) {$east1_1[]="第1木曜日";}
if ($east1_a[17]==1) {$east1_1[]="第2木曜日";}
if ($east1_a[18]==1) {$east1_1[]="第3木曜日";}
if ($east1_a[19]==1) {$east1_1[]="第4木曜日";}
if ($east1_a[20]==1) {$east1_1[]="第1金曜日";}
if ($east1_a[21]==1) {$east1_1[]="第2金曜日";}
if ($east1_a[22]==1) {$east1_1[]="第3金曜日";}
if ($east1_a[23]==1) {$east1_1[]="第4金曜日";}
if ($east1_a[24]==1) {$east1_1[]="第1土曜日";}
if ($east1_a[25]==1) {$east1_1[]="第2土曜日";}
if ($east1_a[26]==1) {$east1_1[]="第3土曜日";}
if ($east1_a[27]==1) {$east1_1[]="第4土曜日";}
//東1区metal
if ($east1_b[0]==1) {$east1_2[]="第1日曜日";}
if ($east1_b[1]==1) {$east1_2[]="第2日曜日";}
if ($east1_b[2]==1) {$east1_2[]="第3日曜日";}
if ($east1_b[3]==1) {$east1_2[]="第4日曜日";}
if ($east1_b[4]==1) {$east1_2[]="第1月曜日";}
if ($east1_b[5]==1) {$east1_2[]="第2月曜日";}
if ($east1_b[6]==1) {$east1_2[]="第3月曜日";}
if ($east1_b[7]==1) {$east1_2[]="第4月曜日";}
if ($east1_b[8]==1) {$east1_2[]="第1火曜日";}
if ($east1_b[9]==1) {$east1_2[]="第2火曜日";}
if ($east1_b[10]==1) {$east1_2[]="第3火曜日";}
if ($east1_b[11]==1) {$east1_2[]="第4火曜日";}
if ($east1_b[12]==1) {$east1_2[]="第1水曜日";}
if ($east1_b[13]==1) {$east1_2[]="第2水曜日";}
if ($east1_b[14]==1) {$east1_2[]="第3水曜日";}
if ($east1_b[15]==1) {$east1_2[]="第4水曜日";}
if ($east1_b[16]==1) {$east1_2[]="第1木曜日";}
if ($east1_b[17]==1) {$east1_2[]="第2木曜日";}
if ($east1_b[18]==1) {$east1_2[]="第3木曜日";}
if ($east1_b[19]==1) {$east1_2[]="第4木曜日";}
if ($east1_b[20]==1) {$east1_2[]="第1金曜日";}
if ($east1_b[21]==1) {$east1_2[]="第2金曜日";}
if ($east1_b[22]==1) {$east1_2[]="第3金曜日";}
if ($east1_b[23]==1) {$east1_2[]="第4金曜日";}
if ($east1_b[24]==1) {$east1_2[]="第1土曜日";}
if ($east1_b[25]==1) {$east1_2[]="第2土曜日";}
if ($east1_b[26]==1) {$east1_2[]="第3土曜日";}
if ($east1_b[27]==1) {$east1_2[]="第4土曜日";}
//東1区bottle
if ($east1_c[0]==1) {$east1_3[]="第1日曜日";}
if ($east1_c[1]==1) {$east1_3[]="第2日曜日";}
if ($east1_c[2]==1) {$east1_3[]="第3日曜日";}
if ($east1_c[3]==1) {$east1_3[]="第4日曜日";}
if ($east1_c[4]==1) {$east1_3[]="第1月曜日";}
if ($east1_c[5]==1) {$east1_3[]="第2月曜日";}
if ($east1_c[6]==1) {$east1_3[]="第3月曜日";}
if ($east1_c[7]==1) {$east1_3[]="第4月曜日";}
if ($east1_c[8]==1) {$east1_3[]="第1火曜日";}
if ($east1_c[9]==1) {$east1_3[]="第2火曜日";}
if ($east1_c[10]==1) {$east1_3[]="第3火曜日";}
if ($east1_c[11]==1) {$east1_3[]="第4火曜日";}
if ($east1_c[12]==1) {$east1_3[]="第1水曜日";}
if ($east1_c[13]==1) {$east1_3[]="第2水曜日";}
if ($east1_c[14]==1) {$east1_3[]="第3水曜日";}
if ($east1_c[15]==1) {$east1_3[]="第4水曜日";}
if ($east1_c[16]==1) {$east1_3[]="第1木曜日";}
if ($east1_c[17]==1) {$east1_3[]="第2木曜日";}
if ($east1_c[18]==1) {$east1_3[]="第3木曜日";}
if ($east1_c[19]==1) {$east1_3[]="第4木曜日";}
if ($east1_c[20]==1) {$east1_3[]="第1金曜日";}
if ($east1_c[21]==1) {$east1_3[]="第2金曜日";}
if ($east1_c[22]==1) {$east1_3[]="第3金曜日";}
if ($east1_c[23]==1) {$east1_3[]="第4金曜日";}
if ($east1_c[24]==1) {$east1_3[]="第1土曜日";}
if ($east1_c[25]==1) {$east1_3[]="第2土曜日";}
if ($east1_c[26]==1) {$east1_3[]="第3土曜日";}
if ($east1_c[27]==1) {$east1_3[]="第4土曜日";}
//東1区nonburn
if ($east1_d[0]==1) {$east1_4[]="第1日曜日";}
if ($east1_d[1]==1) {$east1_4[]="第2日曜日";}
if ($east1_d[2]==1) {$east1_4[]="第3日曜日";}
if ($east1_d[3]==1) {$east1_4[]="第4日曜日";}
if ($east1_d[4]==1) {$east1_4[]="第1月曜日";}
if ($east1_d[5]==1) {$east1_4[]="第2月曜日";}
if ($east1_d[6]==1) {$east1_4[]="第3月曜日";}
if ($east1_d[7]==1) {$east1_4[]="第4月曜日";}
if ($east1_d[8]==1) {$east1_4[]="第1火曜日";}
if ($east1_d[9]==1) {$east1_4[]="第2火曜日";}
if ($east1_d[10]==1) {$east1_4[]="第3火曜日";}
if ($east1_d[11]==1) {$east1_4[]="第4火曜日";}
if ($east1_d[12]==1) {$east1_4[]="第1水曜日";}
if ($east1_d[13]==1) {$east1_4[]="第2水曜日";}
if ($east1_d[14]==1) {$east1_4[]="第3水曜日";}
if ($east1_d[15]==1) {$east1_4[]="第4水曜日";}
if ($east1_d[16]==1) {$east1_4[]="第1木曜日";}
if ($east1_d[17]==1) {$east1_4[]="第2木曜日";}
if ($east1_d[18]==1) {$east1_4[]="第3木曜日";}
if ($east1_d[19]==1) {$east1_4[]="第4木曜日";}
if ($east1_d[20]==1) {$east1_4[]="第1金曜日";}
if ($east1_d[21]==1) {$east1_4[]="第2金曜日";}
if ($east1_d[22]==1) {$east1_4[]="第3金曜日";}
if ($east1_d[23]==1) {$east1_4[]="第4金曜日";}
if ($east1_d[24]==1) {$east1_4[]="第1土曜日";}
if ($east1_d[25]==1) {$east1_4[]="第2土曜日";}
if ($east1_d[26]==1) {$east1_4[]="第3土曜日";}
if ($east1_d[27]==1) {$east1_4[]="第4土曜日";}
//東1区pet
if ($east1_e[0]==1) {$east1_5[]="第1日曜日";}
if ($east1_e[1]==1) {$east1_5[]="第2日曜日";}
if ($east1_e[2]==1) {$east1_5[]="第3日曜日";}
if ($east1_e[3]==1) {$east1_5[]="第4日曜日";}
if ($east1_e[4]==1) {$east1_5[]="第1月曜日";}
if ($east1_e[5]==1) {$east1_5[]="第2月曜日";}
if ($east1_e[6]==1) {$east1_5[]="第3月曜日";}
if ($east1_e[7]==1) {$east1_5[]="第4月曜日";}
if ($east1_e[8]==1) {$east1_5[]="第1火曜日";}
if ($east1_e[9]==1) {$east1_5[]="第2火曜日";}
if ($east1_e[10]==1) {$east1_5[]="第3火曜日";}
if ($east1_e[11]==1) {$east1_5[]="第4火曜日";}
if ($east1_e[12]==1) {$east1_5[]="第1水曜日";}
if ($east1_e[13]==1) {$east1_5[]="第2水曜日";}
if ($east1_e[14]==1) {$east1_5[]="第3水曜日";}
if ($east1_e[15]==1) {$east1_5[]="第4水曜日";}
if ($east1_e[16]==1) {$east1_5[]="第1木曜日";}
if ($east1_e[17]==1) {$east1_5[]="第2木曜日";}
if ($east1_e[18]==1) {$east1_5[]="第3木曜日";}
if ($east1_e[19]==1) {$east1_5[]="第4木曜日";}
if ($east1_e[20]==1) {$east1_5[]="第1金曜日";}
if ($east1_e[21]==1) {$east1_5[]="第2金曜日";}
if ($east1_e[22]==1) {$east1_5[]="第3金曜日";}
if ($east1_e[23]==1) {$east1_5[]="第4金曜日";}
if ($east1_e[24]==1) {$east1_5[]="第1土曜日";}
if ($east1_e[25]==1) {$east1_5[]="第2土曜日";}
if ($east1_e[26]==1) {$east1_5[]="第3土曜日";}
if ($east1_e[27]==1) {$east1_5[]="第4土曜日";}
//東1区plastic
if ($east1_f[0]==1) {$east1_6[]="第1日曜日";}
if ($east1_f[1]==1) {$east1_6[]="第2日曜日";}
if ($east1_f[2]==1) {$east1_6[]="第3日曜日";}
if ($east1_f[3]==1) {$east1_6[]="第4日曜日";}
if ($east1_f[4]==1) {$east1_6[]="第1月曜日";}
if ($east1_f[5]==1) {$east1_6[]="第2月曜日";}
if ($east1_f[6]==1) {$east1_6[]="第3月曜日";}
if ($east1_f[7]==1) {$east1_6[]="第4月曜日";}
if ($east1_f[8]==1) {$east1_6[]="第1火曜日";}
if ($east1_f[9]==1) {$east1_6[]="第2火曜日";}
if ($east1_f[10]==1) {$east1_6[]="第3火曜日";}
if ($east1_f[11]==1) {$east1_6[]="第4火曜日";}
if ($east1_f[12]==1) {$east1_6[]="第1水曜日";}
if ($east1_f[13]==1) {$east1_6[]="第2水曜日";}
if ($east1_f[14]==1) {$east1_6[]="第3水曜日";}
if ($east1_f[15]==1) {$east1_6[]="第4水曜日";}
if ($east1_f[16]==1) {$east1_6[]="第1木曜日";}
if ($east1_f[17]==1) {$east1_6[]="第2木曜日";}
if ($east1_f[18]==1) {$east1_6[]="第3木曜日";}
if ($east1_f[19]==1) {$east1_6[]="第4木曜日";}
if ($east1_f[20]==1) {$east1_6[]="第1金曜日";}
if ($east1_f[21]==1) {$east1_6[]="第2金曜日";}
if ($east1_f[22]==1) {$east1_6[]="第3金曜日";}
if ($east1_f[23]==1) {$east1_6[]="第4金曜日";}
if ($east1_f[24]==1) {$east1_6[]="第1土曜日";}
if ($east1_f[25]==1) {$east1_6[]="第2土曜日";}
if ($east1_f[26]==1) {$east1_6[]="第3土曜日";}
if ($east1_f[27]==1) {$east1_6[]="第4土曜日";}
//東1区paper
if ($east1_g[0]==1) {$east1_7[]="第1日曜日";}
if ($east1_g[1]==1) {$east1_7[]="第2日曜日";}
if ($east1_g[2]==1) {$east1_7[]="第3日曜日";}
if ($east1_g[3]==1) {$east1_7[]="第4日曜日";}
if ($east1_g[4]==1) {$east1_7[]="第1月曜日";}
if ($east1_g[5]==1) {$east1_7[]="第2月曜日";}
if ($east1_g[6]==1) {$east1_7[]="第3月曜日";}
if ($east1_g[7]==1) {$east1_7[]="第4月曜日";}
if ($east1_g[8]==1) {$east1_7[]="第1火曜日";}
if ($east1_g[9]==1) {$east1_7[]="第2火曜日";}
if ($east1_g[10]==1) {$east1_7[]="第3火曜日";}
if ($east1_g[11]==1) {$east1_7[]="第4火曜日";}
if ($east1_g[12]==1) {$east1_7[]="第1水曜日";}
if ($east1_g[13]==1) {$east1_7[]="第2水曜日";}
if ($east1_g[14]==1) {$east1_7[]="第3水曜日";}
if ($east1_g[15]==1) {$east1_7[]="第4水曜日";}
if ($east1_g[16]==1) {$east1_7[]="第1木曜日";}
if ($east1_g[17]==1) {$east1_7[]="第2木曜日";}
if ($east1_g[18]==1) {$east1_7[]="第3木曜日";}
if ($east1_g[19]==1) {$east1_7[]="第4木曜日";}
if ($east1_g[20]==1) {$east1_7[]="第1金曜日";}
if ($east1_g[21]==1) {$east1_7[]="第2金曜日";}
if ($east1_g[22]==1) {$east1_7[]="第3金曜日";}
if ($east1_g[23]==1) {$east1_7[]="第4金曜日";}
if ($east1_g[24]==1) {$east1_7[]="第1土曜日";}
if ($east1_g[25]==1) {$east1_7[]="第2土曜日";}
if ($east1_g[26]==1) {$east1_7[]="第3土曜日";}
if ($east1_g[27]==1) {$east1_7[]="第4土曜日";}
//東1区cloth
if ($east1_h[0]==1) {$east1_8[]="第1日曜日";}
if ($east1_h[1]==1) {$east1_8[]="第2日曜日";}
if ($east1_h[2]==1) {$east1_8[]="第3日曜日";}
if ($east1_h[3]==1) {$east1_8[]="第4日曜日";}
if ($east1_h[4]==1) {$east1_8[]="第1月曜日";}
if ($east1_h[5]==1) {$east1_8[]="第2月曜日";}
if ($east1_h[6]==1) {$east1_8[]="第3月曜日";}
if ($east1_h[7]==1) {$east1_8[]="第4月曜日";}
if ($east1_h[8]==1) {$east1_8[]="第1火曜日";}
if ($east1_h[9]==1) {$east1_8[]="第2火曜日";}
if ($east1_h[10]==1) {$east1_8[]="第3火曜日";}
if ($east1_h[11]==1) {$east1_8[]="第4火曜日";}
if ($east1_h[12]==1) {$east1_8[]="第1水曜日";}
if ($east1_h[13]==1) {$east1_8[]="第2水曜日";}
if ($east1_h[14]==1) {$east1_8[]="第3水曜日";}
if ($east1_h[15]==1) {$east1_8[]="第4水曜日";}
if ($east1_h[16]==1) {$east1_8[]="第1木曜日";}
if ($east1_h[17]==1) {$east1_8[]="第2木曜日";}
if ($east1_h[18]==1) {$east1_8[]="第3木曜日";}
if ($east1_h[19]==1) {$east1_8[]="第4木曜日";}
if ($east1_h[20]==1) {$east1_8[]="第1金曜日";}
if ($east1_h[21]==1) {$east1_8[]="第2金曜日";}
if ($east1_h[22]==1) {$east1_8[]="第3金曜日";}
if ($east1_h[23]==1) {$east1_8[]="第4金曜日";}
if ($east1_h[24]==1) {$east1_8[]="第1土曜日";}
if ($east1_h[25]==1) {$east1_8[]="第2土曜日";}
if ($east1_h[26]==1) {$east1_8[]="第3土曜日";}
if ($east1_h[27]==1) {$east1_8[]="第4土曜日";}




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

      <form method="POST" action="Admin_edit_cal.php">
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
        <td id="east0101">
					<?php
					for($i = 0 ; $i < count($east1_1); $i++){
					  print $east1_1[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east1a" value="編集"/>
				  </a>
			  </td>
        <td id="east0102">
					<?php
					for($i = 0 ; $i < count($east1_2); $i++){
					  print $east1_2[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east1b" value="編集"/>
				  </a>
				</td>
        <td id="east0103">
					<?php
					for($i = 0 ; $i < count($east1_3); $i++){
					  print $east1_3[$i];
					?><br>
					<?php } ?>
					<input type="submit" value="編集"/>
				</td>
        <td id="east0104">
					<?php
					for($i = 0 ; $i < count($east1_4); $i++){
					  print $east1_4[$i];
					?><br>
					<?php } ?>
					<input type="submit" value="編集"/>
				</td>
        <td id="east0105">
					<?php
					for($i = 0 ; $i < count($east1_5); $i++){
					  print $east1_5[$i];
					?><br>
					<?php } ?>
					<input type="submit" value="編集"/>
				</td>
        <td id="east0106">
					<?php
					for($i = 0 ; $i < count($east1_6); $i++){
					  print $east1_6[$i];
					?><br>
					<?php } ?>
					<input type="submit" value="編集"/>
				</td>
        <td id="east0107">
					<?php
					for($i = 0 ; $i < count($east1_7); $i++){
					  print $east1_7[$i];
					?><br>
					<?php } ?>
					<input type="submit" value="編集"/>
				</td>
        <td id="east0108">
					<?php
					for($i = 0 ; $i < count($east1_8); $i++){
					  print $east1_8[$i];
					?><br>
					<?php } ?>
					<input type="submit" value="編集"/>
				</td>
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
			</form>
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
