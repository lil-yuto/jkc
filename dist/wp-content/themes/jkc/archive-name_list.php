<?php get_header(); ?>


<main>

 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <hgroup class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">犬名リスト</h1>
    <p class="c-page-title__sub">JKC Activities</p>
   </hgroup>
  </div>

 </div>


 <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
  <?php if (function_exists('bcn_display')) {
   bcn_display();
  }; ?>
 </div>



 <div class="p-name_list__alphabet-inner">
  <p class="p-name_list__notice u-hidden-pc">横スクロールしてください</p>
  <div class="p-name_list__alphabet-anchor-link  c-alphabet-anchor-link-small">
   <ul class="p-name_list__alphabet-anchor-link__items c-alphabet-anchor-link-small__items">
    <?php
    for ($iii = "A"; $iii != "AA"; $iii++):
    ?>

     <li class="c-alphabet-anchor-link-item-small">
      <a href="<?php echo esc_html('#' . $iii); ?>" class="c-alphabet-anchor-link-item-small__link"><?php echo esc_html($iii); ?></a>
     </li>

    <?php endfor; ?>

   </ul>
  </div>
 </div>



 <?php
 $post_type_slug = get_post_type();
 $acf_key = 'acf_dog_name_gender';
 $args_male = array(
  'post_type' => $post_type_slug,
  'posts_per_page' => -1,
  'orderby' => 'title',
  'order' => 'ASC',
  'meta_query' => array(
   array(
    'key' => $acf_key,
    'value' => 'male',
    'type' => 'CHAR',
   )
  )
 );
 $args_female = array(
  'post_type' => $post_type_slug,
  'posts_per_page' => -1,
  'orderby' => 'title',
  'order' => 'ASC',
  'meta_query' => array(
   array(
    'key' => $acf_key,
    'value' => 'female',
    'type' => 'CHAR',
   )
  )
 );

 $male_query = new WP_Query($args_male);
 $female_query = new WP_Query($args_female);

 $alphabet_lists_male = array();
 $alphabet_lists_female = array();
 for ($jjj = "A"; $jjj != "AA"; $jjj++) {
  $alphabet_lists_male[$jjj] = array();
  $alphabet_lists_female[$jjj] = array();
 }


 if ($male_query->have_posts()) {
  while ($male_query->have_posts()) {
   $male_query->the_post();
   $first_male_letter = substr(get_the_title(), 0, 1);
   if (ctype_alpha($first_male_letter)) {
    $first_male_letter_upper = strtoupper($first_male_letter);
    $alphabet_lists_male[$first_male_letter_upper][] = get_the_ID();
   }
  }
 }

 if ($female_query->have_posts()) {
  while ($female_query->have_posts()) {
   $female_query->the_post();
   $first_female_letter = substr(get_the_title(), 0, 1);
   if (ctype_alpha($first_female_letter)) {
    $first_female_letter_upper = strtoupper($first_female_letter);
    $alphabet_lists_female[$first_female_letter_upper][] = get_the_ID();
   }
  }
 }

 // var_dump($alphabet_lists_male);
 // var_dump($alphabet_lists_female);
 ?>

 <?php
 for ($kkk = "A"; $kkk != "AA"; $kkk++):
  if (!empty($alphabet_lists_male[$kkk]) || !empty($alphabet_lists_female[$kkk])):
 ?>


   <div class="p-name_list l-container l-container--sub">


    <article id="<?php echo esc_html($kkk); ?>" class="p-name_list__alphabet-box">

     <h3 class="p-name_list__initial c-heading c-heading--lv3"><?php echo esc_html($kkk); ?></h3>


     <?php if (!empty($alphabet_lists_male[$kkk])): ?>
      <div class="p-name_list__male">

       <h4 class="c-heading c-heading--lv4">オス</h4>

       <ul class="p-name_list__lists">
        <?php foreach ($alphabet_lists_male[$kkk] as $male_post_id): ?>
         <li class="p-name_list__item">
          <p class="p-name-list__name c-text"><?php echo esc_html(get_the_title($male_post_id) . '&nbsp;/&nbsp;' . get_field('acf_dog_name_kana', $male_post_id)); ?></p>
         </li>
        <?php endforeach; ?>
       </ul>


      </div>
     <?php endif; ?>

     <?php if (!empty($alphabet_lists_female[$kkk])): ?>
      <div class="p-name_list__male">

       <h4 class="c-heading c-heading--lv4">メス</h4>

       <ul class="p-name_list__lists">
        <?php foreach ($alphabet_lists_female[$kkk] as $female_post_id): ?>
         <li class="p-name_list__item">
          <p class="p-name-list__name c-text">
           <?php echo esc_html(get_the_title($female_post_id) . '&nbsp;/&nbsp;' . get_field('acf_dog_name_kana', $female_post_id)); ?></p>
         </li>
        <?php endforeach; ?>
       </ul>


      </div>
     <?php endif; ?>




    </article>
   </div>

 <?php
  endif;
 endfor;
 ?>
</main>


<?php get_footer(); ?>