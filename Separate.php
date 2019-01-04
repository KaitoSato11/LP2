<?php
  require_once('config.php');
  session_start();
  if (isset($_SESSION['ID'])) {
     header('Location: ./Main.php');
     exit();
  }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <link rel="stylesheet" href="./css/design_satozaki.css">
  <title>GDSS ゴミ出し支援システム</title>
  <link rel="icon" href="iconG.ico">
  <meta name="description" content="高知県香美市土佐山田町を対象とした、ゴミ出しを支援するサイトです。">
  <!-- <link rel="stylesheet" href="design.css"> -->
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
  <!-- HEADER -->
  <div class="header">
    <p class="title">GDSS</p>
    <p class="wayaku">ゴミ出し支援システム</p>
    <p class="desc">このサイトは、高知県香美市土佐山田町が対象となっています。</p>
  </div>

  <!-- メインコンテンツエリア -->
  <div class="content">
    <!-- ここに各ページの中身いれてください -->

    <!-- 分別ルール 粗大ごみ マイページ遷移 -->
    <div class="Main_Block1">
      <div class="Block1">
        <h3><a href="Normal_rule.php">分別ルールはこちら</h3></a>
      </div>
      <div class="Block2">
        <h3><a href="Special_rule.php">粗大ゴミ情報はこちら</h3></a>
      </div>
      <div class="Block3">
        <h3><a href="Mypage.php">マイページに戻る</h3></a>
      </div>
    </div>

    <!-- 誘導文 -->
    <div class="Main_Block2">
      <div class="Block4">
        <h3>ゴミの名称の頭文字を選んでください</h3>
      </div>
    </div>

    <div class="Main_Block3">
      <h1>一覧</h1>
    </div>

    <!-- 50音表作成 あ段-->
    <div class="Separate_List">
      <?php
        $array1 = array("あ","か","さ","た","な","は","ま","や","ら","わ");
        for ($i=0; $i < 10; $i++) {
      ?>
      <div class="Separate_List_Item1">
        <?php print '<a href="Separate_list.php?head=' . $array1[$i] . '">'; ?>
        <h2>
          <?php echo $array1[$i]; ?>
        </h2>
        </a>
      </div>
      <?php
      }
      ?>
    </div>

    <!-- 50音表作成 い段-->
    <div class="Separate_List">
      <?php
        $array2 = array("い","き","し","ち","に","ひ","み","","り","");
        for ($i=0; $i < 10; $i++) {
      ?>
      <div class="Separate_List_Item2">
          <?php print '<a href="Separate_list.php?head=' . $array2[$i] . '">'; ?>
          <h2>
            <?php echo $array2[$i]; ?>
          </h2>
        </a></div>
      <?php
      }
      ?>
    </div>

    <!-- 50音表作成 う段-->
    <div class="Separate_List">
      <?php
        $array3 = array("う","く","す","つ","ぬ","ふ","む","ゆ","る","");
        for ($i=0; $i < 10; $i++) {
      ?>
      <div class="Separate_List_Item3">
          <?php print '<a href="Separate_list.php?head=' . $array3[$i] . '">'; ?>
          <h2>
            <?php echo $array3[$i]; ?>
          </h2>
        </a></div>
      <?php
      }
      ?>
    </div>

    <!-- 50音表作成 え段-->
    <div class="Separate_List">
      <?php
        $array4 = array("え","け","せ","て","ね","へ","め","","れ","");
        for ($i=0; $i < 10; $i++) {
      ?>
      <div class="Separate_List_Item2">
          <?php print '<a href="Separate_list.php?head=' . $array4[$i] . '">'; ?>
          <h2>
            <?php echo $array4[$i]; ?>
          </h2>
        </a></div>
      <?php
      }
      ?>
    </div>

    <!-- 50音表作成 お段-->
    <div class="Separate_List">
      <?php
        $array5 = array("お","こ","そ","と","の","ほ","も","よ","ろ","を");
        for ($i=0; $i < 10; $i++) {
      ?>
      <div class="Separate_List_Item1">
          <?php print '<a href="Separate_list.php?head=' . $array5[$i] . '">'; ?>
          <h2>
            <?php echo $array5[$i]; ?>
          </h2>
        </a></div>
      <?php
      }
      ?>
    </div>

  </div>
    <!-- PAGE TOPに戻るボタン。ぺージによっては、コメントアウトして消してください -->
    <a class="pagetop" href="#">PAGE TOP</a>

    <!-- FOOTER -->
    <div class="footer">
      <p class="title">GDSS</p>
      <p class="company">L&P</p>
    </div>



</body>

</html>
