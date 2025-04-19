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
        // タブブロックごとの共通開閉状態を管理する変数
        let isContentExpanded = false; // 初期状態では閉じる

        // 初期表示時
        $(tabItems).each(function() {
            const $tabItem = $(this);
            const $radio = $tabItem.find('input[type="radio"]');
            const $contentWrapper = $tabItem.find('.c-block-tab-item__content-wrapper');
            const $content = $tabItem.find('.c-block-tab-item__content');
            const $toggleButton = $tabItem.find('.c-block-tab-item__toggle-btn');
            const isToggleDisabled = $tabItem.hasClass('is-toggle-disabled');

            // タブ開閉機能がOFFの場合はコンテンツを表示
            if (isToggleDisabled) {
                if ($radio.prop('checked')) {
                    $contentWrapper.show();
                    $content.show(); // タブ開閉OFF時は内容を表示
                }
                return; // 以降の処理をスキップ
            }

            // ボタンテキストを「開く」に
            $toggleButton.text('開く');
            $toggleButton.attr('aria-expanded', 'false');

            // チェックされているタブのコンテンツラッパーのみ表示
            if ($radio.prop('checked')) {
                $contentWrapper.show();
                $content.hide(); // 初期状態では閉じる
            } else {
                $contentWrapper.hide();
            }

            // 開閉ボタンのクリックイベント
            $toggleButton.on('click', function(e) {
                e.preventDefault();

                // タブブロック全体の開閉状態を切り替え
                isContentExpanded = !isContentExpanded;

                // すべてのタブの開閉状態を同期
                updateAllTabsState(tabBlock, isContentExpanded);
            });
        });

        // ラジオボタンの変更イベントを監視（タブ切り替え）
        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                $(tabItems).each(function() {
                    const $tabItem = $(this);
                    const $radio = $tabItem.find('input[type="radio"]');
                    const $contentWrapper = $tabItem.find('.c-block-tab-item__content-wrapper');
                    const isToggleDisabled = $tabItem.hasClass('is-toggle-disabled');

                    // タブの表示/非表示のみを切り替え（開閉状態は変更しない）
                    if ($radio.prop('checked')) {
                        $contentWrapper.show();

                        // タブ開閉機能がOFFの場合はコンテンツを表示
                        if (isToggleDisabled) {
                            const $content = $tabItem.find('.c-block-tab-item__content');
                            $content.show();
                            return;
                        }

                        // 選択されたタブの開閉状態を現在のタブブロックの状態に合わせる
                        const $content = $tabItem.find('.c-block-tab-item__content');
                        const $toggleButton = $tabItem.find('.c-block-tab-item__toggle-btn');

                        if (isContentExpanded) {
                            $content.show();
                            $toggleButton.attr('aria-expanded', 'true');
                            $toggleButton.text('閉じる');
                        } else {
                            $content.hide();
                            $toggleButton.attr('aria-expanded', 'false');
                            $toggleButton.text('開く');
                        }
                    } else {
                        $contentWrapper.hide();
                    }
                });
            });
        });

        // タブブロック内のすべてのタブの開閉状態を更新する関数
        function updateAllTabsState(tabBlock, isExpanded) {
            const $allItems = $(tabBlock).find('.c-block-tab-item');
            $allItems.each(function() {
                const $tabItem = $(this);
                const $radio = $tabItem.find('input[type="radio"]');
                const isToggleDisabled = $tabItem.hasClass('is-toggle-disabled');

                // タブ開閉機能がOFFの場合は処理をスキップ
                if (isToggleDisabled) {
                    return;
                }

                const $content = $tabItem.find('.c-block-tab-item__content');
                const $toggleButton = $tabItem.find('.c-block-tab-item__toggle-btn');

                // チェックされているタブのみ処理
                if ($radio.prop('checked')) {
                    if (isExpanded) {
                        $content.slideDown(300);
                        $toggleButton.attr('aria-expanded', 'true');
                        $toggleButton.text('閉じる');
                    } else {
                        $content.slideUp(300);
                        $toggleButton.attr('aria-expanded', 'false');
                        $toggleButton.text('開く');
                    }
                }
            });
        }
    });
});
