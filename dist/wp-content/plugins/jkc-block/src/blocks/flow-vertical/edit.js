import clsx from "clsx";

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import {
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

// ALLOWED_BLOCKSを定義
const ALLOWED_BLOCKS = ["jkc-block/flow-vertical-item", "jkc-block/flow-vertical-item-text"];

// TEMPLATEを定義（必要に応じて）
const TEMPLATE = [["jkc-block/flow-vertical-item"]];

export default function Edit() {
  
  const innerBlocksProps = useInnerBlocksProps(
    {
      className: clsx({
        "c-block-flow-vertical": true,
      }),
    },
    {
      allowedBlocks: ALLOWED_BLOCKS,
      template: TEMPLATE,
    },
  );

  return (
    <div {...useBlockProps()}>
      <ul {...innerBlocksProps} />
    </div>
  );
}
