import clsx from "clsx";

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import {
  useBlockProps,
  useInnerBlocksProps,
  InspectorControls,
} from "@wordpress/block-editor";
import {
  PanelBody,
  RangeControl,
} from "@wordpress/components";
import "./editor.scss"; // エディター用スタイルシートのインポート

// ALLOWED_BLOCKSを定義
const ALLOWED_BLOCKS = ["jkc-block/contest-item"];

export default function Edit({ attributes, setAttributes }) {
  const { itemCount } = attributes;
  
  // itemCountに基づいてテンプレートを動的に生成
  const TEMPLATE = Array(itemCount).fill(["jkc-block/contest-item"]);

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: clsx({
        "c-contest": true,
        [`c-contest--${itemCount}`]: true,
      }),
    },
    {
      allowedBlocks: ALLOWED_BLOCKS,
      template: TEMPLATE,
    }
  );

  return (
    <>
      <InspectorControls>
        <PanelBody title="設定">
          <RangeControl
            __next40pxDefaultSize
            __nextHasNoMarginBottom
            initialPosition={3}
            label="カラム"
            marks
            max={3}
            min={1}
            onChange={(value) => setAttributes({ itemCount: value })}
            step={1}
            value={itemCount}
          />
        </PanelBody>
      </InspectorControls>
      <div {...useBlockProps()}>
        <div {...innerBlocksProps} />
      </div>
    </>
  );
}
