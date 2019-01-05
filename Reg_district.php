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

<?php
session_start();
$check=0;
$errorMessage="";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $dist = $_POST['dist'];
}

(isset($_POST['signup'])){
$db_name = "mysql:db_name=gdss_db;host=localhost";
$db_username = "root";
$db_password = "";
$db = new PDO($db_name, $db_username, $db_password);
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db -> perepare("INSERT INTO users(area_id) VALUES (:area_id)");
$stmt -> bindValue(":area_id", $dist, PDO::PARAM_INT);
$stmt -> execute();
header("Location: ./Reg_district_comp.php");
exit();
}

if(isset($_POST["dist"])){
$check = 1;
}
if(isset($_POST["back"])){
  $check = 0;
}
?>

<?php if($check=="0"){ ?>
  <body>
      <div class="content">
        <img src="distmap.jpg">
        <form action="" method="POST">
        <table width="1024" height="350" align="center" cellspacing="0"  >
  	<tr height="50" bgcolor="#8fc27a">
  	  <th colspan="3">地区登録・変更</th>
  	</tr>
  	<tr height="150" bgcolor="#deeed8">
  	  <td align="center" valign="middle" width="270">
  	    <p><input type="submit" id="dist" name="dist" style="background-color:#ebf1eb;width:100px;height:50px" value="東1区"></p>
  	    </td>
  	  <td align="center" valign="middle" width="270">
  	    <p><input type="submit" id="dist" name="dist" style="background-color:#ebf1eb;width:100px;height:50px" value="東2区"></p>
  	    </td>
  	  <td align="center" valign="middle">
  	    <p><input type="submit" id="dist" style="background-color:#ebf1eb;width:100px;height:50px" value="東3区"></p>
  	    </td>
  	  </tr>

  	    <tr bgcolor="#deeed8">
  	      <td align="center" valign="middle">
  		<p><input type="submit" id="dist" name="dist" style="background-color:#ebf1eb;width:100px;height:50px" value="西1区"></p>
  		</td>
  	      <td align="center" valign="middle">
  		<p><input type="submit" id="dist" name="dist" style="background-color:#ebf1eb;width:100px;height:50px" value="西2区"></p>
  		</td>
  	      <td align="center" valign="middle">
  		<p><input type="submit" id="dist" name="dist" style="background-color:#ebf1eb;width:100px;height:50px" value="西3区"></p>
  		</td>
  	      </tr>
  	      </table>
        </form>
      </div>
</body>
<?php } ?>

<?php if($check=="1"){ ?>
  <body>
  <div class="content" align="center">
  <h3><font color="red">この内容でよろしいですか？</font></h3>
  <table align="center" border="1" cellspacing="0" width="600" height=100>
  <tr bgcolor="#8fc27a" height="50"><th colspan="2">登録前地区</br></h3></th></tr>
   <tr height="80"><td align="center">なし</td></tr>
  </table>
  <table align="center" border="1" cellspacing="0" width="600" height=100>
<tr bgcolor="#8fc27a" height="50"><th colspan="2">変更後地区</br></h3></th></tr>
 <tr height="80"><td align="center"><?php echo $dist; ?></td></tr>
</table>
   <form action="Reg_district_comp.php" method="POST">
     <input type="submit" value="変更・登録" name="signup" id="signup" style="WIDTH:70px; HEIGHT:30px;">
   </form>

   <form action="" method="POST">
   <input type="submit" value="変更" name="back" id="back" name="back"  style="WIDTH:70px; HEIGHT:30px;">
  </form>

  </div>
  </body>
<?php } ?>

</html>
