import clsx from "clsx";

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import {
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

// ALLOWED_BLOCKSを定義
const ALLOWED_BLOCKS = ["jkc-block/card-item-style-1"];

export default function Edit({ attributes }) {
  const { cardCount } = attributes;
  
  // cardCountに基づいてテンプレートを動的に生成
  const TEMPLATE = Array(cardCount).fill(["jkc-block/card-item-style-1"]);

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: clsx({
        "c-card-grid": true,
        [`c-card-grid--${cardCount}`]: true,
      }),
    },
    {
      allowedBlocks: ALLOWED_BLOCKS,
      template: TEMPLATE,
    }
  );

  return (
    <div {...useBlockProps()}>
      <div {...innerBlocksProps} />
    </div>
  );
}
