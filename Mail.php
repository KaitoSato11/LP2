<!DOCTYPE HTML>
<html lang="ja">
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
require_once('config.php');
session_start();
$check=0;
$errorMessage="";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail_address = $_POST['mail_address'];
    $remind01 = $_POST['remind01'];
}

//----------データベースへ追加----------
(isset($_POST['regist'])){
  $db_name = "mysql:dbname=gdss_db;host-localhost";
  $db_username = "root";
  $db_password = "";
  try {
        $db = new PDO($db_name, $db_username, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $db->prepare( "INSERT INTO users(address, remind) VALUES (:address, :remind )");
        $stmt->bindParam(":address", $mail_address, PDO::PARAM_STR);
        $stmt->bindValues(":remind", $remind01, PDO::PARAM_INT);
        $stmt->execute();
        header('Location: ./Create_user_comp.php');
        exit();
      }
}

//----------画面遷移----------
//
if($_POST['result']){
	if(empty($_POST['mail_adress']) && ($remind01!=NULL) && ($remind01== "1")){
	$check=0;
	$errorMessage .= "メールアドレスを入力してください";
} else if($remind01==NULL){
$check=0;
$errorMessage .= "どちらかのラジオボタンを押してください";
}else{
  $check=1;
  $errorMessage="";
}
}

	if(isset($_POST['back'])){
    	$check = 0;
	}

?>

<?php if($check=="0"){ ?>
  <body>
    <h2><?php echo $errorMessage; ?></h2><br>
    <div class="content">
      <table width="800" height="400" border="1" cellspacing="0" align="center">
        <tr height="50" bgcolor="#8fc27a">
  	<th><h3>メールリマインド設定</h3></th>
        </tr>
        <td align="center" valign="middle" bgcolor="#fff8e0">
  	<p>メールリマインドを受け取りますか?</p>
  	<table width="280" height="100" border="1" bgcolor="#ffffff" cellspacing="0">
  	  <tr height="50">
  	    <td align="center" valign="middle" bgcolor="#8fc27a">
  	      メールアドレス
  	    </td>
  	  </tr>
  	  <td align="center" valign="middle">
        <form method="POST" action="">
        <input type="email" size="30" id="mail_address" name="mail_address"  maxlength="50" placeholder="メールアドレス入力">
        	      </td>
        	    </table>
        	    <input type="radio" id="remind01" name="remind01"  value="1">受け取る
        	      <input type="radio" id="remind01" name="remind01"  value="0" >受け取らない
        	      </p>
        	      <p><input type="submit" name="result" id="result" style="background-color:#8fc27a" value="変更・登録"></p>
        	      </form>
        	    </td>
        	  </table>
        	</div>
            </body>
<?php } ?>


<?php if($check=="1"){ ?>
  <body>
  <div class="content" align="center">
    <table  border="1" cellspacing="0" width="600" height=100>
 <tr bgcolor="#8fc27a" height="50"><th colspan="2"><br><h3><b>地区を新たに変更・登録しますか？</br></h3></th></tr>
   <tr height="80"><td width="200" align="center"><?php if($remind01=="1"){?> 受け取る<?php }?> <?php if($remind01=="0"){?> 受け取らない<?php }?></td>
     <td><?php if(isset($_POST['mail_adress'])){echo $mail_address;} ?></td></tr>
 </table>
   <form action="Mail_comp.php" method="POST">
     <input type="submit" value="変更・登録" name="regist" id="regist" style="WIDTH:70px; HEIGHT:30px;">
   </form>

   <form action="" method="POST">
   <input type="submit" value="変更" name="back" id="back"  style="WIDTH:70px; HEIGHT:30px;">
 </form>


 </div>
</body>
<?php } ?>


          <a class="pagetop" href="#">PAGE TOP</a>
          <div class="footer">
          		<p class="title">GDSS</p>
          		<p class="company">L&P</p>
              </html>
