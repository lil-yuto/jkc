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

 <div class="l-container l-container--sub">

  <?php the_content(); ?>


  <?php
  $post_type_slug = get_post_type();
  $search_term = 'qualification_' . $post_type_slug;

  $args = array(
   'post_type' => array('qualification1', 'qualification2'),
   'posts_per_page' => -1,
   'tax_query' => array(
    'relation' => 'OR',
    array(
     'taxonomy' => 'qualification1_category',
     'field' => 'slug',
     'terms' => $search_term,
    ),
    array(
     'taxonomy' => 'qualification2_category',
     'field' => 'slug',
     'terms' => $search_term,
    ),
   ),
  );
  $the_query = new WP_Query($args);
  ?>

  <?php if ($the_query->have_posts()): ?>
   <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

    <?php if (get_field('acf_qu2')['acf_qu2_org']): ?>
     <h3 class="c-heading c-heading--lv3"><?php echo get_field('acf_qu2')['acf_qu2_org']; ?></h3>
    <?php else: ?>
     <h3 class="c-heading c-heading--lv3"><?php the_title(); ?></h3>
    <?php endif; ?>

    <?php if (get_field('acf_qu2')['acf_qu2_office']): ?>
     <h5 class="c-heading c-heading--lv5">連絡事務所</h5>
     <p class="c-text"><?php echo get_field('acf_qu2')['acf_qu2_office']; ?></p>
    <?php elseif (get_field('acf_qu_office')) : ?>
     <h5 class="c-heading c-heading--lv5">連絡事務所</h5>
     <p class="c-text"><?php echo get_field('acf_qu_office'); ?></p>
    <?php endif; ?>


    <figure class="c-table">
     <table>
      <tbody>

       <?php if (get_field('acf_qu2')['acf_qu2_day']): ?>
        <tr>
         <td style="background-color:#EDF5EF"><strong>日時</strong></td>
         <td><?php echo get_field('acf_qu2')['acf_qu2_day']; ?></td>
        </tr>
       <?php endif; ?>

       <?php if (get_field('acf_qu2')['acf_qu2_place']): ?>
        <tr>
         <td style="background-color:#EDF5EF"><strong>会場</strong></td>
         <td><?php echo get_field('acf_qu2')['acf_qu2_place']; ?></td>
        </tr>
       <?php endif; ?>

       <?php if (get_field('acf_qu2')['acf_qu2_type']): ?>
        <tr>
         <td style="background-color:#EDF5EF"><strong>試験の種類<br>（災害救助犬 認定試験）</strong></td>
         <td><?php echo get_field('acf_qu2')['acf_qu2_type']; ?></td>
        </tr>
       <?php endif; ?>

       <?php if (get_field('acf_qu2')['acf_qu2_lecturer']): ?>
        <tr>
         <td style="background-color:#EDF5EF"><strong>研修会講師<br>（自主研修会）</strong></td>
         <td><?php echo get_field('acf_qu2')['acf_qu2_lecturer']; ?></td>
        </tr>
       <?php endif; ?>

       <?php if (get_field('acf_qu2')['acf_qu2_theme']): ?>
        <tr>
         <td style="background-color:#EDF5EF"><strong>研修テーマ<br>（自主研修会）</strong></td>
         <td><?php echo get_field('acf_qu2')['acf_qu2_theme']; ?></td>
        </tr>
       <?php endif; ?>

       <?php if (get_field('acf_qu2')['acf_qu2_tuition']): ?>
        <tr>
         <td style="background-color:#EDF5EF"><strong>受講料<br>（自主研修会）</strong></td>
         <td><?php echo get_field('acf_qu2')['acf_qu2_tuition']; ?></td>
        </tr>
       <?php endif; ?>


      </tbody>
     </table>
    </figure>


   <?php endwhile; ?>
  <?php endif; ?>
  <?php wp_reset_postdata(); ?>


 </div>
</main>



<?php get_footer(); ?>
