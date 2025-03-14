<?php get_header(); ?>

<main>
  <div class="p-sub-fv l-sub-fv">

    <div class="p-sub-fv__container l-container">
      <div class="p-sub-fv__title c-page-title">
        <h1 class="c-page-title__main">犬種別犬籍登録頭数</h1>
      </div>
    </div>

  </div>

  <div class="p-sub-fv__breadcrumbs c-breadcrumbs l-breadcrumbs">
    <?php if (function_exists('bcn_display')) {
      bcn_display();
    }; ?>
  </div>


  <div class="l-container l-container--sub">
    <div class="p-registr-statistics">
      <section class="p-registr-statistics__lead">
        <p class="c-text has-light-green-background-color"><span class="u-bold">「犬種別犬籍登録頭数」とは、1月～12月までの１年間に本会の血統データに新規に血統登録され、血統証明書が発行された犬の頭数です。</span><br><br>【ご注意】<br>1年間分の頭数しか日本にいないということではありません。犬の寿命を10年～15年と仮定した場合に、その期間の登録数を積算することにより、おおよその頭数は把握できると思われます。(ただし、登録後の死亡・輸出の頭数は含まれません。)</p>
      </section>
    </div>
    <div class="p-registr-statistics__content">
      <?php
      // 1回のクエリで全記事を取得
      $args = array(
        'post_type' => 'registr-statistics',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'ASC',
      );

      $query = new WP_Query($args);

      if ($query->have_posts()) :
        // 最初の記事（最新の記事）を取得して表示
        $query->the_post();
        ?>
        <article class="p-registr-statistics__latest">
          <h2 class="c-heading c-heading--lv2"><?php the_title(); ?></h2>
          <div class="p-registr-statistics__latest-content">
            <?php the_content(); ?>
          </div>
        </article>
        <?php

        // 残りの記事があれば、アーカイブリンクとして表示
        if ($query->post_count > 1) :
        ?>
        <article class="p-single-breeds__relation">
          <h2 class="c-heading c-heading--lv2">過去の犬種別犬籍登録頭数</h2>

          <div class="c-text has-light-green-background-color has-background">
            <div class="c-text-link is-style-text-link-direction-row wrap">
              <ul class="c-text-link__items">
                <?php
                // 2番目の記事から順に表示（最初の記事はすでに表示済み）
                while ($query->have_posts()) : $query->the_post();
                ?>
                <li class="c-text-link-item">
                  <a href="<?php echo esc_url(get_permalink()); ?>" class="c-text-link-item__link"><?php the_title(); ?></a>
                </li>
                <?php
                endwhile;
                ?>
              </ul>
            </div>
          </div>
        </article>
        <?php
        endif;
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</main>

<?php get_footer() ?>
