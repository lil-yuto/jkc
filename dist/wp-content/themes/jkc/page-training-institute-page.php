<?php get_header(); ?>

<main>
 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <div class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">公認トリマー養成機関（指定機関・研修機関・協力機関）</h1>
   </div>
  </div>

 </div>

 <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
  <?php if (function_exists('bcn_display')) {
   bcn_display();
  }; ?>
 </div>


 <div class="l-container l-container--sub">



  <p class="c-text" style="color:red">
   一般社団法人ジャパンケネルクラブ（JKC）では、本会トリマー養成機関規程に基づき、トリマーの健全なる技術向上のため、下記の「トリマー指定機関」、「トリマー研修機関」及び「トリマー協力機関」をそれぞれ認定しております。これらのトリマー養成機関において所定の課程を修了した生徒は、JKCの公認トリマーライセンスの資格取得試験を受験することができます。（指定機関・研修機関では本会公認トリマーB級の資格取得試験の受験ができます）
  </p>

  <?php the_content(); ?>


  <div class="p-training__anchor c-anchor-link">
   <div class="c-anchor-button">
    <ul class="c-anchor-button__items">
     <?php
     $taxonomy_name = 'training-institute_category';
     $term_lists = get_terms(array(
      'taxonomy' => $taxonomy_name,
      'hide_empty' => false,
     ));

     foreach ($term_lists as $term_item):
      // var_dump($term_item);
     ?>
      <li class="c-anchor-link-item">
       <div class="c-anchor-button-item">
        <a href="#<?php echo esc_html($term_item->slug); ?>" class="c-anchor-button-item__link" href="#heading"><?php echo esc_html($term_item->name); ?></a>
       </div>
      </li>
     <?php endforeach; ?>

    </ul>
   </div>
  </div>

  <?php
  $taxonomy_category = 'training-institute_category';
  $term_category_lists = get_terms(
   array(
    'taxonomy' => $taxonomy_category,
    'hide_empty' => false,
   )
  );
  foreach ($term_category_lists as $term_category_item):
  ?>

   <article id="<?php echo esc_attr($term_category_item->slug); ?>" class="p-training__category">

    <h3 class="c-heading c-heading--lv3"><?php echo esc_html($term_category_item->name); ?></h3>

    <?php if ($term_category_item->description): ?>
     <p class="p-training_term-description c-text"><?php echo esc_html($term_category_item->description); ?></p>
    <?php endif; ?>

    <?php
    $taxonomy_area = 'training-institute_area';
    $term_area_lists = get_terms(
     array(
      'taxonomy' => $taxonomy_area,
      'hide_empty' => false,
     )
    );
    foreach ($term_area_lists as $term_area_item):
    ?>

     <?php
     $args = array(
      'posttype' => 'training-institute',
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
     ?>

     <?php if ($the_query->have_posts()): ?>

      <article class="p-training__location">

       <h5 class="c-heading c-heading--lv5"><?php echo esc_html($term_area_item->name); ?></h5>

       <ul class="p-training__card-lists p-training__card-lists--2">




        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

         <li class="p-training__organization p-org-card">
          <div class="p-org-card__main-brunch">

           <h6 class="p-org-card__title">
            <?php the_title(); ?>
           </h6>

           <dl class="p-org-card__lists">
            <dt class="p-org-card__dt">
             <?php echo esc_html(get_field('acf_training_institute')['acf_training_institute_title']); ?>
            </dt>
            <dd class="p-org-card__dd">
             <?php echo esc_html(get_field('acf_training_institute')['acf_training_institute_name']); ?>
            </dd>
            <dt class="p-org-card__dt">
             所在地
            </dt>
            <dd class="p-org-card__dd">
             <?php echo esc_html(get_field('acf_training_institute')['acf_training_institute_address']); ?>
            </dd>
            <dt class="p-org-card__dt">
             電話
            </dt>
            <dd class="p-org-card__dd">
             <?php echo esc_html(get_field('acf_training_institute')['acf_training_institute_phone']); ?>
            </dd>
            <dt class="p-org-card__dt">
             URL
            </dt>
            <dd class="p-org-card__dd c-text">
             <a href="<?php echo esc_url(get_field('acf_training_institute')['acf_training_institute_url']); ?>">
              <?php echo esc_html(get_field('acf_training_institute')['acf_training_institute_url']); ?>
             </a>
            </dd>
           </dl>
          </div>

          <?php if (have_rows('acf_training_institute_branch')): ?>
           <?php while (have_rows('acf_training_institute_branch')): the_row(); ?>

            <div class="p-org-card__sub-branch">

             <h6 class="p-org-card__branch-title">
              <?php the_sub_field('acf_training_institute_branch_name'); ?>
             </h6>

             <dl class="p-org-card__lists">

              <?php if (get_sub_field('acf_training_institute_branch_address')): ?>
               <dt class="p-org-card__dt">
                所在地
               </dt>
               <dd class="p-org-card__dd">
                <?php echo esc_html(get_sub_field('acf_training_institute_branch_address')); ?>
               </dd>
              <?php endif; ?>

              <?php if (get_sub_field('acf_training_institute_branch_phone')): ?>
               <dt class="p-org-card__dt">
                電話
               </dt>
               <dd class="p-org-card__dd">
                <?php echo esc_html(get_sub_field('acf_training_institute_branch_phone')); ?>
               </dd>
              <?php endif; ?>

              <?php if (get_sub_field('acf_training_institute_branch_url')): ?>
               <dt class="p-org-card__dt">
                URL
               </dt>
               <dd class="p-org-card__dd">
                <a href="<?php echo esc_url(get_sub_field('acf_training_institute_branch_url')); ?>" target="_blank" rel="noopener noreferrer">
                 <?php echo esc_url(get_sub_field('acf_training_institute_branch_url')); ?>
                </a>
               </dd>
              <?php endif; ?>

             </dl>
            </div>

           <?php endwhile; ?>
          <?php endif; ?>
         </li>

        <?php endwhile; ?>
       </ul>
      </article>

     <?php endif; ?>


    <?php endforeach; ?>


   </article>

  <?php endforeach; ?>

  <?php wp_reset_postdata(); ?>



 </div>

</main>

<?php get_footer() ?>
