<?php get_header(); ?>

<main>
  <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main"><?php the_title(); ?></h1>
      </div>
    </div>

  </div>

  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>

  <div class="l-container l-container--sub">
    <p class="c-text u-text-align-right">
      <?php echo esc_html(get_the_date('Y.m.d')); ?>
    </p>
    <?php the_content(); ?>

    <div class="p-jblog-navigation">
      <div class="p-jblog-navigation__next-prev-link">
        <div class="p-jblog-navigation__item">
          <?php
          $next_post = get_adjacent_post(false, '', false);
          if (!empty($next_post)) :
          ?>
            <a class="p-jblog-navigation__link p-jblog-navigation__link--next" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">次の記事へ</a>
          <?php endif; ?>
        </div>
        <div class="p-jblog-navigation__item">
          <?php
          $prev_post = get_adjacent_post(false, '', true);
          if (!empty($prev_post)) :
          ?>
            <a class="p-jblog-navigation__link p-jblog-navigation__link--prev" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">前の記事へ</a>
          <?php endif; ?>
        </div>
      </div>
      <div class="p-jblog-navigation__archive-link">
        <?php
        // カスタム投稿タイプのアーカイブページURLを取得
        $archive_url = get_post_type_archive_link('jblog');
        ?>
        <div class="p-jblog-navigation__item">
          <a href="<?php echo esc_url($archive_url); ?>" class="p-jblog-navigation__link p-jblog-navigation__link--archive">一覧へ戻る</a>
        </div>
      </div>
    </div>

  </div>

</main>

<?php get_footer() ?>
