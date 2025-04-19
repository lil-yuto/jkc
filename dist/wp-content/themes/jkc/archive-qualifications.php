<?php get_header(); ?>


<main>

  <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main">JKC公認資格</h1>
      </div>
    </div>

  </div>


  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>

  <div class="p-qualifications l-container l-container--sub">

    <!-- <p class="p-qualifications__lead c-text u-text-align-center">テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。<br>テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。テキストが入ります。</p> -->


    <div class="c-anchor-link">

      <div class="c-anchor-button">


        <ul class="c-anchor-button__items">

          <?php
          $terms = get_terms(array(
            'taxonomy' => 'qualifications_category',
            'hide_empty' => true,
          ));
          ?>

          <?php foreach ($terms as $term) : ?>
            <li class="c-anchor-link-item">
              <div class="c-anchor-button-item">
                <a class="c-anchor-button-item__link" href="#<?php echo esc_html($term->slug); ?>"><?php echo esc_html($term->name); ?></a>
              </div>
            </li>

          <?php endforeach; ?>

        </ul>

      </div>
    </div>




    <?php foreach ($terms as $term): ?>
      <article id="<?php echo esc_html($term->slug); ?>" class="p-generalinfo__term">

        <h2 class="c-heading c-heading--lv2"><?php echo esc_html($term->name); ?></h2>

        <p class="p-generalinfo__lead"><?php echo nl2br(esc_html($term->description)); ?></p>

        <?php
        $post_type_slug = get_post_type();
        $args = array(
          'post_type' => $post_type_slug,
          'posts_per_page' => -1,
          'taxonomy' => 'qualifications_category',
          'term' => $term->slug
        );
        $the_query = new WP_Query($args);
        ?>

        <div class="p-generalinfo__lists c-card-grid-3">
          <div class="c-card-grid c-card-grid--3">

            <?php if ($the_query->have_posts()): ?>
              <?php while ($the_query->have_posts()): ?>
                <?php $the_query->the_post(); ?>

                <article class="c-card-item-style-3">
                  <a href="<?php the_permalink(); ?>" class="c-card-item-style-3__link">

                    <div class="c-card-item-style-3__img-wrapper">
                      <?php if (get_the_post_thumbnail()): ?>
                        <img src='<?php echo esc_url(get_the_post_thumbnail_url()); ?>' alt='' width='340' height='156'>
                      <?php else: ?>
                        <img decoding="async" src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg" alt="" />
                      <?php endif; ?>
                    </div>

                    <div class="c-card-item-style-3__content">



                      <h4 class="c-card-item-style-3__title"><?php echo the_title(); ?></h4>
                      <?php if (get_the_excerpt()): ?>
                        <p class="c-card-item-style-3__description"><?php echo esc_html(get_the_excerpt()); ?></p>
                      <?php endif; ?>
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

      </article>

    <?php endforeach; ?>


  </div>


</main>


<?php get_footer(); ?>
