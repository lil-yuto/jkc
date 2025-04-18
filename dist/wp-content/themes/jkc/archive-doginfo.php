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

    <p class="p-doginfo__lead">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p>


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
            <?php $the_query->the_post(); ?>



            <article class="c-card-item-style-3">
              <a href="<?php the_permalink(); ?>" class="c-card-item-style-3__link">
                <div class="c-card-item-style-3__img-wrapper">
                  <?php if (has_post_thumbnail()): ?>
                    <img src='<?php the_post_thumbnail_url(); ?>' alt='' width='340' height='156'>
                  <?php else: ?>
                    <img decoding="async" src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg" alt="" />
                  <?php endif; ?>
                </div>
                <div class="c-card-item-style-3__content">
                  <h4 class="c-card-item-style-3__title"><?php the_title(); ?></h4>
                  <p class="c-card-item-style-3__description"><?php the_excerpt(); ?></p>
                  <div class="c-card-item-style-3__button-wrapper">
                    <button class="c-card-item-style-3__button">詳しく見る</button>
                  </div>
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
