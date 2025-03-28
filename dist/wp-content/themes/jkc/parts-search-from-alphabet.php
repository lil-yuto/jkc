<?php
    $post_type_slug = get_post_type();
    $args = array(
     'post_type' => $post_type_slug,
     'posts_per_page' => -1,
     'orderby' => 'meta_value',
     'order' => 'ASC',
     'meta_key' => 'acf_wd_name-en'
    );
    $alphabet_query = new WP_query($args);

    $breeds_alphabet_lists = array();
    for ($iii = "A"; $iii != "AA"; $iii++) {
     $breeds_alphabet_lists[$iii] = array();
    }

    if ($alphabet_query->have_posts()):
     while ($alphabet_query->have_posts()):
      $alphabet_query->the_post();
      $alphabet_name = get_field('acf_wd_name-en');
      $alphabet_name_first_letter = substr($alphabet_name, 0, 1);
      $alphabet_name_first_letter_upper = strtoupper($alphabet_name_first_letter);
      $breeds_alphabet_lists[$alphabet_name_first_letter_upper][] = get_the_ID();
     endwhile;
    endif;
    ?>
    <?php wp_reset_postdata(); ?>

    <div class="c-tab c-tab--alphabet">


     <div class="c-tab-item">

      <div class="c-tab-item__label-container">
       <p class="c-tab-item__scroll-notice u-hidden-pc">横にスクロールしてください</p>
       <div class="c-tab-item__label-wrapper">
        <?php for ($kkk = "A"; $kkk != "AA"; $kkk++) : ?>
         <?php if (!empty($breeds_alphabet_lists[$kkk])) : ?>
         <label>
          <input type="radio" class="js-tabChange" name="tab-40618761-56c3-4385-b826-a0983ae0d352" data-firstletter="<?php echo esc_html($kkk); ?>" />
          <span><?php echo $kkk; ?></span>
         </label>
         <?php endif; ?>
        <?php endfor; ?>
       </div>
      </div>

      <?php for ($kkk = "A"; $kkk != "AA"; $kkk++) : ?>
       <?php if (!empty($breeds_alphabet_lists[$kkk])) : ?>
       <div class="c-tab-item__content js-tabContent <?php echo esc_html($kkk); ?>">
        <h4 class="c-heading c-heading--lv4"><?php echo $kkk; ?></h4>

        <div class="p-breeds-search__name-list c-text-link is-style-text-link-direction-row">
         <ul class="c-text-link__items">

          <?php
          foreach ($breeds_alphabet_lists[$kkk] as $alphabet_item):
          ?>
           <li class="c-text-link-item">
            <a href="<?php echo esc_html(get_permalink($alphabet_item)); ?>" class="c-text-link__link"><?php echo get_field('acf_wd_name-en', $alphabet_item); ?></a>
           </li>
          <?php endforeach; ?>

         </ul>
        </div>

       </div>
       <?php endif; ?>
      <?php endfor; ?>

     </div>
    </div>
