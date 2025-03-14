import clsx from "clsx";
import { RichText, useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save({ attributes }) {
	const { label, checked, groupName } = attributes;
	return (
		<div {...useBlockProps.save({ className: "c-block-tab-item" })}>
			<label>
				<input type="radio" name={ groupName } {...(checked && { checked: true })}/>
				<RichText.Content tagName="span" value={label} />
			</label>
			<div {...useInnerBlocksProps.save({ className: "c-block-tab-item__content" })} />
		</div>
	);
}
