<?php get_header(); ?>

<main>
  <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main">
          <?php
          // 404ページを固定ページから取得して、表示する
          $slug = '404-not-found';
          $content_post = get_post(get_page_by_path($slug, OBJECT, 'page')->ID);
          if ($content_post) {
            setup_postdata($GLOBALS['post'] = &$content_post);
            the_title();
            // タイトル表示後にリセット
            wp_reset_postdata();
          } else {
            echo 'ページが見つかりません';
          }
          ?>
        </h1>
      </div>
    </div>

  </div>

  <div class="l-container l-container--sub">
    <?php
    if (isset($content_post) && $content_post) {
      // コンテンツ表示のために再度セットアップ
      setup_postdata($GLOBALS['post'] = &$content_post);
      the_content();
      wp_reset_postdata();
    }
    ?>
  </div>

</main>

<?php get_footer() ?>
