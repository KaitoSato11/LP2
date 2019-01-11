<!DOCTYPE html>
<html lang="ja">

<!-- HEADER -->
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

<!-- メインコンテンツエリア -->
  <div>
    <!-- ここに各ページの中身いれてください -->
    <div class="Main_Block1">
      <a class="Block5" href="Mypage.php">
        <h3>マイページに戻る</h3>
      </a>
    </div>

<?php
session_start();
require_once('config.php');
$id=$_SESSION['ID'];
$check=0;
$errorMessage="";
$dist=null;

if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['dist1'])==true){
    $dist = 1;
    $dist_name=$_POST['dist1'];
  }else if(isset($_POST['dist2'])==true){
    $dist = 2;
    $dist_name=$_POST['dist2'];
  }else if(isset($_POST['dist3'])==true){
    $dist = 3;
    $dist_name=$_POST['dist3'];
  }else if(isset($_POST['dist4'])==true){
    $dist = 4;
    $dist_name=$_POST['dist4'];
  }else if(isset($_POST['dist5'])==true){
    $dist = 5;
    $dist_name=$_POST['dist5'];
  }else if(isset($_POST['dist6'])){
    $dist = 6;
    $dist_name=$_POST['dist6'];
    }
    if(isset($_POST['dist'])==true){
      $dist = $_POST['dist'];
    }
  }

  try{
  //データベース接続
  $user = DB_USER;
  $password = DB_PASSWORD;
  $dbName = DB_NAME;
  $host = DB_HOST;
  $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
  $db = new PDO($dsn, $user, $password);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sq = "SELECT *FROM gdss_db.users WHERE user_id = \"" .$id. "\" ";
  $stm = $db->prepare($sq);
  $stm->execute();
  $res= $stm->fetchALL(PDO::FETCH_ASSOC);
  $area = null;

//データベースからarea_idを取得
  foreach($res as $row){
    if($row['area_id']==1){
    $area="東1区";
  }else if($row['area_id']==2){
  $area="東2区";
}else if($row['area_id']==3){
$area="東3区";
} else if($row['area_id']==4){
$area="西1区";
}else if($row['area_id']==5){
$area="西2区";
}else if($row['area_id']==6){
$area="西3区";
}
  }

//登録・変更ボタンが押されたときデータベースの値を更新
  if(isset($_POST['signup'])){
  $sql = "UPDATE gdss_db.users SET area_id =\"" .$dist. "\" WHERE user_id= \"" .$id. "\"";
  $stmt = $db->prepare($sql);
  $stmt -> execute();
  header("Location:Reg_district_comp.php");
  exit();
    }
  }catch(PDOException $Exception){
    die('接続に失敗しました:' .$Exception->getMessage());
  }

//画面遷移
if(isset($_POST["dist1"]) || isset($_POST["dist2"]) || isset($_POST["dist3"]) || isset($_POST["dist4"]) || isset($_POST["dist5"]) || isset($_POST["dist6"])){
$check = 1;
}
if(isset($_POST["back"])){
  $check = 0;
}
?>

<?php if($check=="0"){ ?>
  <!-- 登録画面 -->
  <body>
   <div class="content">
    <img src="distmap.jpg">
    <form action="" method="POST">
    <table>
  	<tr>
  	  <th colspan="3">地区登録・変更</th>
  	</tr>
  	<tr>
  	  <td><p><input type="submit" id="dist1" name="dist1" value="東1区"></p></td>
  	  <td><p><input type="submit" id="dist2" name="dist2" value="東2区"></p></td>
  	  <td><p><input type="submit" id="dist3" name="dist3" value="東3区"></p></td>
  	</tr>
          
  	<tr>
  	  <td><p><input type="submit" id="dist4" name="dist4" value="西1区"></p></td>
  	  <td><p><input type="submit" id="dist5" name="dist5" value="西2区"></p></td>
  	  <td><p><input type="submit" id="dist6" name="dist6" value="西3区"></p></td>
    </tr>
  	 </table>
     </form>
   </div>
</body>
<?php } ?>

<?php if($check=="1"){ ?>
  <body>
  <div class="content">
  <table>
    <tr><th><h3>地区登録・変更</h3></th></tr>
    <tr><td>
  <h3>地区を新たに変更・登録しますか。</h3>
  <table>
  <tr><th colspan="2">登録前地区</th></tr>
   <tr><td><?php if($area!=null)echo $area;else print "なし"; ?></td></tr>
  </table>
  <table>
<tr><th colspan="2">変更後地区</th></tr>
 <tr><td><?php echo $dist_name; ?></td></tr>
</table>
   <form action="" method="POST">
     <input type="hidden" id="dist" name="dist" value="<?php echo $dist; ?>">
     <input type="submit" value="変更・登録" name="signup" id="signup">
   </form>

   <form action="" method="POST">
   <input type="submit" value="変更" name="back" id="back" name="back">
  </form>
</td></tr>
</table>
  </div>
  </body>
<?php } ?>
    
<div class="footer">
 <p class="title">GDSS</p>
 <p class="company">L&P</p>
</div>
    
</html>
