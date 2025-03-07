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

 <div class="p-dogcareadvisor l-container l-container--sub">

  <?php the_content(); ?>




 </div>


</main>


<?php get_footer(); ?>