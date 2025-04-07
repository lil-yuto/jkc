/**
 * Use this file for JavaScript code that you want to run in the front-end
 * on posts/pages that contain this block.
 *
 * When this file is defined as the value of the `viewScript` property
 * in `block.json` it will be enqueued on the front end of the site.
 *
 * Example:
 *
 * ```js
 * {
 *   "viewScript": "file:./view.js"
 * }
 * ```
 *
 * If you're not making any changes to this file because your project doesn't need any
 * JavaScript running in the front-end, then you should delete this file and remove
 * the `viewScript` property from `block.json`.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-metadata/#view-script
 */

/* eslint-disable no-console */
document.addEventListener('DOMContentLoaded', function() {
  // 現在のURLを取得
  const currentURL = window.location.href;

  // related-infoスタイルのボタンを取得
  const relatedInfoButtons = document.querySelectorAll('.is-style-related-info .c-block-button-item__link');

  if (relatedInfoButtons.length > 0) {
    relatedInfoButtons.forEach(button => {
      const buttonURL = button.getAttribute('href');

      // ボタンのURLが現在のURLに含まれている場合、is-currentクラスを追加
      if (buttonURL && currentURL.includes(buttonURL)) {
        button.classList.add('is-current');

        // リンク要素をspan要素に置き換える
        const parentElement = button.parentNode;
        const spanElement = document.createElement('span');

        // 元の内容とクラスを新しいspan要素に移行
        spanElement.innerHTML = button.innerHTML;
        spanElement.className = button.className;

        // 元のリンク要素を新しいspan要素に置き換え
        parentElement.replaceChild(spanElement, button);
      }
    });
  }
});
/* eslint-enable no-console */
