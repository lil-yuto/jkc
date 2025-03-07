import clsx from "clsx";

import {
  RichText, // リッチテキストエディタコンポーネント
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

// ALLOWED_BLOCKSを定義
const ALLOWED_BLOCKS = [
  // "jkc-block/heading",
  // "jkc-block/text",
  // "jkc-block/text-link",
  // "jkc-block/reference-info",
  // "jkc-block/media-text",
  // "jkc-block/list-ordered",
  // "jkc-block/list-unordered",
  // "jkc-block/heading",
  // "jkc-block/flow-vertical",
  // "jkc-block/flow-horizontal",
  // "jkc-block/contact",
  // "jkc-block/card-grid-1",
  // "jkc-block/card-grid-2",
  // "jkc-block/card-grid-3",
  // "jkc-block/card-grid-4",
  // "jkc-block/button",
  // "jkc-block/anchor-link",
  // "jkc-block/anchor-link-small",
];

// TEMPLATEを定義（必要に応じて）
const TEMPLATE = [["jkc-block/text"]];

export default function ({ attributes, setAttributes }) {
  // 属性の分割代入
  const { label, checked, groupName } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps({
    className: "c-block-tab-item",
  });

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: "c-block-tab-item__content",
    },
    {
      allowedBlocks: ALLOWED_BLOCKS,
      template: TEMPLATE,
    }
  );

  return (
    <div {...blockProps}>
      <label>
        <input
          type="radio"
          name={groupName}
          {...(checked && { checked: true })}
          onChange={() => setAttributes({ checked: !checked })}
        />
        <RichText
          tagName="span"
          value={label}
          onChange={(newVal) => setAttributes({ label: newVal })}
          placeholder="タブ名を入力"
        />
      </label>
      <div {...innerBlocksProps} />
    </div>
  );
}
