<?php
/**
 * Template Name: ロイヤルカナンアワード
 * Description: ロイヤルカナンアワードのグループ1〜10を表示するテンプレート
 */
get_header();

// 現在のページオブジェクトからスラッグを取得
$post = get_post();
$term = $post->post_name;

// タームIDを取得
$term_obj = get_term_by('slug', $term, 'royalcanin_award_category');
$term_id = $term_obj ? $term_obj->term_id : 0;
?>
<main>
  <div class="p-sub-fv l-sub-fv">
    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main"><?php echo esc_html( get_the_title() ); ?></h1>
      </div>
    </div>
  </div>

  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if ( function_exists('bcn_display') ) { bcn_display(); } ?>
  </div>

  <?php
  // ページ階層を利用してナビゲーションを作成
  // 現在のページの親ページ（＝トップに戻る）のリンクを取得
  $parent_id = $post->post_parent;
  if ( $parent_id ) {
      $parent_link = get_permalink( $parent_id );
  } else {
      // 親ページがない場合は、トップページまたは指定したURLへ（必要に応じて調整）
      $parent_link = home_url('/');
  }

  // 同じ親を持つ兄弟ページ（グループページ）の一覧を取得
  $siblings = get_pages( array(
      'parent'      => $parent_id,
      'sort_column' => 'menu_order'
  ) );
  ?>

  <div class="p-royalcanin-group l-container l-royalcanin-group">
    <ul class="p-royalcanin-group__items">
      <!-- トップに戻る：親ページへのリンク -->
      <li class="p-royalcanin-group-item p-royalcanin-group-item--top">
        <a href="<?php echo esc_url( $parent_link ); ?>" class="p-royalcanin-group-item__link">トップに戻る</a>
      </li>
    </ul>

    <ul class="p-royalcanin-group__items">
      <?php foreach ( $siblings as $sibling ) :
              // 兄弟ページのスラッグからグループ番号（例: group1 → 1）を抽出
              $sibling_slug = $sibling->post_name;
              $sibling_num  = str_replace( 'group', '', $sibling_slug );
              $current_class = ( $sibling->ID === $post->ID ) ? 'p-royalcanin-group-item--current' : '';
      ?>
        <li class="p-royalcanin-group-item <?php echo esc_attr( $current_class ); ?>">
          <a href="<?php echo esc_url( get_permalink( $sibling->ID ) ); ?>" class="p-royalcanin-group-item__link">
            <?php echo esc_html( $sibling_num . "G" ); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>

  <div class="l-container l-container--sub">
    <?php if ( term_description($term_id) ) : ?>
      <h2 class="c-heading c-heading--lv2"><?php echo term_description($term_id); ?></h2>
    <?php endif; ?>

    <?php
    // ブリードタグ（breed_tag）のタームを取得
    $breed_terms = get_terms( array(
      'taxonomy' => 'breed_tag',
      // 必要に応じて 'hide_empty' => false を追加
    ) );
    ?>

    <?php foreach ( $breed_terms as $breed_term ) : ?>
      <?php
      // カスタム投稿 "royalcanin_award" を、グループ（$term）とブリードで絞り込み
      $args = array(
        'post_type' => 'royalcanin_award',
        'tax_query' => array(
          array(
            'taxonomy' => 'royalcanin_award_category',
            'field'    => 'slug',
            'terms'    => $term,
          ),
          array(
            'taxonomy' => 'breed_tag',
            'field'    => 'slug',
            'terms'    => $breed_term->slug,
          )
        )
      );
      $the_query = new WP_Query( $args );
      ?>

      <?php if ( $the_query->have_posts() ) : ?>
        <div class="p-royalcanin-breed">
          <h3 class="c-heading c-heading--lv3"><?php echo esc_html( $breed_term->name ); ?></h3>
          <div class="c-card-grid-3 c-card-grid-3--define">
            <div class="c-card-grid c-card-grid--3">
              <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="c-card-item-style-3">
                  <article class="c-card-item-style-3">
                    <figure class="c-card-item-style-3__img-wrapper">
                      <?php if ( get_field('acf_royalcanin_award')['acf_royalcanin_award_img_url'] ) : ?>
                        <img decoding="async" src="<?php echo esc_url( get_field('acf_royalcanin_award')['acf_royalcanin_award_img_url'] ); ?>" alt="" />
                      <?php else : ?>
                        <img decoding="async" src="<?php echo get_template_directory_uri(); ?>/assets/images/common/cmn-no_image.jpg" alt="No Image" />
                      <?php endif; ?>
                    </figure>
                    <div class="c-card-item-style-3__content">
                      <dl class="c-card-item-style-3__define-lists">
                        <dt class="c-card-item-style-3__define-term">犬名</dt>
                        <dd class="c-card-item-style-3__define-descr"><?php echo esc_html( get_the_title() ); ?></dd>

                        <?php if ( get_field('acf_royalcanin_award')['acf_royalcanin_award_title'] ) : ?>
                          <dt class="c-card-item-style-3__define-term">称号</dt>
                          <dd class="c-card-item-style-3__define-descr"><?php echo esc_html( get_field('acf_royalcanin_award')['acf_royalcanin_award_title'] ); ?></dd>
                        <?php endif; ?>

                        <?php if ( get_field('acf_royalcanin_award')['acf_royalcanin_award_gender']['label'] ) : ?>
                          <dt class="c-card-item-style-3__define-term">性別</dt>
                          <dd class="c-card-item-style-3__define-descr"><?php echo esc_html( get_field('acf_royalcanin_award')['acf_royalcanin_award_gender']['label'] ); ?></dd>
                        <?php endif; ?>

                        <?php if ( get_field('acf_royalcanin_award')['acf_royalcanin_award_owner'] ) : ?>
                          <dt class="c-card-item-style-3__define-term">所有者</dt>
                          <dd class="c-card-item-style-3__define-descr"><?php echo esc_html( get_field('acf_royalcanin_award')['acf_royalcanin_award_owner'] ); ?></dd>
                        <?php endif; ?>
                      </dl>
                    </div>
                  </article>
                </div>
              <?php endwhile; ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>

  <?php wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>
