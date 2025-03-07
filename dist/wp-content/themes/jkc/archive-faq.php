<?php get_header(); ?>

<main>
 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <hgroup class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">よくある質問</h1>
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

  <section class="p-frequently-question">
   <h2 class="p-frequently-question__title c-heading c-heading--lv2">人気のご質問</h2>

   <div class="p-frequently-question__contents c-text-link">

    <ul class="p-frequenty-question__lists">

     <?php
     $post_type = get_post_type();
     $args = array(
      'post_type' => $post_type,
      'posts_per_page' => -1,
     );
     $the_query = new WP_Query($args);
     ?>

     <?php if ($the_query->have_posts()): ?>
      <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

       <?php if (get_field('acf_faq_popular')): ?>
        <li class="p-frequently-question__item">
         <a href="<?php the_permalink(); ?>" class="p-frequently-question__link c-text-link-item__link width100">
          <?php the_title(); ?>
         </a>
        </li>
       <?php endif; ?>

      <?php endwhile; ?>
     <?php endif; ?>


    </ul>
   </div>
  </section>

  <section class="p-purpose-question l-purpose-question">
   <h2 class="p-frequently-question__title c-heading c-heading--lv2">目的から探す</h2>


   <div class="p-purpose-question__anchor c-anchor-link">
    <div class="c-anchor-button">

     <ul class="c-anchor-button__items">

      <?php
      $taxonomy_slug = 'faq_category';
      $term_lists = get_terms(
       array(
        'taxonomy' => $taxonomy_slug,
        'hide_empty' => false,
       )
      );
      foreach ($term_lists as $term_item):
      ?>
       <li class="c-anchor-link-item">
        <div class="c-anchor-button-item">
         <a href="#<?php echo esc_html($term_item->slug); ?>" class="c-anchor-button-item__link"><?php echo esc_html($term_item->name); ?></a>
        </div>
       </li>

      <?php endforeach; ?>


     </ul>

    </div>
   </div>

   <?php
   foreach ($term_lists as $term_item):

   ?>


    <article id="<?php echo esc_html($term_item->slug); ?>" class="p-purpose-question__category p-category-question">

     <h3 class="c-heading c-heading--lv3"><?php echo esc_html($term_item->name); ?></h3>

     <ul class="p-category-question__lists c-text-link">

      <?php
      $args = array(
       'post_type' => $post_type,
       'posts_per_page' => -1,
       'tax_query' => array(
        array(
         'taxonomy' => $taxonomy_slug,
         'field' => 'slug',
         'terms' => $term_item->slug,
        )
       ),
      );
      $the_query = new WP_Query($args);
      ?>

      <?php if ($the_query->have_posts()): ?>
       <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
        <li class="p-category-question__item">
         <a href="<?php the_permalink(); ?>" class="c-text-link-item__link"><?php the_title(); ?></a>
        </li>

       <?php endwhile; ?>
      <?php endif; ?>


     </ul>

    </article>

   <?php endforeach; ?>



  </section>


  <?php wp_reset_postdata(); ?>

  <section class="p-faq__contact">
   <h2 class="c-heading c-heading--lv2">お問い合わせ</h2>


   <div class="c-contact">
    <p class="c-contact__organization">一般社団法人ジャパンケネルクラブ　総務組織課<br>「愛犬飼育管理士講習会」 係</p>
    <p class="c-contact__number">03-3251-1654</p>
   </div>



  </section>

 </div>

</main>

<?php get_footer() ?>