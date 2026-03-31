/* eslint-disable no-console */
document.addEventListener('DOMContentLoaded', function() {
    const tabBlocks = document.querySelectorAll('.c-block-tab');

    // radio inputが存在しない場合、動的に生成
    tabBlocks.forEach((tabBlock, blockIndex) => {
        const tabItems = tabBlock.querySelectorAll('.c-block-tab-item');
        // data属性またはフォールバック用のgroupNameを決定
        let fallbackGroupName = null;
        tabItems.forEach((tabItem, itemIndex) => {
            const label = tabItem.querySelector('label');
            if (!label) return;
            // 既にradio inputがあればスキップ（旧形式の投稿対応）
            if (label.querySelector('input[type="radio"]')) return;

            const groupName = tabItem.dataset.groupName;
            const isChecked = tabItem.hasAttribute('data-checked');

            // groupNameがない場合（壊れた旧投稿）はフォールバック生成
            const name = groupName || (fallbackGroupName = fallbackGroupName || ('tab-fallback-' + blockIndex));
            const checked = groupName ? isChecked : (itemIndex === 0);

            const radio = document.createElement('input');
            radio.type = 'radio';
            radio.name = name;
            if (checked) radio.checked = true;
            label.prepend(radio);
        });
    });

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
/* eslint-enable no-console */
