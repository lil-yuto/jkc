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
		console.log(offset);
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
    overflow: visible;
    height: auto;`;
			} else {
				let bodyWidth = document.body.clientWidth;
				document.querySelector("header").classList.add("burgerOpen");
				document.querySelector(".l-menu-button__text").innerText = "CLOSE";
				document.querySelector("body").style.cssText = `width: ${bodyWidth};
    overflow: hidden;
    height: 100.001vh;`;
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
		console.log(accordion_item);
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
});
