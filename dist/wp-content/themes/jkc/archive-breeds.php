<?php get_header(); ?>

<main>
 <div class="p-sub-fv l-sub-fv">

  <div class="p-sub-fv__container l-container">
   <div class="p-sub-fv__title c-page-title">
    <h1 class="c-page-title__main">犬種紹介</h1>
   </div>
  </div>

 </div>

 <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
  <?php if (function_exists('bcn_display')) {
   bcn_display();
  }; ?>
 </div>


 <div class="l-container l-container--sub">


  <article class="p-breeds__group">

   <h2 class="c-heading c-heading--lv2">犬種を調べる</h2>

   <h4 class="c-heading c-heading--lv4">グループ（FCI10グループ）別</h4>

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


  <article class="p-breeds__search p-breeds-search">

   <div class="p-breeds-search__heading-wrapper">
    <h4 class="c-heading c-heading--lv4">名前で探す</h4>

    <div class="p-breeds-search__howto c-text-link">
     <ul class="c-text-link__items">

      <li class="c-text-link__item">
       <a href="<?php echo esc_html(add_query_arg('sort', 'katakana', get_post_type_archive_link(get_post_type()))); ?>" class="c-text-link__link">五十音順</a>
      </li>
      <li class="c-text-link__item">
       <a href="<?php echo esc_html(add_query_arg('sort', 'alphabet', get_post_type_archive_link(get_post_type()))); ?>" class="c-text-link__link">アルファベット順</a>
      </li>
     </ul>
    </div>
   </div>

  <?php if (isset($_GET['sort']) && $_GET['sort'] === 'alphabet'): ?>

    <?php get_template_part('parts-search-from-alphabet'); ?>
   <?php else: ?>
    <?php get_template_part('parts-search-from-katakana'); ?>
   <?php endif; ?>

  </article>

  <?php wp_reset_postdata(); ?>

  <div class="p-breeds__about">
    <?php
    // 犬種についてページを固定ページから取得して、表示する
    $slug = 'breeds-about';
    $content_post = get_post(get_page_by_path($slug, OBJECT, 'page')->ID);
    if ($content_post) {
      setup_postdata($GLOBALS['post'] =& $content_post);

      the_content();

      wp_reset_postdata();
    }
    ?>
  </div>

  </div>

</main>

<?php get_footer() ?>
