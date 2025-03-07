import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import clsx from "clsx";

export default function save() {
  const blockProps = useBlockProps.save();
  const innerBlocksProps = useInnerBlocksProps.save({
    className: "c-block-list-unordered__items",
  });

  return (
    <div {...blockProps}>
      <div className="c-block-list-unordered">
        <ul {...innerBlocksProps} />
      </div>
    </div>
  );
}
