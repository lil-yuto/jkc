<?php get_header(); ?>

<main>
 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <hgroup class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">ジャックブログ</h1>
    <p class="c-page-title__sub">Jack Blog</p>
   </hgroup>
  </div>

 </div>

 <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
  <?php if (function_exists('bcn_display')) {
   bcn_display();
  }; ?>
 </div>


 <div class="p-jblog l-container l-container--sub">

  <h2 class="c-heading c-heading--lv2">ジャックブログ</h2>

  <?php
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $post_type_slug = get_post_type();
  $args = array(
   'post_type' => $post_type_slug,
   'posts_per_page' => 10,
   'paged' => $paged,
  );
  $the_query = new WP_Query($args);
  ?>

  <div class="p-jblog__lists c-card-grid-3">
   <div class="c-card-grid c-card-grid--3">

    <?php if ($the_query->have_posts()): ?>
     <?php while ($the_query->have_posts()): ?>
      <?php $the_query->the_post(); ?>


      <article class="c-card-item-style-blog-3">
       <a href="<?php the_permalink(); ?>" class="c-card-item-style-blog-3__link">
        <div class="c-card-item-style-blog-3__img-wrapper">
         <?php if (get_the_post_thumbnail_url()): ?>
          <img src='<?php echo esc_url(get_the_post_thumbnail_url()); ?>' alt='' width='340' height='225'>
         <?php else: ?>
          <img decoding="async" src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg" alt="No-Image" width='340' height='225' />
         <?php endif; ?>
        </div>
        <div class="c-card-item-style-blog-3__content">
         <time datetime="<?php echo get_the_time('Y-m-d'); ?>" class="c-card-item-style-blog-3__date"><?php echo get_the_date('Y.m.d'); ?></time>
         <h4 class="c-card-item-style-blog-3__title"><?php the_title(); ?></h4>
         <div class="c-card-item-style-blog-3__button-wrapper">
          <button class="c-card-item-style-blog-3__button">詳しく見る</button>
         </div>
        </div>
       </a>
      </article>


     <?php endwhile; ?>
    <?php endif; ?>


   </div>
  </div>


  <?php if (function_exists('wp_pagenavi')): ?>

   <div class="c-wp_pagenavi l-wp_pagenavi">
    <?php wp_pagenavi(); ?>
   </div>

  <?php endif; ?>

  <?php wp_reset_postdata(); ?>





 </div>


</main>



<?php get_footer(); ?>