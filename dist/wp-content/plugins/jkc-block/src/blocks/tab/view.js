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
        const tabItems = tabBlock.querySelectorAll('.c-block-tab-item');

        // 初期表示時
        $(tabItems).each(function() {
            const $tabItem = $(this);
            const $radio = $tabItem.find('input[type="radio"]');
            const $contentWrapper = $tabItem.find('.c-block-tab-item__content-wrapper');
            const $content = $tabItem.find('.c-block-tab-item__content');
            const $toggleButton = $tabItem.find('.c-block-tab-item__toggle-btn');

            // チェックされているタブのみ表示
            if ($radio.prop('checked')) {
                $contentWrapper.show();
                $content.show();
                $toggleButton.attr('aria-expanded', 'true');
                $toggleButton.find('span').text('閉じる');
            } else {
                $contentWrapper.hide();
            }

            // 開閉ボタンのクリックイベント
            $toggleButton.on('click', function(e) {
                e.preventDefault();

                // slideToggleで開閉
                $content.slideToggle(300, function() {
                    // アニメーション完了後に状態を更新
                    const isExpanded = $toggleButton.attr('aria-expanded') === 'true';

                    if (isExpanded) {
                        // 閉じる状態に変更
                        $toggleButton.attr('aria-expanded', 'false');
                        $toggleButton.find('span').text('開く');
                    } else {
                        // 開く状態に変更
                        $toggleButton.attr('aria-expanded', 'true');
                        $toggleButton.find('span').text('閉じる');
                    }
                });
            });
        });

        // ラジオボタンの変更イベントを監視（タブ切り替え）
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                $(tabItems).each(function() {
                    const $tabItem = $(this);
                    const $radio = $tabItem.find('input[type="radio"]');
                    const $contentWrapper = $tabItem.find('.c-block-tab-item__content-wrapper');

                    // タブの表示/非表示のみを切り替え（開閉状態は変更しない）
                    if ($radio.prop('checked')) {
                        $contentWrapper.show();
                    } else {
                        $contentWrapper.hide();
                    }
                });
            });
        });
    });
});
