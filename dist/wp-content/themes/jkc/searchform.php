<div class="l-search">
  <div class="l-search__mask"></div>
  <div class="l-search__container">
    <div class="l-search__inr">
      <dl>
        <div class="l-search__box">
          <dt>サイト内検索</dt>
          <dd>
            <div class="l-gnav-sp__item-search">
              <form id="form" action="<?php echo esc_url(home_url()); ?>" method="get">
                <input id="s-box" name="s" type="text" placeholder="キーワードを入力して下さい" />
                <button type="submit" id="s-btn-area">
                  <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/cmn-search-ico01.svg" alt="" width="" height="">
                </button>
              </form>
            </div>
          </dd>
        </div>
      </dl>
    </div>
  </div>
</div>
