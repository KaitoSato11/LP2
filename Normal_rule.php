<?php
require_once('config.php');
session_start();
if (!isset($_SESSION['ID'])) {
    header('Location: ./Main.php');
    exit();
}
$db['host'] = DB_HOST;
$db['user'] = DB_USER;
$db['pass'] = DB_PASSWORD;
$db['dbname'] = DB_NAME;
?>

<!DOCTYPE html>
<HTML lang="ja">

<HEAD>
  <meta charset="utf-8">
  <title>GDSS ゴミ出し支援システム</title>
  <link rel="icon" href="iconG.ico">
  <meta name="description" content="高知県香美市土佐山田町を対象とした、ゴミ出しを支援するサイトです。">
  <link rel="stylesheet" href="./css/design_satozaki.css">
  <!-- <link rel="stylesheet" href="design.css"> -->
</HEAD>

<BODY>
  <!-- HEADER -->
  <div class="header">
    <p class="title">GDSS</p>
    <p class="wayaku">ゴミ出し支援システム</p>
    <p class="desc">このサイトは、高知県香美市土佐山田町が対象となっています。</p>
  </div>

  <!-- メインコンテンツエリア -->
  <div class="content">
    <!-- ここに各ページの中身いれてください -->
    <div class="Main_Block1">
      <a class="Block5" href="Mypage.php">
        <h3>マイページに戻る</h3>
      </a>
    </div>

    <div class="Normal">
      <div class="Line">
        <h2></h2>
      </div>
      <div class="Title">
        <h2>ゴミ分別ルール</h2>
      </div>
      <table class="Normal_rule" border="1" width="100%">
        <tr>
          <th></th>
          <th width="3%" colspan="2">分別</th>
          <th colspan="2">出せるもの</th>
          <th width="20%">注意点</th>
          <th width="8%">使用できるゴミ袋</th>
        </tr>
        <tr>
          <td rowspan="9" width="2%"><b>ゴミステーションに出せるもの</b></td>
          <td colspan="2">
            <b>燃えるゴミ</b>
          </td>
          <td colspan="2">
            <div class="Zu1">
              <img src="./img/mato2.png" alt="まとめ2">
            </div>
          </td>
          <td>
            <ul>
              <li><u>ビン・缶・硬質プラスチックなどの燃えないゴミは絶対に入れないでください。</u></li>
              <li>生ゴミは十分に水切りしてください</li>
              <li>草木などは太さ3cm、長さ70cm以内に切断してください</li>
              <li>紙おむつの汚物はは取り除いてください</li>
              <li>布団・毛布・布じゅうたんなどは6等分に切ってください</li>
            </ul>
          </td>
          <td>白色の燃えるゴミ指定袋<br>
            大・中・小</td>
        </tr>
        <tr>
          <td rowspan="7"><b>資源ゴミ</b></td>
          <td><b>金属類</b></td>

          <td valign="top">
            <p class="center"><b>金属類(飲料用の缶)アルミ缶・スチール缶</b></p>
            <div class="Zu1">
              <img src="./img/mato4.png" alt="まとめ4">
            </div>
            <ul>
              <li>中身を出して水洗いしてください</li>
              <li>飲料用の缶は、アルミ缶とスチール缶に分ける必要はありません</li>
            </ul>
          </td>
          <td>
            <p class="center"><b>金属類(その他)</b></p>
            <div class="Zu1">
              <img src="./img/mato5.png" alt="まとめ5">
            </div>
            <ul>
              <li>飲料用の缶以外は飲料用の缶と袋を分ける必要があります</li>
              <li>刃物は危険のないように紙等で包み、袋に表示して出してください</li>
              <li>スプレー缶・カセットボンベは、必ず使い切って穴を開けてください</li>
            </ul>
          </td>
          <td>
            <ul>
              <li>中身を出して水洗いしてください</li>
              <li>飲料用の缶は、アルミ缶とスチール缶に分ける必要はありません</li>
            </ul>
          </td>
          <td>透明の資源ゴミ指定袋<br>
            中・小</td>
        </tr>
        <tr>
          <td>
            <b>ビン類</b>
          </td>
          <td>
            <p class="center"><b>透明ビン・茶色ビン・その他の色のビン(食品用・飲み薬用)</b></p>
            <div class="bin">
              <img src="./img/bin.png" alt="ビン" width="100px" height="100px">
            </div>

            <ul>
              <li>ビンの色ごとに分ける必要はありません</li>
              <li>中身を出して水洗いしてください</li>
              <li>キャップは必ず取って、金属製のキャップは金属(その他)へ、プラスチック製のキャップは容器包装プラスチックへ入れてください</li>
            </ul>
          </td>
          <td>
            <div class="Zu1">
              <img src="./img/mato6.png" alt="まとめ6">
            </div>
            化粧品用・劇薬剤用のビンや割れたビン、コップや灰皿などのガラス製品はその他の不燃物へ入れてください
          </td>
          <td>
            <ul>
              <li>ビンの色ごとに分ける必要はありません</li>
              <li>中身を出して水洗いしてください</li>
              <li>キャップは必ず取って、金属製キャップは金属(その他)へ、プラスチック製のキャップは容器包装プラスチックへ入れてください</li>
              <li>化粧品用・劇薬剤用のビンや割れたビン、コップや灰皿などのガラス製品はその他の不燃物へいれてください</li>
            </ul>
          </td>
          <td>透明の資源ゴミ指定袋<br>
            中・小
          </td>
        </tr>

        <tr>
          <td><b>その他の不燃物</b></td>
          <td colspan="2">
            <div class="Zu1">
              <img src="./img/mato11.png" alt="まとめ11">
            </div>
          </td>
          <td>
            <ul>
              <li>割れた物は新聞紙等に包んで危険のないよう袋に表示してください</li>
              <li>おもちゃの電池は除いてください(水銀を含むゴミへ)</li>
              <li>ライターのガスはすべて抜いてください</li>
            </ul>
          </td>
          <td>透明の資源ゴミ指定袋<br>
            中・小</td>
        </tr>

        <tr>
          <td><b>ペットボトル</b></td>
          <td colspan="2">
            <div class="Zu1">
              <img src="./img/mato7.png" alt="まとめ7">
            </div>
          </td>
          <td>
            <ul>
              <li>キャップとラベルは必ず取って、中身を出して水洗いしてください</li>
              <li>プラスチック製のキャップ及びラベルは容器包装プラスチックへ入れてください</li>
            </ul>
          </td>
          <td>透明の資源ゴミ指定袋<br>
            大・中・小</td>
        </tr>

        <tr>
          <td><b>容器包装プラスチック</b></td>

          <td colspan="2">
            <div class="Zu1">
              <img src="./img/mato8.png" alt="まとめ8">
            </div>
          </td>
          <td>
            <ul>
              <li><u>商品を包むプラスチック製でできた容器・包装</u>がリサイクルの対象になります</li>
              <li>中身を出して水洗いしてください</li>
              <li>レジ袋に入れて出さないでください</li>
            </ul>
          </td>
          <td>透明の資源ゴミ指定袋<br>
            大・中・小</td>
        </tr>

        <tr>
          <td><b>紙類</b></td>

          <td colspan="2">
            <div class="Zu1">
              <img src="./img/mato9.png" alt="まとめ9">
            </div>
          </td>
          <td>
            <ul>
              <li>紙類は、ひもで縛って出してください(ひも以外のものを使わないでください)</li>
              <li>酒パック等は可燃ごみへ入れてください</li>
            </ul>
          </td>
          <td>ひもで縛って出してください</td>
        </tr>

        <tr>
          <td><b>衣類</b></td>

          <td colspan="2">
            <div class="Zu1">
              <img src="./img/mato10.png" alt="まとめ10">
            </div>
          </td>
          <td>
            <ul>
              <li>衣類は、雨の日に出さないでください</li>
              <li>衣類は透明の資源ゴミ指定袋に入れてください</li>
              <li><u>下着、タオル、カーテン、じゅうたん、布団、毛布、座布団等や汚れたものは除きます</u>
                (燃えるゴミか粗大ごみへ)</li>
            </ul>
          </td>
          <td>透明の資源ゴミ指定袋<br>
            大・中・小</td>
        </tr>
      </table>
    </div>
  </div>


  <!-- PAGE TOPに戻るボタン
  ぺーじによっては、コメントアウトして消してください -->
  <a class="pagetop" href="#">PAGE TOP</a>

  <!-- FOOTER -->
  <div class="footer">
    <p class="title">GDSS</p>
    <p class="company">L&P</p>
  </div>
</BODY>

</HTML>
