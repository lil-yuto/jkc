$(function () {
  'use strict';

  // サイト内検索
  $('.l-nav__link-panel--seearch').on('click', function () {
    $('.l-search').fadeToggle(300);
    $(this).toggleClass('is-active');
  });
  $('.l-search__mask').on('click', function () {
    $('.l-search').fadeOut(200);
    $('.l-nav__link-panel--seearch').removeClass('is-active');
  });
});
