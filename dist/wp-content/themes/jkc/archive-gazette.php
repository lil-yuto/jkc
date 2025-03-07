<?php get_header(); ?>

<main>
 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <div class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">JKCガゼットのご案内</h1>
   </div>
  </div>

 </div>

 <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
  <?php if (function_exists('bcn_display')) {
   bcn_display();
  }; ?>
 </div>

 <div class="l-container l-container--sub">


  <h2 class="c-heading c-heading--lv2">会報誌　愛犬と楽しむ暮らし［家庭犬］JKCガゼットのご案内</h2>

  <?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $post_type_slug = get_post_type();
  $args = array(
   'post_type' => $post_type_slug,
   'posts_per_page' => 10,
   'paged' => $paged,
  );
  $the_query = new Wp_Query($args);
  ?>


  <?php if ($the_query->have_posts()): ?>
   <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

    <h3 class="c-heading c-heading--lv3"><?php the_title(); ?></h3>

    <div class="p-gazette">

     <figure class="p-gazette__img">
      <?php $image_ID = get_field('acf_gazette_cover'); ?>
      <?php if ($image_ID) {
       echo wp_get_attachment_image($image_ID, 'full');
      }
      ?>
     </figure>

     <div class="p-gazette__contents">

      <?php if (get_field('acf_gazette_h1')): ?>
       <h4 class="c-heading c-heading--lv4"><?php echo get_field('acf_gazette_h1'); ?></h4>
      <?php endif; ?>

      <?php if (get_field('acf_gazette_h1_text')): ?>
       <div class="p-gazzette__text">
        <?php echo get_field('acf_gazette_h1_text'); ?>
       </div>
      <?php endif; ?>

      <h4 class="c-heading c-heading--lv4">読み物</h4>

      <?php if (get_field('acf_gazette_yomi_text')): ?>
       <div class="p-gazzette__text">
        <?php echo get_field('acf_gazette_yomi_text'); ?>
       </div>
      <?php endif; ?>

     </div>

    </div>

   <?php endwhile; ?>
  <?php endif; ?>

  <?php if (function_exists('wp_pagenavi')): ?>

   <div class="c-wp_pagenavi l-wp_pagenavi">
    <?php wp_pagenavi(); ?>
   </div>

  <?php endif; ?>


  <?php wp_reset_postdata(); ?>

 </div>

</main>

<?php get_footer() ?>
