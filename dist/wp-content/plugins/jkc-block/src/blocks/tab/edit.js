import { __ } from "@wordpress/i18n";
import {
	useBlockProps,
	useInnerBlocksProps,
	InspectorControls,
} from "@wordpress/block-editor";
import {
	PanelBody,
	RadioControl,
} from "@wordpress/components";
import { useEffect, useRef } from "@wordpress/element";
import { useDispatch, useSelect } from "@wordpress/data";
import { store as blockEditorStore } from "@wordpress/block-editor";

export default function Edit( props ) {
	const { attributes, setAttributes, clientId } = props;
	const { defaultActiveTab } = attributes;
	const groupName = `tab-${ clientId }`;
	const prevBlocksRef = useRef([]);

	const blockProps = useBlockProps({
		className: "c-block-tab",
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

		// チェック状態を更新
		tabItems.forEach((block, index) => {
			updateBlockAttributes(block.clientId, {
				checked: index === indexNum,
				groupName
			});
		});
	};

	// タブの状態を同期する
	const syncTabStates = () => {
		if (tabItems.length === 0) return;

		// チェックされているタブを探す
		const checkedTab = tabItems.find(block => block.attributes.checked);
		
		if (!checkedTab) {
			// チェックされているタブがない場合、最初のタブをチェック
			const newIndex = 0;
			setAttributes({ defaultActiveTab: newIndex });
			updateBlockAttributes(tabItems[0].clientId, {
				checked: true,
				groupName
			});

			// 他のタブのチェックを外す
			tabItems.slice(1).forEach(block => {
				updateBlockAttributes(block.clientId, {
					checked: false,
					groupName
				});
			});
		} else {
			// チェックされているタブのインデックスを取得
			const checkedIndex = tabItems.findIndex(block => block.clientId === checkedTab.clientId);
			if (checkedIndex !== defaultActiveTab) {
				setAttributes({ defaultActiveTab: checkedIndex });
			}
		}
	};

	// ブロックの並び順やタブの削除を監視
	useEffect(() => {
		const currentIds = tabItems.map(block => block.clientId).join(',');
		const prevIds = prevBlocksRef.current.map(block => block.clientId).join(',');

		if (currentIds !== prevIds) {
			syncTabStates();
			prevBlocksRef.current = tabItems;
		}
	}, [tabItems]);

	// 初期化時の処理
	useEffect(() => {
		if (tabItems.length === 0) return;

		// すべてのタブにgroupNameを設定
		tabItems.forEach(block => {
			updateBlockAttributes(block.clientId, { groupName });
		});

		syncTabStates();
	}, []);

	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		allowedBlocks: ["jkc-block/tab-item"],
		template: [
			["jkc-block/tab-item", { checked: true, label: "タブ1", groupName }],
			["jkc-block/tab-item", { checked: false, label: "タブ2", groupName }]
		],
		templateLock: false
	});

	return (
		<>
			<InspectorControls>
				<PanelBody title={__("タブの設定", "jkc-block")}>
					{tabOptions.length > 0 ? (
						<RadioControl
							label={__("デフォルトのタブ", "jkc-block")}
							selected={defaultActiveTab.toString()}
							options={tabOptions}
							onChange={handleDefaultTabChange}
							help={__("保存時のデフォルトで表示されるタブを設定します", "jkc-block")}
						/>
					) : (
						<p>{__("タブが追加されていません", "jkc-block")}</p>
					)}
				</PanelBody>
			</InspectorControls>
			<div {...innerBlocksProps} />
		</>
	);
}
