<?php get_header(); ?>


<main>

  <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <div class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">総合案内</h1>
   </div>
  </div>

  </div>


  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>

  <div class="p-generalinfo l-container l-container--sub">

    <h5 class="c-heading c-heading--lv5 u-text-align-center">どんな情報をお求めですか？</h5>


    <div class="c-anchor-link">

      <div class="c-anchor-button">

        <ul class="c-anchor-button__items c-anchor-button__items--column4">

          <?php
          $terms = get_terms(array(
            'taxonomy' => 'generalinfo_category',
            'hide_empty' => false,
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

    <?php
    $post_type = get_post_type();
    $the_query = new WP_Query(array(
      'post_type' => $post_type,
      'posts_per_page' => 1,
      'publish' => false,
    ));
    if ($the_query->have_posts()):
      while ($the_query->have_posts()): $the_query->the_post();
        $contents_all_lists = get_field_object('acf_generalinfo_type')['choices'];
      endwhile;
    endif;
    ?>

    <div class="p-generalinfo__type c-contents-type">
      <p class="c-contents-type__title">コンテンツの分類</p>
      <div class="c-contents-type__wrapper">
        <?php foreach ($contents_all_lists as $content_key => $content_value): ?>
          <?php
          $ico_url = "/assets/images/common/cmn-contents-type-" . $content_key . ".png";
          ?>

          <div class="c-contents-type__type">

            <figure class="c-contents-type__img">
              <img src="<?php echo get_template_directory_uri() . $ico_url; ?>" alt='<?php echo esc_html($content['label']); ?>' width='32' height='32'>
            </figure>

            <p class="c-contents-type__name"><?php echo esc_html($content_value); ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

   </article>


    <?php foreach ($terms as $term): ?>
      <article id="<?php echo esc_html($term->slug); ?>" class="p-generalinfo__term">

        <h2 class="c-heading c-heading--lv2"><?php echo esc_html($term->name); ?></h2>

        <p class="p-generalinfo__lead"><?php echo nl2br(esc_html($term->description)); ?></p>

        <?php
        $post_type_slug = get_post_type();
        $args = array(
          'post_type' => $post_type_slug,
          'posts_per_page' => -1,
          'taxonomy' => 'generalinfo_category',
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
                  <a href="<?php echo esc_url(get_field('acf_generalinfo_url')); ?>" class="c-card-item-style-3__link" <?php echo get_field('acf_generalinfo_target') ? 'target=_blank' : ""; ?>>
                    <div class="c-card-item-style-3__img-wrapper">
                      <?php if (get_the_post_thumbnail()): ?>
                        <img src='<?php echo esc_url(get_the_post_thumbnail_url()); ?>' alt='' width='340' height='156'>
                      <?php else: ?>
                        <img decoding="async" src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg" alt="" />
                      <?php endif; ?>
                    </div>
                    <div class="c-card-item-style-3__content">
                      <div class="c-card-item-style-3__type-wrapper">
                        <?php $types = get_field('acf_generalinfo_type'); ?>
                        <?php foreach ($types as $type): ?>
                          <?php $type_ico_url = "/assets/images/common/cmn-contents-type-" . $type['value'] . ".png";
                          ?>
                          <figure class="c-card-item-style-3__contents-type">
                            <img src='<?php echo get_template_directory_uri() . $type_ico_url; ?>' alt='<?php echo esc_html($type['label']); ?>' width='32' height='32'>
                          </figure>
                        <?php endforeach; ?>
                      </div>
                      <h4 class="c-card-item-style-3__title"><?php echo esc_html(the_title()); ?></h4>
                      <p class="c-card-item-style-3__description"><?php echo esc_html(get_field('acf_generalinfo_description')); ?></p>
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

</main>


<?php get_footer(); ?>
