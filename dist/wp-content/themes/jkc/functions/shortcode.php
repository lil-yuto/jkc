<?php
// shortcodeの作成


add_shortcode('training-institute', function () {
 $html_code = '';
 $html_code .=  '<div class="p-training__anchor c-anchor-link">';
 $html_code .= '<div class="c-anchor-button">';
 $html_code .= '<ul class="c-anchor-button__items">';

 $taxonomy_name = 'training-institute_category';
 $term_lists = get_terms(array(
  'taxonomy' => $taxonomy_name,
  'hide_empty' => false,
 ));

 foreach ($term_lists as $term_item):
  $html_code .= '<li class="c-anchor-link-item">';
  $html_code .= '<div class="c-anchor-button-item">';
  $html_code .= '<a href="#' . esc_html($term_item->slug) . '"' . 'class="c-anchor-button-item__link">' . esc_html($term_item->name) . '</a>';
  $html_code .= '</div>';
  $html_code .= '</li>';
 endforeach;
 $html_code .= '</ul>';
 $html_code .= '</div>';
 $html_code .= '</div>';

 $taxonomy_category = 'training-institute_category';
 $term_category_lists = get_terms(
  array(
   'taxonomy' => $taxonomy_category,
   'hide_empty' => false,
  )
 );
 foreach ($term_category_lists as $term_category_item):

  $html_code .=  '<article id="' . esc_attr($term_category_item->slug) . '"' . 'class="p-training__category">';
  $html_code .= '<h3 class="c-heading c-heading--lv3">' . esc_html($term_category_item->name) . '</h3>';

  if ($term_category_item->description):
   $html_code .=  '<p class="p-training_term-description c-text">' . esc_html($term_category_item->description) . '</p>';
  endif;

  $taxonomy_area = 'training-institute_area';
  $term_area_lists = get_terms(
   array(
    'taxonomy' => $taxonomy_area,
    'hide_empty' => false,
   )
  );
  foreach ($term_area_lists as $term_area_item):

   $args = array(
    'post_type' => 'training-institute',
    'posts_per_page' => -1,
    'tax_query' => array(
     'relation' => 'AND',
     array(
      'taxonomy' => $taxonomy_category,
      'field' => 'slug',
      'terms' => $term_category_item,
     ),
     array(
      'taxonomy' => $taxonomy_area,
      'field' => 'slug',
      'terms' => $term_area_item
     )
    )
   );
   $the_query = new WP_Query($args);

   if ($the_query->have_posts()):


    $html_code .= '<article class="p-training__location">';
    $html_code .= '<h5 class="c-heading c-heading--lv5">' . esc_html($term_area_item->name) . '</h5>';
    $html_code .= '<ul class="p-training__card-lists p-training__card-lists--2">';


    while ($the_query->have_posts()): $the_query->the_post();

     $html_code .= '<li class="p-training__organization p-org-card">';
     $html_code .= '<div class="p-org-card__main-brunch">';

     $html_code .= '<h6 class="p-org-card__title">' . get_the_title() . '</h6>';
     $html_code .= '<dl class="p-org-card__lists">';
     $html_code .= '<dt class="p-org-card__dt">' . esc_html(get_field('acf_training_institute')['acf_training_institute_title']) . '</dt>';
     $html_code .= '<dd class="p-org-card__dd">' . esc_html(get_field('acf_training_institute')['acf_training_institute_name']) . '</dd>';
     $html_code .= '<dt class="p-org-card__dt">所在地</dt>';
     $html_code .= '<dd class="p-org-card__dd">' . esc_html(get_field('acf_training_institute')['acf_training_institute_address']) . '</dd>';
     $html_code .= '<dt class="p-org-card__dt">電話</dt>';
     $html_code .= '<dd class="p-org-card__dd">' . esc_html(get_field('acf_training_institute')['acf_training_institute_phone']) . '</dd>';
     $html_code .= '<dt class="p-org-card__dt">URL</dt>';
     $html_code .= '<dd class="p-org-card__dd c-text">';
     $html_code .= '<a href="' . esc_url(get_field('acf_training_institute')['acf_training_institute_url']) . '">' . esc_html(get_field('acf_training_institute')['acf_training_institute_url']) . '</a>';
     $html_code .= '</dd>';
     $html_code .= '</dl>';
     $html_code .= '</div>';

     if (have_rows('acf_training_institute_branch')):
      while (have_rows('acf_training_institute_branch')): the_row();

       $html_code .= '<div class="p-org-card__sub-branch">';
       $html_code .= '<h6 class="p-org-card__branch-title">' . esc_html(get_sub_field('acf_training_institute_branch_name')) . '</h6>';
       $html_code .= '<dl class="p-org-card__lists">';

       if (get_sub_field('acf_training_institute_branch_address')):
        $html_code .= '<dt class="p-org-card__dt">所在地</dt>';
        $html_code .= '<dd class="p-org-card__dd">' . esc_html(get_sub_field('acf_training_institute_branch_address')) . '</dd>';
       endif;

       if (get_sub_field('acf_training_institute_branch_phone')):
        $html_code .= '<dt class="p-org-card__dt">電話</dt>';
        $html_code .= '<dd class="p-org-card__dd">' . esc_html(get_sub_field('acf_training_institute_branch_phone')) . '</dd>';
       endif;

       if (get_sub_field('acf_training_institute_branch_url')):
        $html_code .= '<dt class="p-org-card__dt">URL</dt>';
        $html_code .= '<dd class="p-org-card__dd">';
        $html_code .= '<a href="' . esc_url(get_sub_field('acf_training_institute_branch_url')) . 'target="_blank" rel="noopener noreferrer">' . esc_url(get_sub_field('acf_training_institute_branch_url')) . '</a>';
        $html_code .= '</dd>';
       endif;

       $html_code .= '</dl>';
       $html_code .= '</div>';
      endwhile;
     endif;

     $html_code .= '</li>';

    endwhile;

    $html_code .= '</ul>';
    $html_code .= '</article>';
   endif;

  endforeach;
  $html_code .= '</article>';

 endforeach;

 wp_reset_postdata();

 return $html_code;
});


add_shortcode('dogcare-schedule', function () {
 $html_code = '';
 $html_code .= '<div class="c-accordion">';
 $html_code .= '<div class="c-accordion__items">';

 $post_type_slug = 'aikenshiiku';
 $args = array(
  'post_type' => $post_type_slug,
  'orderby' => 'menu_order',
  'posts_per_page' => -1,
  'order' => 'ASC'
 );
 $the_query = new WP_Query($args);

 if ($the_query->have_posts()):
  while ($the_query->have_posts()): $the_query->the_post();

   $applyStatus = get_field('acf_aiken_closed') === true ? 'applyClose' : 'applyOpen';

   $html_code .=  '<div class="p-aikenshiiku-accordion-item-wrapper c-accordion-item-wrapper">';
   $html_code .= '<details class="p-aikenshiiku-accordion-item c-accordion-item ' . esc_html($applyStatus) . '">';
   $html_code .= '<summary class="p-aikenshiiku-accordion__summary c-accordion-item__summary">';
   $html_code .= '<p class="p-aikenshiiku-accordion__venue c-accordion-item__text">';
   $html_code .= '<strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-green-color">' . get_the_title() . '</mark></strong>';


   if (get_field('acf_aiken_date')):
    $html_code .= get_field('acf_aiken_date');
   endif;

   $html_code .= '</p>';

   $html_code .= '<span class="p-aikenshiiku-accordion__status">';
   // if (get_field('acf_aiken_closed') === true) {
   //  $html_code .= '申込受付終了';
   // } else {
   //  $html_code .= '開く';
   // }
   $html_code .= '開く';
   $html_code .= '</span>';
   $html_code .= '</summary>';

   $html_code .= '<div class="c-accordion-item__content">';

   $html_code .= '<p class="p-aikenshiiku__message c-text c-text--bold">' . get_the_title() . 'での講習会・試験をお申し込みのお客様へ</p>';

   if (get_field('acf_aiken_text')):
    $html_code .= '<p class="c-text has-light-red-background-color"><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-red-color">' . get_field('acf_aiken_text') . '</mark></p>';
   endif;


   $html_code .= '<figure class="p-aikenshiiku__table c-table">';
   $html_code .= '<table>';
   $html_code .= '<tbody>';

   if (get_field('acf_aiken_open_date')):
    $html_code .= '<tr>';
    $html_code .= '<td style="background-color:#EDF5EF">申込受付開始日</td>';
    $html_code .= '<td>' . get_field('acf_aiken_open_date') . '</td>';
    $html_code .= '</tr>';
   endif;

   if (get_field('acf_aiken_date') || get_field('acf_aiken_time')):

    $html_code .= '<tr>';
    $html_code .= '<td style="background-color:#EDF5EF">講習会・試験日</td>';
    $html_code .= '<td>';
    if (get_field('acf_aiken_date')) {
     $html_code .= get_field("acf_aiken_date");
    }
    $html_code .= '&emsp;';

    if (get_field('acf_aiken_time')) {
     $html_code .= get_field('acf_aiken_time');
    }
    $html_code .= '</td>';
    $html_code .= '</tr>';
   endif;

   if (get_field('acf_aiken_place')):
    $html_code .= '<tr>';
    $html_code .= '<td style="background-color:#EDF5EF">場所</td>';
    $html_code .= '<td>' . get_field('acf_aiken_place') . '</td>';
    $html_code .= '</tr>';
   endif;

   $html_code .= '</tbody>';
   $html_code .= '</table>';
   $html_code .= '</figure>';

   if (get_field('acf_aiken_closed') === false):

    if (get_field('acf_aiken_web_text_top') || get_field('acf_aiken_eccard') || get_field('acf_aiken_web_text_bottom')):

     $html_code .= '<div class="p-aikenshiiku-accordion__webapply">';
     $html_code .= '<p class="c-text c-text--bold">ウェブからのお申込み</p>';

     if (get_field('acf_aiken_web_text_top')):
      $html_code .= '<p class="c-text">' . get_field('acf_aiken_web_text_top') . '</p>';
     endif;

     if (get_field('acf_aiken_eccard')):
      $html_code .= '<div class="p-aikenshiiku__button c-apply-button-item is-style-web">';
      $html_code .= '<div class="c-apply-button-item">';
      $html_code .= '<a href="' . get_field('acf_aiken_eccard') . '" class="c-apply-button-item__link" target="_blank">ウェブからのお申込み</a>';
      $html_code .= '</div>';
      $html_code .= '</div>';
     endif;

     if (get_field('acf_aiken_web_text_bottom')):
      $html_code .= '<p class="c-text">' . get_field('acf_aiken_web_text_bottom') . '</p>';
     endif;

     $html_code .= '</div>';
    endif;

    if (get_field('acf_aiken_pdf_text') || get_field('acf_aiken_pdf')):

     $html_code .= '<div class="p-aikenshiiku-accordion__postapply">';
     $html_code .= '<p class="c-text c-text--bold">郵送でのお申込み</p>';
     if (get_field('acf_aiken_pdf_text')):
      $html_code .= '<p class="c-text">' . get_field('acf_aiken_pdf_text') . '</p>';
     endif;

     if (get_field('acf_aiken_pdf')):
      $html_code .= '<div class="p-aikenshiiku__button c-apply-button-item is-style-pdf">';
      $html_code .= '<div class="c-apply-button-item">';
      $html_code .= '<a href="' . get_field('acf_aiken_pdf') . '" class="c-apply-button-item__link" target="_blank">受講・受験申込書</a>';
      $html_code .= '</div>';
      $html_code .= '</div>';
     endif;
     $html_code .= '</div>';
    endif;

   endif;

   $html_code .= '</div>';
   $html_code .= '</details>';
   $html_code .= '</div>';

  endwhile;
 endif;

 $html_code .= '</div>';
 $html_code .= '</div>';


 return $html_code;
});
