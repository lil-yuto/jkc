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
     <ul class="c-text-link__items">

      <?php if ($page_children->have_posts()): ?>
       <?php while ($page_children->have_posts()): ?>
        <?php $page_children->the_post(); ?>
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
