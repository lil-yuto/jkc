import { __ } from "@wordpress/i18n";
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
} from "@wordpress/block-editor";
import {
	PanelBody,
	RadioControl,
	ToggleControl,
} from "@wordpress/components";
import { useDispatch, useSelect } from "@wordpress/data";
import { store as blockEditorStore } from "@wordpress/block-editor";
import { useEffect, useState, useRef } from "@wordpress/element";

export default function Edit( props ) {
	const { attributes, setAttributes, clientId } = props;
	const { defaultActiveTab, enableToggle } = attributes;
	const groupName = `tab-${ clientId }`;
	// 現在選択されているタブの状態をReactのstateで管理
	const [activeTabIndex, setActiveTabIndex] = useState(defaultActiveTab);
	// タブアイテムのIDを追跡するためのref
	const tabItemIdsRef = useRef([]);
	// 選択中のタブのIDを保持
	const [selectedTabId, setSelectedTabId] = useState(null);
	// タブの順序変更を検出するためのフラグ
	const isReorderingRef = useRef(false);
	// 前回のdefaultActiveTabを保存
	const prevDefaultTabRef = useRef(defaultActiveTab);
	// デフォルトタブのIDを保持
	const defaultTabIdRef = useRef(null);

	const blockProps = useBlockProps({
		className: "c-block-tab",
		onClick: handleTabClick,
	});

	const { updateBlockAttributes } = useDispatch(blockEditorStore);

	const innerBlocks = useSelect(
		(select) => select(blockEditorStore).getBlocks(clientId),
		[clientId]
	);

	// タブアイテムのみをフィルタリング
	const tabItems = innerBlocks.filter(block => block.name === "jkc-block/tab-item");

	// タブアイテムの順序変更を検知
	useEffect(() => {
		if (tabItems.length === 0) return;

		// タブアイテムのIDを取得
		const currentTabIds = tabItems.map(block => block.clientId);

		// 初期ロード時の処理
		if (tabItemIdsRef.current.length === 0) {
			// 選択中のタブIDを初期設定
			if (defaultActiveTab < tabItems.length) {
				setSelectedTabId(currentTabIds[defaultActiveTab]);
				// デフォルトタブのIDを保存
				defaultTabIdRef.current = currentTabIds[defaultActiveTab];
			}
			tabItemIdsRef.current = currentTabIds;
			return;
		}

		// タブの数が変わった場合は順序変更とは別の処理
		if (tabItemIdsRef.current.length !== currentTabIds.length) {
			// デフォルトタブが削除されたかチェック
			const defaultTabId = defaultTabIdRef.current;
			const defaultTabExists = currentTabIds.includes(defaultTabId);

			if (!defaultTabExists && tabItems.length > 0) {
				// デフォルトタブが削除された場合、最初のタブをデフォルトに設定
				setAttributes({ defaultActiveTab: 0 });
				prevDefaultTabRef.current = 0;
				defaultTabIdRef.current = currentTabIds[0];

				// UI表示も更新
				setActiveTabIndex(0);
				setSelectedTabId(currentTabIds[0]);
				updateTabStates(0);
			} else if (defaultActiveTab >= tabItems.length) {
				// デフォルトタブのインデックスが範囲外になった場合は調整
				const newIndex = Math.min(defaultActiveTab, tabItems.length - 1);
				setAttributes({ defaultActiveTab: newIndex });
				prevDefaultTabRef.current = newIndex;
				defaultTabIdRef.current = currentTabIds[newIndex];

				// activeTabIndexも調整
				if (activeTabIndex >= tabItems.length) {
					setActiveTabIndex(newIndex);
					updateTabStates(newIndex);
				}
			}

			// 選択中のタブが存在するか確認（アクティブタブの表示用）
			if (selectedTabId) {
				const tabIndex = currentTabIds.indexOf(selectedTabId);
				if (tabIndex === -1 && tabItems.length > 0) {
					// 選択中のタブが削除された場合は最初のタブを選択（表示のみ）
					setSelectedTabId(currentTabIds[0]);
					setActiveTabIndex(0);
					updateTabStates(0);
				}
			}

			tabItemIdsRef.current = currentTabIds;
			return;
		}

		// タブの順序変更を検出
		const orderChanged = !currentTabIds.every((id, index) =>
			id === tabItemIdsRef.current[index]
		);

		if (orderChanged) {
			isReorderingRef.current = true;

			// 現在のデフォルトタブのIDを取得
			const defaultTabId = defaultTabIdRef.current;

			// 新しい順序でそのIDの位置を特定
			const newDefaultIndex = currentTabIds.indexOf(defaultTabId);

			// デフォルトタブの位置が変わった場合は更新
			if (newDefaultIndex !== -1 && newDefaultIndex !== prevDefaultTabRef.current) {
				setAttributes({ defaultActiveTab: newDefaultIndex });
				prevDefaultTabRef.current = newDefaultIndex;
			}

			// 選択中のタブの位置も更新
			if (selectedTabId) {
				const newActiveIndex = currentTabIds.indexOf(selectedTabId);
				if (newActiveIndex !== -1 && newActiveIndex !== activeTabIndex) {
					setActiveTabIndex(newActiveIndex);
					updateTabStates(newActiveIndex);
				}
			}
		} else {
			isReorderingRef.current = false;
		}

		// タブアイテムIDの現在状態を保存
		tabItemIdsRef.current = currentTabIds;
	}, [tabItems]);

	// defaultActiveTabが変更されたときの処理（インスペクターから手動で変更された場合）
	useEffect(() => {
		if (defaultActiveTab !== prevDefaultTabRef.current && !isReorderingRef.current) {
			// インスペクターからの変更の場合
			prevDefaultTabRef.current = defaultActiveTab;

			// 選択中のタブIDとデフォルトタブIDも更新
			if (defaultActiveTab < tabItems.length) {
				const tabId = tabItems[defaultActiveTab].clientId;
				setSelectedTabId(tabId);
				defaultTabIdRef.current = tabId;

				// エディタ上の表示も更新
				setActiveTabIndex(defaultActiveTab);
				updateTabStates(defaultActiveTab);
			}
		}
	}, [defaultActiveTab]);

	// タブ名の選択肢を作成
	const tabOptions = tabItems.map((block, index) => ({
		label: block.attributes.label || `タブ${index + 1}`,
		value: index.toString()
	}));

	// インスペクターでデフォルトタブを設定
	const handleDefaultTabChange = (newTabIndex) => {
		const indexNum = parseInt(newTabIndex);
		setAttributes({ defaultActiveTab: indexNum });
		prevDefaultTabRef.current = indexNum;

		// 選択したタブのIDを保存
		if (indexNum < tabItems.length) {
			const tabId = tabItems[indexNum].clientId;
			setSelectedTabId(tabId);
			defaultTabIdRef.current = tabId;
		}

		// エディタ上の表示も更新
		setActiveTabIndex(indexNum);
		updateTabStates(indexNum);
	};

	// タブクリック時の処理
	function handleTabClick(event) {
		// ラジオボタンの親要素（label）をクリックした場合の処理
		const radioInput = event.target.closest('label')?.querySelector('input[type="radio"]');
		if (!radioInput) return;

		// クリックされたタブの順番を特定
		const tabItemDiv = radioInput.closest('.c-block-tab-item');
		if (!tabItemDiv) return;

		const tabIndex = Array.from(tabItemDiv.parentNode.children).indexOf(tabItemDiv);
		if (tabIndex === -1) return;

		// アクティブタブの状態を更新（表示のみ）
		setActiveTabIndex(tabIndex);

		// 選択したタブのIDを保存（順序変更検知用）
		if (tabIndex < tabItems.length) {
			setSelectedTabId(tabItems[tabIndex].clientId);
		}

		// タブの表示状態のみを更新（デフォルトタブは変更しない）
		updateTabStates(tabIndex);
	}

	// タブの状態を更新する関数
	const updateTabStates = (activeIndex) => {
		// 範囲チェック
		if (activeIndex >= tabItems.length) {
			activeIndex = 0;
		}

		tabItems.forEach((block, index) => {
			updateBlockAttributes(block.clientId, {
				// isActiveTabのみを更新し、checked属性は更新しない
				isActiveTab: index === activeIndex,
				groupName,
				enableContentToggle: enableToggle
			});
		});
	};

	// 開閉機能の切り替え時の処理
	const handleToggleChange = (value) => {
		setAttributes({ enableToggle: value });
		// すべてのタブアイテムに設定を反映
		tabItems.forEach(block => {
			updateBlockAttributes(block.clientId, {
				enableContentToggle: value
			});
		});
	};

	// 初期ロード時にデフォルトタブを設定
	useEffect(() => {
		if (tabItems.length === 0) return;

		// 初期ロード時にデフォルトタブを設定
		const initialTabIndex = Math.min(defaultActiveTab, tabItems.length - 1);
		setActiveTabIndex(initialTabIndex);
		updateTabStates(initialTabIndex);

		// 選択中のタブIDを初期設定
		if (initialTabIndex < tabItems.length) {
			const tabId = tabItems[initialTabIndex].clientId;
			setSelectedTabId(tabId);
			defaultTabIdRef.current = tabId;
		}

		prevDefaultTabRef.current = initialTabIndex;
	}, []);

	// 保存前にデフォルトタブのchecked属性を設定
	useEffect(() => {
		if (tabItems.length === 0) return;

		// 保存のために、デフォルトタブにだけchecked=trueを設定
		tabItems.forEach((block, index) => {
			updateBlockAttributes(block.clientId, {
				checked: index === defaultActiveTab
			});
		});
	}, [defaultActiveTab, tabItems.length]);

	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		allowedBlocks: ["jkc-block/tab-item"],
		template: [
			["jkc-block/tab-item", { isActiveTab: true, checked: true, label: "タブ1", groupName, enableContentToggle: enableToggle }],
			["jkc-block/tab-item", { isActiveTab: false, checked: false, label: "タブ2", groupName, enableContentToggle: enableToggle }]
		],
		templateLock: false
	});

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("タブの設定", "jkc-block")}>
					{tabOptions.length > 0 ? (
						<>
							<RadioControl
								label={__("デフォルトのタブ", "jkc-block")}
								selected={defaultActiveTab.toString()}
								options={tabOptions}
								onChange={handleDefaultTabChange}
								help={__("保存時のデフォルトで表示されるタブを設定します", "jkc-block")}
							/>
							<ToggleControl
								label={__("開閉機能", "jkc-block")}
								checked={enableToggle}
								onChange={handleToggleChange}
								help={__("コンテンツの開閉機能を有効にします", "jkc-block")}
							/>
						</>
					) : (
						<p>{__("タブが追加されていません", "jkc-block")}</p>
					)}
				</PanelBody>
			</InspectorControls>
			<div {...innerBlocksProps} />
		</>
	);
}
