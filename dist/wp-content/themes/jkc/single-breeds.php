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

 <div class="p-single-breeds l-container l-container--sub">

  <?php if (get_field('acf_wd_name-en')): ?>
   <h2 class="c-heading c-heading--lv2"><?php the_field('acf_wd_name-en'); ?></h2>
  <?php endif; ?>

  <?php
  $breed_term_list = get_the_terms($post->ID, 'breed_tag');
  $breed_term_slug = array();
  foreach ($breed_term_list as $breed_term_item) {
   $breed_term_slug[] = $breed_term_item->slug;
  }
  $post_type = 'news';
  $args = array(
   'post_type' => $post_type,
   'posts_per_page' => -1,
   'tax_query' => array(
    'relation' => 'AND',
    array(
     'taxonomy' => 'news_category',
     'field' => 'slug',
     'terms' => 'important_notice',
    ),
    array(
     'taxonomy' => 'breed_tag',
     'field' => 'slug',
     'terms' => $breed_term_slug
    )
   ),
  );
  $notice_query = new WP_Query($args);
  ?>
  <?php if ($notice_query->have_posts()): ?>

   <div class="p-single-breeds-notice c-text has-light-red-background-color">
    <p class="p-single-breeds-notice__title has-red-color">重要なお知らせ</p>

    <div class="c-text-link">
     <ul class="c-text-link__items">
      <?php while ($notice_query->have_posts()): $notice_query->the_post(); ?>
       <li class="c-text-link__item">
        <a href='<?php the_permalink(); ?>' class="c-text-link__link"><?php the_title(); ?></a>
       </li>
      <?php endwhile; ?>
     </ul>
    </div>
   </div>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>


  <?php if (get_field('acf_wd_fci')): ?>
   <h5 class="c-heading c-heading--lv5 u-text-align-center">FCIスタンダードNo.<?php the_field('acf_wd_fci'); ?></h5>
  <?php endif; ?>

  <p class="c-text u-text-align-right">
   最終更新日&emsp;<?php echo get_the_modified_time('Y年m月d日'); ?>
  </p>



  <div class="c-card-grid-3">

   <div class="c-card-grid c-card-grid--3 c-card-grid-3--define">

    <?php if (have_rows('acf_wd_imgs')): ?>
     <?php while (have_rows('acf_wd_imgs')): the_row(); ?>

      <div class="c-card-item-style-3">

       <div class="c-card-item-style-3__img-wrapper aspect-auto">


        <?php if (get_sub_field('acf_wd_imgs_img')): ?>

         <?php echo wp_get_attachment_image(get_sub_field('acf_wd_imgs_img'), 'full', false, array('alt' => get_sub_field('acf_wd_imgs_cap'))); ?>

        <?php else: ?>
         <img decoding="async" src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg" alt="No Image" />
        <?php endif; ?>

       </div>

       <p class="c-card-item-style-3__description"><?php echo get_sub_field('acf_wd_imgs_cap'); ?></p>

      </div>

     <?php endwhile; ?>
    <?php endif; ?>

   </div>
  </div>


  <?php if (get_field('acf_wd_place')): ?>
   <h3 class="c-heading c-heading--lv3">原産地</h3>
   <p class="c-text"><?php echo get_field('acf_wd_place'); ?></p>
  <?php endif; ?>

  <?php if (get_field('acf_wd_use')): ?>
   <h3 class="c-heading c-heading--lv3">用途</h3>
   <p class="c-text"><?php echo get_field('acf_wd_use'); ?></p>
  <?php endif; ?>

  <?php if (get_field('acf_wd_history')): ?>
   <h3 class="c-heading c-heading--lv3">沿革</h3>
   <p class="c-text"><?php echo get_field('acf_wd_history'); ?></p>
  <?php endif; ?>

  <?php if (get_field('acf_wd_appearance')): ?>
   <h3 class="c-heading c-heading--lv3">一般外貌</h3>
   <p class="c-text"><?php echo get_field('acf_wd_appearance'); ?></p>
  <?php endif; ?>

  <?php if (get_field('acf_wd_character')): ?>
   <h3 class="c-heading c-heading--lv3">習性／性格</h3>
   <p class="c-text"><?php echo get_field('acf_wd_character'); ?></p>
  <?php endif; ?>

  <?php if (get_field('acf_wd_color')): ?>
   <h3 class="c-heading c-heading--lv3">毛色</h3>
   <p class="c-text"><?php echo get_field('acf_wd_color'); ?></p>
  <?php endif; ?>

  <?php if (have_rows('acf_wd_dogsize')): ?>
   <h3 class="c-heading c-heading--lv3">サイズ</h3>

   <?php if (get_field('acf_wd_dogsize-text')): ?>
    <p class="c-text"><?php the_field('acf_wd_dogsize-text'); ?></p>
   <?php endif; ?>


   <?php while (have_rows('acf_wd_dogsize')): the_row(); ?>

    <div class="p-single-breeds__size">
     <?php if (get_sub_field('acf_wd_dogsize_name')): ?>
      <h5 class="c-heading c-heading--lv5"><?php the_sub_field('acf_wd_dogsize_name'); ?></h5>
     <?php endif; ?>

     <?php if (get_sub_field('acf_wd_dogsize_text_1')): ?>
      <p class="p-single-breeds__description c-text"><?php the_sub_field('acf_wd_dogsize_text_1'); ?></p>
     <?php endif; ?>


     <div class="p-single-breeds__size-wrapper">

      <figure class="p-single-breeds__img">
       <?php if (get_sub_field('acf_wd_dogsize_img')): ?>
        <?php echo wp_get_attachment_image(get_sub_field('acf_wd_dogsize_img'), 'full', false, array('width' => 100, 'height' => 100)); ?>
       <?php else: ?>
        <img src='<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg' alt='No Image' width='100' height='100'>
       <?php endif; ?>
      </figure>

      <div class="p-single-breeds__size-contents">
       <?php if (have_rows('acf_wd_dogsize_description')): ?>
        <dl class="p-single-breeds__size-dl">
         <?php while (have_rows('acf_wd_dogsize_description')): the_row(); ?>

          <dt class="p-single-breeds__size-dt">
           <?php the_sub_field('acf_wd_dogsize_desc_title'); ?>
          </dt>
          <dd class="p-single-breeds__size-dd">
           <?php the_sub_field('acf_wd_dogsize_desc_text'); ?>
          </dd>
         <?php endwhile; ?>
        </dl>
       <?php endif; ?>
       <?php if (get_sub_field('acf_wd_dogsize_text_2')): ?>
        <p class="p-single-breeds__description">
         <?php the_sub_field('acf_wd_dogsize_text_2'); ?>
        </p>
       <?php endif; ?>
      </div>
     </div>


     <?php if (get_sub_field('acf_wd_dogsize_text_3')): ?>
      <p class="p-single-breeds__description c-text">
       <?php the_sub_field('acf_wd_dogsize_text_3'); ?>
      </p>
     <?php endif; ?>

    </div>
   <?php endwhile; ?>
  <?php endif; ?>

  <article class="p-single-breeds__group">


   <h2 class="c-heading c-heading--lv2">グループ（FCI10グループ）別</h2>

   <p class="c-text">下記のグループボタンから、ご覧になりたいグループを選択すると個々の犬について表示されます</p>

   <?php
   $button_description = array(
    '01g' => '家畜の群れを誘導・保護する犬',
    '02g' => '番犬、警護、作業をする犬',
    '03g' => '穴の中に住むキツネなど小型獣用の猟犬',
    '04g' => '地面の穴に住むアナグマや兎用の猟犬',
    '05g' => '日本犬を含む、スピッツ(尖ったの意)系の犬',
    '06g' => '大きな吠声と優れた嗅覚で獲物を追う獣猟犬',
    '07g' => '獲物を探し出し、その位置を静かに示す猟犬',
    '08g' => '7グループ以外の鳥猟犬',
    '09g' => '家庭犬、伴侶や愛玩目的の犬',
    '10g' => '優れた視力と走力で獲物を追跡捕獲する犬',
   );
   ?>

    <ul class="p-single-breeds__button-items">
     <?php
     $taxonomy_slug = 'breed_category';
     $term_lists = get_terms(array(
      'taxonomy' => $taxonomy_slug,
      'hide_empty' => false,
     ));

     foreach ($term_lists as $term_item):
     ?>

       <li class="p-singloe-breeds__button p-single-breeds-button">
        <a class="p-single-breeds-button__link p-single-breeds-button__link--<?php echo esc_attr($term_item->slug); ?>" href="<?php echo esc_url(get_term_link($term_item->slug, $taxonomy_slug)); ?>">
         <div class="p-single-breeds-button__contents">
          <h5 class="p-single-breeds-button__title"><?php echo esc_html($term_item->name); ?></h5>
          <p class="p-single-breeds-button__description"><?php echo esc_html($button_description[$term_item->slug]); ?></p>
         </div>
        </a>
       </li>

     <?php endforeach; ?>
    </ul>
  </article>

  <?php
  $taxonomy_slug = 'breed_tag';
  $post_type_lists = get_taxonomy($taxonomy_slug)->object_type;
  $term_lists = get_the_terms($post->ID, $taxonomy_slug);
  $term_slug_lists = array();
  foreach ($term_lists as $term_item) {
   $term_slug_lists[] = $term_item->slug;
  }
  $args = array(
   'post_type' => $post_type_lists,
   'tax_query' => array(
    array(
     'taxonomy' => $taxonomy_slug,
     'field' => 'slug',
     'terms' => $term_slug_lists
    )
   )
  );
  $the_query = new WP_Query($args);
  ?>

  <?php if ($the_query->have_posts()): ?>
   <article class="p-single-breeds__relation">
    <h2 class="c-heading c-heading--lv2"><?php the_title(); ?>&nbsp;に関連するページ</h2>

    <div class="c-text has-light-green-background-color has-background">

     <div class="c-text-link is-style-text-link-direction-row wrap">
      <ul class="c-text-link__items">

       <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
        <li class="c-text-link-item">
         <a href="<?php echo esc_url(the_permalink()); ?>" class="c-text-link-item__link"><?php the_title(); ?></a>
        </li>
       <?php endwhile; ?>

      </ul>
     </div>
    </div>
   </article>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>
 </div>


</main>


<?php get_footer(); ?>
