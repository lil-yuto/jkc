<?php get_header(); ?>



<main>
 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <hgroup class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main"><?php the_title(); ?></h1>
    <p class="c-page-title__sub">JKC Activities</p>
   </hgroup>
  </div>

 </div>

 <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
  <?php if (function_exists('bcn_display')) {
   bcn_display();
  }; ?>
 </div>

 <div class="l-container l-container--sub">
  <?php
  $post_type_slug = get_post_type();
  $args = array(
   'post_type' => $post_type_slug,
   'posts_per_page' => -1
  );
  $the_query = new WP_Query($args);
  ?>


  <div class="c-text-link">
   <ul class="c-text-link__items">

    <?php if ($the_query->have_posts()): ?>
     <?php while ($the_query->have_posts()): ?>
      <?php $the_query->the_post(); ?>
      <li class="c-text-link__item">
       <a href="<?php the_permalink(); ?>" class="c-text-link__link"><?php the_title(); ?></a>
      </li>
     <?php endwhile; ?>
    <?php endif; ?>
    <?php wp_reset_postdata(); ?>
   </ul>
  </div>
 </div>
</main>



<?php get_footer(); ?>