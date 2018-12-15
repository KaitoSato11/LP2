
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../GDSS/css/test2.css">
  <title>分別一覧画画面</title>
</head>

<body>

<div class="bb1">
  <div class="b1">
    <h4>分別ルールはこちら</h4>
  </div>
  <div class="b2">
    <h4>粗大ゴミ情報はこちら</h4>
  </div>
  <div class="b3">
    <h4>マイページに戻る</h4>
  </div>
</div>

<div class="bb2">
<h3>ゴミの名称の頭文字を選んでください</h3>
</div>

<div class="bb3">
<h1>一覧</h1>
</div>

<!-- 50音配列ver -->
<div class="list_a">
  <?php
$array1 = array("あ","か","さ","た","な","は","ま","や","ら","わ");
  for ($i=0; $i < 10; $i++) {
    ?>
  <div class="list_item"><a href="Separate_list.php"><h2>
    <?php echo $array1[$i]; ?></h2>
  </a></div>
  <?php } ?>
</div>

<div class="list_a">
  <?php
$array2 = array("い","き","し","ち","に","ひ","み","","り","");
  for ($i=0; $i < 10; $i++) {
    ?>
  <div class="list_item_2"><a href="Separate_list.php"><h2>
    <?php echo $array2[$i]; ?></h2>
  </a></div>
  <?php } ?>
</div>

<div class="list_a">
  <?php
$array3 = array("う","く","す","つ","ぬ","ふ","む","ゆ","る","");
  for ($i=0; $i < 10; $i++) {
    ?>
  <div class="list_item_3"><a href="Separate_list.php"><h2>
    <?php echo $array3[$i]; ?></h2>
  </a></div>
  <?php } ?>
</div>

<div class="list_a">
  <?php
$array4 = array("え","け","せ","て","ね","へ","め","","れ","");
  for ($i=0; $i < 10; $i++) {
    ?>
  <div class="list_item_2"><a href="Separate_list.php"><h2>
    <?php echo $array4[$i]; ?></h2>
  </a></div>
  <?php } ?>
</div>

<div class="list_a">
  <?php
$array5 = array("お","こ","そ","と","の","ほ","も","よ","ろ","ん");
  for ($i=0; $i < 10; $i++) {
    ?>
  <div class="list_item"><a href="Separate_list.php"><h2>
    <?php echo $array5[$i]; ?></h2>
  </a></div>
  <?php } ?>
</div>


<!-- 50音直打ちver -->
<!-- <div class="list_a">
<div id="list_item"><a href="Separate_list.php"><h2>あ</h2></a></div>
<div id="list_item"><a href="Separate_list.php"><h2>か</h2></a></div>
<div id="list_item"><a href="Separate_list.php"><h2>さ</h2></a></div>
<div id="list_item"><a href="Separate_list.php"><h2>た</h2></a></div>
<div id="list_item"><a href="Separate_list.php"><h2>な</h2></a></div>
<div id="list_item"><a href="Separate_list.php"><h2>は</h2></a></div>
<div id="list_item"><a href="Separate_list.php"><h2>ま</h2></a></div>
<div id="list_item"><a href="Separate_list.php"><h2>や</h2></a></div>
<div id="list_item"><a href="Separate_list.php"><h2>ら</h2></a></div>
<div id="list_item"><a href="Separate_list.php"><h2>わ</h2></a></div>
</div>

<div class="list_a">
  <div class="list_item_2"><a href="Separate_list.php"><h2>い</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>き</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>し</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>ち</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>に</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>ひ</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>み</h2></a></div>
  <div class="list_item_2"></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>り</h2></a></div>
  <div class="list_item_2"></div>
</div>
<div class="list_a">
<div class="list_item_3"><a href="Separate_list.php"><h2>う</h2></a></div>
<div class="list_item_3"><a href="Separate_list.php"><h2>く</h2></a></div>
<div class="list_item_3"><a href="Separate_list.php"><h2>す</h2></a></div>
<div class="list_item_3"><a href="Separate_list.php"><h2>つ</h2></a></div>
<div class="list_item_3"><a href="Separate_list.php"><h2>ぬ</h2></a></div>
<div class="list_item_3"><a href="Separate_list.php"><h2>ふ</h2></a></div>
<div class="list_item_3"><a href="Separate_list.php"><h2>む</h2></a></div>
<div class="list_item_3"><a href="Separate_list.php"><h2>め</h2></a></div>
<div class="list_item_3"><a href="Separate_list.php"><h2>る</h2></a></div>
<div class="list_item_3"></div>
</div>
<div class="list_a">
  <div class="list_item_2"><a href="Separate_list.php"><h2>え</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>け</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>せ</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>て</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>ね</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>へ</h2></a></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>め</h2></a></div>
  <div class="list_item_2"></div>
  <div class="list_item_2"><a href="Separate_list.php"><h2>れ</h2></a></div>
  <div class="list_item_2"></div>
</div>
<div class="list_a">
<div class="list_item"><a href="Separate_list.php"><h2>お</h2></a></div>
<div class="list_item"><a href="Separate_list.php"><h2>こ</h2></a></div>
<div class="list_item"><a href="Separate_list.php"><h2>そ</h2></a></div>
<div class="list_item"><a href="Separate_list.php"><h2>の</h2></a></div>
<div class="list_item"><a href="Separate_list.php"><h2>と</h2></a></div>
<div class="list_item"><a href="Separate_list.php"><h2>ほ</h2></a></div>
<div class="list_item"><a href="Separate_list.php"><h2>も</h2></a></div>
<div class="list_item"><a href="Separate_list.php"><h2>よ</h2></a></div>
<div class="list_item"><a href="Separate_list.php"><h2>ろ</h2></a></div>
<div class="list_item"><a href="Separate_list.php"><h2>を</h2></a></div>
</div> -->

</body>

</html>
