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
    <div class="content" id="Acontgl">
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
					header('Location: ./Admin_separate_list.php');
					exit();
				}
			}
			?>

			<!-- データ削除 -->
			<?php
			if (isset($_POST['delete'])) {
				try {
					$id = $_POST["id"];
					$sql = "DELETE FROM separate WHERE garbage_id = \"" . $id . "\"";
					$stm = $pdo->prepare($sql);
		      $stm->execute();
					header('Location: ./Admin_edit_separate_comp.php');
					exit();
				} catch (\Exception $e) {
					$_SESSION["SYSTEM_ERROR"] = 2;
					header('Location: ./Admin_separate_list.php');
					exit();
				}
			}
			?>

			<!-- 削除確認用のデータをもってくる -->
			<?php
			if ($check == 1) {
				$id = $_POST["id"];
				try {
					$sql = "SELECT * FROM separate WHERE garbage_id = \"" . $id . "\"";
		      $stm = $pdo->prepare($sql);
		      $stm->execute();
		      $result = $stm->fetchAll(PDO::FETCH_ASSOC);
		      foreach ($result as $row) {
		        $name = $row["garbage_name"];
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

			<!-- 削除確認画面 -->
			<?php
			if ($check == 1) {
				print "<a href=\"Admin_separate_list.php\">ゴミ分別リストに戻る</a>";
				print "<br>";
				print "<a href=\"Mypage.php\">マイページに戻る</a>";
				print "<p>分別削除</p>";
				print "<p>次の項目を削除しますか。</p>";
				print "<p>ゴミ名称</p>";
				print "<p>" . $name . "</p>";
				print "<p>分別</p>";
				print "<p>" . $type . "</p>";
				print "<p>分別ルール</p>";
				print "<p>" . $remarks . "</p>";
				print "
	      <form method=\"POST\" action=\"Admin_separate_list.php\">
	        <input type=\"hidden\" name=\"id\" value=\"" . $id . "\">
	        <input type=\"submit\" name=\"delete\" value=\"削除\">
	      </form>
				";
			}
			?>

			<?php
			if ($check == 0) {
				print "
				<div id=\"transition\">
	        <div id=\"insert\">
	          <form method=\"POST\" action=\"Admin_insert_separate.php\">
	            <input type=\"submit\" value=\"追加\">
	          </form>
	        </div>
	        <div id=\"mypage\">
	          <form method=\"POST\" action=\"Mypage.php\">
	            <input type=\"submit\" value=\"マイページに戻る\">
	          </form>
	        </div>
	      </div>
				";
			}
			?>

			<!-- ゴミリスト -->
      <div id="dust_list">
        <?php
				if ($check == 0) {
					print "
	        <table class=\"titleT\">
	        <thead>
	        <tr>
	        <td colspan=\"5\">ゴミ分別</td>
	        <tr>
	        </thead>
	        </table>
	        ";
	        $character_array = ["あ", "い", "う", "え", "お"];
	        for ($i=0; $i < 5; $i++) {
						try {
							$sql = "SELECT * FROM separate WHERE reading LIKE \"" . $character_array[$i] . "%\" ORDER BY reading COLLATE utf8_unicode_ci";
		          $stm = $pdo->prepare($sql);
		          $stm->execute();
		          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
						} catch (\Exception $e) {
							$_SESSION["SYSTEM_ERROR"] = 2;
							header('Location: ./Admin_separate_list.php');
							exit();
						}
	          print "
	          <table class=\"elemT\">
	          <thead>
	          <tr class=\"fifs\">
	          <td colspan=\"5\">" . $character_array[$i]. "</td>
	          </tr>
	          <tr class=\"titem\">
	          <th class=\"tButton\">編集</th>
	          <th class=\"shitem\">名称</th>
	          <th class=\"shitem\">分別</th>
	          <th>分別ルール</th>
	          <th class=\"tButton\">削除</th>
	          </tr>
	          </thead>
	          ";
	          print "<tbody>";
	          foreach ($result as $row) {
	            print "<tr>";
	            print "<form method=\"POST\" action=\"Admin_edit_separate.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" value=\"編集\">" . "</td>";
	            print "</form>";

	            print "<td>" . $row["garbage_name"] . "</td>";
	            print "<td>" . $row["type"] . "</td>";
	            print "<td>" . $row["garbage_remarks"] . "</td>";

	            print "<form method=\"POST\" action=\"Admin_separate_list.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" name=\"confirm\" value=\"削除\">" . "</td>";
	            print "</form>";

	            print "</tr>";
	          }
	          print "</tbody>";
	          print "</table>";
	        }

	        $character_array = ["か", "き", "く", "け", "こ", "さ", "し", "す", "せ", "そ", "た", "ち", "つ", "て", "と"];
	        $character_array_daku = ["が", "ぎ", "ぐ", "げ", "ご", "ざ", "じ", "ず", "ぜ", "ぞ", "だ", "ぢ", "づ", "で", "ど"];
	        for ($i=0; $i < 15; $i++) {
						try {
							$sql = "SELECT * FROM separate WHERE reading LIKE \"" . $character_array[$i] . "%\" OR reading LIKE \"" . $character_array_daku[$i] . "%\" ORDER BY reading COLLATE utf8_unicode_ci";
		          $stm = $pdo->prepare($sql);
		          $stm->execute();
		          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
						} catch (\Exception $e) {
							$_SESSION["SYSTEM_ERROR"] = 2;
							header('Location: ./Admin_separate_list.php');
							exit();
						}
	          print "
	          <table class=\"elemT\">
	          <thead>
	          <tr class=\"fifs\">
	          <td colspan=\"5\">" . $character_array[$i]. "</td>
	          </tr>
	          <tr class=\"titem\">
	          <th class=\"tButton\">編集</th>
	          <th class=\"shitem\">名称</th>
	          <th class=\"shitem\">分別</th>
	          <th>分別ルール</th>
	          <th class=\"tButton\">削除</th>
	          </tr>
	          </thead>
	          ";
	          print "<tbody>";
	          foreach ($result as $row) {
	            print "<tr>";
	            print "<form method=\"POST\" action=\"Admin_edit_separate.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" value=\"編集\">" . "</td>";
	            print "</form>";

	            print "<td>" . $row["garbage_name"] . "</td>";
	            print "<td>" . $row["type"] . "</td>";
	            print "<td>" . $row["garbage_remarks"] . "</td>";

	            print "<form method=\"POST\" action=\"Admin_separate_list.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" name=\"confirm\" value=\"削除\">" . "</td>";
	            print "</form>";

	            print "</tr>";
	          }
	          print "</tbody>";
	          print "</table>";
	        }

					$character_array = ["な", "に", "ぬ", "ね", "の"];
	        for ($i=0; $i < 5; $i++) {
						try {
							$sql = "SELECT * FROM separate WHERE reading LIKE \"" . $character_array[$i] . "%\" ORDER BY reading COLLATE utf8_unicode_ci";
		          $stm = $pdo->prepare($sql);
		          $stm->execute();
		          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
						} catch (\Exception $e) {
							$_SESSION["SYSTEM_ERROR"] = 2;
							header('Location: ./Admin_separate_list.php');
							exit();
						}
	          print "
	          <table class=\"elemT\">
	          <thead>
	          <tr class=\"fifs\">
	          <td colspan=\"5\">" . $character_array[$i]. "</td>
	          </tr>
	          <tr class=\"titem\">
	          <th class=\"tButton\">編集</th>
	          <th class=\"shitem\">名称</th>
	          <th class=\"shitem\">分別</th>
	          <th>分別ルール</th>
	          <th class=\"tButton\">削除</th>
	          </tr>
	          </thead>
	          ";
	          print "<tbody>";
	          foreach ($result as $row) {
	            print "<tr>";
	            print "<form method=\"POST\" action=\"Admin_edit_separate.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" value=\"編集\">" . "</td>";
	            print "</form>";

	            print "<td>" . $row["garbage_name"] . "</td>";
	            print "<td>" . $row["type"] . "</td>";
	            print "<td>" . $row["garbage_remarks"] . "</td>";

	            print "<form method=\"POST\" action=\"Admin_separate_list.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" name=\"confirm\" value=\"削除\">" . "</td>";
	            print "</form>";

	            print "</tr>";
	          }
	          print "</tbody>";
	          print "</table>";
	        }

					$character_array = ["は", "ひ", "ふ", "へ", "ほ"];
	        $character_array_daku = ["ば", "び", "ぶ", "べ", "ぼ"];
					$character_array_handaku = ["ぱ", "ぴ", "ぷ", "ぺ", "ぽ"];
	        for ($i=0; $i < 5; $i++) {
						try {
							$sql = "SELECT * FROM separate WHERE reading LIKE \"" . $character_array[$i] . "%\" OR reading LIKE \"" . $character_array_daku[$i] . "%\" OR reading LIKE \"" . $character_array_handaku[$i] . "%\" ORDER BY reading COLLATE utf8_unicode_ci";
		          $stm = $pdo->prepare($sql);
		          $stm->execute();
		          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
						} catch (\Exception $e) {
							$_SESSION["SYSTEM_ERROR"] = 2;
							header('Location: ./Admin_separate_list.php');
							exit();
						}
	          print "
	          <table class=\"elemT\">
	          <thead>
	          <tr class=\"fifs\">
	          <td colspan=\"5\">" . $character_array[$i]. "</td>
	          </tr>
	          <tr class=\"titem\">
	          <th class=\"tButton\">編集</th>
	          <th class=\"shitem\">名称</th>
	          <th class=\"shitem\">分別</th>
	          <th>分別ルール</th>
	          <th class=\"tButton\">削除</th>
	          </tr>
	          </thead>
	          ";
	          print "<tbody>";
	          foreach ($result as $row) {
	            print "<tr>";
	            print "<form method=\"POST\" action=\"Admin_edit_separate.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" value=\"編集\">" . "</td>";
	            print "</form>";

	            print "<td>" . $row["garbage_name"] . "</td>";
	            print "<td>" . $row["type"] . "</td>";
	            print "<td>" . $row["garbage_remarks"] . "</td>";

	            print "<form method=\"POST\" action=\"Admin_separate_list.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" name=\"confirm\" value=\"削除\">" . "</td>";
	            print "</form>";

	            print "</tr>";
	          }
	          print "</tbody>";
	          print "</table>";
	        }

					$character_array = ["ま", "み", "む", "め", "も"];
	        for ($i=0; $i < 5; $i++) {
						try {
							$sql = "SELECT * FROM separate WHERE reading LIKE \"" . $character_array[$i] . "%\" ORDER BY reading COLLATE utf8_unicode_ci";
		          $stm = $pdo->prepare($sql);
		          $stm->execute();
		          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
						} catch (\Exception $e) {
							$_SESSION["SYSTEM_ERROR"] = 2;
							header('Location: ./Admin_separate_list.php');
							exit();
						}
	          print "
	          <table class=\"elemT\">
	          <thead>
	          <tr class=\"fifs\">
	          <td colspan=\"5\">" . $character_array[$i]. "</td>
	          </tr>
	          <tr class=\"titem\">
	          <th class=\"tButton\">編集</th>
	          <th class=\"shitem\">名称</th>
	          <th class=\"shitem\">分別</th>
	          <th>分別ルール</th>
	          <th class=\"tButton\">削除</th>
	          </tr>
	          </thead>
	          ";
	          print "<tbody>";
	          foreach ($result as $row) {
	            print "<tr>";
	            print "<form method=\"POST\" action=\"Admin_edit_separate.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" value=\"編集\">" . "</td>";
	            print "</form>";

	            print "<td>" . $row["garbage_name"] . "</td>";
	            print "<td>" . $row["type"] . "</td>";
	            print "<td>" . $row["garbage_remarks"] . "</td>";

	            print "<form method=\"POST\" action=\"Admin_separate_list.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" name=\"confirm\" value=\"削除\">" . "</td>";
	            print "</form>";

	            print "</tr>";
	          }
	          print "</tbody>";
	          print "</table>";
	        }

					$character_array = ["や", "ゆ", "よ"];
	        for ($i=0; $i < 3; $i++) {
						try {
							$sql = "SELECT * FROM separate WHERE reading LIKE \"" . $character_array[$i] . "%\" ORDER BY reading COLLATE utf8_unicode_ci";
		          $stm = $pdo->prepare($sql);
		          $stm->execute();
		          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
						} catch (\Exception $e) {
							$_SESSION["SYSTEM_ERROR"] = 2;
							header('Location: ./Admin_separate_list.php');
							exit();
						}
	          print "
	          <table class=\"elemT\">
	          <thead>
	          <tr class=\"fifs\">
	          <td colspan=\"5\">" . $character_array[$i]. "</td>
	          </tr>
	          <tr class=\"titem\">
	          <th class=\"tButton\">編集</th>
	          <th class=\"shitem\">名称</th>
	          <th class=\"shitem\">分別</th>
	          <th>分別ルール</th>
	          <th class=\"tButton\">削除</th>
	          </tr>
	          </thead>
	          ";
	          print "<tbody>";
	          foreach ($result as $row) {
	            print "<tr>";
	            print "<form method=\"POST\" action=\"Admin_edit_separate.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" value=\"編集\">" . "</td>";
	            print "</form>";

	            print "<td>" . $row["garbage_name"] . "</td>";
	            print "<td>" . $row["type"] . "</td>";
	            print "<td>" . $row["garbage_remarks"] . "</td>";

	            print "<form method=\"POST\" action=\"Admin_separate_list.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" name=\"confirm\" value=\"削除\">" . "</td>";
	            print "</form>";

	            print "</tr>";
	          }
	          print "</tbody>";
	          print "</table>";
	        }

					$character_array = ["ら", "り", "る", "れ", "ろ"];
	        for ($i=0; $i < 5; $i++) {
						try {
							$sql = "SELECT * FROM separate WHERE reading LIKE \"" . $character_array[$i] . "%\" ORDER BY reading COLLATE utf8_unicode_ci";
		          $stm = $pdo->prepare($sql);
		          $stm->execute();
		          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
						} catch (\Exception $e) {
							$_SESSION["SYSTEM_ERROR"] = 2;
							header('Location: ./Admin_separate_list.php');
							exit();
						}
	          print "
	          <table class=\"elemT\">
	          <thead>
	          <tr class=\"fifs\">
	          <td colspan=\"5\">" . $character_array[$i]. "</td>
	          </tr>
	          <tr class=\"titem\">
	          <th class=\"tButton\">編集</th>
	          <th class=\"shitem\">名称</th>
	          <th class=\"shitem\">分別</th>
	          <th>分別ルール</th>
	          <th class=\"tButton\">削除</th>
	          </tr>
	          </thead>
	          ";
	          print "<tbody>";
	          foreach ($result as $row) {
	            print "<tr>";
	            print "<form method=\"POST\" action=\"Admin_edit_separate.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" value=\"編集\">" . "</td>";
	            print "</form>";

	            print "<td>" . $row["garbage_name"] . "</td>";
	            print "<td>" . $row["type"] . "</td>";
	            print "<td>" . $row["garbage_remarks"] . "</td>";

	            print "<form method=\"POST\" action=\"Admin_separate_list.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" name=\"confirm\" value=\"削除\">" . "</td>";
	            print "</form>";

	            print "</tr>";
	          }
	          print "</tbody>";
	          print "</table>";
	        }

					$character_array = ["わ"];
	        for ($i=0; $i < 1; $i++) {
						try {
							$sql = "SELECT * FROM separate WHERE reading LIKE \"" . $character_array[$i] . "%\" ORDER BY reading COLLATE utf8_unicode_ci";
		          $stm = $pdo->prepare($sql);
		          $stm->execute();
		          $result = $stm->fetchAll(PDO::FETCH_ASSOC);
						} catch (\Exception $e) {
							$_SESSION["SYSTEM_ERROR"] = 2;
							header('Location: ./Admin_separate_list.php');
							exit();
						}
	          print "
	          <table class=\"elemT\">
	          <thead>
	          <tr class=\"fifs\">
	          <td colspan=\"5\">" . $character_array[$i]. "</td>
	          </tr>
	          <tr class=\"titem\">
	          <th class=\"tButton\">編集</th>
	          <th class=\"shitem\">名称</th>
	          <th class=\"shitem\">分別</th>
	          <th>分別ルール</th>
	          <th class=\"tButton\">削除</th>
	          </tr>
	          </thead>
	          ";
	          print "<tbody>";
	          foreach ($result as $row) {
	            print "<tr>";
	            print "<form method=\"POST\" action=\"Admin_edit_separate.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" value=\"編集\">" . "</td>";
	            print "</form>";

	            print "<td>" . $row["garbage_name"] . "</td>";
	            print "<td>" . $row["type"] . "</td>";
	            print "<td>" . $row["garbage_remarks"] . "</td>";

	            print "<form method=\"POST\" action=\"Admin_separate_list.php\">";
	            print "<input type=\"hidden\" name=\"id\" value=\"" . $row["garbage_id"] . "\">";
	            print "<td>" . "<input type=\"submit\" name=\"confirm\" value=\"削除\">" . "</td>";
	            print "</form>";

	            print "</tr>";
	          }
	          print "</tbody>";
	          print "</table>";
	        }
				}
        ?>
      </div>

			<!-- エラー画面の表示 -->
			<?php
			if ($check == 2) {
				print "データベース接続に失敗しました。作業をやり直してください。";
				print "<br>";
				print "<a href=\"Main.php\">メインページに戻る</a>";
			}
			?>
    </div>

    <!-- PAGE TOPに戻るボタン
    ぺーじによっては、コメントアウトして消してください -->
    <a class="pagetop" href="#">PAGE TOP</a>

    <!-- FOOTER -->
    <div class="footer">
      <p class="title">GDSS</p>
      <p class="company">L&P</p>
    </div>
</body>

