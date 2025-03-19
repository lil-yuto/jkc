<?php
/*
Template Name: 固定：出陳クラス確認2022
*/
?>
<?php session_start(); ?>
<?php get_header(); ?>

<body <?php body_class(); ?>>

  <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main">ドッグショー出陳クラスの確認</h1>
      </div>
    </div>
  </div>

  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>

  <div class="l-container l-container--sub">

    <?php
    // エスケープ文字関数
    function h($str)
    {
      return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }
    // カレンダーバリデート関数
    function check_ymd($year, $month, $day)
    {
      if (isset($_POST[$year]) && isset($_POST[$month]) && isset($_POST[$day])) :
        $v_year = h(@$_POST[$year]);
        $v_month = h(@$_POST[$month]);
        $v_day = h(@$_POST[$day]);
        if (checkdate($v_month, $v_day, $v_year)) :
          $_SESSION[$year] = $v_year;
          $_SESSION[$month] = $v_month;
          $_SESSION[$day] = $v_day;
        else :
          $_SESSION = array();
          echo '<p class="colorR">無効な日付です（' . $v_year . '/' . $v_month . '/' . $v_day . '）</p>';
        endif;
      endif;
      return;
    }
    ?>

    <div class="wp-block-jkc-block-text has-light-green-background-color has-background">
      <div class="c-block-text">
        <form method="post" action="">
          <h5 class="c-block-reference-info__title" style="margin-bottom: 10px;">
            <strong>
              <mark style="background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">出陳予定の展覧会開催日を選択してください</mark>
            </strong>
          </h5>
          <?php
          echo '<select name="entry_year" style="margin: 0 10px; border: 1px solid rgba(0,0,0,.4); border-radius: 0; padding: 0.25em 0.5em; background: #fff; appearance: none !important; outline: none !important; text-align: center;" selected="' . date('Y') . '">' . "\n";
          $start = date('Y') - 0; // 〜年前から
          $end = date('Y') + 3; // 〜年後まで
          for ($i = $start; $i <= $end; $i++) :
            echo '<option value="' . $i . '">' . $i . '</option>' . "\n";
          endfor;
          echo '</select>年' . "\n";

          $now_month = date("n");
          echo '<select style="margin: 0 10px; border: 1px solid rgba(0,0,0,.4); border-radius: 0; padding: 0.25em 0.5em; background: #fff; appearance: none !important; outline: none !important; text-align: center; line-height: normal;" name="entry_month" selected="' . $now_month . '">' . "\n";

          $month_start = 1;
          if (date("Y") == 2022) {
            $month_start = 4;
          }

          for ($i = $month_start; $i <= 12; $i++) :
            // 選択肢を現在の月に指定する
            $is_selected = (string)$i === $now_month ? " selected" : "";

            echo '<option value="' . $i . '"' . $is_selected . '>' . $i . '</option>' . "\n";
          endfor;

          echo '</select>月' . "\n";

          echo '<select style="margin: 0 10px; border: 1px solid rgba(0,0,0,.4); border-radius: 0; padding: 0.25em 0.5em; background: #fff; appearance: none !important; outline: none !important; text-align: center; line-height: normal;" name="entry_day">' . "\n";
          for ($i = 1; $i <= 31; $i++) :
            echo '<option value="' . $i . '">' . $i . '</option>' . "\n";
          endfor;
          echo '</select>日' . "\n";
          check_ymd('entry_year', 'entry_month', 'entry_day');
          ?>

          <h5 style="margin-bottom: 10px; margin-top: 1.5em">
            <strong>
              <mark style="background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">展覧会の種類を選択してください</mark>
            </strong>
          </h5>
          <?php
          echo '<select style="margin: 0 10px; border: 1px solid rgba(0,0,0,.4); border-radius: 0; padding: 0.25em 0.5em; background: #fff; appearance: none !important; outline: none !important; text-align: center; line-height: normal;" class="entry_class" name="entry_class"><optgroup label="">' . "\n";
          $class_ary = array('FCI展', '連合会展', '犬種部会展', 'クラブ展');
          for ($i = 0; $i < count($class_ary); $i++) :
            echo '<option value="' . $i . '">' . $class_ary[$i] . '</option>' . "\n";
          endfor;
          echo '</optgroup></select>' . "\n";
          ?>

          <h5 style="margin-bottom: 10px; margin-top: 1.5em">
            <strong>
              <mark style="background-color:rgba(0, 0, 0, 0);" class="has-inline-color has-green-color">出陳犬の誕生日を選択してください</mark>
            </strong>
          </h5>
          <?php
          echo '<select style="margin: 0 10px; border: 1px solid rgba(0,0,0,.4); border-radius: 0; padding: 0.25em 0.5em; background: #fff; appearance: none !important; outline: none !important; text-align: center; line-height: normal;" name="result_year">' . "\n";
          $start = date('Y') + 0; // 〜年後から
          $end = date('Y') - 10; // 〜年前まで
          for ($i = $start; $i >= $end; $i--) :
            echo '<option value="' . $i . '">' . $i . '</option>' . "\n";
          endfor;
          echo '</select>年' . "\n";

          echo '<select style="margin: 0 10px; border: 1px solid rgba(0,0,0,.4); border-radius: 0; padding: 0.25em 0.5em; background: #fff; appearance: none !important; outline: none !important; text-align: center; line-height: normal;" name="result_month">' . "\n";
          for ($i = 1; $i <= 12; $i++) :
            echo '<option value="' . $i . '">' . $i . '</option>' . "\n";
          endfor;
          echo '</select>月' . "\n";

          echo '<select style="margin: 0 10px; border: 1px solid rgba(0,0,0,.4); border-radius: 0; padding: 0.25em 0.5em; background: #fff; appearance: none !important; outline: none !important; text-align: center; line-height: normal;" name="result_day">' . "\n";
          for ($i = 1; $i <= 31; $i++) :
            echo '<option value="' . $i . '">' . $i . '</option>' . "\n";
          endfor;
          echo '</select>日' . "\n";
          check_ymd('result_year', 'result_month', 'result_day');
          ?>
          <p>&nbsp;</p>
          <div class="wp-block-jkc-block-button">
            <div class="c-block-button">
              <div class="c-block-button__items">
                <div class="wp-block-jkc-block-button-item">
                  <div class="c-block-button-item" style="margin-left: 0; max-width: 250px; width: 100%;">
                    <input id="submit_btn" type="submit" value="出陳クラスを確認する" class="c-block-button-item__link">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div style="height: 80px;"></div>

    <div class="wp-block-jkc-block-reference-info">
      <div class="c-block-reference-info">
        <p class="c-block-reference-info__title">関連情報</p>
        <ul class="c-block-reference-info__items">
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/tour_and_manners/" class="c-block-text-link-item">ドッグショー・各種競技会の見学マナー</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/enjoying/" class="c-block-text-link-item">ドッグショーを楽しもう</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/about/" class="c-block-text-link-item">ドッグショーについて</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/history_and_significance/" class="c-block-text-link-item">ドッグショーの歴史と意義</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/sakura-annual-show/" class="c-block-text-link-item">サクラ・アニュアル・ショー開催案内</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/road_to_bis/" class="c-block-text-link-item">ドッグショー BISまでの道</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/first-time/" class="c-block-text-link-item">ドッグショーに初めて参加する方へ</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/kind/" class="c-block-text-link-item">ドッグショーの種類</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/form_download/" class="c-block-text-link-item">ドッグショー出陳申込書ダウンロード</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/judging-criteria/" class="c-block-text-link-item">ドッグショー審査基準と審査の実際</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/info_supplementary-prize202404/" class="c-block-text-link-item">展覧会における副賞クリスタルについて</a>
          </li>
          <li class="wp-block-jkc-block-text-link-item">
            <a href="/events/dogshow/entry/" class="c-block-text-link-item">展覧会の出陳申込について</a>
          </li>
        </ul>
      </div>
    </div>

    <?php // バリデート済み日付データがセッション保存されている場合はページ移動する
    if (isset($_SESSION['entry_year']) && isset($_SESSION['entry_month']) && isset($_SESSION['entry_day']) && isset($_SESSION['result_year']) && isset($_SESSION['result_month']) && isset($_SESSION['result_day'])) :
      $entry_class = h(@$_POST['entry_class']);
      $_SESSION['entry_class_no'] = $entry_class; // 展覧会配列番号
      $_SESSION['entry_class_txt'] = $class_ary[$entry_class]; // 展覧会名
      $re_url = esc_url(home_url('/events/dogshow/checkclass-2'));
    ?>
      <script>
        window.location.href = "<?php echo $re_url; ?>";
      </script>
    <?php
    //    wp_safe_redirect($re_url, 301);
    //    echo '..';
    //    exit;
    else :
      // echo '.';
      $_SESSION = array();
      session_destroy();
    endif;
    ?>

    <?php $acf_wysiwyg = get_field('acf_wysiwyg'); /* ACFよりwysiwygフォームを出力 */ ?>
    <?php if ($acf_wysiwyg) : ?>
      <?php echo $acf_wysiwyg; ?>
    <?php endif; ?>

    <?php get_template_part('modules/get_dogtag'); /* 投稿に適用されている犬種名タグを出力 */ ?>
  </div>

  <?php the_content(); ?>

  <?php get_footer(); ?>

</body>

</html>
