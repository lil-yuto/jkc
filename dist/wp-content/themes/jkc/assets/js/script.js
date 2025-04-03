document.addEventListener("DOMContentLoaded", function () {
  const sliderElement = document.querySelector(".js-slider");
  if (sliderElement) {
    new Splide(sliderElement, {
      type: 'loop',         // ループモード
      autoplay: true,       // 自動再生を有効にする
      interval: 3000,       // 3000ms（3秒）ごとにスライド
      speed: 1000,          // スライドの移動速度
      pauseOnHover: true,   // ホバーで一時停止
      pauseOnFocus: true,   // フォーカスで一時停止
      mediaQuery: "min",
      pagination: true,
      breakpoints: {
        768: {
          pagination: false,
        },
      },
      classes: {
        pagination: "splide__pagination p-top-splide__pagination",
        page: "splide__pagination__page p-top-splide__pagination__page",
      },
    }).mount();
  }

  // イベントページのリダイレクト処理
  // 現在のURLがイベントページ(/events/)かどうかをチェック
  if (window.location.pathname.endsWith('/events/')) {
    // 現在のURLを取得
    let currentUrl = window.location.href;
    // 現在のURLにハッシュが含まれていないかを確認
    if (!currentUrl.includes('#')) {
      // 現在のURLのクエリパラメータをチェック
      const hasQueryParams = window.location.search.length > 0;

      // クエリパラメータがある場合のみ処理
      if (hasQueryParams) {
        // リファラー（遷移元URL）を取得
        const referrer = document.referrer;

        // 遷移元のURLが存在し、同じドメイン内の場合
        if (referrer && new URL(referrer).hostname === window.location.hostname) {
          const referrerUrl = new URL(referrer);
          const referrerHasQuery = referrerUrl.search.length > 0;

          // 遷移元が/events/で終わり、かつクエリパラメータがない場合は、アンカーを追加しない
          if (referrerUrl.pathname.endsWith('/events/') && !referrerHasQuery) {
            // アンカーを追加しない
          } else {
            // それ以外の場合でクエリパラメータがあれば、アンカーを追加
            // #event-resultをURLに追加
            const newUrl = currentUrl + '#event-result';
            // URLを変更（履歴に残さずリダイレクト）
            window.location.replace(newUrl);
          }
        } else {
          // 遷移元がない、または別ドメインの場合でクエリパラメータがあれば、アンカーを追加
          const newUrl = currentUrl + '#event-result';
          window.location.replace(newUrl);
        }
      }
    }
  }

  $(window).on("scroll", function () {
    if ($(this).scrollTop() > 200) {
      $(".c-to-top-button").addClass("is-visible");
    } else {
      $(".c-to-top-button").removeClass("is-visible");
    }
  });

  const megaParents = document.querySelectorAll(".js-megaParent");

  megaParents.forEach((megaParent) => {
    let openTimeOut;

    megaParent.addEventListener("mouseover", function () {
      let windowWidth = window.innerWidth;
      if (windowWidth > 767) {
        let megaMenu = megaParent.querySelector(".l-meganav");
        clearTimeout(openTimeOut);

        openTimeOut = setTimeout(() => {
        gsap.to(megaMenu, { height: "auto" });
      }, 400);
      }
    });

    megaParent.addEventListener("mouseleave", function () {
      let windowWidth = window.innerWidth;
      if (windowWidth > 767) {
        let megaMenu = megaParent.querySelector(".l-meganav");
        clearTimeout(openTimeOut);
        gsap.to(megaMenu, { height: 0 });
      }
    });

    megaParent.addEventListener("click", function () {
      let windowWidth = window.innerWidth;
      let megaMenu = megaParent.querySelector(".l-meganav");
      if (windowWidth <= 767 && megaParent.classList.contains("megaOpen")) {
        gsap.to(megaMenu, { height: 0 });
        megaParent.classList.remove("megaOpen");
      } else if (windowWidth <= 767 && !megaParent.classList.contains("megaOpen")) {
        gsap.to(megaMenu, { height: "auto" });
        megaParent.classList.add("megaOpen");
      }
    });
  });

  const burgerBtn = document.querySelectorAll(".js-burgerBtn");
  const gnav = document.querySelector(".l-gnav");

  burgerBtn.forEach((burger) => {
    burger.addEventListener("click", function () {
      if (document.querySelector("header").classList.contains("burgerOpen")) {
        document.querySelector("header").classList.remove("burgerOpen");
        document.querySelector(".l-menu-button__text").innerText = "MENU";
        document.querySelector("body").style.cssText = `width: 100%;
    overflow: visible;`;
      } else {
        let bodyWidth = document.body.clientWidth;
        document.querySelector("header").classList.add("burgerOpen");
        document.querySelector(".l-menu-button__text").innerText = "CLOSE";
        document.querySelector("body").style.cssText = `width: ${bodyWidth}px;
        overflow: hidden;`;
      }
    });
  });

  const tabLabels = document.querySelectorAll(".js-tabChange");
  const tabContents = document.querySelectorAll(".js-tabContent");

  tabLabels.forEach((tabTarget) => {
    if (tabTarget.dataset.firstletter === "A" || tabTarget.dataset.firstletter === "ア") {
      tabTarget.checked = true;
      tabContents.forEach((contentsTarget) => {
        if (contentsTarget.classList.contains("A") || contentsTarget.classList.contains("ア")) {
          contentsTarget.classList.add("active");
        } else {
        }
      });
    }

    tabTarget.addEventListener("click", function (tabElement) {
      let keyLetter = tabElement.target.dataset.firstletter;
      tabContents.forEach((contentsElement) => {
        if (!contentsElement.classList.contains(keyLetter)) {
          contentsElement.classList.remove("active");
        } else {
          contentsElement.classList.add("active");
        }
      });
    });
  });

  const accordion_lists = document.querySelectorAll(".p-aikenshiiku-accordion-item");
  accordion_lists.forEach((accordion_item) => {
    accordion_item.addEventListener("toggle", (e) => {
      if (accordion_item.open === true) {
        accordion_item.querySelector(".p-aikenshiiku-accordion__status").innerText = "閉じる";
      }
      // else if (accordion_item.open === false && accordion_item.classList.contains("applyClose")) {
      // 	accordion_item.querySelector(".p-aikenshiiku-accordion__status").innerText = "申込受付終了";
      // }
      else if (accordion_item.open === false) {
        accordion_item.querySelector(".p-aikenshiiku-accordion__status").innerText = "開く";
      }
    });
  });

  const eventAccrordionBtns = document.querySelectorAll(".js-evDetailBtn");

  eventAccrordionBtns.forEach(function (target) {
    target.addEventListener("click", function () {
      const parentElement = this.closest(".p-ev__item");
      const subMenu = parentElement.querySelector(".p-ev__subMenu");

      if (parentElement.classList.contains("accordionOpen")) {
        parentElement.classList.remove("accordionOpen");
        gsap.to(subMenu, { height: 0 });
      } else {
        parentElement.classList.add("accordionOpen");
        gsap.to(subMenu, { height: "auto" });
      }
    });
  });

  const conditionOpen = document.querySelector(".js-conditionOpen");
  if (conditionOpen) {
    conditionOpen.addEventListener("click", function () {
      gsap.to(".search-accrodion-open", { display: "none", duration: 0 });
      gsap.to(".searchcondition-detail > div", { height: "auto" });
    });
  }

  const conditionClose = document.querySelector(".js-conditionClose");
  if (conditionClose) {
    conditionClose.addEventListener("click", function () {
      gsap.to(".search-accrodion-open", { display: "flex", duration: 0 });
      gsap.to(".searchcondition-detail > div", { height: 0 });
    });
  }
  const eventWrapper = document.querySelector(".p-ev");

  document.querySelectorAll(".js-eventFullOpen").forEach(function (openBtn) {
    openBtn.addEventListener("click", function () {
      if (eventWrapper.classList.contains("accordionFullOpen")) {
        document.querySelectorAll(".p-ev__subMenu").forEach(function (accordionSubMenu) {
          gsap.to(accordionSubMenu, { height: 0 });
          eventWrapper.classList.remove("accordionFullOpen");
        });
        document.querySelectorAll(".p-ev__item").forEach(function (target) {
          target.classList.remove("accordionOpen");
        });
      } else {
        document.querySelectorAll(".p-ev__subMenu").forEach(function (accordionSubMenu) {
          gsap.to(accordionSubMenu, { height: "auto" });
          eventWrapper.classList.add("accordionFullOpen");
        });
        document.querySelectorAll(".p-ev__item").forEach(function (target) {
          target.classList.add("accordionOpen");
        });
      }
    });
  });

  document.querySelectorAll(".js-searchModalClose").forEach(function (closeBtn) {
    closeBtn.addEventListener("click", function () {
      document.querySelectorAll(".p-event-result__compare ").forEach(function (target) {
        target.classList.remove("modalOpen");
        document.querySelector("body").style.cssText = "overflow: visible; height: auto;";
      });
    });
  });

  document.querySelectorAll(".p-event-modal__wrapper").forEach(function (closeArea) {
    closeArea.addEventListener("click", function () {
      document.querySelectorAll(".p-event-result__compare ").forEach(function (target) {
        target.classList.remove("modalOpen");
        document.querySelector("body").style.cssText = "overflow: visible; height: auto;";
      });
    });
  });

  document.querySelectorAll(".p-event-modal__message").forEach(function (target) {
    target.addEventListener("click", function (event) {
      event.stopPropagation();
    });
  });
});

$(function () {
  $(".js-toggle-button").on("click", function () {
    $(".p-top-about__list-wrapper").slideToggle();
    $(".p-top-about__list-wrapper").toggleClass("is-open");

    if ($(".p-top-about__list-wrapper").hasClass("is-open")) {
      $(this).text("閉じる");
    } else {
      $(this).text("もっと見る");
    }
  });

  // イベントスケジュールページの並べてみる機能ここから
  // ＝＝＝＝＝＝＝＝＝＝＝＝＝

  // var compare = ".compare"; // 比較表示項目を選択するエリア
  // var listItem = ".listitem"; // 比較表示対象のアイテム
  // var listWrap = ".event_wrap"; // 削除対象のラップアイテム
  // var is_hide = "is_hide"; // 比較表示対象外の場合に付与されるclass名
  // var exebool = false; // 比較表示の実行論理値

  var compare = ".p-ev"; // 比較表示項目を選択するエリア
  var listItem = ".p-ev__item-wrapper"; // 比較表示対象のアイテム
  var listWrap = ".p-ev__item"; // 削除対象のラップアイテム
  var is_hide = "is_hide"; // 比較表示対象外の場合に付与されるclass名
  var exebool = false; // 比較表示の実行論理値

  $(function () {
    // 絞り込み項目を変更した時
    $(".p-event-result__compare_enable").on("click", function () {
      search_filter();
    });
  });

  /**
   * リストの絞り込みを行う
   */
  function search_filter() {
    // 非表示状態を解除
    $(listItem).removeClass(is_hide);
    $(listWrap).removeClass(is_hide);

    for (var i = 0; i < $(compare).length; i++) {
      var name = $(compare).eq(i).find("input").attr("name");
      // 選択されている項目を取得
      var searchData = get_selected_input_items(name);
      // 選択されている項目がない、またはALLを選択している場合は飛ばす
      if (searchData.length === 0 || searchData[0] === "") {
        // swal("右上にチェックを入れたイベントのみを並べて確認ができます。");
        $(".p-event-result__compare").addClass("modalOpen");
        $("body").css({
          overflow: "hidden",
          height: "100.1vh",
        });
        continue;
      } else {
        if (!exebool) {
          // リスト内の各アイテムをチェック
          for (var j = 0; j < $(listItem).length; j++) {
            // アイテムに設定している項目を取得
            var itemData = $(listItem).eq(j).data(name);
            // 比較対象外のイベントを非表示
            if (searchData.indexOf(itemData) === -1) {
              $(listItem).eq(j).addClass(is_hide);
              $(listWrap).eq(j).addClass(is_hide);
            }
          }
          //
          $(".p-ev__item").toggleClass("accordionOpen");

          $(".p-ev__item:not(.accordionOpen)").find(".p-ev__subMenu").css({ height: 0 });

          $(".p-ev__item.accordionOpen").find(".p-ev__subMenu").css({ height: "auto" });
          exebool = true;
        } else {
          // リセット処理：すべての非表示を解除
          $(listItem).removeClass(is_hide);
          $(listWrap).removeClass(is_hide);

          // アコーディオンの状態をリセット
          $(".p-ev__item").removeClass("accordionOpen");
          $(".p-ev__item").find(".p-ev__subMenu").css({ height: 0 });

          // チェックボックスの状態をリセット
          $(".p-ev input[type='checkbox']").prop("checked", false);

          exebool = false;
        }
      }
    }
  }

  /**
   * inputで選択されている値の一覧を取得する
   * @param  {String} name 対象にするinputのname属性の値
   * @return {Array} 選択されているinputのvalue属性の値
   */
  function get_selected_input_items(name) {
    var searchData = [];
    $("[name=" + name + "]:checked").each(function () {
      searchData.push($(this).val());
    });
    return searchData;
  }

  // ＝＝＝＝＝＝＝＝＝＝＝＝＝
  // イベントスケジュールページの並べてみる機能ここまで
});

document.addEventListener("DOMContentLoaded", function () {
  // ニュースカテゴリータブの切り替え機能
  const categoryTabs = document.querySelectorAll('.js-top-news__category-link');
  const categoryContents = document.querySelectorAll('.js-posts__list');
  // 「一覧を見る」リンク要素の取得
  const moreListLink = document.querySelector('.js-top-news__more-link');

  // 初期表示設定 - 「全て」タブのコンテンツのみ表示し、他は非表示
  categoryContents.forEach(content => {
    if (content.getAttribute('data-target') === 'all') {
      content.classList.add('active');
      // 初期状態では「全て」のリンク先を設定
      if (moreListLink) {
        moreListLink.setAttribute('href', '/news/');
      }
    } else {
      content.classList.remove('active');
    }
  });

  // タブクリックイベントの設定
  categoryTabs.forEach(tab => {
    tab.addEventListener('click', function() {
      // すべてのタブから active クラスを削除
      categoryTabs.forEach(t => t.classList.remove('active'));

      // クリックされたタブに active クラスを追加
      this.classList.add('active');

      // すべてのコンテンツから active クラスを削除
      categoryContents.forEach(content => {
        content.classList.remove('active');
      });

      // クリックされたタブのdata-target属性に対応するコンテンツを表示
      const targetId = this.getAttribute('data-target');
      const targetContent = document.querySelector(`.js-posts__list[data-target="${targetId}"]`);
      if (targetContent) {
        targetContent.classList.add('active');
      }

      // 「一覧を見る」リンクのhref属性を更新
      if (moreListLink) {
        const category = this.getAttribute('data-target');
        if (category === 'all' || !category) {
          moreListLink.setAttribute('href', '/news/');
        } else {
          moreListLink.setAttribute('href', `/news/news_category/${category}/`);
        }
      }
    });
  });
});
