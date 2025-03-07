import clsx from "clsx";

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import {
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

// ALLOWED_BLOCKSを定義
const ALLOWED_BLOCKS = ["jkc-block/card-item-style-5"];

export default function Edit({ attributes }) {
  const { cardCount } = attributes;
  
  // cardCountに基づいてテンプレートを動的に生成
  const TEMPLATE = Array(cardCount).fill(["jkc-block/card-item-style-5"]);

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: clsx({
        "c-card-contest": true,
        [`c-card-contest--${cardCount}`]: true,
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
