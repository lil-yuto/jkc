<?php get_header() ?>
<main>
  <div class="p-top-main-visual l-main-visual">
    <div class="p-top-main-visual__container">
      <ul class="p-top-main-visual__side p-side-menu">
        <li class="p-side-menu__item">
          <a href="http://" class="p-side-menu__link p-side-menu__link--beginner"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-beginner-ico01.svg" alt="" />初めての方へ</a>
        </li>
        <li class="p-side-menu__item">
          <a href="http://" class="p-side-menu__link p-side-menu__link--event"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-schedule-ico01.svg" alt="" />ドッグショー<br />競技会スケジュール</a>
        </li>
        <li class="p-side-menu__item">
          <a href="http://" class="p-side-menu__link p-side-menu__link--document"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-document-ico01.svg" alt="" />血統証明書・<br />各種申請</a>
        </li>
        <li class="p-side-menu__item">
          <a href="http://" class="p-side-menu__link p-side-menu__link--dog"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-dog-type-ico01.svg" alt="" />犬種紹介</a>
        </li>
      </ul>
      <div class="p-top-main-visual__main">
        <div class="p-top-main-visual__slider splide js-slider" role="group" aria-label="Splideの基本的なHTML">
          <div class="splide__track">
            <ul class="splide__list">
              <li class="splide__slide">
                <picture>
                  <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01.png">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01-sp.png" alt="" />
                </picture>
              </li>
              <li class="splide__slide">
                <picture>
                  <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01.png">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01-sp.png" alt="" />
                </picture>
              </li>
              <li class="splide__slide">
                <picture>
                  <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01.png">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01-sp.png" alt="" />
                </picture>
              </li>
              <li class="splide__slide">
                <picture>
                  <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01.png">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01-sp.png" alt="" />
                </picture>
              </li>
              <li class="splide__slide">
                <picture>
                  <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01.png">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-mv-img01-sp.png" alt="" />
                </picture>
              </li>
            </ul>
          </div>
          <div class="splide__arrows">
            <button class="splide__arrow splide__arrow--prev button prev"></button>
            <button class="splide__arrow splide__arrow--next button next"></button>
          </div>
        </div>
        <div class="p-top-main-visual__pickup p-pickup">
          <div class="p-pickup__head">
            <p class="p-pickup__title u-uppercase">Pick up</p>
            <a href="http://" class="p-pickup__link c-link-icon">一覧を見る</a>
          </div>
          <ul class="p-pickup__list">
            <li>
              <a href="http://" class="p-pickup__item p-post">
                <time datetime="2024-06-05" class="p-post__date">2024.6.5</time>
                <p class="p-post__category c-label">その他</p>
                <p class="p-post__title">2024第48回 夏休み犬の絵コンクール　作品募集!!</p>
              </a>
            </li>
            <li>
              <a href="http://" class="p-pickup__item p-post">
                <time datetime="2024-06-04" class="p-post__date">2024.6.4</time>
                <p class="p-post__category c-label">犬種スタンダード</p>
                <p class="p-post__title">プードルの犬種標準改正について（2024年8月1日施行）</p>
              </a>
            </li>
            <li>
              <a href="http://" class="p-pickup__item p-post">
                <time datetime="2024-05-07" class="p-post__date">2024.5.7</time>
                <p class="p-post__category c-label">各種競技会</p>
                <p class="p-post__title">「JKC創立75周年記念 第29回2024FCI-IGP競技大会」開催</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- NEWS -->
  <section class="p-top-news l-section">
    <div class="p-top-news__container l-container">
      <div class="p-top-news__title-area">
        <hgroup class="p-top-news__title c-headeing-lv2">
          <h2 class="c-headeing-lv2__main u-uppercase">News</h2>
          <p class="c-headeing-lv2__sub">お知らせ</p>
        </hgroup>
        <div class="p-top-news__more u-hidden-pc">
          <a href="http://" class="p-top-news__more-link c-link-icon">一覧を見る</a>
        </div>
      </div>
      <div class="p-top-news__content">
        <div class="p-top-news__select-wrapper">
          <label for="news-category" class="p-top-news__selectbox">
            <select name="news-category" id="news-category">
              <option value="全て">全て</option>
              <option value="ドッグショー">ドッグショー</option>
              <option value="重要なお知らせ">重要なお知らせ</option>
            </select>
          </label>
          <div class="p-top-news__more u-hidden-sp"><a href="http://" class="p-top-news__more-link c-link-icon">一覧を見る</a></div>
        </div>
        <div class="p-top-news__categories">
          <ul class="p-top-news__category-list">
            <li><a href="http://" class="p-top-news__category-link c-label-white">全て</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">重要なお知らせ</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">注意喚起</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">JKC公認資格</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white is-selected">ドッグショー</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">各種競技会</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">血統証明書</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">犬種スタンダード</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">マイクロチップ</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">IGP</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">訓練競技会</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">フライボール競技会</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">ドッグダンス</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">オビディエンス競技会</a></li>
            <li><a href="http://" class="p-top-news__category-link c-label-white">その他</a></li>
          </ul>
        </div>
        <div class="p-top-news__posts p-posts">
          <ul class="p-posts__list">
            <li>
              <a href="http://" class="p-posts__item">
                <time datetime="2024-06-06" class="p-posts__date">2024.6.6</time>
                <p class="p-posts__category">ドッグショー</p>
                <p class="p-posts__title">【注意】ドイツ／イタリア原産11犬種に関する断耳／断尾された犬のドッグ・ショー出陳について</p>
              </a>
            </li>
            <li>
              <a href="http://" class="p-posts__item">
                <time datetime="2024-06-06" class="p-posts__date">2024.6.6</time>
                <p class="p-posts__category">その他</p>
                <p class="p-posts__title">【重要】アペンディクス登録について</p>
              </a>
            </li>
            <li>
              <a href="http://" class="p-posts__item">
                <time datetime="2024-06-06" class="p-posts__date">2024.6.6</time>
                <p class="p-posts__category">ドッグショー</p>
                <p class="p-posts__title">展覧会システムの改正について　解説(1)　(2022年4月～)</p>
              </a>
            </li>
            <li>
              <a href="http://" class="p-posts__item">
                <time datetime="2024-06-06" class="p-posts__date">2024.6.6</time>
                <p class="p-posts__category">ドッグショー</p>
                <p class="p-posts__title">展覧会システムの改正について　解説(2)　(2022年4月～)</p>
              </a>
            </li>
            <li>
              <a href="http://" class="p-posts__item">
                <time datetime="2024-06-06" class="p-posts__date">2024.6.6</time>
                <p class="p-posts__category">ドッグショー</p>
                <p class="p-posts__title">展覧会システムの改正について　解説(3)　(2022年4月～)</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- ABOUT -->
  <section class="p-top-about l-section">
    <div class="p-top-about__container l-container">
      <div class="p-top-about__title">
        <hgroup class="c-headeing-lv2">
          <h2 class="c-headeing-lv2__main u-uppercase">About</h2>
          <p class="c-headeing-lv2__sub">主な活動内容</p>
        </hgroup>
      </div>
      <div class="p-top-about__content">
        <div class="p-top-about__summury p-top-about-summury">
          <div class="p-top-about-summury__body">
            <p class="p-top-about-summury__text">一般社団法人ジャパンケネルクラブ（JKC）は、純粋犬種の保護と健全性向上のため『血統証明書』を発行するとともに、ドッグショーの開催を通して素晴らしい犬種たちを紹介しています。<br><br>さらに、訓練競技会、アジリティー競技会、フライボール競技会、ドッグダンス競技会などを開催することで、そこに参加する多くの飼い主の皆様へ、犬の高い能力の素晴らしさや、犬と暮らす楽しさを広く伝えています。<br><br>その犬の能力は、災害時にも役立つことが知られています。ＪＫＣでは、地震等の災害時に被災者捜索を行う災害救助犬の育成を1991年より行っており、出動可能な災害救助犬を全国に配備しております。<br><br>また、国民の動物愛護精神向上のため、「夏休み犬の絵コンクール」「愛犬とのふれあい写真コンテスト」「愛犬とのふれあいの俳句」を実施しており、全国から数多くのご応募をいただいております。<br><br>JKCでは、犬に関わる職業に就きたいという会員様に役立つ資格として「トリマー」「訓練士」「ハンドラー」等の本会公認資格の認定、「愛犬飼育管理士」資格取得のための講習会・試験を行っています。</p>
          </div>
          <div class="p-top-about-summury__img-wrapper">
            <picture>
              <source media="(min-width: 768px)" srcset="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-about-img01.png">
              <img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-about-img01-sp.png" alt="" />
            </picture>
          </div>
        </div>
        <div class="p-top-about__list-wrapper">
          <div class="p-top-about__list">
            <a href="http://" class="p-top-about__item p-top-about-item">
              <div class="p-top-about-item__img-wrapper"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-about-post-img01.png" alt="" /></div>
              <h3 class="p-top-about-item__title">純粋犬種の犬籍登録</h3>
              <p class="p-top-about-item__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </a>
            <a href="http://" class="p-top-about__item p-top-about-item">
              <div class="p-top-about-item__img-wrapper"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-about-post-img02.png" alt="" /></div>
              <h3 class="p-top-about-item__title">展覧会・競技会の開催</h3>
              <p class="p-top-about-item__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </a>
            <a href="http://" class="p-top-about__item p-top-about-item">
              <div class="p-top-about-item__img-wrapper"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-about-post-img03.png" alt="" /></div>
              <h3 class="p-top-about-item__title">災害救助犬育成事業</h3>
              <p class="p-top-about-item__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </a>
            <a href="http://" class="p-top-about__item p-top-about-item">
              <div class="p-top-about-item__img-wrapper"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-about-post-img04.png" alt="" /></div>
              <h3 class="p-top-about-item__title">犬を通した社会への貢献</h3>
              <p class="p-top-about-item__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </a>
            <a href="http://" class="p-top-about__item p-top-about-item">
              <div class="p-top-about-item__img-wrapper"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-about-post-img05.png" alt="" /></div>
              <h3 class="p-top-about-item__title">資格取得や飼育指導</h3>
              <p class="p-top-about-item__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
            </a>
          </div>
        </div>
        <div class="p-top-about__button-wrapper">
          <button type="button" class="p-top-about__toggle-button c-button js-toggle-button">もっと見る</button>
        </div>
      </div>
    </div>
  </section>
  <!-- CONTENTS -->
  <section class="p-top-contents l-section">
    <div class="p-top-contents__container l-container">
      <div class="p-top-contents__title">
        <hgroup class="c-headeing-lv2 c-headeing-lv2--row">
          <h2 class="c-headeing-lv2__main u-uppercase">Contents</h2>
          <p class="c-headeing-lv2__sub">おすすめコンテンツ</p>
        </hgroup>
      </div>
      <div class="p-top-contents__content">
        <div class="p-top-contents__list">
          <div class="p-content u-hidden-sp">
            <hgroup class="c-headeing-lv2 c-headeing-lv2--row">
              <h2 class="c-headeing-lv2__main u-uppercase">Contents</h2>
              <p class="c-headeing-lv2__sub">おすすめコンテンツ</p>
            </hgroup>
          </div>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--kanrishi"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-kanrishi-ico01.svg" alt="JKC愛犬飼育管理士" /></div>
            <h3 class="p-content__title">ＪＫＣ愛犬飼育管理士</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--schedule"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-schedule-ico01.svg" alt="イベントスケジュール" /></div>
            <h3 class="p-content__title">イベントスケジュール</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--certificate"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-certificate-ico01.svg" alt="血統証明書について" /></div>
            <h3 class="p-content__title">血統証明書について</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--doc-type"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-dog-type-ico01.svg" alt="世界の犬" /></div>
            <h3 class="p-content__title">世界の犬</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--gazette"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-gazette-ico01.svg" alt="ＪＫＣガゼット" /></div>
            <h3 class="p-content__title">会報誌『ＪＫＣガゼット』<br>アンケート・プレゼント</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--channel"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-channel-ico01.svg" alt="ＪＫＣチャンネル" /></div>
            <h3 class="p-content__title">ＪＫＣチャンネル<br class="u-hidden-sp">～動画配信～</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--icon-first-dog"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-first-dog-ico01.svg" alt="初めて犬を飼うには" /></div>
            <h3 class="p-content__title">初めて犬を飼うには</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--rescue-dog"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-rescue-dog-ico01.svg" alt="災害救助犬について" /></div>
            <h3 class="p-content__title">災害救助犬について</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--photo-contest"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-photo-contest-ico01.svg" alt="写真コンテスト" /></div>
            <h3 class="p-content__title">写真コンテスト</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--art-contest"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-dog-art-contest-ico01.svg" alt="犬の絵コンクール" /></div>
            <h3 class="p-content__title">犬の絵コンクール</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
          <a href="http://" class="p-content">
            <div class="p-content__image p-content__image--haiku"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-haiku-ico01.svg" alt="ふれあいの俳句" /></div>
            <h3 class="p-content__title">ふれあいの俳句</h3>
            <p class="p-content__description">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</p>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner -->
  <div class="p-top-banner l-banner">
    <div class="p-top-banner l-container">
      <ul class="p-top-banner__list">
        <li>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="p-top-banner__item"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-bnr01.png" alt="" /></a>
        </li>
        <li>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="p-top-banner__item"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-bnr02.png" alt="" /></a>
        </li>
        <li>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="p-top-banner__item"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-bnr03.png" alt="" /></a>
        </li>
        <li>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="p-top-banner__item"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-bnr04.png" alt="" /></a>
        </li>
        <li>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="p-top-banner__item"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-bnr05.png" alt="" /></a>
        </li>
        <li>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="p-top-banner__item"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-bnr06.png" alt="" /></a>
        </li>
        <li>
          <a href="http://" target="_blank" rel="noopener noreferrer" class="p-top-banner__item"><img src="<?php echo get_template_directory_uri() ?>/assets/images/page/top/top-bnr07.png" alt="" /></a>
        </li>
      </ul>
    </div>
  </div>
  <!-- TOPへ戻るボタン -->
  <a href="#" class="c-to-top-button js-c-to-top-button">
    <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-to-top-ico01.png" alt="TOPへ戻る" />
  </a>
</main>
<?php get_footer() ?>
