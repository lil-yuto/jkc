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
import { useEffect, useState } from "@wordpress/element";

export default function Edit( props ) {
	const { attributes, setAttributes, clientId } = props;
	const { defaultActiveTab, enableToggle } = attributes;
	const groupName = `tab-${ clientId }`;
	// 現在選択されているタブの状態をReactのstateで管理
	const [activeTabIndex, setActiveTabIndex] = useState(defaultActiveTab);

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

	// タブ名の選択肢を作成
	const tabOptions = tabItems.map((block, index) => ({
		label: block.attributes.label || `タブ${index + 1}`,
		value: index.toString()
	}));

	// インスペクターでデフォルトタブを設定
	const handleDefaultTabChange = (newTabIndex) => {
		const indexNum = parseInt(newTabIndex);
		setAttributes({ defaultActiveTab: indexNum });
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

		// アクティブタブの状態を更新（Reactのstateのみ）
		setActiveTabIndex(tabIndex);
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

	// 初期化と更新時の処理
	useEffect(() => {
		if (tabItems.length === 0) return;

		// タブ数が変わった場合の処理
		if (activeTabIndex >= tabItems.length) {
			const newIndex = Math.min(activeTabIndex, tabItems.length - 1);
			setActiveTabIndex(newIndex);

			// デフォルトのタブインデックスも更新
			if (defaultActiveTab >= tabItems.length) {
				setAttributes({ defaultActiveTab: newIndex });
			}
		}

		// 各タブアイテムの状態を更新
		updateTabStates(activeTabIndex);
	}, [tabItems.length]);

	// 初期ロード時にデフォルトタブを設定
	useEffect(() => {
		if (tabItems.length === 0) return;

		// 初期ロード時にデフォルトタブを設定
		const initialTabIndex = Math.min(defaultActiveTab, tabItems.length - 1);
		updateTabStates(initialTabIndex);
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

		// このuseEffectはdefaultActiveTabが変更された時のみ実行
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
