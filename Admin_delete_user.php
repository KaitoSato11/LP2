 <!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>GDSS ゴミ出し支援システム</title>
    <link rel="icon" href="iconG.ico">
    <meta name="description" content="高知県香美市土佐山田町を対象とした、ゴミ出しを支援するサイトです。">
    <link rel="stylesheet" href="design.css">
  </head>

  <BODY>
    <!-- HEADER -->
    <div class="header">
      <p class="title">GDSS</p>
      <p class="wayaku">ゴミ出し支援システム</p>
      <p class="desc">このサイトは、高知県香美市土佐山田町が対象となっています。</p>
    </div>

    <!-- メインコンテンツエリア -->
    <div class="content" id="Acontdu">
      <!-- ここに各ページの中身いれてください -->
      <div class="Tcontdu">
        <a class="Mybutton" href="Mypage.php">
          マイページに戻る
        </a>
      </div>

      <?php
      $check=0;
      require_once('config.php');
      session_start();
      if(!isset($_SESSION['ID'])){
        header('Location: ./Main.php');
        exit();
      }
      try{
        $user=DB_USER;
        $password = DB_PASSWORD;
        $dbName = DB_NAME;
        $host = DB_HOST;

        $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
        $db = new PDO($dsn, $user, $password);
        $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $sql = "SELECT * FROM gdss_db.users";
        $stmh = $db ->prepare($sql);
        $stmh -> execute();

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


      if(isset($_POST['result'])){
        $check=1;
      }
      if(isset($_POST['back'])){
        $check = 0;
      }
      ?>

      <?php if($check=="0"){ ?>
        <div class="Mcontdu">
          <table>
            <tr><th class="duTtop" colspan="3">利用者一覧</th></tr>
            <tr>
              <th class="duTitm">削除</th>
              <th class="duTitm">ID</th>
              <th class="duTitm">メールアドレス</th>
            </tr>
            <?php while($row = $stmh->fetch(PDO::FETCH_ASSOC)){ ?>
              <tr>
                <th>
                  <form action="" method="post">
                    <input type="submit" id="result" name="result" value="">
                    <input type="hidden" name="user_id" value="<?=$row['user_id'] ?>">
                    <input type="hidden" name="address" value="<?=$row['address'] ?>">
                  </form>
                </th>
                <td><?=htmlspecialchars($row['user_id'])?></td>
                <td><?=htmlspecialchars($row['address'])?></td>
              </tr>
            <?php } $pdo = null; ?>
          </table>
        </div>
      <?php } ?>

      <?php if($check=="1"){ ?>
        <div class="Mcontdu" id="Mcontduc">
          <table id="ducT">
            <tr><th class="duTtop">利用者削除</th></tr>
            <tr><td>
              <br><b><font color="red">この利用者を削除しますか？</font></br>
              <table id="obuserT" border="1">
                <tr><td>削除する利用者のID</td></tr>
                <tr><td><?php echo $_POST['user_id']; ?></td></tr>
              </table>
              <p>
                <form  action="" method="POST">
                  <input type="hidden" name="address" value="<?php echo $row['address'];?>">
                  <input type="hidden"  name="user_id" value="<?php echo $_POST['user_id']; ?>">
                  <input type="submit" value="削除" name="delete_user">
                </form>
              </p>
              <form action="" method="POST">
                <input type="submit" value="戻る" name="back">
              </form>
            </td></tr>
          </table>
          <br><br>
        </div>
      <?php } ?>

    </div>
    <!-- PAGE TOPに戻るボタンぺーじによっては、コメントアウトして消してください -->
    <a class="pagetop" href="#">PAGE TOP</a>

    <div class="footer">
      <p class="title">GDSS</p>
      <p class="company">L&P</p>
    </div>
  </BODY>
</html>
