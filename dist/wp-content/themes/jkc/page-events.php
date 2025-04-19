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

  <div class="p-event-top l-container l-container--sub">

    <!-- <p class="p-event-top__lead">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p> -->


    <div class="p-event-top__lists c-card-grid-3">
      <div class="c-card-grid c-card-grid--3">

        <?php if (have_rows('acf_event_top')): ?>
          <?php while (have_rows('acf_event_top')): the_row(); ?>

            <article class="c-card-item-style-3 c-card-item-style-3--subgrid">
              <a href="<?php echo esc_url(get_sub_field('acf_event_top_url')); ?>" class="c-card-item-style-3__link" <?php echo get_sub_field('acf_event_top_target') ? 'target="_blank"' : ''; ?>>
                <!-- <div class="c-card-item-style-3__img-wrapper">
                  <?php if (get_sub_field('acf_event_top_img')): ?>
                    <img src='<?php echo esc_url(get_sub_field('acf_event_top_img')); ?>' alt='' width='340' height='156'>
                  <?php else: ?>
                    <img decoding="async" src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg" alt="" />
                  <?php endif; ?>
                </div> -->
                <h4 class="c-card-item-style-3__title"><?php echo esc_html(get_sub_field('acf_event_top_title')); ?></h4>
                <p class="c-card-item-style-3__description"><?php echo esc_html(get_sub_field('acf_event_top_description')); ?></p>
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