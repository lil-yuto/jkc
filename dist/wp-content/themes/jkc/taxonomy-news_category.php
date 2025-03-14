<?php get_header(); ?>

<main>
  <div class="p-sub-fv l-sub-fv">
    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main">お知らせ</h1>
      </div>
    </div>
  </div>

  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>

  <div class="l-container l-container--sub">
    <h2 class="c-heading c-heading--lv2"><?php single_term_title(); ?></h2>

    <section class="p-news">
      <div class="p-news__container l-container">
        <div class="p-news__content">
          <div class="p-news__categories">
            <ul class="p-news__category-list">
              <li>
                <a href="<?php echo get_post_type_archive_link('news'); ?>"
                  class="p-news__category-link c-label-white">
                  全て
                </a>
              </li>
              <?php
              $terms = get_terms([
                'taxonomy' => 'news_category',
                'hide_empty' => true, // 投稿のないタームを除外
              ]);
              foreach ($terms as $term) :
              ?>
                <li>
                  <a href="<?php echo get_term_link($term); ?>"
                    class="p-news__category-link c-label-white <?php echo (is_tax('news_category', $term->term_id)) ? 'is-selected' : ''; ?>">
                    <?php echo $term->name; ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="p-news__posts p-posts">
            <ul class="p-posts__list">
              <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();
                  // カテゴリーを取得
                  $terms = get_the_terms(get_the_ID(), 'news_category');
                  $category_name = $terms ? $terms[0]->name : '';

                  // リンク先とターゲット属性を決定
                  $link_url = '';
                  $target = '';

                  // 優先度順にリンク先を判定
                  $pdf_file = get_field('acf_news_pdf');
                  if (!empty($pdf_file) && is_array($pdf_file)) {
                    // ファイル配列からURLを取得
                    $link_url = $pdf_file['url'];
                    // ターゲット設定を確認
                    if (get_field('acf_news_target')) {
                      $target = ' target="_blank" rel="noopener noreferrer"';
                    }
                  } elseif ($external_url = get_field('acf_news_url')) {
                    $link_url = $external_url;
                    // ターゲット設定を確認
                    if (get_field('acf_news_target')) {
                      $target = ' target="_blank" rel="noopener noreferrer"';
                    }
                  } else {
                    $link_url = get_the_permalink();
                  }
                ?>
                  <li>
                    <a href="<?php echo esc_url($link_url); ?>" class="p-posts__item" <?php echo $target; ?>>
                      <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="p-posts__date"><?php echo get_the_date('Y.n.j'); ?></time>
                      <p class="p-posts__category"><?php echo $category_name; ?></p>
                      <p class="p-posts__title"><?php the_title(); ?></p>
                    </a>
                  </li>
                <?php endwhile; ?>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <?php if (function_exists('wp_pagenavi')): ?>
      <div class="c-wp_pagenavi l-wp_pagenavi">
        <?php wp_pagenavi(); ?>
      </div>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
