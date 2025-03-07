import { __ } from "@wordpress/i18n";
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function Edit( props ) {
	const { clientId } = props;
	const groupName = `tab-${ clientId }`; // ユニークなグループ名を生成

	const blockProps = useBlockProps({
		className: "c-block-tab",
	});

	const innerBlocksProps = useInnerBlocksProps(blockProps, {
		allowedBlocks: ["jkc-block/tab-item"],
		template: [
			["jkc-block/tab-item", { checked: true, label: "タブ1", groupName }],
			["jkc-block/tab-item", { label: "タブ2", groupName }]
		],
		templateLock: false,
	});

	return <div {...innerBlocksProps} />;
}
