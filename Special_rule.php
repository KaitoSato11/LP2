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

    <div class="Spesial">
      <div class="Line">
        <h2></h2>
      </div>
      <div class="Title">
        <h2>粗大・特別ゴミルール</h2>
      </div>
      <table class="Special_rule" border="1" width="100%">
        <tr>
          <th></th>
          <th width="2%">分別</th>
          <th width="5%">収集日</th>
          <th colspan="5">出せるもの</th>
          <th width="30%">注意点</th>
        </tr>
        <tr>
          <td rowspan="8" width="2%" align="center">直接持ち込むもの</td>
          <td align="center">水銀を含むゴミ</td>
          <td align="center">随時持ち込み</td>
          <td colspan="3" style="border-right: hidden">
            <div class="Zu1">
              <img src="./img/mato.png" alt="まとめ">
            </div>
          </td>
          <td colspan="2">
            <p>出せる場所</p>
            <ul>
              <li>香美市本庁舎北側通用口前</li>
              <li>プラザハ八王子1階</li>
              <li>ふれあい交流センター</li>
              <li>繁藤出張所</li>
              <li>香北支所</li>
              <li>物部支所</li>
            </ul>
          </td>
          <td>
            <ul>
              <li>充電式電池は捨てないでください。(ホームセンターマルン山田店・マツヤデンキ土佐山田店などのリサイクル協力店へ)</li>
              <li>ライターは入れないでください。(その他の不燃物へ)</li>
            </ul>
          </td>
        </tr>
        <tr>
          <td rowspan="7" align="center">粗大ごみ</td>
          <td rowspan="7" align="center">毎月第3回目の日曜日と翌日の月曜日(香北町永野粗大ごみ置き場については第3回目の日曜日のみ)<br>
            9:30 ~ 12:00
            13:00 ~ 16:00
          </td>

          <td width="15%" align="center">〇持ち込めるもの</td>
          <td width="15%" align="center">×持ち込めないもの</td>
          <td colspan="3" align="center">持ち込み手数料(1台につき)</td>
          <td rowspan="7">
            <ul>
              <li><b>持ち込み場所・日時</b></li>
              市立一般廃棄物処理場<br>
              (鏡野中学校東側の道を北へと約600m)<br>
              毎月第3回目の日曜日と翌日の月曜日<br>
              9:30~12:00 ・ 13:00~16:00<br><br>
              香北町永野粗大ごみ仮置き場<br>
              (高照寺から東へ約100m)<br>
              毎月第3回目の日曜日<br>
              9:30~12:00 ・ 13:00~16:00<br><br>
              <li>ゴミ収集ステーションに出せるもの(燃えるゴミ、金属・ビン、ペットボトル、容器包装プラスチック、紙類、衣類、その他の不燃物)は持ち込みできません。きちんと分別して指定日にステーションへ出してください。</li>
              <li>家電4品目(テレビ、エアコン、冷蔵庫・冷凍庫、洗濯機・衣類乾燥機)は持ち込みできません。リサイクル料金等を支払い小売店等で引き取ってもらってください。</li>
              <li>パソコン(ノート含)本体とモニタは持ち込みできません。メーカに連絡して送ることになります。リサイクルシールのないものはリサイクル料金がかかります。</li>
              <li>料金は、量の多少にかかわらず1車単位です。ご近所、町内会で声を掛け合って持ち込んでください。</li>
              <li>事業所(商店、事務所、自営業)など営業活動により出るごみについては持ち込めません。事業所ごみは、事業者自らの責任において適正に処理しなければなりません。</li>
            </ul>
          </td>
        </tr>
        <tr>
          <td rowspan="6">
            <ul>
              <li>金属類(カンは除く)</li>
              <li>ビデオ・掃除機などの電化製品(ただし家電四品は除く)</li>
              <li>プラスチック製不燃物(指定袋に入らないもの)</li>
              <li>タンス・机等木製品</li>
              <li>自転車</li>
              <li>発砲スチロール</li>
              <li>鏡・ガラス・陶磁器等</li>
              <li>蛍光灯・乾電池</li>
            </ul>
            <div class="Zu1">
              <img src="./img/gomi1.png" alt="ゴミまとめ">
            </div>
          </td>
          <td rowspan="6">
            <ul>
              <li>カン・ビンペットボトル等ステーション収集するもの</li>
              <li>商店・事務所・工場等から出るゴミ</li>
              <li>農家から出る農機具・ハウス園芸用資材・農薬缶等</li>
              <li>タイヤ・バッテリー等(車やバイク関係のもの)</li>
              <li>LPガスボンベ・消火器</li>
              <li>中身のある油缶・塗料缶</li>
              <li>家の改築・模様替え等によるごみ(瓦・土・ブロック等)</li>
              <li>建築廃材及び灰等</li>
            </ul>
            <div class="Zu1">
              <img src="./img/gomi2.png" alt="ゴミまとめ">
            </div>
          </td>
          <td>一輪車、台車、自転車又は自動二輪者による搬入</td>
          <td>200円</td>
          <td>
            <div class="Zu2">
              <img src="./img/zitensya.png" alt="自転車の画像">
            </div>
          </td>
        </tr>

        <tr>
          <td width="10%">乗用車及び最大積載量250kg以下の車両による搬入</td>
          <td>1000円</td>
          <td>
            <div class="Zu2">
              <img src="./img/zidousya.png" alt="普通乗用車の画像">
            </div>
          </td>
        </tr>

        <tr>
          <td>最大積載量251kg以上500kg以下の車両による搬入</td>
          <td>2000円</td>
          <td>
            <div class="Zu2">
              <img src="./img/keitora.png" alt="軽トラの画像">
            </div>
          </td>
        </tr>

        <tr>
          <td>最大積載量501kg以上1,000以下の車両による搬入の車両による搬入</td>
          <td>4100円</td>
          <td>
            <div class="Zu2">
              <img src="./img/car_truck.png" alt="トラックの画像">
            </div>
          </td>
        </tr>

        <tr>
          <td>最大積載量1,001kg以上2,000以下の車両による搬入</td>
          <td>8200円</td>
          <td>
            <div class="Zu2">
              <img src="./img/truck.png" alt="トラックの画像">
            </div>
          </td>
        </tr>

        <tr>
          <td colspan="3">※以後、最大積載量が1,000kg増えるごとに4100円加算</td>
        </tr>
      </table>
    </div>

    <div class="Main_Block5">
      <div class="Line">
        <h2></h2>
      </div>
      <div class="Title">
        <h2>MAP</h2>
      </div>
      <div class="Tizu">
        <h3>水銀を含むゴミ廃棄場所</h3>
        <img src="./img/suiginmap.jpg" alt="水銀を含むゴミ廃棄場所" border="2">
        <h3>粗大ゴミ廃棄場所</h3>
        <img src="./img/sodaimap.jpg" alt="粗大ゴミ廃棄場所" border="2">
      </div>
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
