<?php get_header('top'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/index.css"><?php /* webright */ ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/sub.css"><?php /* webright */ ?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/sub_archives.css"><?php /* webright */ ?>

<?php $parent_id = 217; /* 「JKCについて」ページID */ ?>
<?php if (get_field('acf_lw_eyecatch', $parent_id)) : /* 最上層ページIDからヘッダー画像を取得 */ ?>
    <?php $acf_lw_eyecatch = get_field('acf_lw_eyecatch', $parent_id); ?>
    <?php $acf_lw_eyecatch = wp_get_attachment_image_src($acf_lw_eyecatch, 'full'); ?>
    <?php $acf_lw_eyecatch = $acf_lw_eyecatch[0]; ?>
<?php else : ?>
    <?php $acf_lw_eyecatch = get_template_directory_uri() . '/images/common/title_bg.png'; /* 取得できない場合は代替画像を表示 */ ?>
<?php endif; ?>

<?php get_header('bottom'); ?>

<body <?php body_class(); ?>>
    <div id="container">
        <?php get_header('contents'); ?>
        <div class="jkc">
            <section id="main">
                <div class="topBox">
                    <div class="pageTitlearea" style="background: url('<?php echo $acf_lw_eyecatch; /* ヘッダー画像URL */ ?>') no-repeat center; background-size: cover;">
                        <div class="bread_crumb_list">
                            <ul class="bread_crumb">
                                <li class="level-1 top"><a href="<?php echo esc_url(home_url('/')); ?>">HOME</a></li>
                                <li class="level-2 sub tail current"><strong>サイト内検索</strong></li>
                            </ul>
                        </div>
                        <div class="title">サイト内検索</div>
                    </div>
                    <?php get_template_part('search', 'ui'); /* 検索窓UI */ ?>
                </div>
                <div class="subContainer">
                    <div class="subInner">

                        <?php if (have_posts()): ?>
                            <?php if (isset($_GET['s']) && empty($_GET['s'])): ?>
                                <p style="font-size: 1.2em; text-align: center; margin-top: 50px;">検索キーワードが入力されていません</p>
                            <?php else: ?>
                                <section id="header">
                                    <div class="wrap_left">
                                        <h1><?php echo '“' . $_GET['s'] . '”の検索結果'; ?></h1>
                                        <p style="margin-bottom: 40px;"><?php echo $wp_query->found_posts; ?>件のページが検索されました</p>
                                    </div>
                                </section>
                                <ul class="archives-list">
                                    <?php while (have_posts()): the_post(); ?>
                                        <li><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></li>
                                    <?php endwhile; ?>
                                </ul>
                            <?php endif; ?>
                        <?php else: ?>
                            <p style="font-size: 1.2em; text-align: center; margin-top: 50px;">キーワード検索されたページはありません</p>
                        <?php endif; ?>

                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>

                <?php get_template_part('banner', 'footer'); ?>

            </section>
            <?php get_footer(); ?>
        </div>
    </div>

    <?php get_template_part('modules/common_js'); ?>
</body>

</html>
