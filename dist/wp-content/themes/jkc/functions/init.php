<?php

// 不要なページを404にリダイレクト
function custom_handle_404()
{
  // 検索ページ、作成者ページ、添付ファイルページを無効化
  if (/* is_search() ||  */is_author() || is_attachment()) {
    global $wp_query;
    $wp_query->set_404();
    status_header(404);
    nocache_headers();
  }
}
add_action('template_redirect', 'custom_handle_404');

// RESTAPIのエンドポイントを無効化
function my_filter_rest_endpoints($endpoints)
{
  if (isset($endpoints['/wp/v2/users'])) {
    unset($endpoints['/wp/v2/users']);
  }
  if (isset($endpoints['/wp/v2/users/(?P<id>[¥d]+)'])) {
    unset($endpoints['/wp/v2/users/(?P<id>[¥d]+)']);
  }
  return $endpoints;
}
add_filter('rest_endpoints', 'my_filter_rest_endpoints', 10, 1);

// author／creatorの制御
function knockout_author_query()
{
  // disable author rewrite rule
  global $wp_rewrite;
  $wp_rewrite->flush_rules();
  $wp_rewrite->author_base = '';
  $wp_rewrite->author_structure = '/';
  // for author query request
  if (isset($_REQUEST['author']) && !empty($_REQUEST['author'])) {
    $user_info = get_userdata(intval($_REQUEST['author']));
    if ($user_info && array_key_exists('administrator', $user_info->caps) && in_array('administrator', $user_info->roles)) {
      wp_redirect(home_url());
      exit;
    }
  }
}
add_action('init', 'knockout_author_query');
