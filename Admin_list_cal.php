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
//if (($east1_b[24]==1 && $east1_b[25]==1) && ($east1_b[26]==1 && $east1_b[27]==1)) {
	//for($i = count($east1_2) ; $i > count($east1_2) - 5; $i--){
		//$east1_2[$i] = null;}$east1_2[]="毎週土曜日";}
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

//ここから東2区
#データの抽出
try{
	$sql = "SELECT * FROM week WHERE area_id=2";
	$stmt2 = $pdo->prepare($sql);
	$stmt2->execute();
} catch (PDOException $e) {
  exit('データベースの抽出に失敗しました。'.$e->getMessage());
}
$value2 = $stmt2->fetch();

$east2_burn = $value2[1];
$east2_metal = $value2[2];
$east2_bottle = $value2[3];
$east2_nonburn = $value2[4];
$east2_pet = $value2[5];
$east2_plastic = $value2[6];
$east2_paper = $value2[7];
$east2_cloth = $value2[8];

$east2_burn = decbin($east2_burn);
$east2_metal = decbin($east2_metal);
$east2_bottle = decbin($east2_bottle);
$east2_nonburn = decbin($east2_nonburn);
$east2_pet = decbin($east2_pet);
$east2_plastic = decbin($east2_plastic);
$east2_paper = decbin($east2_paper);
$east2_cloth = decbin($east2_cloth);

$east2_a = str_pad($east2_burn, 28, '0', STR_PAD_LEFT);
$east2_b = str_pad($east2_metal, 28, '0', STR_PAD_LEFT);
$east2_c = str_pad($east2_bottle, 28, '0', STR_PAD_LEFT);
$east2_d = str_pad($east2_nonburn, 28, '0', STR_PAD_LEFT);
$east2_e = str_pad($east2_pet, 28, '0', STR_PAD_LEFT);
$east2_f = str_pad($east2_plastic, 28, '0', STR_PAD_LEFT);
$east2_g = str_pad($east2_paper, 28, '0', STR_PAD_LEFT);
$east2_h = str_pad($east2_cloth, 28, '0', STR_PAD_LEFT);
//東2区burn
if ($east2_a[0]==1) {$east2_1[]="第1日曜日";}
if ($east2_a[1]==1) {$east2_1[]="第2日曜日";}
if ($east2_a[2]==1) {$east2_1[]="第3日曜日";}
if ($east2_a[3]==1) {$east2_1[]="第4日曜日";}
if ($east2_a[4]==1) {$east2_1[]="第1月曜日";}
if ($east2_a[5]==1) {$east2_1[]="第2月曜日";}
if ($east2_a[6]==1) {$east2_1[]="第3月曜日";}
if ($east2_a[7]==1) {$east2_1[]="第4月曜日";}
if ($east2_a[8]==1) {$east2_1[]="第1火曜日";}
if ($east2_a[9]==1) {$east2_1[]="第2火曜日";}
if ($east2_a[10]==1) {$east2_1[]="第3火曜日";}
if ($east2_a[11]==1) {$east2_1[]="第4火曜日";}
if ($east2_a[12]==1) {$east2_1[]="第1水曜日";}
if ($east2_a[13]==1) {$east2_1[]="第2水曜日";}
if ($east2_a[14]==1) {$east2_1[]="第3水曜日";}
if ($east2_a[15]==1) {$east2_1[]="第4水曜日";}
if ($east2_a[16]==1) {$east2_1[]="第1木曜日";}
if ($east2_a[17]==1) {$east2_1[]="第2木曜日";}
if ($east2_a[18]==1) {$east2_1[]="第3木曜日";}
if ($east2_a[19]==1) {$east2_1[]="第4木曜日";}
if ($east2_a[20]==1) {$east2_1[]="第1金曜日";}
if ($east2_a[21]==1) {$east2_1[]="第2金曜日";}
if ($east2_a[22]==1) {$east2_1[]="第3金曜日";}
if ($east2_a[23]==1) {$east2_1[]="第4金曜日";}
if ($east2_a[24]==1) {$east2_1[]="第1土曜日";}
if ($east2_a[25]==1) {$east2_1[]="第2土曜日";}
if ($east2_a[26]==1) {$east2_1[]="第3土曜日";}
if ($east2_a[27]==1) {$east2_1[]="第4土曜日";}
//東2区metal
if ($east2_b[0]==1) {$east2_2[]="第1日曜日";}
if ($east2_b[1]==1) {$east2_2[]="第2日曜日";}
if ($east2_b[2]==1) {$east2_2[]="第3日曜日";}
if ($east2_b[3]==1) {$east2_2[]="第4日曜日";}
if ($east2_b[4]==1) {$east2_2[]="第1月曜日";}
if ($east2_b[5]==1) {$east2_2[]="第2月曜日";}
if ($east2_b[6]==1) {$east2_2[]="第3月曜日";}
if ($east2_b[7]==1) {$east2_2[]="第4月曜日";}
if ($east2_b[8]==1) {$east2_2[]="第1火曜日";}
if ($east2_b[9]==1) {$east2_2[]="第2火曜日";}
if ($east2_b[10]==1) {$east2_2[]="第3火曜日";}
if ($east2_b[11]==1) {$east2_2[]="第4火曜日";}
if ($east2_b[12]==1) {$east2_2[]="第1水曜日";}
if ($east2_b[13]==1) {$east2_2[]="第2水曜日";}
if ($east2_b[14]==1) {$east2_2[]="第3水曜日";}
if ($east2_b[15]==1) {$east2_2[]="第4水曜日";}
if ($east2_b[16]==1) {$east2_2[]="第1木曜日";}
if ($east2_b[17]==1) {$east2_2[]="第2木曜日";}
if ($east2_b[18]==1) {$east2_2[]="第3木曜日";}
if ($east2_b[19]==1) {$east2_2[]="第4木曜日";}
if ($east2_b[20]==1) {$east2_2[]="第1金曜日";}
if ($east2_b[21]==1) {$east2_2[]="第2金曜日";}
if ($east2_b[22]==1) {$east2_2[]="第3金曜日";}
if ($east2_b[23]==1) {$east2_2[]="第4金曜日";}
if ($east2_b[24]==1) {$east2_2[]="第1土曜日";}
if ($east2_b[25]==1) {$east2_2[]="第2土曜日";}
if ($east2_b[26]==1) {$east2_2[]="第3土曜日";}
if ($east2_b[27]==1) {$east2_2[]="第4土曜日";}
//東2区bottle
if ($east2_c[0]==1) {$east2_3[]="第1日曜日";}
if ($east2_c[1]==1) {$east2_3[]="第2日曜日";}
if ($east2_c[2]==1) {$east2_3[]="第3日曜日";}
if ($east2_c[3]==1) {$east2_3[]="第4日曜日";}
if ($east2_c[4]==1) {$east2_3[]="第1月曜日";}
if ($east2_c[5]==1) {$east2_3[]="第2月曜日";}
if ($east2_c[6]==1) {$east2_3[]="第3月曜日";}
if ($east2_c[7]==1) {$east2_3[]="第4月曜日";}
if ($east2_c[8]==1) {$east2_3[]="第1火曜日";}
if ($east2_c[9]==1) {$east2_3[]="第2火曜日";}
if ($east2_c[10]==1) {$east2_3[]="第3火曜日";}
if ($east2_c[11]==1) {$east2_3[]="第4火曜日";}
if ($east2_c[12]==1) {$east2_3[]="第1水曜日";}
if ($east2_c[13]==1) {$east2_3[]="第2水曜日";}
if ($east2_c[14]==1) {$east2_3[]="第3水曜日";}
if ($east2_c[15]==1) {$east2_3[]="第4水曜日";}
if ($east2_c[16]==1) {$east2_3[]="第1木曜日";}
if ($east2_c[17]==1) {$east2_3[]="第2木曜日";}
if ($east2_c[18]==1) {$east2_3[]="第3木曜日";}
if ($east2_c[19]==1) {$east2_3[]="第4木曜日";}
if ($east2_c[20]==1) {$east2_3[]="第1金曜日";}
if ($east2_c[21]==1) {$east2_3[]="第2金曜日";}
if ($east2_c[22]==1) {$east2_3[]="第3金曜日";}
if ($east2_c[23]==1) {$east2_3[]="第4金曜日";}
if ($east2_c[24]==1) {$east2_3[]="第1土曜日";}
if ($east2_c[25]==1) {$east2_3[]="第2土曜日";}
if ($east2_c[26]==1) {$east2_3[]="第3土曜日";}
if ($east2_c[27]==1) {$east2_3[]="第4土曜日";}
//東2区nonburn
if ($east2_d[0]==1) {$east2_4[]="第1日曜日";}
if ($east2_d[1]==1) {$east2_4[]="第2日曜日";}
if ($east2_d[2]==1) {$east2_4[]="第3日曜日";}
if ($east2_d[3]==1) {$east2_4[]="第4日曜日";}
if ($east2_d[4]==1) {$east2_4[]="第1月曜日";}
if ($east2_d[5]==1) {$east2_4[]="第2月曜日";}
if ($east2_d[6]==1) {$east2_4[]="第3月曜日";}
if ($east2_d[7]==1) {$east2_4[]="第4月曜日";}
if ($east2_d[8]==1) {$east2_4[]="第1火曜日";}
if ($east2_d[9]==1) {$east2_4[]="第2火曜日";}
if ($east2_d[10]==1) {$east2_4[]="第3火曜日";}
if ($east2_d[11]==1) {$east2_4[]="第4火曜日";}
if ($east2_d[12]==1) {$east2_4[]="第1水曜日";}
if ($east2_d[13]==1) {$east2_4[]="第2水曜日";}
if ($east2_d[14]==1) {$east2_4[]="第3水曜日";}
if ($east2_d[15]==1) {$east2_4[]="第4水曜日";}
if ($east2_d[16]==1) {$east2_4[]="第1木曜日";}
if ($east2_d[17]==1) {$east2_4[]="第2木曜日";}
if ($east2_d[18]==1) {$east2_4[]="第3木曜日";}
if ($east2_d[19]==1) {$east2_4[]="第4木曜日";}
if ($east2_d[20]==1) {$east2_4[]="第1金曜日";}
if ($east2_d[21]==1) {$east2_4[]="第2金曜日";}
if ($east2_d[22]==1) {$east2_4[]="第3金曜日";}
if ($east2_d[23]==1) {$east2_4[]="第4金曜日";}
if ($east2_d[24]==1) {$east2_4[]="第1土曜日";}
if ($east2_d[25]==1) {$east2_4[]="第2土曜日";}
if ($east2_d[26]==1) {$east2_4[]="第3土曜日";}
if ($east2_d[27]==1) {$east2_4[]="第4土曜日";}
//東2区pet
if ($east2_e[0]==1) {$east2_5[]="第1日曜日";}
if ($east2_e[1]==1) {$east2_5[]="第2日曜日";}
if ($east2_e[2]==1) {$east2_5[]="第3日曜日";}
if ($east2_e[3]==1) {$east2_5[]="第4日曜日";}
if ($east2_e[4]==1) {$east2_5[]="第1月曜日";}
if ($east2_e[5]==1) {$east2_5[]="第2月曜日";}
if ($east2_e[6]==1) {$east2_5[]="第3月曜日";}
if ($east2_e[7]==1) {$east2_5[]="第4月曜日";}
if ($east2_e[8]==1) {$east2_5[]="第1火曜日";}
if ($east2_e[9]==1) {$east2_5[]="第2火曜日";}
if ($east2_e[10]==1) {$east2_5[]="第3火曜日";}
if ($east2_e[11]==1) {$east2_5[]="第4火曜日";}
if ($east2_e[12]==1) {$east2_5[]="第1水曜日";}
if ($east2_e[13]==1) {$east2_5[]="第2水曜日";}
if ($east2_e[14]==1) {$east2_5[]="第3水曜日";}
if ($east2_e[15]==1) {$east2_5[]="第4水曜日";}
if ($east2_e[16]==1) {$east2_5[]="第1木曜日";}
if ($east2_e[17]==1) {$east2_5[]="第2木曜日";}
if ($east2_e[18]==1) {$east2_5[]="第3木曜日";}
if ($east2_e[19]==1) {$east2_5[]="第4木曜日";}
if ($east2_e[20]==1) {$east2_5[]="第1金曜日";}
if ($east2_e[21]==1) {$east2_5[]="第2金曜日";}
if ($east2_e[22]==1) {$east2_5[]="第3金曜日";}
if ($east2_e[23]==1) {$east2_5[]="第4金曜日";}
if ($east2_e[24]==1) {$east2_5[]="第1土曜日";}
if ($east2_e[25]==1) {$east2_5[]="第2土曜日";}
if ($east2_e[26]==1) {$east2_5[]="第3土曜日";}
if ($east2_e[27]==1) {$east2_5[]="第4土曜日";}
//東2区plastic
if ($east2_f[0]==1) {$east2_6[]="第1日曜日";}
if ($east2_f[1]==1) {$east2_6[]="第2日曜日";}
if ($east2_f[2]==1) {$east2_6[]="第3日曜日";}
if ($east2_f[3]==1) {$east2_6[]="第4日曜日";}
if ($east2_f[4]==1) {$east2_6[]="第1月曜日";}
if ($east2_f[5]==1) {$east2_6[]="第2月曜日";}
if ($east2_f[6]==1) {$east2_6[]="第3月曜日";}
if ($east2_f[7]==1) {$east2_6[]="第4月曜日";}
if ($east2_f[8]==1) {$east2_6[]="第1火曜日";}
if ($east2_f[9]==1) {$east2_6[]="第2火曜日";}
if ($east2_f[10]==1) {$east2_6[]="第3火曜日";}
if ($east2_f[11]==1) {$east2_6[]="第4火曜日";}
if ($east2_f[12]==1) {$east2_6[]="第1水曜日";}
if ($east2_f[13]==1) {$east2_6[]="第2水曜日";}
if ($east2_f[14]==1) {$east2_6[]="第3水曜日";}
if ($east2_f[15]==1) {$east2_6[]="第4水曜日";}
if ($east2_f[16]==1) {$east2_6[]="第1木曜日";}
if ($east2_f[17]==1) {$east2_6[]="第2木曜日";}
if ($east2_f[18]==1) {$east2_6[]="第3木曜日";}
if ($east2_f[19]==1) {$east2_6[]="第4木曜日";}
if ($east2_f[20]==1) {$east2_6[]="第1金曜日";}
if ($east2_f[21]==1) {$east2_6[]="第2金曜日";}
if ($east2_f[22]==1) {$east2_6[]="第3金曜日";}
if ($east2_f[23]==1) {$east2_6[]="第4金曜日";}
if ($east2_f[24]==1) {$east2_6[]="第1土曜日";}
if ($east2_f[25]==1) {$east2_6[]="第2土曜日";}
if ($east2_f[26]==1) {$east2_6[]="第3土曜日";}
if ($east2_f[27]==1) {$east2_6[]="第4土曜日";}
//東2区paper
if ($east2_g[0]==1) {$east2_7[]="第1日曜日";}
if ($east2_g[1]==1) {$east2_7[]="第2日曜日";}
if ($east2_g[2]==1) {$east2_7[]="第3日曜日";}
if ($east2_g[3]==1) {$east2_7[]="第4日曜日";}
if ($east2_g[4]==1) {$east2_7[]="第1月曜日";}
if ($east2_g[5]==1) {$east2_7[]="第2月曜日";}
if ($east2_g[6]==1) {$east2_7[]="第3月曜日";}
if ($east2_g[7]==1) {$east2_7[]="第4月曜日";}
if ($east2_g[8]==1) {$east2_7[]="第1火曜日";}
if ($east2_g[9]==1) {$east2_7[]="第2火曜日";}
if ($east2_g[10]==1) {$east2_7[]="第3火曜日";}
if ($east2_g[11]==1) {$east2_7[]="第4火曜日";}
if ($east2_g[12]==1) {$east2_7[]="第1水曜日";}
if ($east2_g[13]==1) {$east2_7[]="第2水曜日";}
if ($east2_g[14]==1) {$east2_7[]="第3水曜日";}
if ($east2_g[15]==1) {$east2_7[]="第4水曜日";}
if ($east2_g[16]==1) {$east2_7[]="第1木曜日";}
if ($east2_g[17]==1) {$east2_7[]="第2木曜日";}
if ($east2_g[18]==1) {$east2_7[]="第3木曜日";}
if ($east2_g[19]==1) {$east2_7[]="第4木曜日";}
if ($east2_g[20]==1) {$east2_7[]="第1金曜日";}
if ($east2_g[21]==1) {$east2_7[]="第2金曜日";}
if ($east2_g[22]==1) {$east2_7[]="第3金曜日";}
if ($east2_g[23]==1) {$east2_7[]="第4金曜日";}
if ($east2_g[24]==1) {$east2_7[]="第1土曜日";}
if ($east2_g[25]==1) {$east2_7[]="第2土曜日";}
if ($east2_g[26]==1) {$east2_7[]="第3土曜日";}
if ($east2_g[27]==1) {$east2_7[]="第4土曜日";}
//東2区cloth
if ($east2_h[0]==1) {$east2_8[]="第1日曜日";}
if ($east2_h[1]==1) {$east2_8[]="第2日曜日";}
if ($east2_h[2]==1) {$east2_8[]="第3日曜日";}
if ($east2_h[3]==1) {$east2_8[]="第4日曜日";}
if ($east2_h[4]==1) {$east2_8[]="第1月曜日";}
if ($east2_h[5]==1) {$east2_8[]="第2月曜日";}
if ($east2_h[6]==1) {$east2_8[]="第3月曜日";}
if ($east2_h[7]==1) {$east2_8[]="第4月曜日";}
if ($east2_h[8]==1) {$east2_8[]="第1火曜日";}
if ($east2_h[9]==1) {$east2_8[]="第2火曜日";}
if ($east2_h[10]==1) {$east2_8[]="第3火曜日";}
if ($east2_h[11]==1) {$east2_8[]="第4火曜日";}
if ($east2_h[12]==1) {$east2_8[]="第1水曜日";}
if ($east2_h[13]==1) {$east2_8[]="第2水曜日";}
if ($east2_h[14]==1) {$east2_8[]="第3水曜日";}
if ($east2_h[15]==1) {$east2_8[]="第4水曜日";}
if ($east2_h[16]==1) {$east2_8[]="第1木曜日";}
if ($east2_h[17]==1) {$east2_8[]="第2木曜日";}
if ($east2_h[18]==1) {$east2_8[]="第3木曜日";}
if ($east2_h[19]==1) {$east2_8[]="第4木曜日";}
if ($east2_h[20]==1) {$east2_8[]="第1金曜日";}
if ($east2_h[21]==1) {$east2_8[]="第2金曜日";}
if ($east2_h[22]==1) {$east2_8[]="第3金曜日";}
if ($east2_h[23]==1) {$east2_8[]="第4金曜日";}
if ($east2_h[24]==1) {$east2_8[]="第1土曜日";}
if ($east2_h[25]==1) {$east2_8[]="第2土曜日";}
if ($east2_h[26]==1) {$east2_8[]="第3土曜日";}
if ($east2_h[27]==1) {$east2_8[]="第4土曜日";}

//ここから東3区
#データの抽出
try{
	$sql = "SELECT * FROM week WHERE area_id=3";
	$stmt3 = $pdo->prepare($sql);
	$stmt3->execute();
} catch (PDOException $e) {
  exit('データベースの抽出に失敗しました。'.$e->getMessage());
}
$value3 = $stmt3->fetch();

$east3_burn = $value3[1];
$east3_metal = $value3[2];
$east3_bottle = $value3[3];
$east3_nonburn = $value3[4];
$east3_pet = $value3[5];
$east3_plastic = $value3[6];
$east3_paper = $value3[7];
$east3_cloth = $value3[8];

$east3_burn = decbin($east3_burn);
$east3_metal = decbin($east3_metal);
$east3_bottle = decbin($east3_bottle);
$east3_nonburn = decbin($east3_nonburn);
$east3_pet = decbin($east3_pet);
$east3_plastic = decbin($east3_plastic);
$east3_paper = decbin($east3_paper);
$east3_cloth = decbin($east3_cloth);

$east3_a = str_pad($east3_burn, 28, '0', STR_PAD_LEFT);
$east3_b = str_pad($east3_metal, 28, '0', STR_PAD_LEFT);
$east3_c = str_pad($east3_bottle, 28, '0', STR_PAD_LEFT);
$east3_d = str_pad($east3_nonburn, 28, '0', STR_PAD_LEFT);
$east3_e = str_pad($east3_pet, 28, '0', STR_PAD_LEFT);
$east3_f = str_pad($east3_plastic, 28, '0', STR_PAD_LEFT);
$east3_g = str_pad($east3_paper, 28, '0', STR_PAD_LEFT);
$east3_h = str_pad($east3_cloth, 28, '0', STR_PAD_LEFT);
//東3区burn
if ($east3_a[0]==1) {$east3_1[]="第1日曜日";}
if ($east3_a[1]==1) {$east3_1[]="第2日曜日";}
if ($east3_a[2]==1) {$east3_1[]="第3日曜日";}
if ($east3_a[3]==1) {$east3_1[]="第4日曜日";}
if ($east3_a[4]==1) {$east3_1[]="第1月曜日";}
if ($east3_a[5]==1) {$east3_1[]="第2月曜日";}
if ($east3_a[6]==1) {$east3_1[]="第3月曜日";}
if ($east3_a[7]==1) {$east3_1[]="第4月曜日";}
if ($east3_a[8]==1) {$east3_1[]="第1火曜日";}
if ($east3_a[9]==1) {$east3_1[]="第2火曜日";}
if ($east3_a[10]==1) {$east3_1[]="第3火曜日";}
if ($east3_a[11]==1) {$east3_1[]="第4火曜日";}
if ($east3_a[12]==1) {$east3_1[]="第1水曜日";}
if ($east3_a[13]==1) {$east3_1[]="第2水曜日";}
if ($east3_a[14]==1) {$east3_1[]="第3水曜日";}
if ($east3_a[15]==1) {$east3_1[]="第4水曜日";}
if ($east3_a[16]==1) {$east3_1[]="第1木曜日";}
if ($east3_a[17]==1) {$east3_1[]="第2木曜日";}
if ($east3_a[18]==1) {$east3_1[]="第3木曜日";}
if ($east3_a[19]==1) {$east3_1[]="第4木曜日";}
if ($east3_a[20]==1) {$east3_1[]="第1金曜日";}
if ($east3_a[21]==1) {$east3_1[]="第2金曜日";}
if ($east3_a[22]==1) {$east3_1[]="第3金曜日";}
if ($east3_a[23]==1) {$east3_1[]="第4金曜日";}
if ($east3_a[24]==1) {$east3_1[]="第1土曜日";}
if ($east3_a[25]==1) {$east3_1[]="第2土曜日";}
if ($east3_a[26]==1) {$east3_1[]="第3土曜日";}
if ($east3_a[27]==1) {$east3_1[]="第4土曜日";}
//東3区metal
if ($east3_b[0]==1) {$east3_2[]="第1日曜日";}
if ($east3_b[1]==1) {$east3_2[]="第2日曜日";}
if ($east3_b[2]==1) {$east3_2[]="第3日曜日";}
if ($east3_b[3]==1) {$east3_2[]="第4日曜日";}
if ($east3_b[4]==1) {$east3_2[]="第1月曜日";}
if ($east3_b[5]==1) {$east3_2[]="第2月曜日";}
if ($east3_b[6]==1) {$east3_2[]="第3月曜日";}
if ($east3_b[7]==1) {$east3_2[]="第4月曜日";}
if ($east3_b[8]==1) {$east3_2[]="第1火曜日";}
if ($east3_b[9]==1) {$east3_2[]="第2火曜日";}
if ($east3_b[10]==1) {$east3_2[]="第3火曜日";}
if ($east3_b[11]==1) {$east3_2[]="第4火曜日";}
if ($east3_b[12]==1) {$east3_2[]="第1水曜日";}
if ($east3_b[13]==1) {$east3_2[]="第2水曜日";}
if ($east3_b[14]==1) {$east3_2[]="第3水曜日";}
if ($east3_b[15]==1) {$east3_2[]="第4水曜日";}
if ($east3_b[16]==1) {$east3_2[]="第1木曜日";}
if ($east3_b[17]==1) {$east3_2[]="第2木曜日";}
if ($east3_b[18]==1) {$east3_2[]="第3木曜日";}
if ($east3_b[19]==1) {$east3_2[]="第4木曜日";}
if ($east3_b[20]==1) {$east3_2[]="第1金曜日";}
if ($east3_b[21]==1) {$east3_2[]="第2金曜日";}
if ($east3_b[22]==1) {$east3_2[]="第3金曜日";}
if ($east3_b[23]==1) {$east3_2[]="第4金曜日";}
if ($east3_b[24]==1) {$east3_2[]="第1土曜日";}
if ($east3_b[25]==1) {$east3_2[]="第2土曜日";}
if ($east3_b[26]==1) {$east3_2[]="第3土曜日";}
if ($east3_b[27]==1) {$east3_2[]="第4土曜日";}
//東3区bottle
if ($east3_c[0]==1) {$east3_3[]="第1日曜日";}
if ($east3_c[1]==1) {$east3_3[]="第2日曜日";}
if ($east3_c[2]==1) {$east3_3[]="第3日曜日";}
if ($east3_c[3]==1) {$east3_3[]="第4日曜日";}
if ($east3_c[4]==1) {$east3_3[]="第1月曜日";}
if ($east3_c[5]==1) {$east3_3[]="第2月曜日";}
if ($east3_c[6]==1) {$east3_3[]="第3月曜日";}
if ($east3_c[7]==1) {$east3_3[]="第4月曜日";}
if ($east3_c[8]==1) {$east3_3[]="第1火曜日";}
if ($east3_c[9]==1) {$east3_3[]="第2火曜日";}
if ($east3_c[10]==1) {$east3_3[]="第3火曜日";}
if ($east3_c[11]==1) {$east3_3[]="第4火曜日";}
if ($east3_c[12]==1) {$east3_3[]="第1水曜日";}
if ($east3_c[13]==1) {$east3_3[]="第2水曜日";}
if ($east3_c[14]==1) {$east3_3[]="第3水曜日";}
if ($east3_c[15]==1) {$east3_3[]="第4水曜日";}
if ($east3_c[16]==1) {$east3_3[]="第1木曜日";}
if ($east3_c[17]==1) {$east3_3[]="第2木曜日";}
if ($east3_c[18]==1) {$east3_3[]="第3木曜日";}
if ($east3_c[19]==1) {$east3_3[]="第4木曜日";}
if ($east3_c[20]==1) {$east3_3[]="第1金曜日";}
if ($east3_c[21]==1) {$east3_3[]="第2金曜日";}
if ($east3_c[22]==1) {$east3_3[]="第3金曜日";}
if ($east3_c[23]==1) {$east3_3[]="第4金曜日";}
if ($east3_c[24]==1) {$east3_3[]="第1土曜日";}
if ($east3_c[25]==1) {$east3_3[]="第2土曜日";}
if ($east3_c[26]==1) {$east3_3[]="第3土曜日";}
if ($east3_c[27]==1) {$east3_3[]="第4土曜日";}
//東3区nonburn
if ($east3_d[0]==1) {$east3_4[]="第1日曜日";}
if ($east3_d[1]==1) {$east3_4[]="第2日曜日";}
if ($east3_d[2]==1) {$east3_4[]="第3日曜日";}
if ($east3_d[3]==1) {$east3_4[]="第4日曜日";}
if ($east3_d[4]==1) {$east3_4[]="第1月曜日";}
if ($east3_d[5]==1) {$east3_4[]="第2月曜日";}
if ($east3_d[6]==1) {$east3_4[]="第3月曜日";}
if ($east3_d[7]==1) {$east3_4[]="第4月曜日";}
if ($east3_d[8]==1) {$east3_4[]="第1火曜日";}
if ($east3_d[9]==1) {$east3_4[]="第2火曜日";}
if ($east3_d[10]==1) {$east3_4[]="第3火曜日";}
if ($east3_d[11]==1) {$east3_4[]="第4火曜日";}
if ($east3_d[12]==1) {$east3_4[]="第1水曜日";}
if ($east3_d[13]==1) {$east3_4[]="第2水曜日";}
if ($east3_d[14]==1) {$east3_4[]="第3水曜日";}
if ($east3_d[15]==1) {$east3_4[]="第4水曜日";}
if ($east3_d[16]==1) {$east3_4[]="第1木曜日";}
if ($east3_d[17]==1) {$east3_4[]="第2木曜日";}
if ($east3_d[18]==1) {$east3_4[]="第3木曜日";}
if ($east3_d[19]==1) {$east3_4[]="第4木曜日";}
if ($east3_d[20]==1) {$east3_4[]="第1金曜日";}
if ($east3_d[21]==1) {$east3_4[]="第2金曜日";}
if ($east3_d[22]==1) {$east3_4[]="第3金曜日";}
if ($east3_d[23]==1) {$east3_4[]="第4金曜日";}
if ($east3_d[24]==1) {$east3_4[]="第1土曜日";}
if ($east3_d[25]==1) {$east3_4[]="第2土曜日";}
if ($east3_d[26]==1) {$east3_4[]="第3土曜日";}
if ($east3_d[27]==1) {$east3_4[]="第4土曜日";}
//東3区pet
if ($east3_e[0]==1) {$east3_5[]="第1日曜日";}
if ($east3_e[1]==1) {$east3_5[]="第2日曜日";}
if ($east3_e[2]==1) {$east3_5[]="第3日曜日";}
if ($east3_e[3]==1) {$east3_5[]="第4日曜日";}
if ($east3_e[4]==1) {$east3_5[]="第1月曜日";}
if ($east3_e[5]==1) {$east3_5[]="第2月曜日";}
if ($east3_e[6]==1) {$east3_5[]="第3月曜日";}
if ($east3_e[7]==1) {$east3_5[]="第4月曜日";}
if ($east3_e[8]==1) {$east3_5[]="第1火曜日";}
if ($east3_e[9]==1) {$east3_5[]="第2火曜日";}
if ($east3_e[10]==1) {$east3_5[]="第3火曜日";}
if ($east3_e[11]==1) {$east3_5[]="第4火曜日";}
if ($east3_e[12]==1) {$east3_5[]="第1水曜日";}
if ($east3_e[13]==1) {$east3_5[]="第2水曜日";}
if ($east3_e[14]==1) {$east3_5[]="第3水曜日";}
if ($east3_e[15]==1) {$east3_5[]="第4水曜日";}
if ($east3_e[16]==1) {$east3_5[]="第1木曜日";}
if ($east3_e[17]==1) {$east3_5[]="第2木曜日";}
if ($east3_e[18]==1) {$east3_5[]="第3木曜日";}
if ($east3_e[19]==1) {$east3_5[]="第4木曜日";}
if ($east3_e[20]==1) {$east3_5[]="第1金曜日";}
if ($east3_e[21]==1) {$east3_5[]="第2金曜日";}
if ($east3_e[22]==1) {$east3_5[]="第3金曜日";}
if ($east3_e[23]==1) {$east3_5[]="第4金曜日";}
if ($east3_e[24]==1) {$east3_5[]="第1土曜日";}
if ($east3_e[25]==1) {$east3_5[]="第2土曜日";}
if ($east3_e[26]==1) {$east3_5[]="第3土曜日";}
if ($east3_e[27]==1) {$east3_5[]="第4土曜日";}
//東3区plastic
if ($east3_f[0]==1) {$east3_6[]="第1日曜日";}
if ($east3_f[1]==1) {$east3_6[]="第2日曜日";}
if ($east3_f[2]==1) {$east3_6[]="第3日曜日";}
if ($east3_f[3]==1) {$east3_6[]="第4日曜日";}
if ($east3_f[4]==1) {$east3_6[]="第1月曜日";}
if ($east3_f[5]==1) {$east3_6[]="第2月曜日";}
if ($east3_f[6]==1) {$east3_6[]="第3月曜日";}
if ($east3_f[7]==1) {$east3_6[]="第4月曜日";}
if ($east3_f[8]==1) {$east3_6[]="第1火曜日";}
if ($east3_f[9]==1) {$east3_6[]="第2火曜日";}
if ($east3_f[10]==1) {$east3_6[]="第3火曜日";}
if ($east3_f[11]==1) {$east3_6[]="第4火曜日";}
if ($east3_f[12]==1) {$east3_6[]="第1水曜日";}
if ($east3_f[13]==1) {$east3_6[]="第2水曜日";}
if ($east3_f[14]==1) {$east3_6[]="第3水曜日";}
if ($east3_f[15]==1) {$east3_6[]="第4水曜日";}
if ($east3_f[16]==1) {$east3_6[]="第1木曜日";}
if ($east3_f[17]==1) {$east3_6[]="第2木曜日";}
if ($east3_f[18]==1) {$east3_6[]="第3木曜日";}
if ($east3_f[19]==1) {$east3_6[]="第4木曜日";}
if ($east3_f[20]==1) {$east3_6[]="第1金曜日";}
if ($east3_f[21]==1) {$east3_6[]="第2金曜日";}
if ($east3_f[22]==1) {$east3_6[]="第3金曜日";}
if ($east3_f[23]==1) {$east3_6[]="第4金曜日";}
if ($east3_f[24]==1) {$east3_6[]="第1土曜日";}
if ($east3_f[25]==1) {$east3_6[]="第2土曜日";}
if ($east3_f[26]==1) {$east3_6[]="第3土曜日";}
if ($east3_f[27]==1) {$east3_6[]="第4土曜日";}
//東3区paper
if ($east3_g[0]==1) {$east3_7[]="第1日曜日";}
if ($east3_g[1]==1) {$east3_7[]="第2日曜日";}
if ($east3_g[2]==1) {$east3_7[]="第3日曜日";}
if ($east3_g[3]==1) {$east3_7[]="第4日曜日";}
if ($east3_g[4]==1) {$east3_7[]="第1月曜日";}
if ($east3_g[5]==1) {$east3_7[]="第2月曜日";}
if ($east3_g[6]==1) {$east3_7[]="第3月曜日";}
if ($east3_g[7]==1) {$east3_7[]="第4月曜日";}
if ($east3_g[8]==1) {$east3_7[]="第1火曜日";}
if ($east3_g[9]==1) {$east3_7[]="第2火曜日";}
if ($east3_g[10]==1) {$east3_7[]="第3火曜日";}
if ($east3_g[11]==1) {$east3_7[]="第4火曜日";}
if ($east3_g[12]==1) {$east3_7[]="第1水曜日";}
if ($east3_g[13]==1) {$east3_7[]="第2水曜日";}
if ($east3_g[14]==1) {$east3_7[]="第3水曜日";}
if ($east3_g[15]==1) {$east3_7[]="第4水曜日";}
if ($east3_g[16]==1) {$east3_7[]="第1木曜日";}
if ($east3_g[17]==1) {$east3_7[]="第2木曜日";}
if ($east3_g[18]==1) {$east3_7[]="第3木曜日";}
if ($east3_g[19]==1) {$east3_7[]="第4木曜日";}
if ($east3_g[20]==1) {$east3_7[]="第1金曜日";}
if ($east3_g[21]==1) {$east3_7[]="第2金曜日";}
if ($east3_g[22]==1) {$east3_7[]="第3金曜日";}
if ($east3_g[23]==1) {$east3_7[]="第4金曜日";}
if ($east3_g[24]==1) {$east3_7[]="第1土曜日";}
if ($east3_g[25]==1) {$east3_7[]="第2土曜日";}
if ($east3_g[26]==1) {$east3_7[]="第3土曜日";}
if ($east3_g[27]==1) {$east3_7[]="第4土曜日";}
//東3区cloth
if ($east3_h[0]==1) {$east3_8[]="第1日曜日";}
if ($east3_h[1]==1) {$east3_8[]="第2日曜日";}
if ($east3_h[2]==1) {$east3_8[]="第3日曜日";}
if ($east3_h[3]==1) {$east3_8[]="第4日曜日";}
if ($east3_h[4]==1) {$east3_8[]="第1月曜日";}
if ($east3_h[5]==1) {$east3_8[]="第2月曜日";}
if ($east3_h[6]==1) {$east3_8[]="第3月曜日";}
if ($east3_h[7]==1) {$east3_8[]="第4月曜日";}
if ($east3_h[8]==1) {$east3_8[]="第1火曜日";}
if ($east3_h[9]==1) {$east3_8[]="第2火曜日";}
if ($east3_h[10]==1) {$east3_8[]="第3火曜日";}
if ($east3_h[11]==1) {$east3_8[]="第4火曜日";}
if ($east3_h[12]==1) {$east3_8[]="第1水曜日";}
if ($east3_h[13]==1) {$east3_8[]="第2水曜日";}
if ($east3_h[14]==1) {$east3_8[]="第3水曜日";}
if ($east3_h[15]==1) {$east3_8[]="第4水曜日";}
if ($east3_h[16]==1) {$east3_8[]="第1木曜日";}
if ($east3_h[17]==1) {$east3_8[]="第2木曜日";}
if ($east3_h[18]==1) {$east3_8[]="第3木曜日";}
if ($east3_h[19]==1) {$east3_8[]="第4木曜日";}
if ($east3_h[20]==1) {$east3_8[]="第1金曜日";}
if ($east3_h[21]==1) {$east3_8[]="第2金曜日";}
if ($east3_h[22]==1) {$east3_8[]="第3金曜日";}
if ($east3_h[23]==1) {$east3_8[]="第4金曜日";}
if ($east3_h[24]==1) {$east3_8[]="第1土曜日";}
if ($east3_h[25]==1) {$east3_8[]="第2土曜日";}
if ($east3_h[26]==1) {$east3_8[]="第3土曜日";}
if ($east3_h[27]==1) {$east3_8[]="第4土曜日";}

//ここから西1区
#データの抽出
try{
	$sql = "SELECT * FROM week WHERE area_id=4";
	$stmt4 = $pdo->prepare($sql);
	$stmt4->execute();
} catch (PDOException $e) {
  exit('データベースの抽出に失敗しました。'.$e->getMessage());
}
$value4 = $stmt4->fetch();

$east4_burn = $value4[1];
$east4_metal = $value4[2];
$east4_bottle = $value4[3];
$east4_nonburn = $value4[4];
$east4_pet = $value4[5];
$east4_plastic = $value4[6];
$east4_paper = $value4[7];
$east4_cloth = $value4[8];

$east4_burn = decbin($east4_burn);
$east4_metal = decbin($east4_metal);
$east4_bottle = decbin($east4_bottle);
$east4_nonburn = decbin($east4_nonburn);
$east4_pet = decbin($east4_pet);
$east4_plastic = decbin($east4_plastic);
$east4_paper = decbin($east4_paper);
$east4_cloth = decbin($east4_cloth);

$east4_a = str_pad($east4_burn, 28, '0', STR_PAD_LEFT);
$east4_b = str_pad($east4_metal, 28, '0', STR_PAD_LEFT);
$east4_c = str_pad($east4_bottle, 28, '0', STR_PAD_LEFT);
$east4_d = str_pad($east4_nonburn, 28, '0', STR_PAD_LEFT);
$east4_e = str_pad($east4_pet, 28, '0', STR_PAD_LEFT);
$east4_f = str_pad($east4_plastic, 28, '0', STR_PAD_LEFT);
$east4_g = str_pad($east4_paper, 28, '0', STR_PAD_LEFT);
$east4_h = str_pad($east4_cloth, 28, '0', STR_PAD_LEFT);
//西1区burn
if ($east4_a[0]==1) {$east4_1[]="第1日曜日";}
if ($east4_a[1]==1) {$east4_1[]="第2日曜日";}
if ($east4_a[2]==1) {$east4_1[]="第3日曜日";}
if ($east4_a[3]==1) {$east4_1[]="第4日曜日";}
if ($east4_a[4]==1) {$east4_1[]="第1月曜日";}
if ($east4_a[5]==1) {$east4_1[]="第2月曜日";}
if ($east4_a[6]==1) {$east4_1[]="第3月曜日";}
if ($east4_a[7]==1) {$east4_1[]="第4月曜日";}
if ($east4_a[8]==1) {$east4_1[]="第1火曜日";}
if ($east4_a[9]==1) {$east4_1[]="第2火曜日";}
if ($east4_a[10]==1) {$east4_1[]="第3火曜日";}
if ($east4_a[11]==1) {$east4_1[]="第4火曜日";}
if ($east4_a[12]==1) {$east4_1[]="第1水曜日";}
if ($east4_a[13]==1) {$east4_1[]="第2水曜日";}
if ($east4_a[14]==1) {$east4_1[]="第3水曜日";}
if ($east4_a[15]==1) {$east4_1[]="第4水曜日";}
if ($east4_a[16]==1) {$east4_1[]="第1木曜日";}
if ($east4_a[17]==1) {$east4_1[]="第2木曜日";}
if ($east4_a[18]==1) {$east4_1[]="第3木曜日";}
if ($east4_a[19]==1) {$east4_1[]="第4木曜日";}
if ($east4_a[20]==1) {$east4_1[]="第1金曜日";}
if ($east4_a[21]==1) {$east4_1[]="第2金曜日";}
if ($east4_a[22]==1) {$east4_1[]="第3金曜日";}
if ($east4_a[23]==1) {$east4_1[]="第4金曜日";}
if ($east4_a[24]==1) {$east4_1[]="第1土曜日";}
if ($east4_a[25]==1) {$east4_1[]="第2土曜日";}
if ($east4_a[26]==1) {$east4_1[]="第3土曜日";}
if ($east4_a[27]==1) {$east4_1[]="第4土曜日";}
//西1区metal
if ($east4_b[0]==1) {$east4_2[]="第1日曜日";}
if ($east4_b[1]==1) {$east4_2[]="第2日曜日";}
if ($east4_b[2]==1) {$east4_2[]="第3日曜日";}
if ($east4_b[3]==1) {$east4_2[]="第4日曜日";}
if ($east4_b[4]==1) {$east4_2[]="第1月曜日";}
if ($east4_b[5]==1) {$east4_2[]="第2月曜日";}
if ($east4_b[6]==1) {$east4_2[]="第3月曜日";}
if ($east4_b[7]==1) {$east4_2[]="第4月曜日";}
if ($east4_b[8]==1) {$east4_2[]="第1火曜日";}
if ($east4_b[9]==1) {$east4_2[]="第2火曜日";}
if ($east4_b[10]==1) {$east4_2[]="第3火曜日";}
if ($east4_b[11]==1) {$east4_2[]="第4火曜日";}
if ($east4_b[12]==1) {$east4_2[]="第1水曜日";}
if ($east4_b[13]==1) {$east4_2[]="第2水曜日";}
if ($east4_b[14]==1) {$east4_2[]="第3水曜日";}
if ($east4_b[15]==1) {$east4_2[]="第4水曜日";}
if ($east4_b[16]==1) {$east4_2[]="第1木曜日";}
if ($east4_b[17]==1) {$east4_2[]="第2木曜日";}
if ($east4_b[18]==1) {$east4_2[]="第3木曜日";}
if ($east4_b[19]==1) {$east4_2[]="第4木曜日";}
if ($east4_b[20]==1) {$east4_2[]="第1金曜日";}
if ($east4_b[21]==1) {$east4_2[]="第2金曜日";}
if ($east4_b[22]==1) {$east4_2[]="第3金曜日";}
if ($east4_b[23]==1) {$east4_2[]="第4金曜日";}
if ($east4_b[24]==1) {$east4_2[]="第1土曜日";}
if ($east4_b[25]==1) {$east4_2[]="第2土曜日";}
if ($east4_b[26]==1) {$east4_2[]="第3土曜日";}
if ($east4_b[27]==1) {$east4_2[]="第4土曜日";}
//if (($east1_b[24]==1 && $east1_b[25]==1) && ($east1_b[26]==1 && $east1_b[27]==1)) {
	//for($i = count($east1_2) ; $i > count($east1_2) - 5; $i--){
		//$east1_2[$i] = null;}$east1_2[]="毎週土曜日";}
//西1区bottle
if ($east4_c[0]==1) {$east4_3[]="第1日曜日";}
if ($east4_c[1]==1) {$east4_3[]="第2日曜日";}
if ($east4_c[2]==1) {$east4_3[]="第3日曜日";}
if ($east4_c[3]==1) {$east4_3[]="第4日曜日";}
if ($east4_c[4]==1) {$east4_3[]="第1月曜日";}
if ($east4_c[5]==1) {$east4_3[]="第2月曜日";}
if ($east4_c[6]==1) {$east4_3[]="第3月曜日";}
if ($east4_c[7]==1) {$east4_3[]="第4月曜日";}
if ($east4_c[8]==1) {$east4_3[]="第1火曜日";}
if ($east4_c[9]==1) {$east4_3[]="第2火曜日";}
if ($east4_c[10]==1) {$east4_3[]="第3火曜日";}
if ($east4_c[11]==1) {$east4_3[]="第4火曜日";}
if ($east4_c[12]==1) {$east4_3[]="第1水曜日";}
if ($east4_c[13]==1) {$east4_3[]="第2水曜日";}
if ($east4_c[14]==1) {$east4_3[]="第3水曜日";}
if ($east4_c[15]==1) {$east4_3[]="第4水曜日";}
if ($east4_c[16]==1) {$east4_3[]="第1木曜日";}
if ($east4_c[17]==1) {$east4_3[]="第2木曜日";}
if ($east4_c[18]==1) {$east4_3[]="第3木曜日";}
if ($east4_c[19]==1) {$east4_3[]="第4木曜日";}
if ($east4_c[20]==1) {$east4_3[]="第1金曜日";}
if ($east4_c[21]==1) {$east4_3[]="第2金曜日";}
if ($east4_c[22]==1) {$east4_3[]="第3金曜日";}
if ($east4_c[23]==1) {$east4_3[]="第4金曜日";}
if ($east4_c[24]==1) {$east4_3[]="第1土曜日";}
if ($east4_c[25]==1) {$east4_3[]="第2土曜日";}
if ($east4_c[26]==1) {$east4_3[]="第3土曜日";}
if ($east4_c[27]==1) {$east4_3[]="第4土曜日";}
//西1区nonburn
if ($east4_d[0]==1) {$east4_4[]="第1日曜日";}
if ($east4_d[1]==1) {$east4_4[]="第2日曜日";}
if ($east4_d[2]==1) {$east4_4[]="第3日曜日";}
if ($east4_d[3]==1) {$east4_4[]="第4日曜日";}
if ($east4_d[4]==1) {$east4_4[]="第1月曜日";}
if ($east4_d[5]==1) {$east4_4[]="第2月曜日";}
if ($east4_d[6]==1) {$east4_4[]="第3月曜日";}
if ($east4_d[7]==1) {$east4_4[]="第4月曜日";}
if ($east4_d[8]==1) {$east4_4[]="第1火曜日";}
if ($east4_d[9]==1) {$east4_4[]="第2火曜日";}
if ($east4_d[10]==1) {$east4_4[]="第3火曜日";}
if ($east4_d[11]==1) {$east4_4[]="第4火曜日";}
if ($east4_d[12]==1) {$east4_4[]="第1水曜日";}
if ($east4_d[13]==1) {$east4_4[]="第2水曜日";}
if ($east4_d[14]==1) {$east4_4[]="第3水曜日";}
if ($east4_d[15]==1) {$east4_4[]="第4水曜日";}
if ($east4_d[16]==1) {$east4_4[]="第1木曜日";}
if ($east4_d[17]==1) {$east4_4[]="第2木曜日";}
if ($east4_d[18]==1) {$east4_4[]="第3木曜日";}
if ($east4_d[19]==1) {$east4_4[]="第4木曜日";}
if ($east4_d[20]==1) {$east4_4[]="第1金曜日";}
if ($east4_d[21]==1) {$east4_4[]="第2金曜日";}
if ($east4_d[22]==1) {$east4_4[]="第3金曜日";}
if ($east4_d[23]==1) {$east4_4[]="第4金曜日";}
if ($east4_d[24]==1) {$east4_4[]="第1土曜日";}
if ($east4_d[25]==1) {$east4_4[]="第2土曜日";}
if ($east4_d[26]==1) {$east4_4[]="第3土曜日";}
if ($east4_d[27]==1) {$east4_4[]="第4土曜日";}
//西1区pet
if ($east4_e[0]==1) {$east4_5[]="第1日曜日";}
if ($east4_e[1]==1) {$east4_5[]="第2日曜日";}
if ($east4_e[2]==1) {$east4_5[]="第3日曜日";}
if ($east4_e[3]==1) {$east4_5[]="第4日曜日";}
if ($east4_e[4]==1) {$east4_5[]="第1月曜日";}
if ($east4_e[5]==1) {$east4_5[]="第2月曜日";}
if ($east4_e[6]==1) {$east4_5[]="第3月曜日";}
if ($east4_e[7]==1) {$east4_5[]="第4月曜日";}
if ($east4_e[8]==1) {$east4_5[]="第1火曜日";}
if ($east4_e[9]==1) {$east4_5[]="第2火曜日";}
if ($east4_e[10]==1) {$east4_5[]="第3火曜日";}
if ($east4_e[11]==1) {$east4_5[]="第4火曜日";}
if ($east4_e[12]==1) {$east4_5[]="第1水曜日";}
if ($east4_e[13]==1) {$east4_5[]="第2水曜日";}
if ($east4_e[14]==1) {$east4_5[]="第3水曜日";}
if ($east4_e[15]==1) {$east4_5[]="第4水曜日";}
if ($east4_e[16]==1) {$east4_5[]="第1木曜日";}
if ($east4_e[17]==1) {$east4_5[]="第2木曜日";}
if ($east4_e[18]==1) {$east4_5[]="第3木曜日";}
if ($east4_e[19]==1) {$east4_5[]="第4木曜日";}
if ($east4_e[20]==1) {$east4_5[]="第1金曜日";}
if ($east4_e[21]==1) {$east4_5[]="第2金曜日";}
if ($east4_e[22]==1) {$east4_5[]="第3金曜日";}
if ($east4_e[23]==1) {$east4_5[]="第4金曜日";}
if ($east4_e[24]==1) {$east4_5[]="第1土曜日";}
if ($east4_e[25]==1) {$east4_5[]="第2土曜日";}
if ($east4_e[26]==1) {$east4_5[]="第3土曜日";}
if ($east4_e[27]==1) {$east4_5[]="第4土曜日";}
//西1区plastic
if ($east4_f[0]==1) {$east4_6[]="第1日曜日";}
if ($east4_f[1]==1) {$east4_6[]="第2日曜日";}
if ($east4_f[2]==1) {$east4_6[]="第3日曜日";}
if ($east4_f[3]==1) {$east4_6[]="第4日曜日";}
if ($east4_f[4]==1) {$east4_6[]="第1月曜日";}
if ($east4_f[5]==1) {$east4_6[]="第2月曜日";}
if ($east4_f[6]==1) {$east4_6[]="第3月曜日";}
if ($east4_f[7]==1) {$east4_6[]="第4月曜日";}
if ($east4_f[8]==1) {$east4_6[]="第1火曜日";}
if ($east4_f[9]==1) {$east4_6[]="第2火曜日";}
if ($east4_f[10]==1) {$east4_6[]="第3火曜日";}
if ($east4_f[11]==1) {$east4_6[]="第4火曜日";}
if ($east4_f[12]==1) {$east4_6[]="第1水曜日";}
if ($east4_f[13]==1) {$east4_6[]="第2水曜日";}
if ($east4_f[14]==1) {$east4_6[]="第3水曜日";}
if ($east4_f[15]==1) {$east4_6[]="第4水曜日";}
if ($east4_f[16]==1) {$east4_6[]="第1木曜日";}
if ($east4_f[17]==1) {$east4_6[]="第2木曜日";}
if ($east4_f[18]==1) {$east4_6[]="第3木曜日";}
if ($east4_f[19]==1) {$east4_6[]="第4木曜日";}
if ($east4_f[20]==1) {$east4_6[]="第1金曜日";}
if ($east4_f[21]==1) {$east4_6[]="第2金曜日";}
if ($east4_f[22]==1) {$east4_6[]="第3金曜日";}
if ($east4_f[23]==1) {$east4_6[]="第4金曜日";}
if ($east4_f[24]==1) {$east4_6[]="第1土曜日";}
if ($east4_f[25]==1) {$east4_6[]="第2土曜日";}
if ($east4_f[26]==1) {$east4_6[]="第3土曜日";}
if ($east4_f[27]==1) {$east4_6[]="第4土曜日";}
//西1区paper
if ($east4_g[0]==1) {$east4_7[]="第1日曜日";}
if ($east4_g[1]==1) {$east4_7[]="第2日曜日";}
if ($east4_g[2]==1) {$east4_7[]="第3日曜日";}
if ($east4_g[3]==1) {$east4_7[]="第4日曜日";}
if ($east4_g[4]==1) {$east4_7[]="第1月曜日";}
if ($east4_g[5]==1) {$east4_7[]="第2月曜日";}
if ($east4_g[6]==1) {$east4_7[]="第3月曜日";}
if ($east4_g[7]==1) {$east4_7[]="第4月曜日";}
if ($east4_g[8]==1) {$east4_7[]="第1火曜日";}
if ($east4_g[9]==1) {$east4_7[]="第2火曜日";}
if ($east4_g[10]==1) {$east4_7[]="第3火曜日";}
if ($east4_g[11]==1) {$east4_7[]="第4火曜日";}
if ($east4_g[12]==1) {$east4_7[]="第1水曜日";}
if ($east4_g[13]==1) {$east4_7[]="第2水曜日";}
if ($east4_g[14]==1) {$east4_7[]="第3水曜日";}
if ($east4_g[15]==1) {$east4_7[]="第4水曜日";}
if ($east4_g[16]==1) {$east4_7[]="第1木曜日";}
if ($east4_g[17]==1) {$east4_7[]="第2木曜日";}
if ($east4_g[18]==1) {$east4_7[]="第3木曜日";}
if ($east4_g[19]==1) {$east4_7[]="第4木曜日";}
if ($east4_g[20]==1) {$east4_7[]="第1金曜日";}
if ($east4_g[21]==1) {$east4_7[]="第2金曜日";}
if ($east4_g[22]==1) {$east4_7[]="第3金曜日";}
if ($east4_g[23]==1) {$east4_7[]="第4金曜日";}
if ($east4_g[24]==1) {$east4_7[]="第1土曜日";}
if ($east4_g[25]==1) {$east4_7[]="第2土曜日";}
if ($east4_g[26]==1) {$east4_7[]="第3土曜日";}
if ($east4_g[27]==1) {$east4_7[]="第4土曜日";}
//西1区cloth
if ($east4_h[0]==1) {$east4_8[]="第1日曜日";}
if ($east4_h[1]==1) {$east4_8[]="第2日曜日";}
if ($east4_h[2]==1) {$east4_8[]="第3日曜日";}
if ($east4_h[3]==1) {$east4_8[]="第4日曜日";}
if ($east4_h[4]==1) {$east4_8[]="第1月曜日";}
if ($east4_h[5]==1) {$east4_8[]="第2月曜日";}
if ($east4_h[6]==1) {$east4_8[]="第3月曜日";}
if ($east4_h[7]==1) {$east4_8[]="第4月曜日";}
if ($east4_h[8]==1) {$east4_8[]="第1火曜日";}
if ($east4_h[9]==1) {$east4_8[]="第2火曜日";}
if ($east4_h[10]==1) {$east4_8[]="第3火曜日";}
if ($east4_h[11]==1) {$east4_8[]="第4火曜日";}
if ($east4_h[12]==1) {$east4_8[]="第1水曜日";}
if ($east4_h[13]==1) {$east4_8[]="第2水曜日";}
if ($east4_h[14]==1) {$east4_8[]="第3水曜日";}
if ($east4_h[15]==1) {$east4_8[]="第4水曜日";}
if ($east4_h[16]==1) {$east4_8[]="第1木曜日";}
if ($east4_h[17]==1) {$east4_8[]="第2木曜日";}
if ($east4_h[18]==1) {$east4_8[]="第3木曜日";}
if ($east4_h[19]==1) {$east4_8[]="第4木曜日";}
if ($east4_h[20]==1) {$east4_8[]="第1金曜日";}
if ($east4_h[21]==1) {$east4_8[]="第2金曜日";}
if ($east4_h[22]==1) {$east4_8[]="第3金曜日";}
if ($east4_h[23]==1) {$east4_8[]="第4金曜日";}
if ($east4_h[24]==1) {$east4_8[]="第1土曜日";}
if ($east4_h[25]==1) {$east4_8[]="第2土曜日";}
if ($east4_h[26]==1) {$east4_8[]="第3土曜日";}
if ($east4_h[27]==1) {$east4_8[]="第4土曜日";}

//ここから西2区
#データの抽出
try{
	$sql = "SELECT * FROM week WHERE area_id=5";
	$stmt5 = $pdo->prepare($sql);
	$stmt5->execute();
} catch (PDOException $e) {
  exit('データベースの抽出に失敗しました。'.$e->getMessage());
}
$value5 = $stmt5->fetch();

$east5_burn = $value5[1];
$east5_metal = $value5[2];
$east5_bottle = $value5[3];
$east5_nonburn = $value5[4];
$east5_pet = $value5[5];
$east5_plastic = $value5[6];
$east5_paper = $value5[7];
$east5_cloth = $value5[8];

$east5_burn = decbin($east5_burn);
$east5_metal = decbin($east5_metal);
$east5_bottle = decbin($east5_bottle);
$east5_nonburn = decbin($east5_nonburn);
$east5_pet = decbin($east5_pet);
$east5_plastic = decbin($east5_plastic);
$east5_paper = decbin($east5_paper);
$east5_cloth = decbin($east5_cloth);

$east5_a = str_pad($east5_burn, 28, '0', STR_PAD_LEFT);
$east5_b = str_pad($east5_metal, 28, '0', STR_PAD_LEFT);
$east5_c = str_pad($east5_bottle, 28, '0', STR_PAD_LEFT);
$east5_d = str_pad($east5_nonburn, 28, '0', STR_PAD_LEFT);
$east5_e = str_pad($east5_pet, 28, '0', STR_PAD_LEFT);
$east5_f = str_pad($east5_plastic, 28, '0', STR_PAD_LEFT);
$east5_g = str_pad($east5_paper, 28, '0', STR_PAD_LEFT);
$east5_h = str_pad($east5_cloth, 28, '0', STR_PAD_LEFT);
//西2区burn
if ($east5_a[0]==1) {$east5_1[]="第1日曜日";}
if ($east5_a[1]==1) {$east5_1[]="第2日曜日";}
if ($east5_a[2]==1) {$east5_1[]="第3日曜日";}
if ($east5_a[3]==1) {$east5_1[]="第4日曜日";}
if ($east5_a[4]==1) {$east5_1[]="第1月曜日";}
if ($east5_a[5]==1) {$east5_1[]="第2月曜日";}
if ($east5_a[6]==1) {$east5_1[]="第3月曜日";}
if ($east5_a[7]==1) {$east5_1[]="第4月曜日";}
if ($east5_a[8]==1) {$east5_1[]="第1火曜日";}
if ($east5_a[9]==1) {$east5_1[]="第2火曜日";}
if ($east5_a[10]==1) {$east5_1[]="第3火曜日";}
if ($east5_a[11]==1) {$east5_1[]="第4火曜日";}
if ($east5_a[12]==1) {$east5_1[]="第1水曜日";}
if ($east5_a[13]==1) {$east5_1[]="第2水曜日";}
if ($east5_a[14]==1) {$east5_1[]="第3水曜日";}
if ($east5_a[15]==1) {$east5_1[]="第4水曜日";}
if ($east5_a[16]==1) {$east5_1[]="第1木曜日";}
if ($east5_a[17]==1) {$east5_1[]="第2木曜日";}
if ($east5_a[18]==1) {$east5_1[]="第3木曜日";}
if ($east5_a[19]==1) {$east5_1[]="第4木曜日";}
if ($east5_a[20]==1) {$east5_1[]="第1金曜日";}
if ($east5_a[21]==1) {$east5_1[]="第2金曜日";}
if ($east5_a[22]==1) {$east5_1[]="第3金曜日";}
if ($east5_a[23]==1) {$east5_1[]="第4金曜日";}
if ($east5_a[24]==1) {$east5_1[]="第1土曜日";}
if ($east5_a[25]==1) {$east5_1[]="第2土曜日";}
if ($east5_a[26]==1) {$east5_1[]="第3土曜日";}
if ($east5_a[27]==1) {$east5_1[]="第4土曜日";}
//西2区metal
if ($east5_b[0]==1) {$east5_2[]="第1日曜日";}
if ($east5_b[1]==1) {$east5_2[]="第2日曜日";}
if ($east5_b[2]==1) {$east5_2[]="第3日曜日";}
if ($east5_b[3]==1) {$east5_2[]="第4日曜日";}
if ($east5_b[4]==1) {$east5_2[]="第1月曜日";}
if ($east5_b[5]==1) {$east5_2[]="第2月曜日";}
if ($east5_b[6]==1) {$east5_2[]="第3月曜日";}
if ($east5_b[7]==1) {$east5_2[]="第4月曜日";}
if ($east5_b[8]==1) {$east5_2[]="第1火曜日";}
if ($east5_b[9]==1) {$east5_2[]="第2火曜日";}
if ($east5_b[10]==1) {$east5_2[]="第3火曜日";}
if ($east5_b[11]==1) {$east5_2[]="第4火曜日";}
if ($east5_b[12]==1) {$east5_2[]="第1水曜日";}
if ($east5_b[13]==1) {$east5_2[]="第2水曜日";}
if ($east5_b[14]==1) {$east5_2[]="第3水曜日";}
if ($east5_b[15]==1) {$east5_2[]="第4水曜日";}
if ($east5_b[16]==1) {$east5_2[]="第1木曜日";}
if ($east5_b[17]==1) {$east5_2[]="第2木曜日";}
if ($east5_b[18]==1) {$east5_2[]="第3木曜日";}
if ($east5_b[19]==1) {$east5_2[]="第4木曜日";}
if ($east5_b[20]==1) {$east5_2[]="第1金曜日";}
if ($east5_b[21]==1) {$east5_2[]="第2金曜日";}
if ($east5_b[22]==1) {$east5_2[]="第3金曜日";}
if ($east5_b[23]==1) {$east5_2[]="第4金曜日";}
if ($east5_b[24]==1) {$east5_2[]="第1土曜日";}
if ($east5_b[25]==1) {$east5_2[]="第2土曜日";}
if ($east5_b[26]==1) {$east5_2[]="第3土曜日";}
if ($east5_b[27]==1) {$east5_2[]="第4土曜日";}
//西2区bottle
if ($east5_c[0]==1) {$east5_3[]="第1日曜日";}
if ($east5_c[1]==1) {$east5_3[]="第2日曜日";}
if ($east5_c[2]==1) {$east5_3[]="第3日曜日";}
if ($east5_c[3]==1) {$east5_3[]="第4日曜日";}
if ($east5_c[4]==1) {$east5_3[]="第1月曜日";}
if ($east5_c[5]==1) {$east5_3[]="第2月曜日";}
if ($east5_c[6]==1) {$east5_3[]="第3月曜日";}
if ($east5_c[7]==1) {$east5_3[]="第4月曜日";}
if ($east5_c[8]==1) {$east5_3[]="第1火曜日";}
if ($east5_c[9]==1) {$east5_3[]="第2火曜日";}
if ($east5_c[10]==1) {$east5_3[]="第3火曜日";}
if ($east5_c[11]==1) {$east5_3[]="第4火曜日";}
if ($east5_c[12]==1) {$east5_3[]="第1水曜日";}
if ($east5_c[13]==1) {$east5_3[]="第2水曜日";}
if ($east5_c[14]==1) {$east5_3[]="第3水曜日";}
if ($east5_c[15]==1) {$east5_3[]="第4水曜日";}
if ($east5_c[16]==1) {$east5_3[]="第1木曜日";}
if ($east5_c[17]==1) {$east5_3[]="第2木曜日";}
if ($east5_c[18]==1) {$east5_3[]="第3木曜日";}
if ($east5_c[19]==1) {$east5_3[]="第4木曜日";}
if ($east5_c[20]==1) {$east5_3[]="第1金曜日";}
if ($east5_c[21]==1) {$east5_3[]="第2金曜日";}
if ($east5_c[22]==1) {$east5_3[]="第3金曜日";}
if ($east5_c[23]==1) {$east5_3[]="第4金曜日";}
if ($east5_c[24]==1) {$east5_3[]="第1土曜日";}
if ($east5_c[25]==1) {$east5_3[]="第2土曜日";}
if ($east5_c[26]==1) {$east5_3[]="第3土曜日";}
if ($east5_c[27]==1) {$east5_3[]="第4土曜日";}
//西2区nonburn
if ($east5_d[0]==1) {$east5_4[]="第1日曜日";}
if ($east5_d[1]==1) {$east5_4[]="第2日曜日";}
if ($east5_d[2]==1) {$east5_4[]="第3日曜日";}
if ($east5_d[3]==1) {$east5_4[]="第4日曜日";}
if ($east5_d[4]==1) {$east5_4[]="第1月曜日";}
if ($east5_d[5]==1) {$east5_4[]="第2月曜日";}
if ($east5_d[6]==1) {$east5_4[]="第3月曜日";}
if ($east5_d[7]==1) {$east5_4[]="第4月曜日";}
if ($east5_d[8]==1) {$east5_4[]="第1火曜日";}
if ($east5_d[9]==1) {$east5_4[]="第2火曜日";}
if ($east5_d[10]==1) {$east5_4[]="第3火曜日";}
if ($east5_d[11]==1) {$east5_4[]="第4火曜日";}
if ($east5_d[12]==1) {$east5_4[]="第1水曜日";}
if ($east5_d[13]==1) {$east5_4[]="第2水曜日";}
if ($east5_d[14]==1) {$east5_4[]="第3水曜日";}
if ($east5_d[15]==1) {$east5_4[]="第4水曜日";}
if ($east5_d[16]==1) {$east5_4[]="第1木曜日";}
if ($east5_d[17]==1) {$east5_4[]="第2木曜日";}
if ($east5_d[18]==1) {$east5_4[]="第3木曜日";}
if ($east5_d[19]==1) {$east5_4[]="第4木曜日";}
if ($east5_d[20]==1) {$east5_4[]="第1金曜日";}
if ($east5_d[21]==1) {$east5_4[]="第2金曜日";}
if ($east5_d[22]==1) {$east5_4[]="第3金曜日";}
if ($east5_d[23]==1) {$east5_4[]="第4金曜日";}
if ($east5_d[24]==1) {$east5_4[]="第1土曜日";}
if ($east5_d[25]==1) {$east5_4[]="第2土曜日";}
if ($east5_d[26]==1) {$east5_4[]="第3土曜日";}
if ($east5_d[27]==1) {$east5_4[]="第4土曜日";}
//西2区pet
if ($east5_e[0]==1) {$east5_5[]="第1日曜日";}
if ($east5_e[1]==1) {$east5_5[]="第2日曜日";}
if ($east5_e[2]==1) {$east5_5[]="第3日曜日";}
if ($east5_e[3]==1) {$east5_5[]="第4日曜日";}
if ($east5_e[4]==1) {$east5_5[]="第1月曜日";}
if ($east5_e[5]==1) {$east5_5[]="第2月曜日";}
if ($east5_e[6]==1) {$east5_5[]="第3月曜日";}
if ($east5_e[7]==1) {$east5_5[]="第4月曜日";}
if ($east5_e[8]==1) {$east5_5[]="第1火曜日";}
if ($east5_e[9]==1) {$east5_5[]="第2火曜日";}
if ($east5_e[10]==1) {$east5_5[]="第3火曜日";}
if ($east5_e[11]==1) {$east5_5[]="第4火曜日";}
if ($east5_e[12]==1) {$east5_5[]="第1水曜日";}
if ($east5_e[13]==1) {$east5_5[]="第2水曜日";}
if ($east5_e[14]==1) {$east5_5[]="第3水曜日";}
if ($east5_e[15]==1) {$east5_5[]="第4水曜日";}
if ($east5_e[16]==1) {$east5_5[]="第1木曜日";}
if ($east5_e[17]==1) {$east5_5[]="第2木曜日";}
if ($east5_e[18]==1) {$east5_5[]="第3木曜日";}
if ($east5_e[19]==1) {$east5_5[]="第4木曜日";}
if ($east5_e[20]==1) {$east5_5[]="第1金曜日";}
if ($east5_e[21]==1) {$east5_5[]="第2金曜日";}
if ($east5_e[22]==1) {$east5_5[]="第3金曜日";}
if ($east5_e[23]==1) {$east5_5[]="第4金曜日";}
if ($east5_e[24]==1) {$east5_5[]="第1土曜日";}
if ($east5_e[25]==1) {$east5_5[]="第2土曜日";}
if ($east5_e[26]==1) {$east5_5[]="第3土曜日";}
if ($east5_e[27]==1) {$east5_5[]="第4土曜日";}
//西2区plastic
if ($east5_f[0]==1) {$east5_6[]="第1日曜日";}
if ($east5_f[1]==1) {$east5_6[]="第2日曜日";}
if ($east5_f[2]==1) {$east5_6[]="第3日曜日";}
if ($east5_f[3]==1) {$east5_6[]="第4日曜日";}
if ($east5_f[4]==1) {$east5_6[]="第1月曜日";}
if ($east5_f[5]==1) {$east5_6[]="第2月曜日";}
if ($east5_f[6]==1) {$east5_6[]="第3月曜日";}
if ($east5_f[7]==1) {$east5_6[]="第4月曜日";}
if ($east5_f[8]==1) {$east5_6[]="第1火曜日";}
if ($east5_f[9]==1) {$east5_6[]="第2火曜日";}
if ($east5_f[10]==1) {$east5_6[]="第3火曜日";}
if ($east5_f[11]==1) {$east5_6[]="第4火曜日";}
if ($east5_f[12]==1) {$east5_6[]="第1水曜日";}
if ($east5_f[13]==1) {$east5_6[]="第2水曜日";}
if ($east5_f[14]==1) {$east5_6[]="第3水曜日";}
if ($east5_f[15]==1) {$east5_6[]="第4水曜日";}
if ($east5_f[16]==1) {$east5_6[]="第1木曜日";}
if ($east5_f[17]==1) {$east5_6[]="第2木曜日";}
if ($east5_f[18]==1) {$east5_6[]="第3木曜日";}
if ($east5_f[19]==1) {$east5_6[]="第4木曜日";}
if ($east5_f[20]==1) {$east5_6[]="第1金曜日";}
if ($east5_f[21]==1) {$east5_6[]="第2金曜日";}
if ($east5_f[22]==1) {$east5_6[]="第3金曜日";}
if ($east5_f[23]==1) {$east5_6[]="第4金曜日";}
if ($east5_f[24]==1) {$east5_6[]="第1土曜日";}
if ($east5_f[25]==1) {$east5_6[]="第2土曜日";}
if ($east5_f[26]==1) {$east5_6[]="第3土曜日";}
if ($east5_f[27]==1) {$east5_6[]="第4土曜日";}
//西2区paper
if ($east5_g[0]==1) {$east5_7[]="第1日曜日";}
if ($east5_g[1]==1) {$east5_7[]="第2日曜日";}
if ($east5_g[2]==1) {$east5_7[]="第3日曜日";}
if ($east5_g[3]==1) {$east5_7[]="第4日曜日";}
if ($east5_g[4]==1) {$east5_7[]="第1月曜日";}
if ($east5_g[5]==1) {$east5_7[]="第2月曜日";}
if ($east5_g[6]==1) {$east5_7[]="第3月曜日";}
if ($east5_g[7]==1) {$east5_7[]="第4月曜日";}
if ($east5_g[8]==1) {$east5_7[]="第1火曜日";}
if ($east5_g[9]==1) {$east5_7[]="第2火曜日";}
if ($east5_g[10]==1) {$east5_7[]="第3火曜日";}
if ($east5_g[11]==1) {$east5_7[]="第4火曜日";}
if ($east5_g[12]==1) {$east5_7[]="第1水曜日";}
if ($east5_g[13]==1) {$east5_7[]="第2水曜日";}
if ($east5_g[14]==1) {$east5_7[]="第3水曜日";}
if ($east5_g[15]==1) {$east5_7[]="第4水曜日";}
if ($east5_g[16]==1) {$east5_7[]="第1木曜日";}
if ($east5_g[17]==1) {$east5_7[]="第2木曜日";}
if ($east5_g[18]==1) {$east5_7[]="第3木曜日";}
if ($east5_g[19]==1) {$east5_7[]="第4木曜日";}
if ($east5_g[20]==1) {$east5_7[]="第1金曜日";}
if ($east5_g[21]==1) {$east5_7[]="第2金曜日";}
if ($east5_g[22]==1) {$east5_7[]="第3金曜日";}
if ($east5_g[23]==1) {$east5_7[]="第4金曜日";}
if ($east5_g[24]==1) {$east5_7[]="第1土曜日";}
if ($east5_g[25]==1) {$east5_7[]="第2土曜日";}
if ($east5_g[26]==1) {$east5_7[]="第3土曜日";}
if ($east5_g[27]==1) {$east5_7[]="第4土曜日";}
//西2区cloth
if ($east5_h[0]==1) {$east5_8[]="第1日曜日";}
if ($east5_h[1]==1) {$east5_8[]="第2日曜日";}
if ($east5_h[2]==1) {$east5_8[]="第3日曜日";}
if ($east5_h[3]==1) {$east5_8[]="第4日曜日";}
if ($east5_h[4]==1) {$east5_8[]="第1月曜日";}
if ($east5_h[5]==1) {$east5_8[]="第2月曜日";}
if ($east5_h[6]==1) {$east5_8[]="第3月曜日";}
if ($east5_h[7]==1) {$east5_8[]="第4月曜日";}
if ($east5_h[8]==1) {$east5_8[]="第1火曜日";}
if ($east5_h[9]==1) {$east5_8[]="第2火曜日";}
if ($east5_h[10]==1) {$east5_8[]="第3火曜日";}
if ($east5_h[11]==1) {$east5_8[]="第4火曜日";}
if ($east5_h[12]==1) {$east5_8[]="第1水曜日";}
if ($east5_h[13]==1) {$east5_8[]="第2水曜日";}
if ($east5_h[14]==1) {$east5_8[]="第3水曜日";}
if ($east5_h[15]==1) {$east5_8[]="第4水曜日";}
if ($east5_h[16]==1) {$east5_8[]="第1木曜日";}
if ($east5_h[17]==1) {$east5_8[]="第2木曜日";}
if ($east5_h[18]==1) {$east5_8[]="第3木曜日";}
if ($east5_h[19]==1) {$east5_8[]="第4木曜日";}
if ($east5_h[20]==1) {$east5_8[]="第1金曜日";}
if ($east5_h[21]==1) {$east5_8[]="第2金曜日";}
if ($east5_h[22]==1) {$east5_8[]="第3金曜日";}
if ($east5_h[23]==1) {$east5_8[]="第4金曜日";}
if ($east5_h[24]==1) {$east5_8[]="第1土曜日";}
if ($east5_h[25]==1) {$east5_8[]="第2土曜日";}
if ($east5_h[26]==1) {$east5_8[]="第3土曜日";}
if ($east5_h[27]==1) {$east5_8[]="第4土曜日";}

//ここから西3区
#データの抽出
try{
	$sql = "SELECT * FROM week WHERE area_id=6";
	$stmt6 = $pdo->prepare($sql);
	$stmt6->execute();
} catch (PDOException $e) {
  exit('データベースの抽出に失敗しました。'.$e->getMessage());
}
$value6 = $stmt6->fetch();

$east6_burn = $value6[1];
$east6_metal = $value6[2];
$east6_bottle = $value6[3];
$east6_nonburn = $value6[4];
$east6_pet = $value6[5];
$east6_plastic = $value6[6];
$east6_paper = $value6[7];
$east6_cloth = $value6[8];

$east6_burn = decbin($east6_burn);
$east6_metal = decbin($east6_metal);
$east6_bottle = decbin($east6_bottle);
$east6_nonburn = decbin($east6_nonburn);
$east6_pet = decbin($east6_pet);
$east6_plastic = decbin($east6_plastic);
$east6_paper = decbin($east6_paper);
$east6_cloth = decbin($east6_cloth);

$east6_a = str_pad($east6_burn, 28, '0', STR_PAD_LEFT);
$east6_b = str_pad($east6_metal, 28, '0', STR_PAD_LEFT);
$east6_c = str_pad($east6_bottle, 28, '0', STR_PAD_LEFT);
$east6_d = str_pad($east6_nonburn, 28, '0', STR_PAD_LEFT);
$east6_e = str_pad($east6_pet, 28, '0', STR_PAD_LEFT);
$east6_f = str_pad($east6_plastic, 28, '0', STR_PAD_LEFT);
$east6_g = str_pad($east6_paper, 28, '0', STR_PAD_LEFT);
$east6_h = str_pad($east6_cloth, 28, '0', STR_PAD_LEFT);
//西3区burn
if ($east6_a[0]==1) {$east6_1[]="第1日曜日";}
if ($east6_a[1]==1) {$east6_1[]="第2日曜日";}
if ($east6_a[2]==1) {$east6_1[]="第3日曜日";}
if ($east6_a[3]==1) {$east6_1[]="第4日曜日";}
if ($east6_a[4]==1) {$east6_1[]="第1月曜日";}
if ($east6_a[5]==1) {$east6_1[]="第2月曜日";}
if ($east6_a[6]==1) {$east6_1[]="第3月曜日";}
if ($east6_a[7]==1) {$east6_1[]="第4月曜日";}
if ($east6_a[8]==1) {$east6_1[]="第1火曜日";}
if ($east6_a[9]==1) {$east6_1[]="第2火曜日";}
if ($east6_a[10]==1) {$east6_1[]="第3火曜日";}
if ($east6_a[11]==1) {$east6_1[]="第4火曜日";}
if ($east6_a[12]==1) {$east6_1[]="第1水曜日";}
if ($east6_a[13]==1) {$east6_1[]="第2水曜日";}
if ($east6_a[14]==1) {$east6_1[]="第3水曜日";}
if ($east6_a[15]==1) {$east6_1[]="第4水曜日";}
if ($east6_a[16]==1) {$east6_1[]="第1木曜日";}
if ($east6_a[17]==1) {$east6_1[]="第2木曜日";}
if ($east6_a[18]==1) {$east6_1[]="第3木曜日";}
if ($east6_a[19]==1) {$east6_1[]="第4木曜日";}
if ($east6_a[20]==1) {$east6_1[]="第1金曜日";}
if ($east6_a[21]==1) {$east6_1[]="第2金曜日";}
if ($east6_a[22]==1) {$east6_1[]="第3金曜日";}
if ($east6_a[23]==1) {$east6_1[]="第4金曜日";}
if ($east6_a[24]==1) {$east6_1[]="第1土曜日";}
if ($east6_a[25]==1) {$east6_1[]="第2土曜日";}
if ($east6_a[26]==1) {$east6_1[]="第3土曜日";}
if ($east6_a[27]==1) {$east6_1[]="第4土曜日";}
//西3区metal
if ($east6_b[0]==1) {$east6_2[]="第1日曜日";}
if ($east6_b[1]==1) {$east6_2[]="第2日曜日";}
if ($east6_b[2]==1) {$east6_2[]="第3日曜日";}
if ($east6_b[3]==1) {$east6_2[]="第4日曜日";}
if ($east6_b[4]==1) {$east6_2[]="第1月曜日";}
if ($east6_b[5]==1) {$east6_2[]="第2月曜日";}
if ($east6_b[6]==1) {$east6_2[]="第3月曜日";}
if ($east6_b[7]==1) {$east6_2[]="第4月曜日";}
if ($east6_b[8]==1) {$east6_2[]="第1火曜日";}
if ($east6_b[9]==1) {$east6_2[]="第2火曜日";}
if ($east6_b[10]==1) {$east6_2[]="第3火曜日";}
if ($east6_b[11]==1) {$east6_2[]="第4火曜日";}
if ($east6_b[12]==1) {$east6_2[]="第1水曜日";}
if ($east6_b[13]==1) {$east6_2[]="第2水曜日";}
if ($east6_b[14]==1) {$east6_2[]="第3水曜日";}
if ($east6_b[15]==1) {$east6_2[]="第4水曜日";}
if ($east6_b[16]==1) {$east6_2[]="第1木曜日";}
if ($east6_b[17]==1) {$east6_2[]="第2木曜日";}
if ($east6_b[18]==1) {$east6_2[]="第3木曜日";}
if ($east6_b[19]==1) {$east6_2[]="第4木曜日";}
if ($east6_b[20]==1) {$east6_2[]="第1金曜日";}
if ($east6_b[21]==1) {$east6_2[]="第2金曜日";}
if ($east6_b[22]==1) {$east6_2[]="第3金曜日";}
if ($east6_b[23]==1) {$east6_2[]="第4金曜日";}
if ($east6_b[24]==1) {$east6_2[]="第1土曜日";}
if ($east6_b[25]==1) {$east6_2[]="第2土曜日";}
if ($east6_b[26]==1) {$east6_2[]="第3土曜日";}
if ($east6_b[27]==1) {$east6_2[]="第4土曜日";}
//西3区bottle
if ($east6_c[0]==1) {$east6_3[]="第1日曜日";}
if ($east6_c[1]==1) {$east6_3[]="第2日曜日";}
if ($east6_c[2]==1) {$east6_3[]="第3日曜日";}
if ($east6_c[3]==1) {$east6_3[]="第4日曜日";}
if ($east6_c[4]==1) {$east6_3[]="第1月曜日";}
if ($east6_c[5]==1) {$east6_3[]="第2月曜日";}
if ($east6_c[6]==1) {$east6_3[]="第3月曜日";}
if ($east6_c[7]==1) {$east6_3[]="第4月曜日";}
if ($east6_c[8]==1) {$east6_3[]="第1火曜日";}
if ($east6_c[9]==1) {$east6_3[]="第2火曜日";}
if ($east6_c[10]==1) {$east6_3[]="第3火曜日";}
if ($east6_c[11]==1) {$east6_3[]="第4火曜日";}
if ($east6_c[12]==1) {$east6_3[]="第1水曜日";}
if ($east6_c[13]==1) {$east6_3[]="第2水曜日";}
if ($east6_c[14]==1) {$east6_3[]="第3水曜日";}
if ($east6_c[15]==1) {$east6_3[]="第4水曜日";}
if ($east6_c[16]==1) {$east6_3[]="第1木曜日";}
if ($east6_c[17]==1) {$east6_3[]="第2木曜日";}
if ($east6_c[18]==1) {$east6_3[]="第3木曜日";}
if ($east6_c[19]==1) {$east6_3[]="第4木曜日";}
if ($east6_c[20]==1) {$east6_3[]="第1金曜日";}
if ($east6_c[21]==1) {$east6_3[]="第2金曜日";}
if ($east6_c[22]==1) {$east6_3[]="第3金曜日";}
if ($east6_c[23]==1) {$east6_3[]="第4金曜日";}
if ($east6_c[24]==1) {$east6_3[]="第1土曜日";}
if ($east6_c[25]==1) {$east6_3[]="第2土曜日";}
if ($east6_c[26]==1) {$east6_3[]="第3土曜日";}
if ($east6_c[27]==1) {$east6_3[]="第4土曜日";}
//西3区nonburn
if ($east6_d[0]==1) {$east6_4[]="第1日曜日";}
if ($east6_d[1]==1) {$east6_4[]="第2日曜日";}
if ($east6_d[2]==1) {$east6_4[]="第3日曜日";}
if ($east6_d[3]==1) {$east6_4[]="第4日曜日";}
if ($east6_d[4]==1) {$east6_4[]="第1月曜日";}
if ($east6_d[5]==1) {$east6_4[]="第2月曜日";}
if ($east6_d[6]==1) {$east6_4[]="第3月曜日";}
if ($east6_d[7]==1) {$east6_4[]="第4月曜日";}
if ($east6_d[8]==1) {$east6_4[]="第1火曜日";}
if ($east6_d[9]==1) {$east6_4[]="第2火曜日";}
if ($east6_d[10]==1) {$east6_4[]="第3火曜日";}
if ($east6_d[11]==1) {$east6_4[]="第4火曜日";}
if ($east6_d[12]==1) {$east6_4[]="第1水曜日";}
if ($east6_d[13]==1) {$east6_4[]="第2水曜日";}
if ($east6_d[14]==1) {$east6_4[]="第3水曜日";}
if ($east6_d[15]==1) {$east6_4[]="第4水曜日";}
if ($east6_d[16]==1) {$east6_4[]="第1木曜日";}
if ($east6_d[17]==1) {$east6_4[]="第2木曜日";}
if ($east6_d[18]==1) {$east6_4[]="第3木曜日";}
if ($east6_d[19]==1) {$east6_4[]="第4木曜日";}
if ($east6_d[20]==1) {$east6_4[]="第1金曜日";}
if ($east6_d[21]==1) {$east6_4[]="第2金曜日";}
if ($east6_d[22]==1) {$east6_4[]="第3金曜日";}
if ($east6_d[23]==1) {$east6_4[]="第4金曜日";}
if ($east6_d[24]==1) {$east6_4[]="第1土曜日";}
if ($east6_d[25]==1) {$east6_4[]="第2土曜日";}
if ($east6_d[26]==1) {$east6_4[]="第3土曜日";}
if ($east6_d[27]==1) {$east6_4[]="第4土曜日";}
//西3区pe
if ($east6_e[0]==1) {$east6_5[]="第1日曜日";}
if ($east6_e[1]==1) {$east6_5[]="第2日曜日";}
if ($east6_e[2]==1) {$east6_5[]="第3日曜日";}
if ($east6_e[3]==1) {$east6_5[]="第4日曜日";}
if ($east6_e[4]==1) {$east6_5[]="第1月曜日";}
if ($east6_e[5]==1) {$east6_5[]="第2月曜日";}
if ($east6_e[6]==1) {$east6_5[]="第3月曜日";}
if ($east6_e[7]==1) {$east6_5[]="第4月曜日";}
if ($east6_e[8]==1) {$east6_5[]="第1火曜日";}
if ($east6_e[9]==1) {$east6_5[]="第2火曜日";}
if ($east6_e[10]==1) {$east6_5[]="第3火曜日";}
if ($east6_e[11]==1) {$east6_5[]="第4火曜日";}
if ($east6_e[12]==1) {$east6_5[]="第1水曜日";}
if ($east6_e[13]==1) {$east6_5[]="第2水曜日";}
if ($east6_e[14]==1) {$east6_5[]="第3水曜日";}
if ($east6_e[15]==1) {$east6_5[]="第4水曜日";}
if ($east6_e[16]==1) {$east6_5[]="第1木曜日";}
if ($east6_e[17]==1) {$east6_5[]="第2木曜日";}
if ($east6_e[18]==1) {$east6_5[]="第3木曜日";}
if ($east6_e[19]==1) {$east6_5[]="第4木曜日";}
if ($east6_e[20]==1) {$east6_5[]="第1金曜日";}
if ($east6_e[21]==1) {$east6_5[]="第2金曜日";}
if ($east6_e[22]==1) {$east6_5[]="第3金曜日";}
if ($east6_e[23]==1) {$east6_5[]="第4金曜日";}
if ($east6_e[24]==1) {$east6_5[]="第1土曜日";}
if ($east6_e[25]==1) {$east6_5[]="第2土曜日";}
if ($east6_e[26]==1) {$east6_5[]="第3土曜日";}
if ($east6_e[27]==1) {$east6_5[]="第4土曜日";}
//西3区plastic
if ($east6_f[0]==1) {$east6_6[]="第1日曜日";}
if ($east6_f[1]==1) {$east6_6[]="第2日曜日";}
if ($east6_f[2]==1) {$east6_6[]="第3日曜日";}
if ($east6_f[3]==1) {$east6_6[]="第4日曜日";}
if ($east6_f[4]==1) {$east6_6[]="第1月曜日";}
if ($east6_f[5]==1) {$east6_6[]="第2月曜日";}
if ($east6_f[6]==1) {$east6_6[]="第3月曜日";}
if ($east6_f[7]==1) {$east6_6[]="第4月曜日";}
if ($east6_f[8]==1) {$east6_6[]="第1火曜日";}
if ($east6_f[9]==1) {$east6_6[]="第2火曜日";}
if ($east6_f[10]==1) {$east6_6[]="第3火曜日";}
if ($east6_f[11]==1) {$east6_6[]="第4火曜日";}
if ($east6_f[12]==1) {$east6_6[]="第1水曜日";}
if ($east6_f[13]==1) {$east6_6[]="第2水曜日";}
if ($east6_f[14]==1) {$east6_6[]="第3水曜日";}
if ($east6_f[15]==1) {$east6_6[]="第4水曜日";}
if ($east6_f[16]==1) {$east6_6[]="第1木曜日";}
if ($east6_f[17]==1) {$east6_6[]="第2木曜日";}
if ($east6_f[18]==1) {$east6_6[]="第3木曜日";}
if ($east6_f[19]==1) {$east6_6[]="第4木曜日";}
if ($east6_f[20]==1) {$east6_6[]="第1金曜日";}
if ($east6_f[21]==1) {$east6_6[]="第2金曜日";}
if ($east6_f[22]==1) {$east6_6[]="第3金曜日";}
if ($east6_f[23]==1) {$east6_6[]="第4金曜日";}
if ($east6_f[24]==1) {$east6_6[]="第1土曜日";}
if ($east6_f[25]==1) {$east6_6[]="第2土曜日";}
if ($east6_f[26]==1) {$east6_6[]="第3土曜日";}
if ($east6_f[27]==1) {$east6_6[]="第4土曜日";}
//西3区paper
if ($east6_g[0]==1) {$east6_7[]="第1日曜日";}
if ($east6_g[1]==1) {$east6_7[]="第2日曜日";}
if ($east6_g[2]==1) {$east6_7[]="第3日曜日";}
if ($east6_g[3]==1) {$east6_7[]="第4日曜日";}
if ($east6_g[4]==1) {$east6_7[]="第1月曜日";}
if ($east6_g[5]==1) {$east6_7[]="第2月曜日";}
if ($east6_g[6]==1) {$east6_7[]="第3月曜日";}
if ($east6_g[7]==1) {$east6_7[]="第4月曜日";}
if ($east6_g[8]==1) {$east6_7[]="第1火曜日";}
if ($east6_g[9]==1) {$east6_7[]="第2火曜日";}
if ($east6_g[10]==1) {$east6_7[]="第3火曜日";}
if ($east6_g[11]==1) {$east6_7[]="第4火曜日";}
if ($east6_g[12]==1) {$east6_7[]="第1水曜日";}
if ($east6_g[13]==1) {$east6_7[]="第2水曜日";}
if ($east6_g[14]==1) {$east6_7[]="第3水曜日";}
if ($east6_g[15]==1) {$east6_7[]="第4水曜日";}
if ($east6_g[16]==1) {$east6_7[]="第1木曜日";}
if ($east6_g[17]==1) {$east6_7[]="第2木曜日";}
if ($east6_g[18]==1) {$east6_7[]="第3木曜日";}
if ($east6_g[19]==1) {$east6_7[]="第4木曜日";}
if ($east6_g[20]==1) {$east6_7[]="第1金曜日";}
if ($east6_g[21]==1) {$east6_7[]="第2金曜日";}
if ($east6_g[22]==1) {$east6_7[]="第3金曜日";}
if ($east6_g[23]==1) {$east6_7[]="第4金曜日";}
if ($east6_g[24]==1) {$east6_7[]="第1土曜日";}
if ($east6_g[25]==1) {$east6_7[]="第2土曜日";}
if ($east6_g[26]==1) {$east6_7[]="第3土曜日";}
if ($east6_g[27]==1) {$east6_7[]="第4土曜日";}
//西3区cloth
if ($east6_h[0]==1) {$east6_8[]="第1日曜日";}
if ($east6_h[1]==1) {$east6_8[]="第2日曜日";}
if ($east6_h[2]==1) {$east6_8[]="第3日曜日";}
if ($east6_h[3]==1) {$east6_8[]="第4日曜日";}
if ($east6_h[4]==1) {$east6_8[]="第1月曜日";}
if ($east6_h[5]==1) {$east6_8[]="第2月曜日";}
if ($east6_h[6]==1) {$east6_8[]="第3月曜日";}
if ($east6_h[7]==1) {$east6_8[]="第4月曜日";}
if ($east6_h[8]==1) {$east6_8[]="第1火曜日";}
if ($east6_h[9]==1) {$east6_8[]="第2火曜日";}
if ($east6_h[10]==1) {$east6_8[]="第3火曜日";}
if ($east6_h[11]==1) {$east6_8[]="第4火曜日";}
if ($east6_h[12]==1) {$east6_8[]="第1水曜日";}
if ($east6_h[13]==1) {$east6_8[]="第2水曜日";}
if ($east6_h[14]==1) {$east6_8[]="第3水曜日";}
if ($east6_h[15]==1) {$east6_8[]="第4水曜日";}
if ($east6_h[16]==1) {$east6_8[]="第1木曜日";}
if ($east6_h[17]==1) {$east6_8[]="第2木曜日";}
if ($east6_h[18]==1) {$east6_8[]="第3木曜日";}
if ($east6_h[19]==1) {$east6_8[]="第4木曜日";}
if ($east6_h[20]==1) {$east6_8[]="第1金曜日";}
if ($east6_h[21]==1) {$east6_8[]="第2金曜日";}
if ($east6_h[22]==1) {$east6_8[]="第3金曜日";}
if ($east6_h[23]==1) {$east6_8[]="第4金曜日";}
if ($east6_h[24]==1) {$east6_8[]="第1土曜日";}
if ($east6_h[25]==1) {$east6_8[]="第2土曜日";}
if ($east6_h[26]==1) {$east6_8[]="第3土曜日";}
if ($east6_h[27]==1) {$east6_8[]="第4土曜日";}



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
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east1c" value="編集"/>
				  </a>
				</td>
        <td id="east0104">
					<?php
					for($i = 0 ; $i < count($east1_4); $i++){
					  print $east1_4[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east1d" value="編集"/>
				  </a>
				</td>
        <td id="east0105">
					<?php
					for($i = 0 ; $i < count($east1_5); $i++){
					  print $east1_5[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east1e" value="編集"/>
				  </a>
				</td>
        <td id="east0106">
					<?php
					for($i = 0 ; $i < count($east1_6); $i++){
					  print $east1_6[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east1f" value="編集"/>
				  </a>
				</td>
        <td id="east0107">
					<?php
					for($i = 0 ; $i < count($east1_7); $i++){
					  print $east1_7[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east1g" value="編集"/>
				  </a>
				</td>
        <td id="east0108">
					<?php
					for($i = 0 ; $i < count($east1_8); $i++){
					  print $east1_8[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east1h" value="編集"/>
				  </a>
				</td>
      </tr>
      <tr>
        <td id="east02">東2区</td>
        <td id="east0201">
					<?php
					for($i = 0 ; $i < count($east2_1); $i++){
					  print $east2_1[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east2a" value="編集"/>
				  </a>
				</td>
        <td id="east0202">
					<?php
					for($i = 0 ; $i < count($east2_2); $i++){
					  print $east2_2[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east2b" value="編集"/>
				  </a>
				</td>
        <td id="east0203">
					<?php
					for($i = 0 ; $i < count($east2_3); $i++){
					  print $east2_3[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east2c" value="編集"/>
				  </a>
				</td>
        <td id="east0204">
					<?php
					for($i = 0 ; $i < count($east2_4); $i++){
					  print $east2_4[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east2d" value="編集"/>
				  </a>
				</td>
        <td id="east0205">
					<?php
					for($i = 0 ; $i < count($east2_5); $i++){
					  print $east2_5[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east2e" value="編集"/>
				  </a>
				</td>
        <td id="east0206">
					<?php
					for($i = 0 ; $i < count($east2_6); $i++){
					  print $east2_6[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east2f" value="編集"/>
				  </a>
				</td>
        <td id="east0207">
					<?php
					for($i = 0 ; $i < count($east2_7); $i++){
					  print $east2_7[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east2g" value="編集"/>
				  </a>
				</td>
        <td id="east0208">
					<?php
					for($i = 0 ; $i < count($east2_8); $i++){
					  print $east2_8[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east2h" value="編集"/>
				  </a>
				</td>
      </tr>
      <tr>
        <td id="east03">東3区</td>
        <td id="east0301">
					<?php
					for($i = 0 ; $i < count($east3_1); $i++){
					  print $east3_1[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east3a" value="編集"/>
				  </a>
				</td>
        <td id="east0302">
					<?php
					for($i = 0 ; $i < count($east3_2); $i++){
					  print $east3_2[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east3b" value="編集"/>
				  </a>
				</td>
        <td id="east0303">
					<?php
					for($i = 0 ; $i < count($east3_3); $i++){
					  print $east3_3[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east3c" value="編集"/>
				  </a>
				</td>
        <td id="east0304">
					<?php
					for($i = 0 ; $i < count($east3_4); $i++){
					  print $east3_4[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east3d" value="編集"/>
				  </a>
				</td>
        <td id="east0305">
					<?php
					for($i = 0 ; $i < count($east3_5); $i++){
					  print $east3_5[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east3e" value="編集"/>
				  </a>
				</td>
        <td id="east0306">
					<?php
					for($i = 0 ; $i < count($east3_6); $i++){
					  print $east3_6[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east3f" value="編集"/>
				  </a>
				</td>
        <td id="east0307">
					<?php
					for($i = 0 ; $i < count($east3_7); $i++){
					  print $east3_7[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east3g" value="編集"/>
				  </a>
				</td>
        <td id="east0308">
					<?php
					for($i = 0 ; $i < count($east3_8); $i++){
					  print $east3_8[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east3h" value="編集"/>
				  </a>
				</td>
      </tr>
      <tr>
        <td id="west01">西1区</td>
        <td id="west0101">
					<?php
					for($i = 0 ; $i < count($east4_1); $i++){
					  print $east4_1[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east4a" value="編集"/>
				  </a>
				</td>
        <td id="west0102">
					<?php
					for($i = 0 ; $i < count($east4_2); $i++){
					  print $east4_2[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east4b" value="編集"/>
				  </a>
				</td>
        <td id="west0103">
					<?php
					for($i = 0 ; $i < count($east4_3); $i++){
					  print $east4_3[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east4c" value="編集"/>
				  </a>
				</td>
        <td id="west0104">
					<?php
					for($i = 0 ; $i < count($east4_4); $i++){
					  print $east4_4[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east4d" value="編集"/>
				  </a>
				</td>
        <td id="west0105">
					<?php
					for($i = 0 ; $i < count($east4_5); $i++){
					  print $east4_5[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east4e" value="編集"/>
				  </a>
				</td>
        <td id="west0106">
					<?php
					for($i = 0 ; $i < count($east4_6); $i++){
					  print $east4_6[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east4f" value="編集"/>
				  </a>
				</td>
        <td id="west0107">
					<?php
					for($i = 0 ; $i < count($east4_7); $i++){
					  print $east4_7[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east4g" value="編集"/>
				  </a>
				</td>
        <td id="west0108">
					<?php
					for($i = 0 ; $i < count($east4_8); $i++){
					  print $east4_8[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east4h" value="編集"/>
				  </a>
				</td>
      </tr>
      <tr>
        <td id="west02">西2区</td>
        <td id="west0201">
					<?php
					for($i = 0 ; $i < count($east5_1); $i++){
					  print $east5_1[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east5a" value="編集"/>
				  </a>
				</td>
        <td id="west0202">
					<?php
					for($i = 0 ; $i < count($east5_2); $i++){
					  print $east5_2[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east5b" value="編集"/>
				  </a>
				</td>
        <td id="west0203">
					<?php
					for($i = 0 ; $i < count($east5_3); $i++){
					  print $east5_3[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east5c" value="編集"/>
				  </a>
				</td>
        <td id="west0204">
					<?php
					for($i = 0 ; $i < count($east5_4); $i++){
					  print $east5_4[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east5d" value="編集"/>
				  </a>
				</td>
        <td id="west0205">
					<?php
					for($i = 0 ; $i < count($east5_5); $i++){
					  print $east5_5[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east5e" value="編集"/>
				  </a>
				</td>
        <td id="west0206">
					<?php
					for($i = 0 ; $i < count($east5_6); $i++){
					  print $east5_6[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east5f" value="編集"/>
				  </a>
				</td>
        <td id="west0207">
					<?php
					for($i = 0 ; $i < count($east5_7); $i++){
					  print $east5_7[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east5g" value="編集"/>
				  </a>
				</td>
        <td id="west0208">
					<?php
					for($i = 0 ; $i < count($east5_8); $i++){
					  print $east5_8[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east5h" value="編集"/>
				  </a>
				</td>
      </tr>
      <tr>
        <td id="west03">西3区</td>
        <td id="west0301">
					<?php
					for($i = 0 ; $i < count($east6_1); $i++){
					  print $east6_1[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east6a" value="編集"/>
				  </a>
				</td>
        <td id="west0302">
					<?php
					for($i = 0 ; $i < count($east6_2); $i++){
					  print $east6_2[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east6b" value="編集"/>
				  </a>
				</td>
        <td id="west0303">
					<?php
					for($i = 0 ; $i < count($east6_3); $i++){
					  print $east6_3[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east6c" value="編集"/>
				  </a>
				</td>
        <td id="west0304">
					<?php
					for($i = 0 ; $i < count($east6_4); $i++){
					  print $east6_4[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east6d" value="編集"/>
				  </a>
				</td>
        <td id="west0305">
					<?php
					for($i = 0 ; $i < count($east6_5); $i++){
					  print $east6_5[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east6e" value="編集"/>
				  </a>
				</td>
        <td id="west0306">
					<?php
					for($i = 0 ; $i < count($east6_6); $i++){
					  print $east6_6[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east6f" value="編集"/>
				  </a>
				</td>
        <td id="west0307">
					<?php
					for($i = 0 ; $i < count($east6_7); $i++){
					  print $east6_7[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east6g" value="編集"/>
				  </a>
				</td>
        <td id="west0308">
					<?php
					for($i = 0 ; $i < count($east6_8); $i++){
					  print $east6_8[$i];
					?><br>
					<?php } ?>
					<a href="Admin_edit_cal.php">
          <input type="submit" name="east6h" value="編集"/>
				  </a>
				</td>
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
