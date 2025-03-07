<?php get_header(); ?>

<main>
 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <div class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">世界の犬（カテゴリ）</h1>
   </div>
  </div>

 </div>

 <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
  <?php if (function_exists('bcn_display')) {
   bcn_display();
  }; ?>
 </div>


 <h2 class="c-heading c-heading--lv2"><?php echo esc_html(single_term_title()); ?></h2>


 <div class="p-breeds-category l-container l-container--sub">

  <div class="c-text">
   <?php echo term_description(); ?>
  </div>

  <div class="p-breeds-category__lists">

   <?php
   $taxonomy_slug = 'breed_category';
   $args = array(
    'post_type' => get_post_type(),
    'posts_per_page' => -1,
    'tax_query' => array(
     array(
      'taxonomy' => $taxonomy_slug,
      'field' => 'slug',
      'terms' => $term
     )
    )
   );
   $the_query = new WP_Query($args);
   ?>

   <?php if ($the_query->have_posts()): ?>
    <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
     <article class="c-card-item-style-horizontal">

      <hgroup class="p-breeds-category__title">
       <h3 class="c-heading c-heading--lv3"><?php the_title(); ?></h3>
       <p class="c-heading c-heading--lv5">-&nbsp;<?php the_field('acf_wd_name-en'); ?></p>
      </hgroup>

      <a href="<?php the_permalink(); ?>" class="c-card-item-style-horizontal__link">

       <div class="c-card-item-style-horizontal__contents-wrapper">

        <div class="c-card-item-style-horizontal__img-wrapper">
         <?php if (have_rows('acf_wd_imgs')): the_row(); ?>

          <?php if (get_sub_field('acf_wd_imgs_img')): ?>
            <?php
              $alt = '';
              echo wp_get_attachment_image(get_sub_field('acf_wd_imgs_img'), 'full', false, array('alt' => $alt));
            ?>
          <?php else: ?>
           <img src='<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg' alt='No Image'>
          <?php endif; ?>

         <?php endif; ?>

        </div>
        <div class="c-card-item-style-horizontal__content">
         <p class="c-card-item-style-horizontal__description">
          <span>スタンダードNo.<?php echo get_field('acf_wd_fci'); ?></span>
          <span>原産地：<?php echo get_field('acf_wd_place'); ?></span>
          <span class="max-2row">用途&emsp;：<?php echo get_field('acf_wd_use'); ?></span>
          <span class="max-2row">沿革&emsp;：<?php echo get_field('acf_wd_history'); ?></span>
         </p>

         <div class="c-card-item-style-horizontal__button-wrapper">
          <button class="c-card-item-style-horizontal__button">詳しく見る</button>
         </div>
        </div>
       </div>
      </a>
     </article>
    <?php endwhile; ?>
   <?php endif; ?>

   <!-- <article class="c-card-item-style-horizontal">
    <a href="<?php the_permalink(); ?>" class="c-card-item-style-horizontal__link">

     <hgroup class="p-breeds-category__title">
      <h3 class="c-heading c-heading--lv3">ウェルシュ・コーギー・ペンブローク</h3>
      <p class="c-heading c-heading--lv5">- WELSH CORGI PEMBROKE</p>
     </hgroup>

     <div class="c-card-item-style-horizontal__contents-wrapper">

      <div class="c-card-item-style-horizontal__img-wrapper">
       <img decoding="async" src="http://localhost:10011/wp-content/uploads/2024/11/15671f43aa9f6b8443315a1ed4a9bb9c.png" alt="かわいい犬" />
      </div>

      <div class="c-card-item-style-horizontal__content">
       <p class="c-card-item-style-horizontal__description">
        <span>スタンダードNo.38</span>
        <span>原産地：イギリス</span>
        <span>用途　：牧羊犬</span>
        <span>沿革　：カーディガンよりは新しい犬種であるが、しかし1107年までさかのぼることができる古い犬種で…</span>
       </p>

       <div class="c-card-item-style-horizontal__button-wrapper">
        <button class="c-card-item-style-horizontal__button">詳しく見る</button>
       </div>
      </div>
     </div>
    </a>
   </article> -->




   <?php wp_reset_postdata(); ?>


  </div>



 </div>


</main>



<?php get_footer(); ?>
