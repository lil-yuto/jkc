import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";

export default function save() {
  const blockProps = useBlockProps.save();
  const innerBlocksProps = useInnerBlocksProps.save({
    className: "c-block-list-ordered__items",
  });

  return (
    <div {...blockProps}>
      <div className="c-block-list-ordered">
        <ol {...innerBlocksProps} />
      </div>
    </div>
  );
}
