<!--
ユーザのIDがセッション変数の$_SESSION["ID"]に入っているとしています。
-->
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
    <div class="content" id="contmy">
      <!-- ここに各ページの中身いれてください -->
			<!-- ログアウト判定 -->
			<?php
			if (isset($_POST["LOGOUT"])) {
				$_SESSION = array();
				session_destroy();
				header('Location: ./Main.php');
				exit();
			}
			?>
      <!-- サイドメニュー -->
      <div id="side">
        <div id="user">
          <ul>
            <li class="top">ユーザー</li>
            <?php
            $id = $_SESSION["ID"];
            print "<li>ようこそ" . $id . "さん</li>";
            ?>
            <form method="POST" action="Mypage.php">
							<input type="hidden" name="LOGOUT" value="1">
              <li><input type="submit" value="ログアウト"></li>
            </form>
          </ul>
        </div>
        <?php
        if ($id == "admin001") {
          print "
          <div id=\"menu\">
            <ul>
              <li class=\"top\">メニュー</li>
              <li><a href=\"Admin_separate_list.php\">ゴミ分別リスト編集</a></li>
              <li><a href=\"Admin_list_cal.php\">ゴミ分別カレンダー編集</a></li>
              <li><a href=\"Admin_delete_user.php\">利用者管理</a></li>
            </ul>
          </div>
      </div>
          ";
        } else {
          print "
          <div id=\"menu\">
            <ul>
              <li class=\"top\">メニュー</li>
              <li><a href=\"Separate.php\">ゴミ分別リスト</a></li>
              <li><a href=\"Normal_rule.php\">ゴミ分別ルール</a></li>
              <li><a href=\"Special_rule.php\">粗大・特別ゴミルール</a></li>
              <li><a href=\"Reg_district.php\">ゴミ捨て地区登録</a></li>
              <li><a href=\"Mail.php\">リマインド設定</a></li>
              <li><a href=\"Delete_user.php\">ユーザ削除</a></li>
            </ul>
          </div>
      </div>
          ";

          // リマインドとカレンダーをside2でまとめる
          print "
          <div id=\"side2\">
          ";
          print "
            <div id=\"remind\">
          ";
              $user = DB_USER;
              $password = DB_PASSWORD;
              $dbName = DB_NAME;
              $host = DB_HOST;
              $dsn = "mysql:host={$host};dbname={$dbName};charset=utf8";
              try {
                $pdo = new PDO($dsn, $user, $password);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM users a, week b WHERE a.user_id = \"" . $id . "\"AND a.area_id = b.area_id";
                $stm = $pdo->prepare($sql);
                $stm->execute();
                $result = $stm->fetchAll(PDO::FETCH_ASSOC);

                $burn = null;
                $metal = null;
                $bottle = null;
                $nonburn = null;
                $pet = null;
                $plastic = null;
                $paper = null;
                $cloth = null;

                foreach ($result as $row){
                  $burn = $row['burn'];
                  $metal = $row['metal'];
                  $bottle = $row['bottle'];
                  $nonburn = $row['nonburn'];
                  $pet = $row['pet'];
                  $plastic = $row['plastic'];
                  $paper = $row['paper'];
                  $cloth = $row['cloth'];
                }

                $tommorow_youbi = (date("w") + 1) % 7;
                $the = floor(date("j") / 7) + 1;

                $youbi_array = ["日", "月", "火", "水", "木", "金", "土"];

                switch ($the) {
                  case 1:
                    $the_bit = 0b1000;
                    break;
                  case 2:
                    $the_bit = 0b0100;
                    break;
                  case 3:
                    $the_bit = 0b0010;
                    break;
                  case 4:
                    $the_bit = 0b0001;
                    break;
                  case 5:
                    $the_bit = 0b0;
                    break;
                }

                $a = 0;
                switch ($tommorow_youbi) {
                  case 0:
                    $tommorow_bit = $the_bit << 24;
                    $a = 24;
                    break;
                  case 1:
                    $tommorow_bit = $the_bit << 20;
                    $a = 20;
                    break;
                  case 2:
                    $tommorow_bit = $the_bit << 16;
                    $a = 16;
                    break;
                  case 3:
                    $tommorow_bit = $the_bit << 12;
                    $a = 12;
                    break;
                  case 4:
                    $tommorow_bit = $the_bit << 8;
                    $a = 8;
                    break;
                  case 5:
                    $tommorow_bit = $the_bit << 4;
                    $a = 4;
                    break;
                  case 6:
                    $tommorow_bit = $the_bit;
                    $a = 0;
                    break;
                }

                $tommorow_burn = null;
                $tommorow_metal = null;
                $tommorow_bottle = null;
                $tommorow_nonburn = null;
                $tommorow_pet = null;
                $tommorow_plastic = null;
                $tommorow_paper = null;
                $tommorow_cloth = null;

                if (decbin($burn & $tommorow_bit) != 0) {
                  $tommorow_burn = "[燃えるゴミ]";
                }
                if (decbin($metal & $tommorow_bit) != 0) {
                  $tommorow_metal = "[金属類]";
                }
                if (decbin($bottle & $tommorow_bit) != 0) {
                  $tommorow_bottle = "[ビン類]";
                }
                if (decbin($nonburn & $tommorow_bit) != 0) {
                  $tommorow_nonburn = "[不燃物]";
                }
                if (decbin($pet & $tommorow_bit) != 0) {
                  $tommorow_pet = "[ペットボトル]";
                }
                if (decbin($plastic & $tommorow_bit) != 0) {
                  $tommorow_plastic = "[プラスチック]";
                }
                if (decbin($paper & $tommorow_bit) != 0) {
                  $tommorow_paper = "[紙類]";
                }
                if (decbin($pet & $tommorow_bit) != 0) {
                  $tommorow_cloth = "[衣類]";
                }

                if ($the_bit == 0b0) {
                  //print $burn >> $a;
									$b = 0b1111 << $a;
                  if (($burn & $b) >> $a == 15) {
                    $tommorow_burn = "[燃えるゴミ]";
                  }
                  if (($metal & $b) >> $a == 15) {
                    $tommorow_metal = "[金属類]";
                  }
                  if (($bottle & $b) >> $a == 15) {
                    $tommorow_bottle = "[ビン類]";
                  }
                  if (($nonburn & $b) >> $a == 15) {
                    //$tommorow_nonburn = "[その他の不燃物]";
										$tommorow_nonburn = "[不燃物]";
                  }
                  if (($pet & $b) >> $a == 15) {
                    //$tommorow_pet = "[ペットボトル]";
										$tommorow_pet = "[ペットボトル]";
                  }
                  if (($plastic & $b) >> $a == 15) {
                    //$tommorow_plastic = "[容器包装プラスチック]";
										$tommorow_plastic = "[プラスチック]";
                  }
                  if (($paper & $b) >> $a == 15) {
                    $tommorow_paper = "[紙類]";
                  }
                  if (($cloth & $b) >> $a == 15) {
                    $tommorow_cloth = "[衣類]";
                  }
                }

                $tommorow_dust = $tommorow_burn . $tommorow_metal . $tommorow_bottle . $tommorow_nonburn . $tommorow_pet . $tommorow_plastic . $tommorow_paper . $tommorow_cloth;

                $pdo = NULL;
              } catch (\Exception $e) {
                echo "システムエラーがありました";
                echo $e->getMessage();
                exit();
              }
              $a = (date("w") + 1) % 7;
              $tommorow = date("n月d日(" . $youbi_array[$a] . ")", mktime(0, 0, 0, date("n"), date("j") + 1, date("Y")));
              if ($tommorow_dust == null) {
                print "<h1>明日は" . $tommorow . "です</h1>";
              } else {
                print "<h1>明日は" . $tommorow . $tommorow_dust . "の日です</h1>";
              }
            print "
            </div>
            ";

            //calender1
            print "
            <div id=\"cal1\">
            ";
              // 現在の年月を取得
              $year = date('Y');
              $month = date('n');
              // 月末日を取得
              $last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));

              $calendar = array();
              $j = 0;
              // 月末日までループ
              for ($i = 1; $i < $last_day + 1; $i++) {
                  // 曜日を取得
                  $week = date('w', mktime(0, 0, 0, $month, $i, $year));

                  // 1日の場合
                  if ($i == 1) {
                      // 1日目の曜日までをループ
                      for ($s = 1; $s <= $week; $s++) {
                          // 前半に空文字をセット
                          $calendar[$j]['day'] = '';
                          $j++;
                      }
                  }

                  // 配列に日付をセット
                  $calendar[$j]['day'] = $i;

                  $today_youbi = $week;
                  $today_the = floor(($i - 1) / 7) + 1;

                  switch ($today_the) {
                    case 1:
                      $the_bit = 0b1000;
                      break;
                    case 2:
                      $the_bit = 0b0100;
                      break;
                    case 3:
                      $the_bit = 0b0010;
                      break;
                    case 4:
                      $the_bit = 0b0001;
                      break;
                    case 5:
                      $the_bit = 0b0;
                      break;
                  }

                  $a = 0;///////
                  switch ($today_youbi) {
                    case 0:
                      $today_bit = $the_bit << 24;
                      $a = 24;
                      break;
                    case 1:
                      $today_bit = $the_bit << 20;
                      $a = 20;//////
                      break;
                    case 2:
                      $today_bit = $the_bit << 16;
                      $a = 16;
                      break;
                    case 3:
                      $today_bit = $the_bit << 12;
                      $a = 12;
                      break;
                    case 4:
                      $today_bit = $the_bit << 8;
                      $a = 8;
                      break;
                    case 5:
                      $today_bit = $the_bit << 4;
                      $a = 4;
                      break;
                    case 6:
                      $today_bit = $the_bit;
                      $a = 0;
                      break;
                  }

                  $today_burn = "燃えるゴミ";
                  $today_metal = "金属類";
                  $today_bottle = "ビン類";
                  //$today_nonburn = "[その他の不燃物]";
									$today_nonburn = "不燃物";
                  //$today_pet = "ペットボトル";
									$today_pet = "ペットボトル";
                  //$today_plastic = "容器包装プラスチック";
									$today_plastic = "プラスチック";
                  $today_paper = "紙類";
                  $today_cloth = "衣類";

                  if (decbin($burn & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_burn;
                  }
                  if (decbin($metal & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_metal;
                  }
                  if (decbin($bottle & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_bottle;
                  }
                  if (decbin($nonburn & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_nonburn;
                  }
                  if (decbin($pet & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_pet;
                  }
                  if (decbin($plastic & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_plastic;
                  }
                  if (decbin($paper & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_paper;
                  }
                  if (decbin($cloth & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_cloth;
                  }

                  if ($today_bit == 0) {
										$b = 0b1111 << $a;
                    if (($burn & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_burn;
                    }
                    if (($metal & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_metal;
                    }
                    if (($bottle & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_bottle;
                    }
                    if (($nonburn & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_nonburn;
                    }
                    if (($pet & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_pet;
                    }
                    if (($plastic & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_plastic;
                    }
                    if (($paper & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_paper;
                    }
                    if (($cloth & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_cloth;
                    }
                  }

                  $j++;
                  // 月末日の場合
                  if ($i == $last_day) {
                      // 月末日から残りをループ
                      for ($e = 1; $e <= 6 - $week; $e++) {
                          // 後半に空文字をセット
                          $calendar[$j]['day'] = '';
                          $j++;
                      }
                  }
              }
              print "<br>";
              echo $year . "年" . $month . "月のカレンダー";
              print "<br>";
              print "<table>";
                  print "<tr class=\"top\">";
                      print "<th>日</th>";
                      print "<th>月</th>";
                      print "<th>火</th>";
                      print "<th>水</th>";
                      print "<th>木</th>";
                      print "<th>金</th>";
                      print "<th>土</th>";
                  print "</tr>";

                  print "<tr>";
                    $cnt = 0;
                    foreach ($calendar as $key => $value):
                    print "<td>";
                    $cnt++;
                    echo $value['day'];
                    print "</td>";

                    if ($cnt == 7):
                      print "</tr>";
                      print "<tr>";
                      $cnt = 0;
                    endif;

                    endforeach;
                  print "</tr>";
              print "</table>";
            print "
            </div>
            ";

            //calender2
            print "
            <div id=\"cal2\">
            ";
              // 現在の年月を取得
              $year = date('Y');
              $month = date('n');
              if ($month == 12) {
                $year = date('Y') + 1;
                $month = 1;
              } else {
								$month = $month + 1;
							}
              // 月末日を取得
              $last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));

              $calendar = array();
              $j = 0;
              // 月末日までループ
              for ($i = 1; $i < $last_day + 1; $i++) {
                  // 曜日を取得
                  $week = date('w', mktime(0, 0, 0, $month, $i, $year));

                  // 1日の場合
                  if ($i == 1) {
                      // 1日目の曜日までをループ
                      for ($s = 1; $s <= $week; $s++) {
                          // 前半に空文字をセット
                          $calendar[$j]['day'] = '';
                          $j++;
                      }
                  }

                  // 配列に日付をセット
                  $calendar[$j]['day'] = $i;

                  $today_youbi = $week;
                  $today_the = floor(($i - 1) / 7) + 1;

                  switch ($today_the) {
                    case 1:
                      $the_bit = 0b1000;
                      break;
                    case 2:
                      $the_bit = 0b0100;
                      break;
                    case 3:
                      $the_bit = 0b0010;
                      break;
                    case 4:
                      $the_bit = 0b0001;
                      break;
                    case 5:
                      $the_bit = 0b0;
                      break;
                  }

                  $a = 0;///////
                  switch ($today_youbi) {
                    case 0:
                      $today_bit = $the_bit << 24;
                      $a = 24;
                      break;
                    case 1:
                      $today_bit = $the_bit << 20;
                      $a = 20;//////
                      break;
                    case 2:
                      $today_bit = $the_bit << 16;
                      $a = 16;
                      break;
                    case 3:
                      $today_bit = $the_bit << 12;
                      $a = 12;
                      break;
                    case 4:
                      $today_bit = $the_bit << 8;
                      $a = 8;
                      break;
                    case 5:
                      $today_bit = $the_bit << 4;
                      $a = 4;
                      break;
                    case 6:
                      $today_bit = $the_bit;
                      $a = 0;
                      break;
                  }

									$today_burn = "燃えるゴミ";
                  $today_metal = "金属類";
                  $today_bottle = "ビン類";
                  //$today_nonburn = "[その他の不燃物]";
									$today_nonburn = "不燃物";
                  //$today_pet = "ペットボトル";
									$today_pet = "ペットボトル";
                  //$today_plastic = "容器包装プラスチック";
									$today_plastic = "プラスチック";
                  $today_paper = "紙類";
                  $today_cloth = "衣類";

                  if (decbin($burn & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_burn;
                  }
                  if (decbin($metal & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_metal;
                  }
                  if (decbin($bottle & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_bottle;
                  }
                  if (decbin($nonburn & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_nonburn;
                  }
                  if (decbin($pet & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_pet;
                  }
                  if (decbin($plastic & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_plastic;
                  }
                  if (decbin($paper & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_paper;
                  }
                  if (decbin($cloth & $today_bit) != 0) {
                    $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_cloth;
                  }

									/*
                  if ($today_bit == 0) {
                    $b = 0b1111;
                    $b = $b << $a;
                    if (($burn >> $a) & $b == $b) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_burn;
                    }
                    if (($metal >> $a) & $b == $b) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_metal;
                    }
                    if (($bottle >> $a) & $b == $b) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_bottle;
                    }
                    if (($nonburn >> $a) & $b == $b) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_nonburn;
                    }
                    if (($pet >> $a) & $b == $b) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_pet;
                    }
                    if (($plastic >> $a) & $b == $b) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_plastic;
                    }
                    if (($paper >> $a) & $b == $b) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_paper;
                    }
                    if (($cloth >> $a) & $b == $b) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_cloth;
                    }
                  }
									*/
									if ($today_bit == 0) {
										$b = 0b1111 << $a;
                    if (($burn & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_burn;
                    }
                    if (($metal & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_metal;
                    }
                    if (($bottle & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_bottle;
                    }
                    if (($nonburn & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_nonburn;
                    }
                    if (($pet & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_pet;
                    }
                    if (($plastic & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_plastic;
                    }
                    if (($paper & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_paper;
                    }
                    if (($cloth & $b) >> $a == 15) {
                      $calendar[$j]['day'] = $calendar[$j]['day'] . "<br>" . $today_cloth;
                    }
                  }

                  $j++;
                  // 月末日の場合
                  if ($i == $last_day) {
                      // 月末日から残りをループ
                      for ($e = 1; $e <= 6 - $week; $e++) {
                          // 後半に空文字をセット
                          $calendar[$j]['day'] = '';
                          $j++;
                      }
                  }
              }
              print "<br>";
              echo $year . "年" . $month . "月のカレンダー";
              print "<br>";
              print "<table>";
                  print "<tr class=\"top\">";
                      print "<th>日</th>";
                      print "<th>月</th>";
                      print "<th>火</th>";
                      print "<th>水</th>";
                      print "<th>木</th>";
                      print "<th>金</th>";
                      print "<th>土</th>";
                  print "</tr>";

                  print "<tr>";
                    $cnt = 0;
                    foreach ($calendar as $key => $value):
                    print "<td>";
                    $cnt++;
                    echo $value['day'];
                    print "</td>";

                    if ($cnt == 7):
                      print "</tr>";
                      print "<tr>";
                      $cnt = 0;
                    endif;

                    endforeach;
                  print "</tr>";
              print "</table>";
            print "
            </div>
            ";
          print "
          </div>
          ";
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
</html>
