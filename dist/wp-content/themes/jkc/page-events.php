<?php //【1行目から実行すること】
ini_set('memory_limit', -1); // PHPメモリ制限
$url = esc_url($_SERVER['REQUEST_URI']); // 現在のURLをエスケープ取得

// 今日の日付から半年後の日付までの初期表示URLを設定してリダイレクト
if (preg_match('/events$/', $url)) :
 date_default_timezone_set('Asia/Tokyo');
 $today = date("Ymd");
 $range = date("Ymd", strtotime("+7 month"));
 $re_url = preg_replace('/(events)/', '$1?_sfm_acf_ev_date=' . $today . '+' . $range, $url);
 $re_url = str_replace('#038;', '', $re_url);
 wp_safe_redirect($re_url, 301);
 exit;
endif;

// URL末尾が“acf_ev_date=8桁数字+”か、URL途中が“acf_ev_date=8桁数字+&”の場合は同一の数字を付加してリダイレクト
if (preg_match('/acf_ev_date\=[\d]{8}\+$/', $url) || preg_match('/acf_ev_date\=[\d]{8}\+[^\d]/', $url)) :
 $re_url = preg_replace('/(acf_ev_date\=([\d]{8})\+)/', '$1$2', $url);
 $re_url = str_replace('#038;', '', $re_url);
 wp_safe_redirect($re_url, 301);
endif;

// URL末尾が“acf_ev_date=+8桁数字”か、URL途中が“acf_ev_date=+8桁数字&”の場合は同一の数字を付加してリダイレクト
if (preg_match('/acf_ev_date\=\+[\d]{8}$/', $url) || preg_match('/acf_ev_date\=\+[\d]{8}[^\d]/', $url)) :
 $re_url = preg_replace('/(acf_ev_date\=)\+([\d]{8})/', '$1$2+$2', $url);
 $re_url = str_replace('#038;', '', $re_url);
 wp_safe_redirect($re_url, 301);
endif;
?>


<?php get_header(); ?>

<script>
 (function() {
  var url = location.href;
  var parser = new URL(url);
  if (parser.search.indexOf("_sfm_acf_ev_date=") === -1) {
   var now = new Date();
   var date = new Date();
   date.setMonth(date.getMonth() + 7);
   var sixMonthLater = date;
   var startDate = formatDate(now);
   var endDate = formatDate(sixMonthLater);
   if (parser.search.indexOf("?") === -1) {
    window.location.href = parser.origin + parser.pathname + "?_sfm_acf_ev_date=" + startDate + "+" + endDate;
   } else {
    window.location.href = parser.origin + parser.pathname + parser.search + "&_sfm_acf_ev_date=" + startDate + "+" + endDate;
   }
  }

  function formatDate(date) {
   var year = date.getFullYear();
   var month = ("0" + (date.getMonth() + 1)).slice(-2);
   var day = ("0" + date.getDate()).slice(-2);
   return year + month + day;
  }
 })();
</script>

<main>
 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <hgroup class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">イベントスケジュール検索</h1>
    <p class="c-page-title__sub">About JKC</p>
   </hgroup>
  </div>

 </div>

 <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
  <?php if (function_exists('bcn_display')) {
   bcn_display();
  }; ?>
 </div>


 <div class="l-container l-container--sub">

  <section class="p-event-search">

   <div class="p-event-search__condition p-event-condition">
    <?php echo do_shortcode('[searchandfilter id="41794"]'); ?>
   </div>


   <div class="p-event-search__result p-event-result">

    <div class="p-event-result__setview_wrap">
     <button type="button" class="p-event-result__compare_enable">
      並べて見る
     </button>
     <button class="p-event__full_open js-eventFullOpen" type="button">
      すべて開く・閉じる
     </button>
    </div>

    <?php require('functions/get_eventday.php'); /* イベント開催日出力関数を読込み */ ?>

    <?php
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
    $the_query = new WP_Query(array(
     'post_type' => 'event_schedule',
     'orderby' => 'menu_order',
     'order' => 'DESC',
     'search_filter_id' => "41794",
     'paged' => $paged,
     'posts_per_page' => 21,
    ));
    // var_dump($the_query);
    ?>
    <?php if ($the_query->have_posts()) : ?>
     <form>
      <div class="p-event-result__compare">
       <ul class="p-event-result__lists p-ev">

        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


         <li id="ev-<?php echo $post->ID; ?>" class="p-ev__item">

          <div class="p-ev__item-wrapper" data-comp="btn-<?php echo $post->ID; ?>">

           <?php $ev_btb = '';
           $ev_hq = ''; ?>

           <?php $headbg_img = 'header_bg.png'; /* 項目フラッグアイコンBG色 */ ?>

           <?php $headbg_img_l = 'header_bg_l.png'; /* イベントカテゴリーフラッグアイコンBG色 */ ?>

           <?php $acf_ev_btb = get_field('acf_ev_btb'); /* BTB */ ?>

           <?php $acf_ev_office = get_field('acf_ev_office'); /* 事務所 */ ?>

           <?php if ($acf_ev_btb) : /* BTBの場合は背景をクリーム色にする */ ?>

            <?php $ev_btb = 'event_btb'; ?>

            <?php $headbg_img = 'header_bg_btb.png'; ?>

            <?php $headbg_img_l = 'header_bg_btb_l.png'; ?>

           <?php endif; ?>

           <?php if ($acf_ev_office == '本部') : /* 事務所名が“本部”の場合は背景を黄色にする */ ?>
            <?php $ev_hq = 'event_hq'; ?>
            <?php $headbg_img = 'header_bg_hq.png'; ?>
            <?php $headbg_img_l = 'header_bg_hq_l.png'; ?>
           <?php endif; ?>

           <div class="p-ev__menu">

            <div class="p-ev_infoarea1">
             <div class="p-ev_titlebg" style="background-color: rgba(242,95,92,1);"></div>
             <div class="p-ev_title">
              <p>開催日</p>
             </div>

             <?php $acf_ev_date = get_field('acf_ev_date'); ?>
             <?php if ($acf_ev_date) : ?>
              <?php $acf_ev_holiday = get_field('acf_ev_holiday'); ?>
              <p class="p-ev_date">
               <?php echo get_eventday($acf_ev_date, $acf_ev_holiday); /*イベント開催日 */ ?>
               <!-- 8888年88月88日(日) -->
              </p>
             <?php endif; ?>

             <?php if (get_field('acf_ev_btb')): ?>
              <div class="p-ev__BTB">
               <div>BTB</div>
              </div>
             <?php endif; ?>
            </div>

            <?php /* イベントカテゴリーの“説明”からBG色情報を取得 */
            $term_desc = 'rgba(10,105,52,1)';
            $terms = get_the_terms($post->ID, 'event_category');
            if ($terms) :
             foreach ($terms as $term) :
              // $term_desc = $term->description;
              $term_name = $term->name;
              break;
             endforeach;
            endif;
            ?>

            <div class="p-ev_infoarea2">

             <div class="p-ev__term">
              <p style="background-color: <?php echo $term_desc; ?>">
               <?php echo $term_name; ?>
              </p>
             </div>

             <?php $acf_ev_btb = get_field('acf_ev_btb'); ?>
             <?php $class_btb = ($acf_ev_btb) ? 'btb' : ''; ?>
             <div class="p-ev__name <?php echo $class_btb; ?>">

              <h3 class="p-ev__title">
               <?php the_title(); /* イベント名 */ ?>

              </h3>

              <?php $acf_ev_place = get_field('acf_ev_place'); ?>

              <?php if ($acf_ev_place) : ?>

               <p class="p-ev__venue">
                <?php echo $acf_ev_place; /* 会場 */ ?>
               </p>

              <?php endif; ?>




              <?php if (get_field('acf_ev_link')): ?>
               <a href="<?php echo get_field('acf_ev_link')['url']; ?>" class="p-ev__site-link" <?php echo $target =  get_field('acf_ev_link')['target'] ? 'target="_blank"' : ''; ?>>
                <?php echo get_field('acf_ev_link')['title']; ?>
               </a>
              <?php endif; ?>

             </div>
            </div>

            <div class="p-ev_infoarea3">
             <div class="p-ev_office-title">
              <p>事務所</p>
             </div>

             <?php if ($acf_ev_office) : ?>
              <div class="p-ev__office-name">
               <p>
                <?php echo $acf_ev_office; ?>
               </p>
              </div>
             <?php endif; ?>

             <?php $acf_ev_tel = get_field('acf_ev_tel'); /* 電話番号 */ ?>
             <?php $acf_ev_fax = get_field('acf_ev_fax'); /* FAX番号 */ ?>
             <?php $title_tel = 'TEL：'; ?>
             <?php $title_fax = 'FAX：'; ?>
             <?php if ($acf_ev_tel && $acf_ev_fax) : ?>
              <div>

               <!-- <h3 class="ev_date">
                <//?php echo $title_contact; ?>
               </h3> -->

               <p class="p-ev__tel-fax">
                <span>
                 <?php echo $title_tel . $acf_ev_tel; ?>
                </span>
                <span>
                 <?php echo $title_fax . $acf_ev_fax; ?>
                </span>
               </p>

              </div>

             <?php elseif ($acf_ev_tel) : ?>

              <div class="p-ev__tel">
               <p><?php echo $title_tel . $acf_ev_tel; ?></p>
              </div>

             <?php elseif ($acf_ev_fax) : ?>

              <div class="p-ev__fax">
               <p><?php echo $title_fax . $acf_ev_fax; ?></p>
              </div>

             <?php endif; ?>

            </div>

            <div class="p-ev_infoarea4">
             <div class="p-ev__comp-check">

              <input type="checkbox" id="ckbx-size-<?php echo $post->ID; ?>" name="comp" value="btn-<?php echo $post->ID; ?>" class="p-ev__comp-input"><?php /*echo $post->ID;*/ ?></input>

              <label for="ckbx-size-<?php echo $post->ID; ?>"></label>

             </div>

             <div class="p-ev__accordion-btn js-evDetailBtn">
              <div class="p-ev__menu_btn">詳細を見る</div>
             </div>
            </div>

           </div>

           <?php $supbool = false; /* 吹きだし内情報があるかの論理値 */ ?>
           <div class="p-ev__subMenu">



            <ul class="p-ev__moredetail">
             <li>
              <?php $acf_ev_info1 = get_field('acf_ev_info1'); /* 追加・訂正情報（上） */ ?>
              <?php if ($acf_ev_info1) : ?>
               <?php $supbool = true; ?>
               <div class="p-ev_info1">
                <p><?php echo $acf_ev_info1; ?></p>
               </div>
              <?php endif; ?>

              <?php if (have_rows('acf_ev_judge')): /* 審査員 */ ?>
               <?php $supbool = true; ?>
               <div class="p-ev__judge">

                <h3 class="p-ev__judge-heading">審査員</h3>

                <div>

                 <?php while (have_rows('acf_ev_judge')) : the_row(); ?>

                  <?php $acf_ev_judge_enable = get_sub_field('acf_ev_judge_enable'); /* 審査員情報の公開有無 */ ?>

                  <?php if ($acf_ev_judge_enable) : ?>

                   <?php $acf_ev_judge_title = get_sub_field('acf_ev_judge_title'); /* 担当役_入力（優先表示） */ ?>

                   <?php if ($acf_ev_judge_title) : ?>
                    <h4><?php echo $acf_ev_judge_title; ?></h4>
                   <?php else: ?>

                    <?php $acf_ev_judge_title_sel = get_sub_field('acf_ev_judge_title_sel'); /* 担当役_選択 */ ?>

                    <?php if ($acf_ev_judge_title_sel) : ?>
                     <h4><?php echo $acf_ev_judge_title_sel; ?></h4>
                    <?php endif; ?>

                   <?php endif; ?>

                   <?php $acf_ev_judge_person = get_sub_field('acf_ev_judge_person'); /* 審査員名 */ ?>

                   <?php if ($acf_ev_judge_person) : ?>
                    <p class="p-ev__judge-name">
                     <?php echo $acf_ev_judge_person; ?>
                    </p>
                   <?php endif; ?>

                  <?php endif; ?>
                 <?php endwhile; ?>
                </div>
               </div>
              <?php endif; ?>

              <?php $acf_ev_info2 = get_field('acf_ev_info2'); /* 追加・訂正情報（下） */ ?>
              <?php if ($acf_ev_info2) : ?>
               <?php $supbool = true; ?>
               <div class="p-ev_info2">
                <p><?php echo $acf_ev_info2; ?></p>
               </div>
              <?php endif; ?>

              <?php $modified_date = get_the_modified_date('YmdHi'); ?>
              <p class="p-ev__modified_date">更新：<?php the_modified_date('Y年n月j日'); ?></p>
             </li>
            </ul>

           </div>

          </div>
         </li>
        <?php endwhile; ?>
       </ul>

       <div class="p-event-result_modal p-event-modal">
        <div class="p-event-modal__wrapper">
         <div class="p-event-modal__message">
          <div class="p-event-modal__closeBtn js-searchModalClose"></div>
          <div class="p-event-modal__sentence">
           <h4 class="p-event-modal__title">
            比較したいイベントを選択してください
           </h4>
           <p class="p-event-modal__txt">
            イベント情報の右上にあるチェックをいれたイベントのみを並べて確認することができます。
           </p>
          </div>
         </div>
        </div>
       </div>

      </div>
     </form>
    <?php endif; ?>


    <?php if (function_exists('wp_pagenavi')): ?>

     <div class="c-wp_pagenavi l-wp_pagenavi">
      <?php wp_pagenavi(array('query' => $the_query)); ?>
     </div>

    <?php endif; ?>

   </div>



  </section>

  <?php wp_reset_postdata(); ?>


 </div>
</main>





<?php get_footer() ?>