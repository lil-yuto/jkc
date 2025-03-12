<?php
/*
Template Name: 子ページリストテンプレート
Description: このテンプレートは、固定ページの子ページをリスト表示するためのテンプレートです。固定ページのタイトル、サブタイトル、パンくずリストおよび子ページ一覧を表示し、ページ順に子ページが整然と並ぶレイアウトを提供します。
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>

        <main>
            <div class="p-sub-fv l-sub-fv">

                <div class="p-sub-fv__container l-container">
                    <hgroup class="p-sub-fv__title c-page-title">
                        <h2 class="c-page-title__main"><?php the_title(); ?></h2>
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
                <?php
                $post_type_slug = get_post_type();
                $args = array(
                    'post_parent' => get_the_ID(),
                    'post_type' => $post_type_slug,
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                );
                $page_children = new WP_Query($args);
                ?>

                <div class="c-text-link">

                    <?php
                    // ACFの隠しページオプションから非表示にする投稿IDを取得
                    $hidden_ids = [];
                    if (have_rows('hidden_repeat', 'option')) {
                        while (have_rows('hidden_repeat', 'option')) {
                            the_row();
                            $hidden_post = get_sub_field('hidden_object');
                            if ($hidden_post) {
                                $hidden_ids[] = $hidden_post->ID;
                            }
                        }
                    }

                    // WP_Query の設定（非表示のIDを除外）
                    $args = [
                        'post_type'      => 'page',
                        'posts_per_page' => -1,
                        'post__not_in'   => $hidden_ids,
                        'post_parent'    => get_the_ID(), // 子ページのみ取得
                    ];

                    $page_children = new WP_Query($args);
                    ?>

                    <ul class="c-text-link__items">
                        <?php if ($page_children->have_posts()): ?>
                            <?php while ($page_children->have_posts()): $page_children->the_post(); ?>
                                <li class="c-text-link__item">
                                    <a href="<?php the_permalink(); ?>" class="c-text-link__link"><?php the_title(); ?></a>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                </div>
            </div>
        </main>

    <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
