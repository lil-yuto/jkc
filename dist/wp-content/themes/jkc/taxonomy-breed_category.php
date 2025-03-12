<?php get_header(); ?>

<main>
  <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main"><?php echo esc_html(single_term_title()); ?></h1>
      </div>
    </div>

  </div>
  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>


  <!-- <h2 class="c-heading c-heading--lv2"><?php echo esc_html(single_term_title()); ?></h2> -->


  <div class="p-breeds-category l-container l-container--sub">

    <div class="c-text">
      <?php echo term_description(); ?>
    </div>

    <div class="p-breeds-category__lists">

      <?php
      $taxonomy_slug = 'breed_category';
      $args = array(
        'post_type' => get_post_type(),
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => $taxonomy_slug,
            'field' => 'slug',
            'terms' => $term
          )
        )
      );
      $the_query = new WP_Query($args);
      ?>

      <?php if ($the_query->have_posts()): ?>
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <article class="c-card-item-style-horizontal">

            <hgroup class="p-breeds-category__title">
              <h3 class="c-heading c-heading--lv3"><?php the_title(); ?></h3>
              <p class="c-heading c-heading--lv5">-&nbsp;<?php the_field('acf_wd_name-en'); ?></p>
            </hgroup>

            <a href="<?php the_permalink(); ?>" class="c-card-item-style-horizontal__link">

              <div class="c-card-item-style-horizontal__contents-wrapper">

                <div class="c-card-item-style-horizontal__img-wrapper aspect-auto">
                  <?php if (have_rows('acf_wd_imgs')): the_row(); ?>

                    <?php if (get_sub_field('acf_wd_imgs_img')): ?>
                      <?php
                      $alt = '';
                      echo wp_get_attachment_image(get_sub_field('acf_wd_imgs_img'), 'full', false, array('alt' => $alt));
                      ?>
                    <?php else: ?>
                      <img src='<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg' alt='No Image'>
                    <?php endif; ?>

                  <?php endif; ?>

                </div>
                <div class="c-card-item-style-horizontal__content">
                  <div class="c-card-item-style-horizontal__description">
                    <p>スタンダードNo.<?php echo get_field('acf_wd_fci'); ?></p>
                    <p><span class="u-bold">原産地</span>：<?php echo get_field('acf_wd_place'); ?></p>
                    <p class="max-2row"><span class="u-bold">用途</span>&emsp;：<?php echo get_field('acf_wd_use'); ?></p>
                    <p class="max-2row"><span class="u-bold">沿革</span>&emsp;：<?php echo get_field('acf_wd_history'); ?></p>
                  </div>

                  <div class="c-card-item-style-horizontal__button-wrapper">
                    <button class="c-card-item-style-horizontal__button">詳しく見る</button>
                  </div>
                </div>
              </div>
            </a>
          </article>
        <?php endwhile; ?>
      <?php endif; ?>





      <?php wp_reset_postdata(); ?>


    </div>

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

      <div class="c-button-link">
        <ul class="p-single-breeds__button-items c-button-link__items">
          <?php
          $taxonomy_slug = 'breed_category';
          $term_lists = get_terms(array(
            'taxonomy' => $taxonomy_slug,
            'hide_empty' => false,
          ));

          foreach ($term_lists as $term_item):
          ?>

            <li class="c-button-link-item">

              <div class="p-singloe-breeds__button p-single-breeds-button c-button-item">
                <?php
                // 現在のタームと一致するかチェック
                $current_term = get_queried_object();
                $is_current_term = ($current_term->term_id === $term_item->term_id);
                $current_class = $is_current_term ? ' is-current' : '';

                // 現在のタームの場合はdivを使用し、そうでない場合はaタグを使用
                if ($is_current_term) :
                ?>
                <div class="p-single-breeds-button__link c-button-item__link<?php echo $current_class; ?>">
                  <div class="c-button-item__wrapper">
                    <h5 class="p-single-breeds-button__title"><?php echo esc_html($term_item->name); ?></h5>
                    <p class="p-single-breeds-button__description"><?php echo esc_html($button_description[$term_item->slug]); ?></p>
                  </div>
                </div>
                <?php else : ?>
                <a class="p-single-breeds-button__link c-button-item__link<?php echo $current_class; ?>" href="<?php echo esc_url(get_term_link($term_item->slug, $taxonomy_slug)); ?>">
                  <div class="c-button-item__wrapper">
                    <h5 class="p-single-breeds-button__title"><?php echo esc_html($term_item->name); ?></h5>
                    <p class="p-single-breeds-button__description"><?php echo esc_html($button_description[$term_item->slug]); ?></p>
                  </div>
                </a>
                <?php endif; ?>

              </div>
            </li>

          <?php endforeach; ?>
        </ul>
      </div>
    </article>

  </div>


</main>



<?php get_footer(); ?>
