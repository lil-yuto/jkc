<?php
// ダッシュボード内のカスタマイズ用
/**
 * News投稿一覧にpickupカラムを追加
 */
function add_news_pickup_column($columns) {
  $columns['news_pickup'] = 'ピックアップ';
  return $columns;
}
add_filter('manage_news_posts_columns', 'add_news_pickup_column');

/**
* pickupカラムの内容を表示
*/
function display_news_pickup_column($column, $post_id) {
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
