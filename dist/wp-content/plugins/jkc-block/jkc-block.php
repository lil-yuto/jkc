<?php

/**
 * Plugin Name:       Jkc Block
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.3.1
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       jkc-block
 *
 * @package CreateBlock
 */

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// CDN用のLity読み込み
function jkc_block_enqueue_lity() {
  wp_enqueue_style( 'lity-css', 'https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.css', array(), '2.4.1' );
  wp_enqueue_script( 'lity-js', 'https://cdnjs.cloudflare.com/ajax/libs/lity/2.4.1/lity.min.js', array( 'jquery' ), '2.4.1', true );
}
add_action( 'wp_enqueue_scripts', 'jkc_block_enqueue_lity' );

// ブロックの登録
function create_block_jkc_block_block_init()
{
  $blocks = [
    'youtube',                      // YouTube
    'text',                         // テキスト
    'heading',                      // 見出し
    'button',                       // ボタン
    'button-item',                  // ボタン/アイテム
    'media-text',                   // 画像/テキスト
    'media-text-ex',                   // 画像/テキスト
    'list-unordered',               // リスト（順序なし）
    'list-ordered',                 // リスト（順序あり）
    'card-grid-1',                  // カード/1列
    'card-grid-2',                  // カード/2列
    'card-grid-3',                  // カード/3列
    'card-grid-4',                  // カード/4列
    'contest',                      // コンテスト
    'contest-item',                 // コンテスト/アイテム
    'card-item-style-1',            // カード
    'card-item-style-2',            // カード（スタイル2）
    'card-item-style-3',            // カード（スタイル3）
    'card-item-style-4',            // カード（スタイル4）
    'text-link',                    // テキストリンク
    'text-link-item',               // テキストリンク/アイテム
    'definition-list',              // 説明リスト
    'definition-item',              // 説明リスト/アイテム
    'anchor-link',                  // アンカーリンク
    'anchor-link-item',             // アンカーリンク/アイテム
    'anchor-link-item-small',       // アンカーリンク（小）/アイテム
    'anchor-link-small',            // アンカーリンク（小）
    'flow-horizontal',              // 流れ（横）
    'flow-horizontal-title',        // 流れ（横）/タイトル
    'flow-horizontal-title-text',   // 流れ（横）/タイトル＋概要
    'flow-vertical',                // 流れ（縦）
    'flow-vertical-item',           // 流れ（縦）/アイテム
    'flow-vertical-item-text',      // 流れ（縦）/アイテム（テキストのみ）
    'accordion',                    // アコーディオン
    'accordion-item',               // アコーディオン/アイテム
    'tab',                          // タブ
    'tab-item',                     // タブ/アイテム
    'contact',                      // お問い合わせ
    'reference-info',               // 参考情報
  ];

  // ブロックを順番に登録
  foreach ($blocks as $block) {
    register_block_type(plugin_dir_path(__FILE__) . "build/blocks/" . $block);
  }
}
add_action('init', 'create_block_jkc_block_block_init');

function jkc_add_custom_block_category($categories)
{
  return array_merge(
    $categories,
    array(
      array(
        'slug'  => 'jkc-block',
        'title' => '一般社団法人ジャパンケネルクラブ(JKC)',
      ),
    )
  );
}
add_filter('block_categories_all', 'jkc_add_custom_block_category', 10, 2);
