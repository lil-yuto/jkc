    <?php
    $post_type_slug = get_post_type();
    $args = array(
     'post_type' => $post_type_slug,
     'posts_per_page' => -1,
     'meta_key' => 'acf_wd_name-kana',
     'orderby' => 'meta_value',
     'order' => 'ASC',
    );
    $katakana_query = new WP_query($args);


    $kana = array(
     "ア" => "[ア-オ]",
     "カ" => "[カ-コガ-ゴ]",
     "サ" => "[サ-ソザ-ゾ]",
     "タ" => "[タ-トダ-ド]",
     "ナ" => "[ナ-ノ]",
     "ハ" => "[ハ-ホバ-ボパ-ポ]",
     "マ" => "[マ-モ]",
     "ヤ" => "[ヤ-ヨ]",
     "ラ" => "[ラ-ロ]",
     "ワ" => "[ワ-ン]",
    );

    $breeds_katakana_lists = array();


    if ($katakana_query->have_posts()):
     while ($katakana_query->have_posts()):
      $katakana_query->the_post();
      if (get_field('acf_wd_name-kana')) {
       $breed_title = get_field('acf_wd_name-kana');
      } else {
       $breed_title = get_the_title();
      }

      $breed_katakana_title = mb_convert_kana($breed_title, 'C');

      $match = false;
      foreach ($kana as $index => $pattern) {
       if (preg_match("/^" . $pattern . "/u", $breed_katakana_title)) {
        $breeds_katakana_lists[$index][] = $post->ID;

        $match = true;
        break;
       }
      }

     endwhile;
    endif;
    ?>
    <?php wp_reset_postdata(); ?>

    <div class="c-tab c-tab--katakana">



     <div class="c-tab-item">

      <div class="c-tab-item__label-container">
       <p class="c-tab-item__scroll-notice u-hidden-pc">横にスクロールしてください</p>
       <div class="c-tab-item__label-wrapper">
        <?php foreach ($kana as $key => $value): ?>
         <label>
          <input type="radio" class="js-tabChange" name="tab-40618761-56c3-4385-b826-a0983ae0d352" data-firstletter="<?php echo esc_html($key); ?>" />
          <span><?php echo $key; ?></span>
         </label>
        <?php endforeach; ?>
       </div>
      </div>

      <?php foreach ($kana as $key => $value): ?>
       <div class="c-tab-item__content js-tabContent <?php echo esc_html($key); ?>">
        <h4 class="c-heading c-heading--lv4"><?php echo $key; ?></h4>

        <div class="p-breeds-search__name-list c-text-link is-style-text-link-direction-row">
         <ul class="c-text-link__items">
          <?php
          foreach ($breeds_katakana_lists[$key] as $katakana_item):
          ?>
           <li class="c-text-link-item">
            <a href="<?php echo esc_html(get_permalink($katakana_item)); ?>" class="c-text-link__link"><?php echo get_the_title($katakana_item); ?></a>
           </li>
          <?php endforeach; ?>

         </ul>
        </div>
       </div>
      <?php endforeach; ?>
     </div>



    </div>