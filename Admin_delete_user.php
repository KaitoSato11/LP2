<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
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
$check=0;
require_once('config.php');
session_start();
if(isset($_SESSION['ID'])){
header('Location: ./Main.php');
exit();
}
try{
  //データベース接続
  $db_name = "mysql:db_name=gdss_db;host=localhost";
  $db_username = "root";
  $db_password = "";
  $db = new PDO($db_name, $db_username, $db_password);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

  $sql = "SELECT * FROM gdss_db.users";
  $stmh = $db ->prepare($sql);
  $stmh -> execute();

  //利用者削除
  if(isset($_POST['delete_user'])){
    $stmt=$db->prepare("DELETE FROM gdss_db.users WHERE user_id=?");
    if($stmt){
      $stmt->bindparam(1, $user_id,PDO::PARAM_STR);
      $user_id=$_POST['user_id'];
      $stmt->execute();
　　　header('Location:Admin_delete_user_comp.php');
      exit();	    
    }
  }
}catch(PDOException $Exception){
  die('接続に失敗しました:' .$Exception->getMessage());
}

//画面遷移
if(isset($_POST['result'])){
  $check=1;
	}
	if(isset($_POST['back'])){
  $check = 0;
	}


?>

//利用者一覧
  <?php if($check=="0"){ ?>
    <body>
    <div class="content">
    <table border="1" align="center" cellspacing="0" width="720">
    <tr bgcolor="#8fc27a" height="40"><th colspan="3">利用者一覧</th></tr>
    <tr bgcolor="#deeed8" height="30"><th>削除</th><th>ID</th><th>メールアドレス</th></tr>
    <?php while($row = $stmh->fetch(PDO::FETCH_ASSOC)){ ?>
    <tr bgcolor="#ebf1eb" height="40">
    <th width="60">
      <form action="" method="post">
      <input type="submit" id="result" name="result" style="background-color:red; width:40px;height:20px" value="">
      <input type="hidden" name="user_id" value="<?=$row['user_id'] ?>">
      <input type="hidden" name="address" value="<?=$row['address'] ?>">
    </form>
    </th>
    <td width="360"><?=htmlspecialchars($row['user_id'])?></td>
    <td width="300"><?=htmlspecialchars($row['address'])?></td>
    </tr>
    <?php } $pdo = null; ?>
    </table>
    </div>
    </body>
  <?php } ?>

//削除確認画面
  <?php if($check=="1"){ ?>
    <body>
      <div align="center">
        <div class="content">
          <table width="1024">
            <td height="60" width="1024" bgcolor="#8fc27a"><h2>利用者削除</h2></td>
            <tr align="center" valign="middle"><td>
      <br><h3><b><font color="red">この利用者を削除しますか？</font></br></h3>
      <table border="1" cellspacing="0" width="300">
        <tr height="40" bgcolor="#8fc27a"><td>削除する利用者のID</td></tr>
        <tr height="40"><td><?php echo $_POST['user_id']; ?></td></tr>
      </table>
      <p style="margin:30px">
              <form  action="" method="POST">
                <input type="hidden" name="address" value="<?php echo $row['address'];?>">
                <input type="hidden"  name="user_id" value="<?php echo $_POST['user_id']; ?>">
                <input type="submit" value="削除" name="delete_user" style="color:white; background-color:red; WIDTH:160px; HEIGHT:50px;">
              </form>
              </p>
          <form action="" method="POST">
          <input type="submit" value="戻る" name="back"  style="color:white; background-color:#3c78d8; WIDTH:160px; HEIGHT:50px;">
          </form>
        </td></tr>
        </table>
            </div>
          </div>
    </body>
  <?php } ?>


  <div class="footer">
  		<p class="title">GDSS</p>
  		<p class="company">L&P</p>

  </html>
