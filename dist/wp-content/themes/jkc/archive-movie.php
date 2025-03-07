<?php get_header(); ?>

<main>
  <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main">ジャパンケネルクラブチャンネル</h1>
      </div>
    </div>

  </div>

  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>

  <div class="p-movie l-container l-container--sub">
    <p class="p-movie__lead c-text">JKCの活動や犬に関する様々な動画をご紹介します。</p>

    <div class="p-movie__lists c-card-grid-4">
      <div class="c-card-grid c-card-grid--4">

        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>

            <a href="<?php the_permalink(); ?>" class="c-card-item-style-4">
              <div class="c-card-item-style-4__img-wrapper">
                <?php if (has_post_thumbnail()) : ?>
                  <img src='<?php the_post_thumbnail_url(); ?>' alt='' width='255' height='180'>
                <?php else : ?>
                  <img decoding="async" src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg" alt="" />
                <?php endif; ?>
              </div>
              <h4 class="c-card-item-style-4__title"><?php the_title(); ?></h4>
              <p class="c-card-item-style-4__description"><?php echo wp_trim_words(get_the_excerpt(), 50); ?></p>
              <div class="c-card-item-style-4__button-wrapper">
                <button class="c-card-item-style-4__button">動画を見る</button>
              </div>
            </a>

          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>

    <?php if (function_exists('wp_pagenavi')): ?>

      <div class="c-wp_pagenavi l-wp_pagenavi">
        <?php wp_pagenavi(); ?>
      </div>

    <?php endif; ?>

  </div>

</main>

<?php get_footer(); ?>
