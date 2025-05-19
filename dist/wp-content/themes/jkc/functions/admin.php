<?php
// ダッシュボード内のカスタマイズ用
/**
 * News投稿一覧にpickupカラムを追加
 */
function add_news_pickup_column($columns)
{
  $columns['news_pickup'] = 'ピックアップ';
  return $columns;
}
add_filter('manage_news_posts_columns', 'add_news_pickup_column');

/**
 * pickupカラムの内容を表示
 */
function display_news_pickup_column($column, $post_id)
{
  if ($column === 'news_pickup') {
    $pickup = get_field('acf_news_pickup', $post_id);
    if ($pickup) {
      echo '<span style="color:#2271b1;">&#10004; 表示する</span>';
    } else {
      echo '—';
    }
  }
}
add_action('manage_news_posts_custom_column', 'display_news_pickup_column', 10, 2);

// // 投稿一覧カラムを定義（イベントスケジュール）
function manage_posts_event($columns)
{
  $get_posttype = esc_html(get_post_type_object(get_post_type())->name);
  if ($get_posttype == 'event_schedule') { // イベントスケジュール投稿一覧に適用
    $columns = array(
      'cb' => 'チェックボックス',
      'title' => 'イベント名',
      'acf_ev_date' => '開催日',
      'postid' => '投稿ID',
      'taxonomy-event_category' => 'カテゴリー',
      'taxonomy-event_area' => '都道府県',
      'acf_ev_place' => '会場',
      'acf_ev_office' => '事務所',
      // 'menu_order' => 'メニューオーダー',
      'event_number' => 'オーダー',
    );
  }
  return $columns;
}
add_filter('manage_edit-event_schedule_columns', 'manage_posts_event');

// // 投稿一覧カラムを表示（イベントスケジュール）
function manage_add_event($column_name, $post_id)
{
  $get_posttype = esc_html(get_post_type_object(get_post_type())->name);
  if ($get_posttype == 'event_schedule') {
    switch ($column_name) {
      case 'acf_ev_date': // 開催日
        // ACF専用関数を使ってフィールド値を取得
        $stitle = get_field('acf_ev_date', $post_id);
        if (!$stitle) {
          // バックアップとしてpost_metaを使用
          $stitle = get_post_meta($post_id, 'acf_ev_date', true);
        }
        // 日付形式に変換して表示
        if ($stitle) {
          $Ymd = date("Y年m月d日", strtotime($stitle));
          $week = array('日', '月', '火', '水', '木', '金', '土');
          $w = date("w", strtotime($stitle));
          $stitle = $Ymd . '(' . $week[$w] . ')';
        }
        break;
      // case 'menu_order': // メニューオーダー
      //   $post_data = get_post($post_id);
      //   $stitle = $post_data->menu_order;
      //   break;
      case 'postid':
        $stitle = $post_id;
        break; // 投稿ID
      case 'taxonomy-event_category':
        $stitle = get_post_meta($post_id, 'taxonomy-event_category', true);
        break; // カテゴリー
      case 'taxonomy-event_area':
        $stitle = get_post_meta($post_id, 'taxonomy-event_area', true);
        break; // 都道府県
      case 'acf_ev_place':
        $stitle = get_post_meta($post_id, 'acf_ev_place', true);
        break; // 会場
      case 'acf_ev_office':
        $stitle = get_post_meta($post_id, 'acf_ev_office', true);
        break; // 事務所
      case 'event_number':
        $stitle = get_post_meta($post_id, 'event_number', true);
        break;
    }
    if (isset($stitle) && $stitle) {
      echo attribute_escape($stitle);
    } else {
      echo __('None');
    }
  }
}
add_action('manage_posts_custom_column', 'manage_add_event', 10, 2);

// // イベントスケジュール「開催日」フィールドで新しい日付順に強制的に表示を適用
function custom_admin_order($query)
{
  if (
    is_admin() &&
    $query->is_main_query() &&
    $query->get('post_type') === 'event_schedule' &&
    !isset($_GET['orderby'])
  ) {
    $meta_query = array(
      'relation' => 'AND',
      'acf_ev_date_clause' => array(
        'key' => 'acf_ev_date',
        'compare' => 'EXISTS',
        'type' => 'DATE',
      ),
      array(
        'relation' => 'OR',
        'event_number_exists' => array(
          'key' => 'event_number',
          'compare' => 'EXISTS',
          'type' => 'NUMERIC',
        ),
        'event_number_not_exists' => array(
          'key' => 'event_number',
          'compare' => 'NOT EXISTS',
        ),
      ),
    );

    $query->set('meta_query', $meta_query);

    $query->set('orderby', array(
      'acf_ev_date_clause' => 'DESC',
      'event_number_exists' => 'ASC',  // 空白は後ろに来る
    ));
  }
}
add_action('pre_get_posts', 'custom_admin_order');




// イベントスケジュール「開催日」フィールドでソート機能を適用
function column_orderby_custom($vars)
{
  if (isset($vars['orderby']) && 'acf_ev_date' == $vars['orderby']) {
    $vars = array_merge($vars, array(
      'meta_key' => 'acf_ev_date',
      'orderby' => 'meta_value',
      'meta_type' => 'DATE' // 日付データとして認識させる
    ));
  }
  // メニューオーダーでのソート
  if (isset($vars['orderby']) && 'menu_order' == $vars['orderby']) {
    $vars = array_merge($vars, array(
      'orderby' => 'menu_order'
    ));
  }
  return $vars;
}
add_filter('request', 'column_orderby_custom');

// ソート可能なカラムを登録（管理画面のカラムヘッダーをクリック可能にする）
// function posts_register_sortable($sortable_column)
// {
//   $sortable_column['acf_ev_date'] = 'acf_ev_date';
//   $sortable_column['menu_order'] = 'menu_order';
//   return $sortable_column;
// }
// add_filter('manage_edit-event_schedule_sortable_columns', 'posts_register_sortable');

register_nav_menus([
  'aboutus' => 'JKCの活動内容',
  'pedigrees' => '血統証明書について',
  'event' => 'イベント',
  'doginfo' => '犬の知識',
  'kids' => 'こども向けコンテンツ',
  'qualifications' => 'JKC公認資格',
  'merchandise' => '刊行物',
]);

function add_page_attributes_to_event_schedule()
{
  add_post_type_support('event_schedule', 'page-attributes');
}
add_action('init', 'add_page_attributes_to_event_schedule');
