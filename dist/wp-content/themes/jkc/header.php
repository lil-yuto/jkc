<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head() ?>
</head>

<body>
  <header class="l-header">
    <div class="l-header__container">
      <?php if (is_front_page()): ?>
        <h1 class="l-header__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__logo-image-wrapper"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-logo--ico01.png" alt="一般社団法人ジャパンケネルクラブ" /></a>
        </h1>
      <?php else: ?>
        <div class="l-header__logo">
          <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__logo-image-wrapper"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-logo--ico01.png" alt="一般社団法人ジャパンケネルクラブ" /></a>
        </div>
      <?php endif; ?>

      <div class="l-header__top l-nav">
        <div class="l-nav__icon">
          <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-dog-ico01.png" width="1280" height="800" alt="">
        </div>

        <ul class="l-nav__list">
          <li class="l-nav__item"><a href="<?php echo esc_url(home_url('/news/')); ?>" class="l-nav__link">お知らせ</a></li>
          <li class="l-nav__item l-nav__item--info"><a href="<?php echo esc_url(home_url('/generalinfo/')); ?>" class="l-nav__link">総合案内</a></li>
          <li class="l-nav__item"><a href="<?php echo esc_url(home_url('/membership/info/')); ?>" class="l-nav__link">会員向け情報</a></li>
          <!-- <li class="l-nav__item u-uppercase"><a href="http://" class="l-nav__link">English</a></li> -->
        </ul>

        <ul class="l-nav__panels">
          <li class="l-nav__item-panel">
            <a href="javascript:void(0)" class="l-nav__link-panel l-nav__link-panel--seearch"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-search-ico01.svg" alt="" />検索</a>
          </li>
          <li class="l-nav__item-panel">
            <a href="<?php echo esc_url(home_url('/registrations/')); ?>" class="l-nav__link-panel l-nav__link-panel--download"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-download-ico01.svg" alt="" />ダウンロード</a>
          </li>
          <li class="l-nav__item-panel">
            <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="l-nav__link-panel l-nav__link-panel--qa"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-qa-ico01.svg" alt="" />FAQ</a>
          </li>
        </ul>
        <button type="button" class="l-header__menu-button l-menu-button js-burgerBtn">
          <div class="l-menu-button__content">
            <span class="l-menu-button__icon"></span>
            <span class="l-menu-button__text u-uppercase">Menu</span>
          </div>
        </button>

        <?php get_search_form(); ?>
      </div>
      <nav class="l-header__bottom l-gnav">
        <ul class="l-gnav__list">
          <li class="l-gnav__item is-current"><a href="<?php echo esc_url(home_url('/')); ?>" class="l-gnav__link">ホーム</a></li>
          <!-- <li class="l-gnav__item"><a href="<?php echo esc_url(home_url('/aboutus/')); ?>" class="l-gnav__link">JKCの活動内容</a></li> -->

          <li class="l-gnav__item js-megaParent">
            <a href="<?php echo esc_url(home_url('/aboutus/')); ?>">
              <span class="l-gnav__link">JKCの活動内容</span>
            </a>

            <div class="l-gnav__meganav l-meganav">
              <div class="l-meganav__bg">
                <div class="l-meganav__container">

                  <h5 class="l-meganav__title">
                    <a href="<?php echo esc_url(home_url('/aboutus/')); ?>">JKCの活動内容</a>
                  </h5>

                  <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'aboutus',
                      'container' => false,
                      'items_wrap' => '<ul class="l-meganav__list">%3$s</ul>',
                    )
                  );
                  ?>
                </div>
              </div>
            </div>
          </li>
          <li class="l-gnav__item js-megaParent">
            <a href="<?php echo esc_url(home_url('/pedigrees/')); ?>">
              <span class="l-gnav__link">血統証明書について</span>
            </a>

            <div class="l-gnav__meganav l-meganav">
              <div class="l-meganav__bg">
                <div class="l-meganav__container">

                  <h2 class="l-meganav__title">
                    <a href="<?php echo esc_url(home_url('/pedigrees/')); ?>">血統証明書について</a>
                  </h2>

                  <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'pedigrees',
                      'container' => false,
                      'items_wrap' => '<ul class="l-meganav__list">%3$s</ul>',
                    )
                  );
                  ?>
                </div>
              </div>
            </div>
          </li>
          <li class="l-gnav__item js-megaParent">
            <a href="<?php echo esc_url(home_url('/events/')); ?>">
              <span class="l-gnav__link">イベント</span>
            </a>

            <div class="l-gnav__meganav l-meganav">
              <div class="l-meganav__bg">
                <div class="l-meganav__container">

                  <h2 class="l-meganav__title">
                    <a href="<?php echo esc_url(home_url('/events/')); ?>">イベント</a>
                  </h2>

                  <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'event',
                      'container' => false,
                      'items_wrap' => '<ul class="l-meganav__list">%3$s</ul>',
                    )
                  );
                  ?>
                </div>
              </div>
            </div>
          </li>

          <li class="l-gnav__item js-megaParent">
            <!-- <a href="http://" class="l-gnav__link">犬の知識</a> -->
            <a href="<?php echo esc_url(home_url('/doginfo/')); ?>">
              <span class="l-gnav__link">犬の知識</span>

            </a>

            <div class="l-gnav__meganav l-meganav">
              <div class="l-meganav__bg">
                <div class="l-meganav__container">

                  <h2 class="l-meganav__title">
                    <a href="<?php echo esc_url(home_url('/doginfo/')); ?>">犬の知識</a>
                  </h2>

                  <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'doginfo',
                      'container' => false,
                      'items_wrap' => '<ul class="l-meganav__list">%3$s</ul>',
                    )
                  );
                  ?>

                  <h2 class="l-meganav__title">
                    <a href="<?php echo esc_url(home_url('/doginfo/kids/')); ?>">こども向けコンテンツ</a>
                  </h2>

                  <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'kids',
                      'container' => false,
                      'items_wrap' => '<ul class="l-meganav__list">%3$s</ul>',
                    )
                  );
                  ?>
                </div>
              </div>
            </div>
          </li>
          <li class="l-gnav__item js-megaParent">
            <a href="<?php echo esc_url(home_url('/qualifications/')); ?>">
              <span class="l-gnav__link">JKC公認資格</span>
            </a>

            <div class="l-gnav__meganav l-meganav">
              <div class="l-meganav__bg">
                <div class="l-meganav__container">

                  <h2 class="l-meganav__title">
                    <a href="<?php echo esc_url(home_url('/qualifications/')); ?>">JKC公認資格</a>
                  </h2>

                  <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'qualifications',
                      'container' => false,
                      'items_wrap' => '<ul class="l-meganav__list">%3$s</ul>',
                    )
                  );
                  ?>
                </div>
              </div>
            </div>
          </li>
          <li class="l-gnav__item js-megaParent">
            <a href="<?php echo esc_url(home_url('/merchandise/')); ?>">
              <span class="l-gnav__link">刊行物</span>
            </a>

            <div class="l-gnav__meganav l-meganav">
              <div class="l-meganav__bg">
                <div class="l-meganav__container">

                  <h2 class="l-meganav__title">
                    <a href="<?php echo esc_url(home_url('/merchandise/')); ?>">刊行物</a>
                  </h2>

                  <?php
                  wp_nav_menu(
                    array(
                      'theme_location' => 'merchandise',
                      'container' => false,
                      'items_wrap' => '<ul class="l-meganav__list">%3$s</ul>',
                    )
                  );
                  ?>
                </div>
              </div>
            </div>
          </li>
        </ul>

        <ul class="l-gnav__list-sp l-gnav-sp">

          <li class="l-gnav-sp__item"><a href="<?php echo esc_url(home_url('/news/')); ?>" class="l-gnav-sp__link"><span>お知らせ</span></a></li>
          <li class="l-gnav-sp__item"><a href="<?php echo esc_url(home_url('/membership/info/')); ?>" class="l-gnav-sp__link"><span>会員向け情報</span></a></li>

          <li class="l-gnav-sp__item-panel">
            <a href="http://" class="l-gnav-sp__link-panel l-gnav-sp__link-panel--download">ダウンロード</a>
          </li>
          <li class="l-gnav-sp__item-panel">
            <a href="<?php echo esc_url(home_url('/faq/')); ?>" class="l-gnav-sp__link-panel l-gnav-sp__link-panel--qa">FAQ</a>
          </li>

          <li class="l-gnav-sp__item-search">
            <form id="form" action="<?php echo esc_url(home_url()); ?>" method="get">
              <input id="s-box" name="s" type="text" placeholder="検索" />
              <button type="submit" id="s-btn-area">
                <img src='<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-search-ico01.svg' alt='' width='' height=''>
              </button>
            </form>
            <!-- <a href="http://" class="l-gnav-sp__link-panel l-gnav-sp__link-panel--seearch"><img src="<//?php echo get_template_directory_uri() ?>/assets/images/common/cmn-search-ico01.svg" alt="" />検索</a> -->
          </li>
          <!-- <li class="l-gnav-sp__item-japanese u-uppercase"><a href="http://" class="l-gnav-sp__link">日本語</a></li> -->
          <!-- <li class="l-gnav-sp__item-english u-uppercase"><a href="http://" class="l-gnav-sp__link">English</a></li> -->
        </ul>
      </nav>
    </div>
  </header>
