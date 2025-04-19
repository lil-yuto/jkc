<?php get_header(); ?>


<main>

  <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main">犬の知識</h1>
      </div>
    </div>

  </div>


  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>

  <div class="p-doginfo l-container l-container--sub">

    <!-- <p class="p-doginfo__lead">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p> -->


    <?php
    $post_type_slug = get_post_type();
    $kids_page_data = get_page_by_path('kids', OBJECT, $post_type_slug);
    $args = array(
      'post_type' => $post_type_slug,
      'posts_per_page' => -1,
      'post_parent' => 0,
    );
    $the_query = new WP_Query($args);
    ?>

    <div class="p-doginfo__lists c-card-grid-3">
      <div class="c-card-grid c-card-grid--3">

        <?php if ($the_query->have_posts()): ?>
          <?php while ($the_query->have_posts()): ?>
            <?php $the_query->the_post();
              // リンク先とターゲット属性を決定
              $link_url = '';
              $target = '';

              // 優先度順にリンク先を判定
              $pdf_file = get_field('acf_doginfo_pdf');
              if (!empty($pdf_file) && is_array($pdf_file)) {
                // ファイル配列からURLを取得
                $link_url = $pdf_file['url'];
                // ターゲット設定を確認
                if (get_field('acf_doginfo_target')) {
                  $target = ' target="_blank" rel="noopener noreferrer"';
                }
              } elseif ($external_url = get_field('acf_doginfo_url')) {
                $link_url = $external_url;
                // ターゲット設定を確認
                if (get_field('acf_doginfo_target')) {
                  $target = ' target="_blank" rel="noopener noreferrer"';
                }
              } else {
                $link_url = get_the_permalink();
              }
            ?>

            <article class="c-card-item-style-3 c-card-item-style-3--subgrid">
              <a href="<?php echo esc_url($link_url); ?>" class="c-card-item-style-3__link"<?php echo $target; ?>>
                <!-- <?php if (has_post_thumbnail()): ?>
                  <div class="c-card-item-style-3__img-wrapper">
                    <img src='<?php the_post_thumbnail_url(); ?>' alt='' width='340' height='156'>
                  </div>
                <?php endif; ?> -->
                <h4 class="c-card-item-style-3__title"><?php the_title(); ?></h4>
                <p class="c-card-item-style-3__description"><?php the_excerpt(); ?></p>
                <div class="c-card-item-style-3__button-wrapper">
                  <button class="c-card-item-style-3__button">詳しく見る</button>
                </div>
              </a>
            </article>

          <?php endwhile; ?>
        <?php endif; ?>

        <?php wp_reset_postdata(); ?>


      </div>
    </div>



  </div>


</main>


<?php get_footer(); ?>
