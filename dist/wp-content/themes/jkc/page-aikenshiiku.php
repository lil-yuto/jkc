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

 <div class="p-aikenshiiku l-container l-container--sub">



  <div class="c-accordion">
   <div class="c-accordion__items">

    <?php
    $post_type_slug = 'aikenshiiku';
    $args = array(
     'post_type' => $post_type_slug,
     'posts_per_page' => -1,
     'order' => 'DESC'
    );
    $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()): ?>
     <?php while ($the_query->have_posts()): $the_query->the_post(); ?>

      <?php $applyStatus = get_field('acf_aiken_closed') === true ? 'applyClose' : 'applyOpen'; ?>
      <div class="p-aikenshiiku-accordion-item-wrapper c-accordion-item-wrapper">
       <details class="p-aikenshiiku-accordion-item c-accordion-item <?php echo $applyStatus; ?>">
        <summary class="p-aikenshiiku-accordion__summary c-accordion-item__summary">

         <p class="p-aikenshiiku-accordion__venue c-accordion-item__text">

          <strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-green-color"><?php the_title(); ?></mark></strong>

          <?php
          if (get_field('acf_aiken_date')) :
           the_field('acf_aiken_date');
          endif; ?>
         </p>

         <span class="p-aikenshiiku-accordion__status">
          <!-- <//?php
          if (get_field('acf_aiken_closed') === true) {
           echo '申込受付終了';
          } else {
           echo '開く';
          }
          ?> -->
          開く
         </span>
        </summary>


        <div class="c-accordion-item__content">

         <p class="p-aikenshiiku__message c-text c-text--bold"><?php the_title(); ?>での講習会・試験をお申し込みのお客様へ</p>

         <?php if (get_field('acf_aiken_text')): ?>
          <p class="c-text has-light-red-background-color"><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-red-color"><?php the_field('acf_aiken_text'); ?></mark></p>
         <?php endif; ?>



         <figure class="p-aikenshiiku__table c-table">
          <table>
           <tbody>

            <?php if (get_field('acf_aiken_open_date')): ?>
             <tr>
              <td style="background-color:#EDF5EF">申込受付開始日</td>
              <td><?php the_field('acf_aiken_open_date'); ?></td>
             </tr>
            <?php endif; ?>

            <?php if (get_field('acf_aiken_date') || get_field('acf_aiken_time')): ?>
             <tr>
              <td style="background-color:#EDF5EF">講習会・試験日</td>
              <td>
               <?php
               if (get_field('acf_aiken_date')) {
                the_field('acf_aiken_date');
               }
               ?>&emsp;
               <?php
               if (get_field('acf_aiken_time')) {
                the_field('acf_aiken_time');
               }
               ?>
              </td>
             </tr>
            <?php endif; ?>

            <?php if (get_field('acf_aiken_place')): ?>
             <tr>
              <td style="background-color:#EDF5EF">場所</td>
              <td><?php the_field('acf_aiken_place'); ?></td>
             </tr>
            <?php endif; ?>

           </tbody>
          </table>
         </figure>

         <?php if (get_field('acf_aiken_closed') === false): ?>

          <?php if (get_field('acf_aiken_web_text_top') || get_field('acf_aiken_eccard') || get_field('acf_aiken_web_text_bottom')): ?>
           <div class="p-aikenshiiku-accordion__webapply">
            <p class="c-text c-text--bold">ウェブからのお申込み</p>


            <?php if (get_field('acf_aiken_web_text_top')): ?>
             <p class="c-text"><?php the_field('acf_aiken_web_text_top'); ?></p>
            <?php endif; ?>

            <?php if (get_field('acf_aiken_eccard')): ?>
             <!-- <div class="c-apply-button"> -->
             <!-- <div class="c-apply-button__items"> -->
             <div class="p-aikenshiiku__button c-apply-button-item is-style-web">
              <div class="c-apply-button-item">
               <a href="<?php the_field('acf_aiken_eccard'); ?>" class="c-apply-button-item__link" target="_blank">ウェブからのお申込み</a>
              </div>
             </div>
             <!-- </div> -->
             <!-- </div> -->
            <?php endif; ?>

            <?php if (get_field('acf_aiken_web_text_bottom')): ?>
             <p class="c-text">
              <?php the_field('acf_aiken_web_text_bottom'); ?>
             </p>
            <?php endif; ?>

           </div>
          <?php endif; ?>

          <?php if (get_field('acf_aiken_pdf_text') || get_field('acf_aiken_pdf')): ?>
           <div class="p-aikenshiiku-accordion__postapply">

            <p class="c-text c-text--bold">郵送でのお申込み</p>

            <?php if (get_field('acf_aiken_pdf_text')): ?>
             <p class="c-text"><?php the_field('acf_aiken_pdf_text'); ?></p>
            <?php endif; ?>

            <?php if (get_field('acf_aiken_pdf')): ?>
             <!-- <div class="c-apply-button"> -->
             <!-- <div class="c-apply-button__items"> -->
             <div class="p-aikenshiiku__button c-apply-button-item is-style-pdf">
              <div class="c-apply-button-item">
               <a href="<?php the_field('acf_aiken_pdf'); ?>" class="c-apply-button-item__link" target="_blank">受講・受験申込書</a>
              </div>
             </div>
             <!-- </div> -->
             <!-- </div> -->
            <?php endif; ?>
           </div>
          <?php endif; ?>

         <?php endif; ?>

        </div>
       </details>
      </div>

     <?php endwhile; ?>
    <?php endif; ?>



   </div>
  </div>




 </div>


</main>


<?php get_footer(); ?>
