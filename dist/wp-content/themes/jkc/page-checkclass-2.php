<?php
/*
Template Name: 固定：出陳クラス確認2022-2
*/
?>

<?php session_start(); ?>

<?php get_header(); ?>

<body>

  <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main">ドッグショー出陳クラスの確認結果</h1>
      </div>
    </div>
  </div>

  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>

  <div class="l-container l-container--sub">
    <div class="subInner">

      <?php
      // エスケープ文字関数
      function h($str)
      {
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
      }
      function time_diff($time_from, $time_to)
      {
        $dif = $time_to - $time_from; // 日時差を秒数で取得
        $dif_days = (strtotime(date("Y-m-d", $dif)) - strtotime("1970-01-01")) / 86400; // 日付単位の差
        return $dif_days;
      }
      $entry_year = isset($_SESSION['entry_year']) ? h($_SESSION['entry_year']) : '';
      $entry_month = isset($_SESSION['entry_month']) ? h($_SESSION['entry_month']) : '';
      $entry_day = isset($_SESSION['entry_day']) ? h($_SESSION['entry_day']) : '';
      $entry_class_no = isset($_SESSION['entry_class_no']) ? h($_SESSION['entry_class_no']) : '';
      $entry_class_txt = isset($_SESSION['entry_class_txt']) ? h($_SESSION['entry_class_txt']) : '';
      $result_year = isset($_SESSION['result_year']) ? h($_SESSION['result_year']) : '';
      $result_month = isset($_SESSION['result_month']) ? h($_SESSION['result_month']) : '';
      $result_day = isset($_SESSION['result_day']) ? h($_SESSION['result_day']) : '';

      if (isset($entry_year) && isset($entry_month) && isset($entry_day) && isset($entry_class_no) && isset($entry_class_txt) && isset($result_year) && isset($result_month) && isset($result_day)) :

        // イベント日から逆算した〜ヵ月1日以上〜ヵ月以下の生年月日範囲を出力
        function range_months($ymd_event, $mon_over, $mon_under, $ymd_birth)
        {
          $range_over = date('Y/m/d', strtotime($ymd_event . ' -' . $mon_under . ' month')); // 〜ヵ月以下

          $mon_over = date('Y/m/d', strtotime($ymd_event . ' -' . $mon_over . ' month')); // 〜ヵ月1日以上
          $range_under = date('Y/m/d', strtotime($mon_over . ' -1 day'));

          $adapt_bool = ($range_over <= $ymd_birth && $ymd_birth <= $range_under) ? true : false; // イベント日と誕生日から算出した適合可否
          $current_class = ($adapt_bool) ? ' class="current"' : '';

          $possible = ($adapt_bool) ? "〇" : "&nbsp";

          return array('range_over' => $range_over, 'range_under' => $range_under, 'adapt_bool' => $adapt_bool, 'current_class' => $current_class, 'possible' => $possible);
        }

        $ymd_event = date('Y/m/d', strtotime($entry_year . '/' . $entry_month . '/' . $entry_day)); // イベント日
        $ymd_birth = date('Y/m/d', strtotime($result_year . '/' . $result_month . '/' . $result_day)); // 生年月日
        $result_ary = range_months($ymd_event, 15, 24, $ymd_birth); // 〜ヵ月以下
        $cmn_txt = '<p class="indentback1 mt1">※出陳申込開始日及び締切日に関しては、当該日が土曜日、日曜日、国民の祝日、又は年末年始（12/29〜1/5）にあたるときは、直前の平日となることがあります。お申し込みの前に、必ず各展覧会の主催者事務所に確認してください。</p>';
        $cmn_error = '当該犬は出陳該当年令に達していません。';
      ?>
        <?php
        $result_ary = array();
        switch ($entry_class_no) {
          case 0: // FCI展
            $class_ary = array('ベビー', 'パピー', 'ジュニア', 'インターミディエイト', 'オープン', 'ワーキング(※WCC必要)', 'チャンピオン(※CH証明書必要)', 'ベテラン');
            $result_ary[0] = range_months($ymd_event, 4, 6, $ymd_birth);
            $result_ary[1] = range_months($ymd_event, 6, 9, $ymd_birth);
            $result_ary[2] = range_months($ymd_event, 9, 18, $ymd_birth);
            $result_ary[3] = range_months($ymd_event, 15, 24, $ymd_birth);
            $result_ary[4] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[5] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[6] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[7] = range_months($ymd_event, 96, 999, $ymd_birth);
            $class_bool = false;
            $class_title = '';
            for ($i = 0; $i < count($result_ary); $i++) {
              if ($result_ary[$i]['adapt_bool']) {
                $class_title .= $class_ary[$i] . "<br>";
                $class_bool = true;
                continue;
              }
            }
            if (!$class_bool) {
              $class_title = $cmn_error;
            }
        ?>
            <div class="wp-block-jkc-block-text has-light-green-background-color has-background">
              <div class="c-block-text">
                <dl>
                  <dt style="display: inline-block; margin-bottom: 10px; width: 25%;">
                    <strong>
                      <mark style="background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">
                        開催日
                      </mark>
                    </strong>
                  </dt>
                  <dd style="display: inline-block; width: 73%"><?php echo $ymd_event; ?></dd>
                  <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                    <strong>
                      <mark style=" background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">
                        誕生日
                      </mark>
                    </strong>
                  </dt>
                  <dd style="display: inline-block; width: 73%"><?php echo $ymd_birth; ?></dd>
                  <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                    <strong>
                      <mark style=" background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">
                        展覧会の種類
                      </mark>
                    </strong>
                  </dt>
                  <dd style="display: inline-block; width: 73%"><?php echo $entry_class_txt; ?></dd>
                  <dt style="display: inline-block; width: 25%">
                    <strong>
                      <mark style=" background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">
                        出陳可能クラス
                      </mark>
                    </strong>
                  </dt>
                  <dd style="display: inline-block; width: 73%"><?php echo $class_title; ?></dd>
                </dl>
                </p>
                <div class=" border">&nbsp;
                </div>
                <?php echo $cmn_txt; ?>
              </div>
              <div class="wp-block-jkc-block-heading">
                <h3 class="c-post-heading c-post-heading--lv3">FCI展</h3>
              </div>
              <figure class="wp-block-flexible-table-block-table is-style-stripes">
                <table class="has-fixed-layout">
                  <thead>
                    <tr class="header alignC">
                      <th width="18%">&nbsp;</th>
                      <th width="18%">&nbsp;</th>
                      <th width="18%">生年月日</th>
                      <th width="18%">生後</th>
                      <th width="17%">付与カード</th>
                      <th width="11%">出陳可</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr<?php echo $result_ary[0]['current_class']; ?>>
                      <td class="header">ベビー・マッチショー</td>
                      <td>ベビー</td>
                      <td><?php echo $result_ary[0]['range_over']; ?> 〜 <?php echo $result_ary[0]['range_under']; ?></td>
                      <td>4ヵ月1日以上 〜 6ヵ月以下</td>
                      <td>&nbsp;</td>
                      <td><?php echo $result_ary[0]['possible'] ?></td>
                      </tr>
                      <tr<?php echo $result_ary[1]['current_class']; ?>>
                        <td class="header">パピー・マッチショー</td>
                        <td>パピー</td>
                        <td><?php echo $result_ary[1]['range_over']; ?> 〜 <?php echo $result_ary[1]['range_under']; ?></td>
                        <td>6ヵ月1日以上 〜 9ヵ月以下</td>
                        <td>&nbsp;</td>
                        <td><?php echo $result_ary[1]['possible'] ?></td>
                        </tr>
                        <tr<?php echo $result_ary[2]['current_class']; ?>>
                          <td class="header" rowspan="6">チャンピオンシップショー</td>
                          <td>ジュニア</td>
                          <td><?php echo $result_ary[2]['range_over']; ?> 〜 <?php echo $result_ary[2]['range_under']; ?></td>
                          <td>9ヵ月1日以上 〜 18ヵ月以下</td>
                          <td>J.CAC付与</td>
                          <td><?php echo $result_ary[2]['possible'] ?></td>
                          </tr>
                          <tr<?php echo $result_ary[3]['current_class']; ?>>
                            <td>インターミディエイト</td>
                            <td><?php echo $result_ary[3]['range_over']; ?> 〜 <?php echo $result_ary[3]['range_under']; ?></td>
                            <td>15ヵ月1日以上 〜 24ヵ月以下</td>
                            <td>CAC・CACIB付与</td>
                            <!-- <td>&nbsp;</td> -->
                            <td><?php echo $result_ary[3]['possible'] ?></td>
                            </tr>
                            <tr<?php echo $result_ary[4]['current_class']; ?>>
                              <td>オープン</td>
                              <td><?php echo $result_ary[4]['range_under']; ?> 以前</td>
                              <td>15ヵ月1日以上 〜</td>
                              <td>CAC・CACIB付与</td>
                              <td><?php echo $result_ary[4]['possible'] ?></td>
                              </tr>
                              <tr<?php echo $result_ary[5]['current_class']; ?>>
                                <td>ワーキング</td>
                                <td><?php echo $result_ary[5]['range_under']; ?> 以前</td>
                                <td>15ヵ月1日以上 〜<br>ワーキングトライアルテスト対象犬種。WCC添付</td>
                                <td>CAC・CACIB付与</td>
                                <td><?php echo $result_ary[5]['possible'] ?></td>
                                </tr>
                                <tr<?php echo $result_ary[6]['current_class']; ?>>
                                  <td>チャンピオン</td>
                                  <td><?php echo $result_ary[6]['range_under']; ?> 以前</td>
                                  <td>15ヵ月1日以上 〜<br>CH登録証明書添付</td>
                                  <td>CACIB付与</td>
                                  <td><?php echo $result_ary[6]['possible'] ?></td>
                                  </tr>
                                  <tr<?php echo $result_ary[7]['current_class']; ?>>
                                    <td>ベテラン</td>
                                    <td><?php echo $result_ary[7]['range_under']; ?> 以前</td>
                                    <td>96ヵ月1日以上<br>（8歳以上）</td>
                                    <td>V.CAC付与</td>
                                    <td><?php echo $result_ary[7]['possible'] ?></td>
                                    </tr>
                  </tbody>
                </table>
              </figure>
            <?php
            break;
          case 1: // 連合会展
            $class_ary = array('ベビー', 'パピー', 'ジュニア', 'インターミディエイト', 'オープン', 'ワーキング(※WCC必要)', 'チャンピオン(※CH証明書必要)', 'ベテラン');
            $result_ary[0] = range_months($ymd_event, 4, 6, $ymd_birth);
            $result_ary[1] = range_months($ymd_event, 6, 9, $ymd_birth);
            $result_ary[2] = range_months($ymd_event, 9, 18, $ymd_birth);
            $result_ary[3] = range_months($ymd_event, 15, 24, $ymd_birth);
            $result_ary[4] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[5] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[6] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[7] = range_months($ymd_event, 96, 999, $ymd_birth);
            $class_bool = false;
            $class_title = '';
            for ($i = 0; $i < count($result_ary); $i++) {
              if ($result_ary[$i]['adapt_bool']) {
                $class_title .= $class_ary[$i] . "<br>";
                $class_bool = true;
                continue;
              }
            }
            if (!$class_bool) {
              $class_title = $cmn_error;
            }
            ?>
              <div class="wp-block-jkc-block-text has-light-green-background-color has-background">
                <div class="c-block-text">
                  <dl>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark style="background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">開催日</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $ymd_event; ?></dd>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark style=" background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">誕生日</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $ymd_birth; ?></dd>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark style=" background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">展覧会の種類</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $entry_class_txt; ?></dd>
                    <dt style="display: inline-block; width: 25%">
                      <strong>
                        <mark class="has-inline-color has-green-color;" style=" background: transparent; color: #0a6934;">出陳可能クラス</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $class_title; ?></dd>
                  </dl>
                  <div class="border">&nbsp;</div>
                  <?php echo $cmn_txt; ?>
                </div>
              </div>
              <div class="wp-block-jkc-block-heading">
                <h3 class="c-post-heading c-post-heading--lv3">連合会展</h3>
              </div>
              <figure class="wp-block-flexible-table-block-table is-style-stripes">
                <table class="entry_class">
                  <thead>
                    <tr class="header alignC">
                      <th width="18%">&nbsp;</th>
                      <th width="18%">&nbsp;</th>
                      <th width="18%">生年月日</th>
                      <th width="18%">生後</th>
                      <th width="17%">付与カード</th>
                      <th width="11%">出陳可</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr<?php echo $result_ary[0]['current_class']; ?>>
                      <td class="header">ベビー・マッチショー</td>
                      <td>ベビー</td>
                      <td><?php echo $result_ary[0]['range_over']; ?> 〜 <?php echo $result_ary[0]['range_under']; ?></td>
                      <td>4ヵ月1日以上 〜 6ヵ月以下</td>
                      <td>&nbsp;</td>
                      <td><?php echo $result_ary[0]['possible'] ?></td>
                      </tr>
                      <tr<?php echo $result_ary[1]['current_class']; ?>>
                        <td class="header">パピー・マッチショー</td>
                        <td>パピー</td>
                        <td><?php echo $result_ary[1]['range_over']; ?> 〜 <?php echo $result_ary[1]['range_under']; ?></td>
                        <td>6ヵ月1日以上 〜 9ヵ月以下</td>
                        <td>&nbsp;</td>
                        <td><?php echo $result_ary[1]['possible'] ?></td>
                        </tr>
                        <tr<?php echo $result_ary[2]['current_class']; ?>>
                          <td class="header" rowspan="6">チャンピオンシップショー</td>
                          <td>ジュニア</td>
                          <td><?php echo $result_ary[2]['range_over']; ?> 〜 <?php echo $result_ary[2]['range_under']; ?></td>
                          <td>9ヵ月1日以上 〜 18ヵ月以下</td>
                          <td>J.CAC付与</td>
                          <td><?php echo $result_ary[2]['possible'] ?></td>
                          </tr>
                          <tr<?php echo $result_ary[3]['current_class']; ?>>
                            <td>インターミディエイト</td>
                            <td><?php echo $result_ary[3]['range_over']; ?> 〜 <?php echo $result_ary[3]['range_under']; ?></td>
                            <td>15ヵ月1日以上 〜 24ヵ月以下</td>
                            <td>CAC付与</td>
                            <td><?php echo $result_ary[3]['possible'] ?></td>
                            </tr>
                            <tr<?php echo $result_ary[4]['current_class']; ?>>
                              <td>オープン</td>
                              <td><?php echo $result_ary[4]['range_under']; ?> 以前</td>
                              <td>15ヵ月1日以上 〜</td>
                              <td>CAC付与</td>
                              <td><?php echo $result_ary[4]['possible'] ?></td>
                              </tr>
                              <tr<?php echo $result_ary[5]['current_class']; ?>>
                                <td>ワーキング</td>
                                <td><?php echo $result_ary[5]['range_under']; ?> 以前</td>
                                <td>15ヵ月1日以上 〜<br>ワーキングトライアルテスト対象犬種。WCC添付</td>
                                <td>CAC付与</td>
                                <td><?php echo $result_ary[5]['possible'] ?></td>
                                </tr>
                                <tr<?php echo $result_ary[6]['current_class']; ?>>
                                  <td>チャンピオン</td>
                                  <td><?php echo $result_ary[6]['range_under']; ?> 以前</td>
                                  <td>15ヵ月1日以上 〜<br>CH登録証明書添付</td>
                                  <td>&nbsp;</td>
                                  <td><?php echo $result_ary[6]['possible'] ?></td>
                                  </tr>
                                  <tr<?php echo $result_ary[7]['current_class']; ?>>
                                    <td>ベテラン</td>
                                    <td><?php echo $result_ary[7]['range_under']; ?> 以前</td>
                                    <td>96ヵ月1日以上<br>（8歳以上）</td>
                                    <td>V.CAC付与</td>
                                    <td><?php echo $result_ary[7]['possible'] ?></td>
                                    </tr>
                  </tbody>
                </table>
              </figure>
            <?php
            break;
          case 2: // 犬種部会展
            $class_ary = array('ベビー', 'パピー', 'ジュニア', 'インターミディエイト', 'オープン', 'ワーキング(※WCC必要)', 'チャンピオン(※CH証明書必要)', 'ベテラン');
            $result_ary[0] = range_months($ymd_event, 4, 6, $ymd_birth);
            $result_ary[1] = range_months($ymd_event, 6, 9, $ymd_birth);
            $result_ary[2] = range_months($ymd_event, 9, 18, $ymd_birth);
            $result_ary[3] = range_months($ymd_event, 15, 24, $ymd_birth);
            $result_ary[4] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[5] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[6] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[7] = range_months($ymd_event, 96, 999, $ymd_birth);
            $class_bool = false;
            for ($i = 0; $i < count($result_ary); $i++) {
              if ($result_ary[$i]['adapt_bool']) {
                $class_title .= $class_ary[$i] . "<br>";
                $class_bool = true;
                continue;
              }
            }
            if (!$class_bool) {
              $class_title = $cmn_error;
            }
            ?>
              <div class="wp-block-jkc-block-text has-light-green-background-color has-background">
                <div class="c-block-text">
                  <dl>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark style="background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">開催日</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $ymd_event; ?></dd>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark style=" background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">誕生日</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $ymd_birth; ?></dd>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark style=" background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">
                          展覧会の種類
                        </mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $entry_class_txt; ?></dd>
                    <dt style="display: inline-block; width: 25%">
                      <strong>
                        <mark style=" background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">出陳可能クラス</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $class_title; ?></dd>
                  </dl>
                  <div class="border">&nbsp;</div>
                  <?php echo $cmn_txt; ?>
                </div>
              </div>
              <div class="wp-block-jkc-block-heading">
                <h3 class="c-post-heading c-post-heading--lv3">犬種部会展</h3>
              </div>
              <figure class="wp-block-flexible-table-block-table is-style-stripes">
                <table class="has-fixed-layout">
                  <thead>
                    <tr class="header alignC">
                      <th width="18%">&nbsp;</th>
                      <th width="18%">&nbsp;</th>
                      <th width="18%">生年月日</th>
                      <th width="18%">生後</th>
                      <th width="17%">付与カード</th>
                      <th width="11%">出陳可</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr<?php echo $result_ary[0]['current_class']; ?>>
                      <td class="header">ベビー・マッチショー</td>
                      <td>ベビー</td>
                      <td><?php echo $result_ary[0]['range_over']; ?> 〜 <?php echo $result_ary[0]['range_under']; ?></td>
                      <td>4ヵ月1日以上 〜 6ヵ月以下</td>
                      <td>&nbsp;</td>
                      <td><?php echo $result_ary[0]['possible'] ?></td>
                      </tr>
                      <tr<?php echo $result_ary[1]['current_class']; ?>>
                        <td class="header">パピー・マッチショー</td>
                        <td>パピー</td>
                        <td><?php echo $result_ary[1]['range_over']; ?> 〜 <?php echo $result_ary[1]['range_under']; ?></td>
                        <td>6ヵ月1日以上 〜 9ヵ月以下</td>
                        <td>&nbsp;</td>
                        <td><?php echo $result_ary[1]['possible'] ?></td>
                        </tr>
                        <tr<?php echo $result_ary[2]['current_class']; ?>>
                          <td class="header" rowspan="6">チャンピオンシップショー</td>
                          <td>ジュニア</td>
                          <td><?php echo $result_ary[2]['range_over']; ?> 〜 <?php echo $result_ary[2]['range_under']; ?></td>
                          <td>9ヵ月1日以上 〜 18ヵ月以下</td>
                          <td>J.CAC付与</td>
                          <td><?php echo $result_ary[2]['possible'] ?></td>
                          </tr>
                          <tr<?php echo $result_ary[3]['current_class']; ?>>
                            <td>インターミディエイト</td>
                            <td><?php echo $result_ary[3]['range_over']; ?> 〜 <?php echo $result_ary[3]['range_under']; ?></td>
                            <td>15ヵ月1日以上 〜 24ヵ月以下</td>
                            <td>CAC付与</td>
                            <td><?php echo $result_ary[3]['possible'] ?></td>
                            </tr>
                            <tr<?php echo $result_ary[4]['current_class']; ?>>
                              <td>オープン</td>
                              <td><?php echo $result_ary[4]['range_under']; ?> 以前</td>
                              <td>15ヵ月1日以上 〜</td>
                              <td>CAC付与</td>
                              <td><?php echo $result_ary[4]['possible'] ?></td>
                              </tr>
                              <tr<?php echo $result_ary[5]['current_class']; ?>>
                                <td>ワーキング</td>
                                <td><?php echo $result_ary[5]['range_under']; ?> 以前</td>
                                <td>15ヵ月1日以上 〜<br>ワーキングトライアルテスト対象犬種。WCC添付</td>
                                <td>CAC付与</td>
                                <td><?php echo $result_ary[5]['possible'] ?></td>
                                </tr>
                                <tr<?php echo $result_ary[6]['current_class']; ?>>
                                  <td>チャンピオン</td>
                                  <td><?php echo $result_ary[6]['range_under']; ?> 以前</td>
                                  <td>15ヵ月1日以上 〜<br>CH登録証明書添付</td>
                                  <td>&nbsp;</td>
                                  <td><?php echo $result_ary[6]['possible'] ?></td>
                                  </tr>
                                  <tr<?php echo $result_ary[7]['current_class']; ?>>
                                    <td>ベテラン</td>
                                    <td><?php echo $result_ary[7]['range_under']; ?> 以前</td>
                                    <td>96ヵ月1日以上<br>（8歳以上）</td>
                                    <td>V.CAC付与</td>
                                    <td><?php echo $result_ary[7]['possible'] ?></td>
                                    </tr>
                  </tbody>
                </table>
              </figure>
            <?php
            break;
          case 3: // クラブ展
            $class_ary = array('ベビー', 'パピー', 'ジュニア', 'インターミディエイト', 'オープン', 'ワーキング(※WCC必要)', 'チャンピオン(※CH証明書必要)', 'ベテラン');
            $result_ary[0] = range_months($ymd_event, 4, 6, $ymd_birth);
            $result_ary[1] = range_months($ymd_event, 6, 9, $ymd_birth);
            $result_ary[2] = range_months($ymd_event, 9, 18, $ymd_birth);
            $result_ary[3] = range_months($ymd_event, 15, 24, $ymd_birth);
            $result_ary[4] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[5] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[6] = range_months($ymd_event, 15, 999, $ymd_birth);
            $result_ary[7] = range_months($ymd_event, 96, 999, $ymd_birth);
            $class_bool = false;
            for ($i = 0; $i < count($result_ary); $i++) {
              if ($result_ary[$i]['adapt_bool']) {
                $class_title .= $class_ary[$i] . "<br>";
                $class_bool = true;
                continue;
              }
            }
            if (!$class_bool) {
              $class_title = $cmn_error;
            }
            ?>
              <div class="wp-block-jkc-block-text has-light-green-background-color has-background">
                <div class="c-block-text">
                  <dl>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark style="background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">
                          開催日
                        </mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $ymd_event; ?></dd>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark class="has-inline-color has-green-color" style="background-color:rgba(0, 0, 0, 0);">誕生日</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $ymd_birth; ?></dd>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark class="has-inline-color has-green-color" style="background-color:rgba(0, 0, 0, 0);">展覧会の種類</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $entry_class_txt; ?></dd>
                    <dt style="display: inline-block; margin-bottom: 10px; width: 25%">
                      <strong>
                        <mark class="has-inline-color has-green-color" style="background-color:rgba(0, 0, 0, 0);">出陳可能クラス</mark>
                      </strong>
                    </dt>
                    <dd style="display: inline-block; width: 73%"><?php echo $class_title; ?></dd>
                  </dl>
                  <div class="border">&nbsp;</div>
                  <?php echo $cmn_txt; ?>
                </div>
              </div>
              <div class="wp-block-jkc-block-heading">
                <h3 class="c-post-heading c-post-heading--lv3">クラブ展</h3>
              </div>
              <figure class="wp-block-flexible-table-block-table is-style-stripes">
                <table class="entry_class">
                  <thead>
                    <tr class="header alignC">
                      <th width="18%">&nbsp;</th>
                      <th width="18%">&nbsp;</th>
                      <th width="18%">生年月日</th>
                      <th width="18%">生後</th>
                      <th width="17%">付与カード</th>
                      <th width="11%">出陳可</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr<?php echo $result_ary[0]['current_class']; ?>>
                      <td class="header">ベビー・マッチショー</td>
                      <td>ベビー</td>
                      <td><?php echo $result_ary[0]['range_over']; ?> 〜 <?php echo $result_ary[0]['range_under']; ?></td>
                      <td>4ヵ月1日以上 〜 6ヵ月以下</td>
                      <td>&nbsp;</td>
                      <td><?php echo $result_ary[0]['possible'] ?></td>
                      </tr>
                      <tr<?php echo $result_ary[1]['current_class']; ?>>
                        <td class="header">パピー・マッチショー</td>
                        <td>パピー</td>
                        <td><?php echo $result_ary[1]['range_over']; ?> 〜 <?php echo $result_ary[1]['range_under']; ?></td>
                        <td>6ヵ月1日以上 〜 9ヵ月以下</td>
                        <td>&nbsp;</td>
                        <td><?php echo $result_ary[1]['possible'] ?></td>
                        </tr>
                        <tr<?php echo $result_ary[2]['current_class']; ?>>
                          <td class="header" rowspan="6">チャンピオンシップショー</td>
                          <td>ジュニア</td>
                          <td><?php echo $result_ary[2]['range_over']; ?> 〜 <?php echo $result_ary[2]['range_under']; ?></td>
                          <td>9ヵ月1日以上 〜 18ヵ月以下</td>
                          <td>J.CAC付与</td>
                          <td><?php echo $result_ary[2]['possible'] ?></td>
                          </tr>
                          <tr<?php echo $result_ary[3]['current_class']; ?>>
                            <td>インターミディエイト</td>
                            <td><?php echo $result_ary[3]['range_over']; ?> 〜 <?php echo $result_ary[3]['range_under']; ?></td>
                            <td>15ヵ月1日以上 〜 24ヵ月以下</td>
                            <td>CAC付与</td>
                            <td><?php echo $result_ary[3]['possible'] ?></td>
                            </tr>
                            <tr<?php echo $result_ary[4]['current_class']; ?>>
                              <td>オープン</td>
                              <td><?php echo $result_ary[4]['range_under']; ?> 以前</td>
                              <td>15ヵ月1日以上 〜</td>
                              <td>CAC付与</td>
                              <td><?php echo $result_ary[4]['possible'] ?></td>
                              </tr>
                              <tr<?php echo $result_ary[5]['current_class']; ?>>
                                <td>ワーキング</td>
                                <td><?php echo $result_ary[5]['range_under']; ?> 以前</td>
                                <td>15ヵ月1日以上 〜<br>ワーキングトライアルテスト対象犬種。WCC添付</td>
                                <td>CAC付与</td>
                                <td><?php echo $result_ary[5]['possible'] ?></td>
                                </tr>
                                <tr<?php echo $result_ary[6]['current_class']; ?>>
                                  <td>チャンピオン</td>
                                  <td><?php echo $result_ary[6]['range_under']; ?> 以前</td>
                                  <td>15ヵ月1日以上 〜<br>CH登録証明書添付</td>
                                  <td>&nbsp;</td>
                                  <td><?php echo $result_ary[6]['possible'] ?></td>
                                  </tr>
                                  <tr<?php echo $result_ary[7]['current_class']; ?>>
                                    <td>ベテラン</td>
                                    <td><?php echo $result_ary[7]['range_under']; ?> 以前</td>
                                    <td>96ヵ月1日以上<br>（8歳以上）</td>
                                    <td>V.CAC付与</td>
                                    <td><?php echo $result_ary[7]['possible'] ?></td>
                                    </tr>
                  </tbody>
                </table>
              </figure>
          <?php } ?>

        <?php
        $_SESSION = array();
        session_destroy();
      else :
        $_SESSION = array();
        echo '保存内容はありません';
      endif;
        ?>

        <?php $acf_wysiwyg = get_field('acf_wysiwyg'); /* ACFよりwysiwygフォームを出力 */ ?>
        <?php if ($acf_wysiwyg) : ?>
          <?php echo $acf_wysiwyg; ?>
        <?php endif; ?>
        <?php get_template_part('modules/get_dogtag'); /* 投稿に適用されている犬種名タグを出力 */ ?>
            </div>
    </div>

  </div>

  <?php get_footer(); ?>

</body>

</html>
