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
    <h2 class="c-heading c-heading--lv2">全て</h2>

    <section class="p-news">
      <div class="p-news__container l-container">
        <div class="p-news__content">
          <div class="p-news__categories">
            <ul class="p-news__category-list">
              <li>
                <a href="<?php echo get_post_type_archive_link('news'); ?>"
                  class="p-news__category-link c-label-white <?php echo (is_post_type_archive('news')) ? 'is-selected' : ''; ?>">
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
                    class="p-news__category-link c-label-white">
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
                ?>
                  <li>
                    <a href="<?php the_permalink(); ?>" class="p-posts__item">
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

<?php get_footer() ?>
