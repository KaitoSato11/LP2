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

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail_address = $_POST['mail_address'];
    if(isset($_POST['remind01'])){
    $remind01 = $_POST['remind01'];
  }
}

try{
if(isset($_POST['signup'])){
  $user=DB_USER;
  $password = DB_PASSWORD;
  $dbName = DB_NAME;
  $host = DB_HOST;

  $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
  $db = new PDO($dsn, $user, $password);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


  $sql = "UPDATE gdss_db.users SET address= \"" .$mail_address. "\", users.remind= \"" .$remind01. "\" WHERE user_id= \"" .$id. "\" ";
    $stmt = $db ->prepare($sql);
    $stmt -> execute();
    header("Location:Mail_comp.php");
    exit();
    }
  } catch(PDOException $Exception){
  die('接続に失敗しました:' .$Exception->getMessage());
}

//----------画面遷移----------

if(isset($_POST['result'])==true){
  if(isset($_POST['remind01'])==false){
    $check=0;
  	$errorMessage .= "どちらかのラジオボタンを押してください";
	}else if((empty($_POST['mail_address'])) && isset($_POST['remind01'])==true && ($_POST['remind01']== "1")){
	$check=0;
	$errorMessage .= "メールアドレスを入力してください";
}else{
  $check=1;
  $errorMessage="";
}
}
	if(isset($_POST['back'])){
    	$check = 0;
	}
?>

<?php if($check == "0"){ ?>
<body>
  <div class="content">
    <table>
      <tr><th>メールリマインド設定</th></tr>
      <td>
        <h2><?php echo $errorMessage; ?></h2><br>
	<p>メールリマインドを受け取りますか?</p>
	<table>
	  <tr><td>メールアドレス</td></tr>
	  <td>
      <form method="POST" action="" >
      <input type="email" size="30" id="mail_adress" name="mail_address" id="mail_address" maxlength="50" placeholder="メールアドレス入力">
      	      </td>
      	    </table>
      	    <input type="radio" id="remind01" name="remind01"  value="1">受け取る
      	      <input type="radio" id="remind01" name="remind01"  value="0">受け取らない
      	      </p>
      	      <p><input type="submit" id="result" name="result"></p>
      	      </form>
      	    </td>
      	  </table>
      	</div>
          </body>
<?php } ?>

<?php if($check == "1"){ ?>
  <body>
      <div class="content">
        <br><h2><?php echo $errorMessage; ?></br></h2>
  	<table>
  	  <tr><td>メールアドレス</td><td><?php echo $_POST['mail_address']; ?></td></tr>
  	  <tr><td>リマインド受け取り可否</td><td><?php if($_POST['remind01']== "1"){ ?>受け取る<?php }else{?> 受け取らない<?php } ?></td></tr>
        </table>
	      
        <form  action="" method="POST">
  	 <input type="hidden" id="mail_address" name="mail_address" size="30" value="<?php echo $_POST['mail_address'];?>">
  	 <input type="hidden" id="remind01" name="remind01" value="<?php echo $remind01; ?>">
         <input type="submit" value="登録" name="signup"  style="WIDTH:70px; HEIGHT:30px;">
  	</form>
	      
  	<form action="" method="POST">
  	 <input type="hidden" id="mail_address" name="mail_address" size="30" value="<?php echo $_POST['mail_address']; ?>">
         <input type="hidden" id="remind01" name="remind01" value="<?php echo $_POST['remind01']; ?>">
         <input type="submit" value="変更" name="back">
        </form>

	<br><h2><b>この内容でよろしいですか？</br></h2>	
        </div>  		  
  </body>
<?php } ?>

<div class="footer">
 <p class="title">GDSS</p>
 <p class="company">L&P</p>
</div>	
</html>
