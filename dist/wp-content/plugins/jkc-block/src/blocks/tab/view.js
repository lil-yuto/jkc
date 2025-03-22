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
    const tabBlocks = document.querySelectorAll('.c-block-tab');
    
    tabBlocks.forEach(tabBlock => {
        const radioButtons = tabBlock.querySelectorAll('input[type="radio"]');
        const contents = tabBlock.querySelectorAll('.c-block-tab-item__content');
        
        // 初期表示時
        updateTabContents();
        
        // ラジオボタンの変更イベントを監視
        radioButtons.forEach(radio => {
            radio.addEventListener('change', updateTabContents);
        });
        
        // タブコンテンツの表示/非表示を切り替える
        function updateTabContents() {
            radioButtons.forEach((radio, index) => {
                contents[index].style.display = radio.checked ? 'block' : 'none';
            });
        }
    });
});
