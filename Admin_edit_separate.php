<?php
require_once('config.php');
session_start();
date_default_timezone_set('Asia/Tokyo');
if (!isset($_SESSION['ID'])) {
	header('Location: ./Main.php');
	exit();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>GDSS ゴミ出し支援システム</title>
    <link rel="icon" href="iconG.ico">
    <meta name="description" content="高知県香美市土佐山田町を対象とした、ゴミ出しを支援するサイトです。">
    <link rel="stylesheet" href="design.css">
  </head>
  <body>
    <!-- HEADER -->
    <div class="header">
      <p class="title">GDSS</p>
      <p class="wayaku">ゴミ出し支援システム</p>
      <p class="desc">このサイトは、高知県香美市土佐山田町が対象となっています。</p>
    </div>

    <!-- メインコンテンツエリア -->
    <div class="content" id="Acontgs">
      <!-- ここに各ページの中身いれてください -->
			<!-- 画面の判定 -->
			<?php
			$check = 0;
			if (isset($_POST['confirm'])) {
				$check = 1;
			}
			if (isset($_SESSION['SYSTEM_ERROR'])) {
				$check = 2;
				unset($_SESSION['SYSTEM_ERROR']);
			}
			?>

      <!-- データベース接続 -->
      <?php
			if ($check != 2) {
				$user = DB_USER;
	      $password = DB_PASSWORD;
	      $dbName = DB_NAME;
	      $host = DB_HOST;
	      $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
	      try {
	        $pdo = new PDO($dsn, $user, $password);
	        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	      } catch (\Exception $e) {
					$_SESSION["SYSTEM_ERROR"] = 2;
					header('Location: ./Admin_edit_separate.php');
					exit();
	      }
			}
      ?>

			<!-- データの編集 -->
			<?php
			if (isset($_POST["edit"])) {
				$id = $_POST["id"];
	      $name = $_POST["garbage_name"];
				$reading = $_POST["reading"];
	      $type = $_POST["type"];
	      $remarks = $_POST["garbage_remarks"];
				$sql = "UPDATE separate SET garbage_name = \"" . $name . "\", reading = \"" . $reading . "\", type = \"" . $type . "\", garbage_remarks = \"" . $remarks . "\" WHERE garbage_id = \"" . $id . "\"";
	      $stm = $pdo->prepare($sql);
	      $stm->execute();
				header('Location: ./Admin_edit_separate_comp.php');
				exit();
			}
			?>

      <!-- 入力フォーム用のデータを持ってくる -->
      <?php
			if ($check == 0) {
				if (isset($_POST["id"])) {
					$_SESSION["GARBAGE_ID"] = $_POST["id"];
				}
				$id = $_SESSION["GARBAGE_ID"];
				try {
					$sql = "SELECT * FROM separate WHERE garbage_id = \"" . $id . "\"";
		      $stm = $pdo->prepare($sql);
		      $stm->execute();
		      $result = $stm->fetchAll(PDO::FETCH_ASSOC);
		      foreach ($result as $row) {
		        $name = $row["garbage_name"];
						$reading = $row["reading"];
		        $type = $row["type"];
		        $remarks = $row["garbage_remarks"];
		      }
				} catch (\Exception $e) {
					$_SESSION["SYSTEM_ERROR"] = 2;
					header('Location: ./Admin_edit_separate.php');
					exit();
				}
			}
      ?>

      <!-- 入力画面の表示 -->
			<?php
			if ($check == 0) {
				$errorMessage = null;
				if (isset($_SESSION["ERROR"])) {
					$errorMessage = $_SESSION["ERROR"];
					unset($_SESSION["ERROR"]);
				}
				print "
				<div class=\"Tcontgs\">
				<a class=\"glBackB\" href=\"Admin_separate_list.php\">ゴミ分別リストに戻る</a>";
				// print "<br>";
				print "
				<a class=\"Mybutton\" href=\"Mypage.php\">マイページに戻る</a>
				</div>";
				// print "<br>";
				print $errorMessage;
				print "
				<div class=\"Mcontgs\">
				<div class=\"title\">
					<h2>分別追加</h2>
				</div>
				<div class=\"contin\">
	      <form method=\"POST\" action=\"Admin_edit_separate.php\">
	        <input type=\"hidden\" name=\"id\" value=\"" . $id . "\">
	        <p>ゴミ名称</p>
	        <input type=\"text\" name=\"garbage_name\" value=\"" . $name . "\">
					<p>ふりがな</p>
	        <input type=\"text\" name=\"reading\" value=\"" . $reading . "\">
	        <p>分別</p>
	        <input type=\"text\" name=\"type\" value=\"" . $type . "\">
	        <p>分別ルール</p>
	        <input type=\"text\" name=\"garbage_remarks\" value=\"" . $remarks . "\">
	        <br>
	        <input type=\"submit\" name=\"confirm\" value=\"変更\">
	      </form>
				</div>
				<br>
				</div>
				";
			}
			?>

			<!-- 確認画面の表示 -->
			<?php
			if ($check == 1) {
				$errors = null;
				$name = null;
				$reading = null;
				$type = null;
				$remarks = null;
	      $id = $_POST["id"];
	      if ($_POST["garbage_name"] == null) {
	        $errors = "入力箇所に空白があります。";
	      } else {
	        $name = $_POST["garbage_name"];
	        $name = htmlspecialchars($name, ENT_QUOTES, "UTF-8");
	      }
				if ($_POST["reading"] == null) {
	        $errors = "入力箇所に空白があります。";
	      } else {
	        $reading = $_POST["reading"];
	        $reading = htmlspecialchars($reading, ENT_QUOTES, "UTF-8");
	      }
	      if ($_POST["type"] == null) {
	        $errors = "入力箇所に空白があります。";
	      } else {
	        $type = $_POST["type"];
	        $type = htmlspecialchars($type, ENT_QUOTES, "UTF-8");
	      }
	      if ($_POST["garbage_remarks"] == null) {

	      } else {
	        $remarks = $_POST["garbage_remarks"];
	        $remarks = htmlspecialchars($remarks, ENT_QUOTES, "UTF-8");
	      }
	      if ($errors != null) {
					$_SESSION["ERROR"] = $errors;
					header('Location: ./Admin_edit_separate.php');
					exit();
	      } else {
					print "
					<div class=\"Tcontgs\">
					<a class=\"glBackB\" href=\"Admin_edit_separate.php\">入力画面に戻る</a>";
					// print "<br>";
					print "
					<a class=\"Mybutton\" href=\"Mypage.php\">マイページに戻る</a>
					</div>";
	        print "
					<div class=\"Mcontgs\">
					<div class=\"title\">
						<h2>分別追加</h2>
					</div>
					<div class=\"contin\">";
	        print "<p>次の通り変更しますか。</p><br>";
	        print "<p>ゴミ名称</p>";
	        print "<p class=\"elemS\">" . $name . "</p>";
					print "<p>よみがな</p>";
	        print "<p class=\"elemS\">" . $reading . "</p>";
	        print "<p>分別</p>";
	        print "<p class=\"elemS\">" . $type . "</p>";
	        print "<p>分別ルール</p>";
	        print "<p class=\"elemS\">" . $remarks . "</p>";
	        print "
					<form method=\"POST\" action=\"Admin_edit_separate.php\">
	          <input type=\"hidden\" name=\"id\" value=" . $id . ">
	          <input type=\"hidden\" name=\"garbage_name\" value=" . $name . ">
						<input type=\"hidden\" name=\"reading\" value=" . $reading . ">
	          <input type=\"hidden\" name=\"type\" value=" . $type . ">
	          <input type=\"hidden\" name=\"garbage_remarks\" value=" . $remarks . ">
	          <br>
	          <input type=\"submit\" name=\"edit\" value=\"登録\">
	        </form>
					</div>
					<br>
					</div>
					";
	      }
			}
      ?>

			<!-- エラー画面の表示 -->
			<?php
			if ($check == 2) {
				print "データベース接続に失敗しました。作業をやり直してください。";
				print "<br>";
				print "<a href=\"Main.php\">メインページに戻る</a>";
			}
			?>
    </div>

    <!-- FOOTER -->
    <div class="footer">
      <p class="title">GDSS</p>
      <p class="company">L&P</p>
    </div>
  </body>
</html>
