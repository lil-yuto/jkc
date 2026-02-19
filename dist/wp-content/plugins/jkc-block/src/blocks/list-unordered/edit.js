import {
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";
import "./editor.scss";

// Note: core/list-item の parent は core/list のみ（コア仕様のため変更不可）。
// WP 6.8 以降でリスト項目がインサーターに表示されない場合は、
// カスタム list-item ブロックの検討または core/list のラップを検討すること。

export default function Edit() {
  const blockProps = useBlockProps();
  const innerBlocksProps = useInnerBlocksProps(
    { className: "c-block-list-unordered__items" },
    {
      allowedBlocks: ["core/list-item"],
      template: [["core/list-item"]],
    },
  );

  return (
    <>
      <div {...blockProps}>
        <div className="c-block-list-unordered">
          <ul {...innerBlocksProps} />
        </div>
      </div>
    </>
  );
}
