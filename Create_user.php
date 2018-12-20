<?php
session_start();
//$check 0：登録画面 1：確認画面
$check = 0;
//エラーメッセージの初期化
 $errorMessage ="";
//特殊文字のキャンセルする関数h
function h($s){
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
}
//POST通信が行われたときに定義する
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $userid = $_POST['userid'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
}

//～～～～～～～データベース追加の部分～～～～～～～～
//「登録」を押したとき
if(isset($_POST['signup'])){
    $db_name = "mysql:dbname=gdss_db;host-localhost";
    $db_username = "root";
    $db_password = "";
    try {
        $db = new PDO($db_name, $db_username, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
        //学籍番号の重複確認
        $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE user_id = :id");
        $stmt->bindValue(":id", $userid, PDO::PARAM_INT);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if($count > 0){
            $errorMessage = "このユーザIDはすでに登録されています";
            $chekc = 0; //登録画面にする
        }else{
            //データベースに入力情報を追加
            $stmt = $db->prepare( "INSERT INTO users(user_id, password) VALUES (:id, :pass )");
            $stmt->bindValue(":id", $userid, PDO::PARAM_INT);
            $stmt->bindParam(":pass", $pass, PDO::PARAM_STR);
            $stmt->execute();
            header('Location: ./Create_user_comp.php');
            exit();
        }
    } catch(PDOException $e){
        echo $e->getMessage();
        exit();
    }
}
//～～～～～～～画面遷移関連～～～～～～～～～
//「次へ」を押したとき確認画面に移動
if(isset($_POST["add_user"])) {
    $check = 1; 
    
    if(!empty($_POST['pass']) && !empty($_POST['nextpass']) && $_POST['pass'] != $_POST['nextpass']) {
        $check = 0;//同じ入力ではない時
        $errorMessage .= "確認用パスワードが違います<br>";
    }
    //ユーザIDは半角英数字8文字にしてください
    if(!empty($_POST['userid']) && strlen($_POST['userid']) != 8 && !preg_match("/^[a-zA-Z0-9]+$/", $_POST['userid'])) {
        $errorMessage .= "ユーザIDは半角英数字8文字にしてください<br>";
        $check = 0; //登録画面にする
    }
 
    //全て空のときかつエラーメッセージが空じゃなければエラー文を付ける
    if(empty($_POST['userid']) || empty($_POST['pass']) || empty($_POST['nextpass'])){
        $errorMessage .= "全てを入力してください";
        $check = 0; //登録画面にする
    }
}
//「変更する」を押したとき入力画面に戻る
if(isset($_POST["back"])){
    $check = 0;
}
?>
<!doctype html>
<html>
    <!--　～～～～～～～～～～～～～～～～利用者登録画面の表示～～～～～～～～～～～～～～～～～ -->
    <?php
    if($check == 0 ) {
    ?>
    <head>
    <title>新規登録</title>
		<meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
    </head>
    <body>
        <!--規定画面-->
        <p id="back_main"><input type="button" onClick="location.href='./Main.php'" value="メイン画面に戻る" style="WIDTH:150px; HEIGHT:30px"></p>
        <center><h1>新規登録</h1></center>
        <div align="center">
            <h2><?php echo $errorMessage; ?></h2><br>
            <div class="box_gray">
                <br>
                <form action="" method="POST">
                    <table>
                        <tr><td>ユーザID</td><td><input type="text" name="userid" size="15" placeholder="半角英数字8文字" value="<?php if(!empty($_POST['userid'])){echo h($_POST['userid']);} ?>"></td>
                        <tr><td>パスワード</td><td colspan="3"><input type="password" name="pass" placeholder="パスワード" value="<?php if(!empty($_POST['pass'])){echo h($_POST['pass']);}  ?>" size="51"></td></tr>
                        <tr><td>確認用パスワード</td><td colspan="3"><input type="password" name="nextpass" placeholder="もう一度" value="<?php if(!empty($_POST['nextpass'])){echo h($_POST['nextpass']);}  ?>" size="51"></td></tr>
                    </table>
                    <br><input type="submit" value="登録" id="add_user" name="add_user" style="WIDTH:150px; HEIGHT:30px">
                </form>
                <br>
            </div>
        </div>
    </body>
    <?php 
    }
    ?>

    <!--　～～～～～～～～～～～～～～～登録確認画面の表示～～～～～～～～～～～～～～～～～　-->
    <?php 
    if($check == 1) {
    ?>
    <head>
    <title>新規登録確認画面</title>
		<meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/main.css" type="text/css">
    </head>
    <body>
        <!--規定画面-->
        <p id="back_main"><input type="button" onClick="location.href='./Main.php'" value="メイン画面に戻る" style="WIDTH:150px; HEIGHT:30px"></p>
            <div align="center">
                <br><h2><b>この内容でよろしいですか？</b></h2>
                <br><h2><?php echo $errorMessage; ?></h2>
                <div class="box_gray">
                    <h2>新規登録内容</h2>
                    <br>
                    <form id="check_user" name="check_user" action="" method="POST">
                    <!--登録を押したとき-->
                        <table>
                            <tr><td>ユーザID</td><td><?php echo $_POST['userid']; ?></td>
			    <tr><td>パスワード</td><td colspan="3">表示されません</td></tr>
                        </table>
			
                        <!--次の場所に伝えるための情報-->
                        <input type="hidden" id="userid" name="userid" size="15" value= "<?php echo $_POST['userid']; ?>"> 
                        <input type="hidden" name="pass" value="<?php if(!empty($_POST['pass'])){echo h($_POST['pass']);}  ?>">
                        <input type="hidden" name="nextpass" value="<?php if(!empty($_POST['nextpass'])){echo h($_POST['nextpass']);}  ?>">
                        <input type="submit" value="登録" name="signup"  style="WIDTH:70px; HEIGHT:30px;"> 
                    </form>
                    <!--変更するを押したとき-->
                    <form action="" method="POST">
                        <!--次の場所に伝えるための情報-->
                        <input type="hidden" id="userid" name="userid" size="15" value= "<?php echo $_POST['userid']; ?>">
                        <input type="hidden" name="pass" value="<?php echo $_POST['pass']; ?>">
                        <input type="hidden" name="nextpass" value="<?php echo $_POST['nextpass']; ?>">
                        <input type="submit" id="back" name="back" value="変更する" style="WIDTH:70px; HEIGHT:30px">
                    </form>
                    <br>
                </div>
            </div>
    </body>
    <?php
    }
    ?>
</html>