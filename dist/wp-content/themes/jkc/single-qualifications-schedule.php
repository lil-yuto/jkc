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

  <?php the_content(); ?>


  <?php
  $parent_id = $post->post_parent;
  $parent_slug = get_post($parent_id)->post_name;
  $search_term = 'qualification_' . $parent_slug;

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

    <?php if (have_rows('acf_qu1_info')): ?>
     <?php while (have_rows('acf_qu1_info')): the_row(); ?>

      <?php if (get_sub_field('acf_qu1_info_enable')): ?>
       <h4 class="c-heading c-heading--lv4"><?php echo get_sub_field('acf_qu1_info_title'); ?></h4>

       <?php if (have_rows('acf_qu1_info_unit')): ?>
        <?php while (have_rows('acf_qu1_info_unit')): the_row(); ?>
         <figure class="c-table">
          <table>
           <tbody>
            <?php if (get_sub_field('acf_qu1_info_unit_title') && get_sub_field('acf_qu1_info_unit_text')): ?>
             <tr>
              <td style="background-color:#EDF5EF"><strong><?php echo get_sub_field('acf_qu1_info_unit_title'); ?></strong></td>
              <td><?php echo get_sub_field('acf_qu1_info_unit_text'); ?></td>
             </tr>
            <?php endif; ?>

           </tbody>
          </table>
         </figure>
        <?php endwhile; ?>
       <?php endif; ?>
      <?php endif; ?>

     <?php endwhile; ?>
    <?php endif; ?>



   <?php endwhile; ?>
  <?php endif; ?>
<?php wp_reset_postdata();?>

 </div>
</main>



<?php get_footer(); ?>