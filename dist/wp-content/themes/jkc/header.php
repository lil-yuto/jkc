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
            <h1 class="l-header__logo">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="l-header__logo-image-wrapper"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-logo--ico01.png" alt="一般社団法人ジャパンケネルクラブ" /></a>
            </h1>

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
                        <a href="http://" class="l-nav__link-panel l-nav__link-panel--seearch"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-search-ico01.svg" alt="" />検索</a>
                    </li>
                    <li class="l-nav__item-panel">
                        <a href="<?php echo esc_url(home_url('/forms/form_download/')); ?>" class="l-nav__link-panel l-nav__link-panel--download"><img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-download-ico01.svg" alt="" />ダウンロード</a>
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
            </div>
            <nav class="l-header__bottom l-gnav">
                <ul class="l-gnav__list">
                    <li class="l-gnav__item is-current"><a href="<?php echo esc_url(home_url('/')); ?>" class="l-gnav__link">ホーム</a></li>
                    <!-- <li class="l-gnav__item"><a href="<?php echo esc_url(home_url('/aboutus/')); ?>" class="l-gnav__link">JKCの活動内容</a></li> -->

                    <li class="l-gnav__item js-megaParent">
                        <span class="l-gnav__link">JKCの活動内容</span>

                        <div class="l-gnav__meganav l-meganav">
                            <div class="l-meganav__bg">
                                <div class="l-meganav__container">

                                    <h2 class="l-meganav__title">
                                        <a href="<?php echo esc_url(home_url('/aboutus/')); ?>">JKCの活動内容</a>
                                    </h2>
                                    <ul class="l-meganav__list">

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/activities/')); ?>">事業内容</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/organization/')); ?>">組織概要</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/articles/')); ?>">定款</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/history/')); ?>">沿革</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/history_jkc/')); ?>">JKCの歴史</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/disclosure/')); ?>">ディスクロージャー（情報公開）</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/proposal/')); ?>">有識者会議の提言について</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/guidance/')); ?>">入会のご案内</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/3min/')); ?>">3分でわかるジャパンケネルクラブ</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/movie/')); ?>">ジャパンケネルクラブチャンネルYouTube</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/gazette/')); ?>">JKCガゼットのご案内</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/registr-statistics/')); ?>">犬種別犬籍登録頭数</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/aboutus/longevity/')); ?>">長寿犬表彰について</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/rescuedog/')); ?>">災害救助犬の育成</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/jblog/')); ?>">ジャックブログ</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="l-gnav__item js-megaParent">
                        <span class="l-gnav__link">血統証明書について</span>

                        <div class="l-gnav__meganav l-meganav">
                            <div class="l-meganav__bg">
                                <div class="l-meganav__container">

                                    <h2 class="l-meganav__title">
                                        <a href="<?php echo esc_url(home_url('/pedigrees/')); ?>">血統証明書について</a>
                                    </h2>
                                    <ul class="l-meganav__list">

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/pedigrees/breedingguidelines/')); ?>">JKCの繁殖指針</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/pedigrees/crossbreeding/')); ?>">繁殖についての基礎知識</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/pedigrees/law/')); ?>">「動物の愛護及び管理に関する法律」について</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/pedigrees/geneticdisease/')); ?>">遺伝子疾患について考えよう</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/pedigrees/teacup-poodles_mame-shibas/')); ?>">ティーカッププードル、豆柴について</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="l-gnav__item js-megaParent">
                        <span class="l-gnav__link">イベント</span>

                        <div class="l-gnav__meganav l-meganav">
                            <div class="l-meganav__bg">
                                <div class="l-meganav__container">

                                    <h2 class="l-meganav__title">
                                        <a href="<?php echo esc_url(home_url('/events/')); ?>">イベント</a>
                                    </h2>
                                    <ul class="l-meganav__list">

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/')); ?>">ドッグショー 競技会スケジュール</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/dogshow/')); ?>">ドッグショー／各種競技会</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/royalcanin_award/')); ?>">ロイヤルカナンアワードについて</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/jkc_bleeding_award/')); ?>">JKCブリーディングアワード</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/trainings/')); ?>">訓練競技会</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/agility/')); ?>">アジリティー競技会</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/flyball/')); ?>">フライボール競技会について</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/obedience/')); ?>">オビディエンス競技会</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/igp/')); ?>">IGP</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/bh/')); ?>">BH</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/dogdance/')); ?>">ドッグダンス</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/trimming/')); ?>">トリミング競技会</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/handling/')); ?>">ハンドリング競技会</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/juniorhandler/')); ?>">ジュニアハンドラー</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/results/')); ?>">過去の大会結果</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/picture_contest/')); ?>">犬の絵コンクールについて</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/events/photo_contest/')); ?>">愛犬とのふれあい写真コンテスト について</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/haiku_contest/haiku_contest/')); ?>">愛犬とのふれあいの俳句</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="l-gnav__item js-megaParent">
                        <!-- <a href="http://" class="l-gnav__link">犬の知識</a> -->
                        <span class="l-gnav__link">犬の知識</span>

                        <div class="l-gnav__meganav l-meganav">
                            <div class="l-meganav__bg">
                                <div class="l-meganav__container">

                                    <h2 class="l-meganav__title">
                                        <a href="<?php echo esc_url(home_url('/doginfo/')); ?>">犬の知識</a>
                                    </h2>
                                    <ul class="l-meganav__list">

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/doginfo/preparation/')); ?>">心構え、犬の選び方、環境の準備など</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/doginfo/explanation/')); ?>">保健所への登録、予防接種など法的に必要な手続きの解説</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/doginfo/care/')); ?>">平均的な寿命、費用、年齢別に必要なケアなどの解説</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/doginfo/info/')); ?>">動物愛護管理法の重要な部分のみ解説、環境省へのリンクなど</a>
                                        </li>

                                    </ul>

                                    <h2 class="l-meganav__title">
                                        <a href="<?php echo esc_url(home_url('/doginfo/kids/')); ?>">こども向けコンテンツ</a>
                                    </h2>
                                    <ul class="l-meganav__list">

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/doginfo/kids/other/')); ?>">夏休みの自由研究テーマ</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('#')); ?>">ジュニアハンドラーになりたい!!</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="l-gnav__item js-megaParent">
                        <span class="l-gnav__link">JKC公認資格</span>

                        <div class="l-gnav__meganav l-meganav">
                            <div class="l-meganav__bg">
                                <div class="l-meganav__container">

                                    <h2 class="l-meganav__title">
                                        <a href="<?php echo esc_url(home_url('/qualifications/')); ?>">JKC公認資格</a>
                                    </h2>
                                    <ul class="l-meganav__list">

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/qualifications/automatic-debit/')); ?>">「資格更新料の自動引落」のご利用について</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/qualifications/dogcareadvisor/')); ?>">愛犬飼育管理士</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/qualifications/trimmer/')); ?>">トリマー</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/qualifications/handler/')); ?>">ハンドラー</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/qualifications/dog_trainer/')); ?>">訓練士</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/qualifications/steward/')); ?>">スチュワード</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/qualifications/judges/')); ?>">審査員</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/qualifications/animal-hygienist/')); ?>">アニマル衛生士</a>
                                        </li>

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/qualifications/voluntary-training/')); ?>">自主研修会／日程</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="l-gnav__item js-megaParent">
                        <span class="l-gnav__link">刊行物</span>

                        <div class="l-gnav__meganav l-meganav">
                            <div class="l-meganav__bg">
                                <div class="l-meganav__container">

                                    <h2 class="l-meganav__title">
                                        <a href="<?php echo esc_url(home_url('/merchandise/')); ?>">刊行物</a>
                                    </h2>
                                    <ul class="l-meganav__list">

                                        <li class="l-meganav__item">
                                            <a href="<?php echo esc_url(home_url('/merchandise/publications/')); ?>">犬の健康管理手帳について</a>
                                        </li>

                                    </ul>
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
                        <form id="form" action="自分のサイトURL" method="get">
                            <input id="s-box" name="s" type="text" placeholder="検索" />
                            <button type="submit" id="s-btn-area">
                                <img src='<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-search-ico01.svg' alt='' width='' height=''>
                            </button>
                        </form>
                        <!-- <a href="http://" class="l-gnav-sp__link-panel l-gnav-sp__link-panel--seearch"><img src="<//?php echo get_template_directory_uri() ?>/assets/images/common/cmn-search-ico01.svg" alt="" />検索</a> -->
                    </li>
                    <li class="l-gnav-sp__item-japanese u-uppercase"><a href="http://" class="l-gnav-sp__link">日本語</a></li>
                    <!-- <li class="l-gnav-sp__item-english u-uppercase"><a href="http://" class="l-gnav-sp__link">English</a></li> -->
                </ul>
            </nav>
        </div>
    </header>
