document.addEventListener("DOMContentLoaded", function () {
	const sliderElement = document.querySelector(".js-slider");
	if (sliderElement) {
		new Splide(sliderElement, {
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

	$(window).on("scroll", function () {
		if ($(this).scrollTop() > 200) {
			$(".c-to-top-button").addClass("is-visible");
		} else {
			$(".c-to-top-button").removeClass("is-visible");
		}
	});

	// Smooth scrolling of internal links
	$('a[href^="#"]').on("click", function () {
		const href = $(this).attr("href");
		const target = $(href == "#" || href == "" ? "html" : href);
		const offset = $(".l-header").height();
		// log出して確認
		const position = target.offset().top - offset;

		$("body,html").animate(
			{
				scrollTop: position,
			},
			500,
			"swing"
		);

		return false;
	});

	const megaParents = document.querySelectorAll(".js-megaParent");

	megaParents.forEach((megaParent) => {
		megaParent.addEventListener("mouseover", function () {
			let windowWidth = window.innerWidth;
			if (windowWidth > 767) {
				let megaMenu = megaParent.querySelector(".l-meganav");
				gsap.to(megaMenu, { height: "auto" });
			}
		});

		megaParent.addEventListener("mouseleave", function () {
			let windowWidth = window.innerWidth;
			if (windowWidth > 767) {
				let megaMenu = megaParent.querySelector(".l-meganav");
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

	this.document.querySelectorAll(".p-event-modal__message").forEach(function (target) {
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
				$("html, body").animate(
					{
						scrollTop: 190,
					},
					300
				);
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
					location.reload();
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
    const buttons = document.querySelectorAll(".news-filter");
    const newsItems = document.querySelectorAll(".news-item");
    const viewAllLinks = document.querySelectorAll("#view-all-link");

    function filterNews(term) {
      let visibleCount = 0;

      newsItems.forEach((item, index) => {
        let categories = item.dataset.category.split(" ");
        if (term === "all" || categories.includes(term)) {
          if (visibleCount < 5) {
            item.style.display = "contents"; // 5件まで表示
            visibleCount++;
          } else {
            item.style.display = "none"; // 6件目以降は非表示
          }
        } else {
          item.style.display = "none"; // 選択されていないカテゴリは非表示
        }
      });

      // 「一覧を見る」のリンクを更新
      let newHref = term === "all" ? "/news/" : `/news/news_category/${term}/`;
      viewAllLinks.forEach(link => {
        link.setAttribute("href", newHref);
      });
    }

    // ボタンのクリック処理
    buttons.forEach(button => {
      button.addEventListener("click", function () {
        buttons.forEach(btn => btn.classList.remove("active"));
        this.classList.add("active");

        let term = this.getAttribute("data-term");
        filterNews(term);
      });
    });

    // 初回表示時のCSS適用（5件だけ `display: contents;` に）
    newsItems.forEach((item, index) => {
      item.style.display = index < 5 ? "contents" : "none";
    });
  });

