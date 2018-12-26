<!DOCTYPE html>
<html lang="ja">
  <!--　～～～～～～～～～～～～～～～～地区登録画面表示～～～～～～～～～～～～～～～～～ -->

<head>
<meta charset="UTF-8" />
<title>GDSS ゴミ出し支援システム</title>
<link rel="icon" href="iconG.ico">
<meta name="description" content="高知県香美市土佐山田町を対象とした、ゴミ出しを支援するサイトです。">
<link rel="stylesheet" href="design.css">
</head>
<div class="header">
      <p class="title">GDSS</p>
      <p class="wayaku">ゴミ出し支援システム</p>
      <p class="desc">このサイトは、高知県香美市土佐山田町が対象となっています。</p>
</div>

<?
session_start();
$check=0;
$errorMessage="";

(isset($_POST['signup'])){
$db_name = "mysql:db_name=gdss_db;host-localhost";
$db_username = "root";
$db_password = "";
$db = new PDO($db_name, $db_username, $db_password);
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db -> perepare("INSERT INTO users(area_id) VALUES (:area_id)");
$stmt -> bindValue(":area_id", $area_id, PDO::PARAM_INT);
$stmt -> execute();
header("Location: ./Reg_district_comp.php");
exit();
}

if(isset($_POST["add_area"])){
$check = 1;
}
?>


 <?
  if($check == 0){
?>
<body>
    <div class="content">
      <img src="distmap.jpg">
      <form action="" method="POST">
      <table width="810" height="350" align="center" cellspacing="0"  >
	<tr height="50" bgcolor="#8fc27a">
	  <th colspan="3">地区登録・変更</th>
	</tr>
	<tr height="150" bgcolor="#deeed8">
	  <td align="center" valign="middle" width="270">
	    <p><input type="submit" id="add_area" style="background-color:#ebf1eb;width:100px;height:50px" value="東1区"></p>
	    </td>
	  <td align="center" valign="middle" width="270">
	    <p><input type="submit" id="add_area" style="background-color:#ebf1eb;width:100px;height:50px" value="東2区"></p>
	    </td>
	  <td align="center" valign="middle">
	    <p><input type="submit" id="add_area" style="background-color:#ebf1eb;width:100px;height:50px" value="東3区"></p>
	    </td>
	  </tr>

	    <tr bgcolor="#deeed8">
	      <td align="center" valign="middle">
		<p><input type="submit" id="add_area" style="background-color:#ebf1eb;width:100px;height:50px" value="西1区"></p>
		</td>
	      <td align="center" valign="middle">
		<p><input type="submit" id="add_area" style="background-color:#ebf1eb;width:100px;height:50px" value="西2区"></p>
		</td>
	      <td align="center" valign="middle">
		<p><input type="submit" id="add_area" style="background-color:#ebf1eb;width:100px;height:50px" value="西3区"></p>
		</td>
	      </tr>
	      </table>
	      </div>
	    </body>
	    <?php
		}
	    ?>

	    <?php
	    if(check == 1){
	    ?>
	    <body>
	      <div class="content" align="center">
		<br><b>地区を新たに変更・登録しますか？</b>
    <form id="check_adress" name="check_adress" action="Reg_district_comp.php" method="POST">
      <input type="submit" value="変更・登録" name="signup"  style="WIDTH:70px; HEIGHT:30px;">
</form>
	      </div>
	      </body>
		<?php
	    	}
	    	?>

        <a class="pagetop" href="#">PAGE TOP</a>


	      <div class="footer">
		<p class="title">GDSS</p>
		<p class="company">L&P</p>

	      </div>
	  </html>
