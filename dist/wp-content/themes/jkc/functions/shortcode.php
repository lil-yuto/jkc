<?php
// shortcodeの作成

/**
 * トリマー養成機関を表示するショートコード
 */
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
          $html_code .= '<a href="' . esc_url(get_field('acf_training_institute')['acf_training_institute_url']) . '" target="_blank" rel="noopener noreferrer">' . esc_html(get_field('acf_training_institute')['acf_training_institute_url']) . '</a>';
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
                $html_code .= '<dd class="p-org-card__dd c-text">';
                $html_code .= '<a href="' . esc_url(get_sub_field('acf_training_institute_branch_url')) . '" target="_blank" rel="noopener noreferrer">' . esc_html(get_sub_field('acf_training_institute_branch_url')) . '</a>';
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

/**
 * 愛犬飼育管理士情報／日程を表示するショートコード
 */
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

/**
 * ガゼットのご案内を表示するショートコード
 *
 * このショートコードは、ガゼットのご案内の一覧を表示します。
 */
add_shortcode('gazette_list', function ($atts) {
  // デフォルト値の設定
  $atts = shortcode_atts(array(
    'posts_per_page' => 10,
  ), $atts, 'gazette_list');

  $html_code = '';

  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  $args = array(
    'post_type' => 'gazette',
    'posts_per_page' => intval($atts['posts_per_page']),
    'paged' => $paged,
  );
  $the_query = new WP_Query($args);

  if ($the_query->have_posts()):
    while ($the_query->have_posts()): $the_query->the_post();

      $html_code .= '<h3 class="c-heading c-heading--lv3">' . get_the_title() . '</h3>';

      $html_code .= '<div class="p-gazette">';

      $html_code .= '<figure class="p-gazette__img">';
      $image_ID = get_field('acf_gazette_cover');
      if ($image_ID) {
        $html_code .= wp_get_attachment_image($image_ID, 'full');
      }
      $html_code .= '</figure>';

      $html_code .= '<div class="p-gazette__contents">';

      if (get_field('acf_gazette_h1')):
        $html_code .= '<h4 class="c-heading c-heading--lv4">' . esc_html(get_field('acf_gazette_h1')) . '</h4>';
      endif;

      if (get_field('acf_gazette_h1_text')):
        $html_code .= '<div class="p-gazzette__text">';
        $html_code .= get_field('acf_gazette_h1_text');
        $html_code .= '</div>';
      endif;

      $html_code .= '<h4 class="c-heading c-heading--lv4">読み物</h4>';

      if (get_field('acf_gazette_yomi_text')):
        $html_code .= '<div class="p-gazzette__text">';
        $html_code .= get_field('acf_gazette_yomi_text');
        $html_code .= '</div>';
      endif;

      $html_code .= '</div>'; // .p-gazette__contents の閉じタグ

      $html_code .= '</div>'; // .p-gazette の閉じタグ

    endwhile;

    // ページナビゲーション
    if (function_exists('wp_pagenavi')):
      $html_code .= '<div class="c-wp_pagenavi l-wp_pagenavi">';
      ob_start();
      wp_pagenavi(array('query' => $the_query));
      $html_code .= ob_get_clean();
      $html_code .= '</div>';
    endif;

  endif;

  wp_reset_postdata();

  return $html_code;
});

/**
 * 子投稿一覧を表示するショートコード
 *
 * このショートコードは、現在の投稿の子投稿一覧を表示します。
 */
add_shortcode('child_posts_list', function () {
  $html_code = '';

  // 現在の投稿IDを取得
  $current_post_id = get_the_ID();

  // 子投稿を取得
  $args = array(
    'post_type' => 'any',
    'post_parent' => $current_post_id,
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
  );
  $child_query = new WP_Query($args);

  if ($child_query->have_posts()):
    // 固定の2列レイアウト
    $html_code .= '<div class="c-child-posts-list">';

    while ($child_query->have_posts()): $child_query->the_post();

      // 各投稿をボタンとして表示
      $html_code .= '<a href="' . get_permalink() . '" class="c-child-posts-list__item">';
      $html_code .= get_the_title();
      $html_code .= '</a>';

    endwhile;

    $html_code .= '</div>';
  endif;

  wp_reset_postdata();

  return $html_code;
});

/**
 * カスタム投稿タイプの一覧を表示するショートコード
 *
 * このショートコードは、指定されたカスタム投稿タイプの一覧を表示します。
 * 使用例: [custom_post_list post_type="picture_contest"]
 */
add_shortcode('custom_post_list', function ($atts) {
  // デフォルト値の設定
  $atts = shortcode_atts(array(
    'post_type' => '',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
  ), $atts, 'custom_post_list');

  $html_code = '';

  // 投稿タイプが指定されていない場合はメッセージを表示
  if (empty($atts['post_type'])) {
    $html_code .= '<p class="c-text">投稿タイプを指定してください。例: [custom_post_list post_type="picture_contest"]</p>';
    return $html_code;
  }

  $args = array(
    'post_type' => $atts['post_type'],
    'posts_per_page' => intval($atts['posts_per_page']),
    'orderby' => $atts['orderby'],
    'order' => $atts['order'],
  );

  $the_query = new WP_Query($args);

  if ($the_query->have_posts()):
    $html_code .= '<div class="c-text-link">';
    $html_code .= '<ul class="c-text-link__items">';

    while ($the_query->have_posts()): $the_query->the_post();
      $html_code .= '<li class="c-text-link__item">';
      $html_code .= '<a href="' . get_permalink() . '" class="c-text-link__link">' . get_the_title() . '</a>';
      $html_code .= '</li>';
    endwhile;

    $html_code .= '</ul>';
    $html_code .= '</div>';
  else:
    $html_code .= '<p class="c-text">コンテンツはまだありません。</p>';
  endif;

  wp_reset_postdata();
  return $html_code;
});

/**
 * ガゼット記事カテゴリーごとの表示用ショートコード
 */
add_shortcode('gazette_article_list', function ($atts) {
  ob_start();

  $taxonomy_name = 'gazette-article_category';
  $term_lists = get_terms(array(
    'taxonomy' => $taxonomy_name,
  ));

  foreach ($term_lists as $term_item):
?>
    <div class="p-gazette-article__term">
      <h3 class="p-gazette-article__heading--lv3 c-heading c-heading--lv3"><?php echo esc_html($term_item->name); ?></h3>

      <div class="p-gazette-article__lists c-card-grid-3">
        <div class="c-card-grid c-card-grid--3">

          <?php
          $args = array(
            'post_type' => 'gazette-article',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => $taxonomy_name,
                'field' => 'slug',
                'terms' => $term_item->slug,
              )
            )
          );
          $the_query = new WP_Query($args);
          ?>

          <?php if ($the_query->have_posts()): ?>
            <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
              <article class="c-card-item-style-3 c-card-item-style-3--subgrid">
                <div class="c-card-item-style-3__img-wrapper c-card-item-style-3__img-wrapper--tall aspect-auto">
                  <?php if (get_field('acf_article_cover')): ?>
                    <?php echo wp_get_attachment_image(get_field('acf_article_cover'), 'full'); ?>
                  <?php else: ?>
                    <img decoding="async" src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-no_image.jpg" alt="" />
                  <?php endif; ?>
                </div>

                <h4 class="c-card-item-style-3__title u-text-align-center"><?php the_title(); ?></h4>
                <?php if (get_field('acf_article_published')): ?>
                  <p class="c-card-item-style-3__subtitle"><?php the_field('acf_article_published'); ?></p>
                <?php endif; ?>

                <?php if (get_field('acf_article_text')): ?>
                  <p class="c-card-item-style-3__description"><?php the_field('acf_article_text'); ?></p>
                <?php endif; ?>
                <?php if (get_field('acf_article_pdf')): ?>
                  <div class="c-card-item-style-3__button-wrapper">
                    <a href="<?php echo esc_url(get_field('acf_article_pdf')); ?>" class="c-card-item-style-3__button" target="_blank">詳しく見る</a>
                  </div>
                <?php endif; ?>
              </article>
            <?php endwhile; ?>
          <?php endif; ?>

        </div>
      </div>
    </div>
<?php
  endforeach;

  wp_reset_postdata();

  return ob_get_clean();
});
