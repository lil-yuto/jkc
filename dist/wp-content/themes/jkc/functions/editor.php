<?php

add_action("init", "editor_init");

function editor_init()
{
  // アイキャッチ画像の有効化
  add_theme_support("post-thumbnails");
}

// 独自のカラーパレットを設定
add_theme_support('editor-color-palette', array(
  array(
    'name' => __('Green', 'themeLangDomain'),
    'slug' => 'Green',
    'color' => '#0A6934',
  ),
  array(
    'name' => __('Light Green', 'themeLangDomain'),
    'slug' => 'light-green',
    'color' => '#EDF5EF',
  ),
  array(
    'name' => __('Red', 'themeLangDomain'),
    'slug' => 'Red',
    'color' => '#C83030',
  ),
  array(
    'name' => __('light Red', 'themeLangDomain'),
    'slug' => 'light-red',
    'color' => '#FFEBEB',
  ),
  array(
    'name' => __('Gray', 'themeLangDomain'),
    'slug' => 'gray',
    'color' => '#898989',
  ),
  array(
    'name' => __('Light Gray', 'themeLangDomain'),
    'slug' => 'light-gray',
    'color' => '#F7F7F7',
  ),
  array(
    'name' => __('Light Yellow', 'themeLangDomain'),
    'slug' => 'light-yellow',
    'color' => '#FFFBD9',
  ),
));

define('ALLOW_CORE_BLOCKS', [
  // "core/paragraph",
  "core/image",
  // "core/heading",
  "core/gallery",
  // "core/list",
  "core/list-item",
  // "core/quote",
  // "core/archives",
  // "core/audio",
  // "core/button",
  // "core/buttons",
  // "core/calendar",
  // "core/categories",
  // "core/code",
  // "core/column",
  // "core/columns",
  // "core/cover",
  // "core/details",
  // "core/embed",
  // "core/file",
  "core/group",
  "core/html",
  // "core/latest-comments",
  // "core/latest-posts",
  // "core/media-text",
  // "core/missing",
  // "core/more",
  // "core/nextpage",
  // "core/page-list",
  // "core/page-list-item",
  // "core/pattern",
  // "core/preformatted",
  // "core/pullquote",
  // "core/block",
  // "core/rss",
  // "core/search",
  // "core/separator",
  "core/shortcode",
  // "core/social-link",
  // "core/social-links",
  // "core/spacer",
  // "core/table",
  // "core/tag-cloud",
  // "core/text-columns",
  // "core/verse",
  // "core/video",
  // "core/footnotes",
  // "core/navigation",
  // "core/navigation-link",
  // "core/navigation-submenu",
  // "core/site-logo",
  // "core/site-title",
  // "core/site-tagline",
  // "core/query",
  // "core/template-part",
  // "core/avatar",
  // "core/post-title",
  // "core/post-excerpt",
  // "core/post-featured-image",
  // "core/post-content",
  // "core/post-author",
  // "core/post-author-name",
  // "core/post-date",
  // "core/post-terms",
  // "core/post-navigation-link",
  // "core/post-template",
  // "core/query-pagination",
  // "core/query-pagination-next",
  // "core/query-pagination-numbers",
  // "core/query-pagination-previous",
  // "core/query-no-results",
  // "core/read-more",
  // "core/comments",
  // "core/comment-author-name",
  // "core/comment-content",
  // "core/comment-date",
  // "core/comment-edit-link",
  // "core/comment-reply-link",
  // "core/comment-template",
  // "core/comments-title",
  // "core/comments-pagination",
  // "core/comments-pagination-next",
  // "core/comments-pagination-numbers",
  // "core/comments-pagination-previous",
  // "core/post-comments-form",
  // "core/home-link",
  // "core/loginout",
  // "core/term-description",
  // "core/query-title",
  // "core/post-author-biography",
  // "core/freeform",
  // "core/legacy-widget",
  // "core/widget-group"
]);

define('ALLOW_VENDER_BLOCKS', [
  'flexible-table-block/table',
  'insert-pages/block'
]);

// 許可するブロックを指定
function allowed_block_types_all($allowed_block_types)
{
  $allowed_block_types = array_merge(
    ALLOW_CORE_BLOCKS,
    ALLOW_VENDER_BLOCKS,
    [
    "jkc-block/accordion",
    "jkc-block/accordion-item",
    "jkc-block/anchor-link",
    "jkc-block/anchor-link-item",
    "jkc-block/anchor-link-item-small",
    "jkc-block/anchor-link-small",
    "jkc-block/button",
    "jkc-block/button-item",
    "jkc-block/card-grid-1",
    "jkc-block/card-grid-2",
    "jkc-block/card-grid-3",
    "jkc-block/card-grid-4",
    "jkc-block/card-item-style-1",
    "jkc-block/card-item-style-2",
    "jkc-block/card-item-style-3",
    "jkc-block/card-item-style-4",
    "jkc-block/contact",
    "jkc-block/flow-horizontal",
    "jkc-block/flow-horizontal-title",
    "jkc-block/flow-horizontal-title-text",
    "jkc-block/flow-vertical",
    "jkc-block/flow-vertical-item",
    "jkc-block/flow-vertical-item-text",
    "jkc-block/heading",
    "jkc-block/list-ordered",
    "jkc-block/list-unordered",
    "jkc-block/media-text",
    "jkc-block/media-text-ex",
    "jkc-block/reference-info",
    "jkc-block/tab",
    "jkc-block/tab-item",
    "jkc-block/text",
    "jkc-block/text-link",
    "jkc-block/text-link-item",
    "jkc-block/definition-list",
    "jkc-block/definition-item",
    "jkc-block/youtube",
    "jkc-block/contest",
    "jkc-block/contest-item",
  ]);
  return $allowed_block_types;
}
add_filter('allowed_block_types', 'allowed_block_types_all');
