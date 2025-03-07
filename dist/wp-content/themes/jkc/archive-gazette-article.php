<?php get_header(); ?>

<main>
 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <hgroup class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">JKCガゼットのご案内</h1>
    <p class="c-page-title__sub">About JKC</p>
   </hgroup>
  </div>

 </div>

 <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
  <?php if (function_exists('bcn_display')) {
   bcn_display();
  }; ?>
 </div>

 <div class="l-container l-container--sub">


  <h2 class="c-heading c-heading--lv2">会報誌　愛犬と楽しむ暮らし［家庭犬］<br>JKCガゼットのご案内</h2>

  <p class="p-gazette-article__txt c-text">会報誌「JKCガゼット」のバックナンバーより、正しい愛犬飼育に必要な情報をまとめた「特集記事」を集めたページ（PDF）です。どうぞお役立てください。</p>

  <?php
  $taxonomy_name = 'gazette-article_category';
  $term_lists = get_terms(array(
   'taxonomy' => $taxonomy_name,
  ));
  foreach ($term_lists as $term_item):
  ?>


   <div class="p-gazette-article__term">
    <h3 class="p-gazette-article__heading--lv3 c-heading c-heading--lv3"><?php echo esc_html($term_item->name); ?></h3>


    <div class="p-gazette-article__lists c-card-grid-3">
     <div class="c-card-grid c-card-grid--3">

      <?php
      $post_type = get_post_type();
      $args = array(
       'post_type' => $post_type,
       'posts_per_page' => -1,
       'tax_query' => array(
        array(
         'taxonomy' => $taxonomy_name,
         'field' => 'slug',
         'terms' => $term_item->slug,
        )
       )
      );
      $the_query = new WP_Query($args);
      ?>

      <?php if ($the_query->have_posts()): ?>
       <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
        <article class="c-card-item-style-3 c-card-item-style-3--subgrid">


         <div class="c-card-item-style-3__img-wrapper c-card-item-style-3__img-wrapper--tall">
          <?php if (get_field('acf_article_cover')): ?>
           <?php echo wp_get_attachment_image(get_field('acf_article_cover'), 'full'); ?>
          <?php else: ?>
           <img decoding="async" src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg" alt="" />
          <?php endif; ?>
         </div>

         <!-- <div class="c-card-item-style-3__content">
          <hgroup class="c-card-item-style-3__title-group c-card-item-style-3__title-group--subgrid"> -->
           <h4 class="c-card-item-style-3__title u-text-align-center"><?php the_title(); ?></h4>
           <?php if (get_field('acf_article_published')): ?>
            <p class="c-card-item-style-3__subtitle"><?php the_field('acf_article_published'); ?></p>
           <?php endif; ?>
          <!-- </hgroup> -->

          <?php if (get_field('acf_article_text')): ?>
           <p class="c-card-item-style-3__description"><?php the_field('acf_article_text'); ?></p>
          <?php endif; ?>
          <?php if (get_field('acf_article_pdf')): ?>
           <div class="c-card-item-style-3__button-wrapper">
            <a href="<?php echo esc_url(get_field('acf_article_pdf')); ?>" class="c-card-item-style-3__button" target="_blank">詳しく見る</a>
           </div>
          <?php endif; ?>
         <!-- </div> -->

        </article>

       <?php endwhile; ?>
      <?php endif; ?>

     </div>
    </div>
   </div>

  <?php endforeach; ?>

  <?php wp_reset_postdata(); ?>

  <p class="p-gazette-article__message c-text has-light-green-background-color">
   会報誌「JKCガゼット」のバックナンバーより、正しい愛犬飼育に必要な情報をまとめた「特集記事」を集めたページ（PDF）です。どうぞお役立てください。
  </p>


 </div>

</main>

<?php get_footer() ?>