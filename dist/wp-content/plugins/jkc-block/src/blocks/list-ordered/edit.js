import {
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit() {
  const blockProps = useBlockProps();
  const innerBlocksProps = useInnerBlocksProps(
    { className: "c-block-list-ordered__items" },
    {
      allowedBlocks: ["core/list-item"],
      template: [["core/list-item"]],
    },
  );

  return (
    <>
      <div {...blockProps}>
        <div className="c-block-list-ordered">
          <ol {...innerBlocksProps} />
        </div>
      </div>
    </>
  );
}
