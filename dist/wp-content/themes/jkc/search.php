<?php get_header(); ?>

<div id="container" class="wrapper">
  <main>
    <div class="p-sub-fv l-sub-fv">

      <div class="p-sub-fv__container l-container">
        <div class="p-sub-fv__title c-page-title">
          <h1 class="c-page-title__main">検索結果</h1>
        </div>
      </div>

    </div>

    <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
      <?php if (function_exists('bcn_display')) {
        bcn_display();
      }; ?>
    </div>

    <div class="l-container l-container--sub">
      <?php if (have_posts()): ?>
        <?php if (!$_GET['s']) { ?>
          <p>検索キーワードが未入力です</p>

        <?php } else { ?>
          <div class="wp-block-jkc-block-heading">
            <h2 class="c-post-heading c-post-heading--lv2">「<?php echo esc_html($_GET['s']); ?>」の検索結果：<?php echo $wp_query->found_posts; ?>件</h2>
          </div>

          <ul class="p-posts__list">
            <?php while (have_posts()): the_post(); ?>
              <li>
                <a href="<?php echo get_permalink(); ?>" class="p-posts__item">
                  <p class="p-posts__title"><?php the_title(); ?></p>
                </a>
              </li>
            <?php endwhile; ?>
          </ul>

          <?php if (function_exists('wp_pagenavi')): ?>
            <div class="c-wp_pagenavi l-wp_pagenavi">
              <?php wp_pagenavi(); ?>
            </div>
          <?php endif; ?>
        <?php } ?>
      <?php else: ?>
        <p>検索されたキーワードに一致する記事はありませんでした</p>

      <?php endif; ?>
    </div>
  </main>
</div>

<?php get_footer() ?>
