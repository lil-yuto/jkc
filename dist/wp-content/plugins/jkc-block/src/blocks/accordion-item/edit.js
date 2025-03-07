import clsx from "clsx";

import {
  RichText, // リッチテキストエディタコンポーネント
  useBlockProps,
  useInnerBlocksProps,
  InspectorControls,
} from "@wordpress/block-editor";
import { PanelBody, ToggleControl } from "@wordpress/components";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function ({ attributes, setAttributes }) {
  // 属性の分割代入
  const { summary, isOpen } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps({
    className: "c-block-accordion-item",
  });

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: "c-block-accordion-item__content",
    },
  );

  return (
    <>
      <InspectorControls>
        <PanelBody title="初期の開閉状態" >
          <ToggleControl
            label="開く"
            checked={isOpen}
            onChange={(value) => setAttributes({ isOpen: value })}
          />
        </PanelBody>
      </InspectorControls>
      <div {...blockProps}>
        <details className="c-block-accordion-item" open>
          <summary className="c-block-accordion-item__summary">
            <RichText
              tagName="p"
              className="c-block-accordion-item__text"
              value={summary}
              allowedFormats={["core/bold", "core/text-color"]}
              onChange={(newSummary) => setAttributes({ summary: newSummary })}
              placeholder="サマリーを入力"
            />
          </summary>
          <div {...innerBlocksProps} />
        </details>
      </div>
    </>
  );
}
