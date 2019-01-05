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
session_start();
$check=0;
$errorMessage="";



if(isset($_POST['signup'])){
$db_name = "mysql:db_name=gdss_db;host=localhost";
$db_username = "root";
$db_password = "";
$db = new PDO($db_name, $db_username, $db_password);
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $db -> perepare("INSERT INTO users(address, remind) VALUES (:mail_address, :remind)");
$stmt -> bindParam(":mail_address", $mail_address, PDO::PARAM_STR);
$stmt -> bindValue(":remind", $remind01, PDO::PARAM_INT);
$stmt -> execute();
header("Location:Mail_comp.php");
exit();
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail_address = $_POST['mail_address'];
    $remind01 = $_POST['remind01'];
}

//----------画面遷移----------
if(isset($_POST['result'])){
  if($_POST['remind01']=="null"){
    $check=0;
  	$errorMessage .= "受け取り可否を決めてください";
	}else if((empty($_POST['mail_address'])) && ($_POST['remind01']) && ($_POST['remind01']== "1")){
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
  <h3><?php echo $errorMessage; ?></h3><br>
  <div class="content">
    <table width="1024" height="400"  cellspacing="0" align="center">
      <tr width="1024" height="50" bgcolor="#8fc27a">
	<th>メールリマインド設定</th>
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
      <form method="POST" action="" >
      <input type="email" size="30" id="mail_adress" name="mail_address" id="mail_address" maxlength="50" placeholder="メールアドレス入力">
      	      </td>
      	    </table>
      	    <input type="radio" id="remind01" name="remind01"  value="1">受け取る
      	      <input type="radio" id="remind01" name="remind01"  value="0">受け取らない
      	      </p>
      	      <p><input type="submit" id="result" name="result" style="background-color:#8fc27a" value="変更・登録"></p>
      	      </form>
      	    </td>
      	  </table>
      	</div>
          </body>
<?php } ?>


<?php if($check == "1"){ ?>
  <body>
    <div align="center">
      <div class="content">
        <form id="check_address" name="check_address" action="" method="POST">
  	<table>
  	  <tr><td>メールアドレス</td><td><?php echo $_POST['mail_address']; ?></td></tr>
  	  <tr><td>リマインド受け取り可否</td><td><?php if($_POST['remind01']== "1"){ ?>受け取る<?php }else{?> 受け取らない<?php } ?></td></tr>
            </table>

  	<input type="hidden" id="mail_address" name="mail_address" size="30" value="<?php echo $_POST['mail_address'];?>">
  	  <input type="hidden" id="remind01" name="remind01" value="<?php echo $_POST['remind01']; ?>">
              <input type="submit" value="登録" name="signup"  style="WIDTH:70px; HEIGHT:30px;">
  	    </form>

  	    <form action="" method="POST">
  	      <input type="hidden" id="mail_address" name="mail_address" size="30" value="<?php echo $_POST['mail_address']; ?>">
  		<input type="hidden" id="remind01" name="remind01" value="<?php echo $_POST['remind01']; ?>">
  		  <input type="submit" value="変更" name="back"  style="WIDTH:70px; HEIGHT:30px;">
  		  </form>

  		  <br><h2><b>この内容でよろしいですか？</br></h2>
  		    <br><h2><?php echo $errorMessage; ?></br></h2>
  		    </div>
  		  </div>
  </body>

<?php } ?>

<a class="pagetop" href="#">PAGE TOP</a>
<div class="footer">
		<p class="title">GDSS</p>
		<p class="company">L&P</p>
</html>
