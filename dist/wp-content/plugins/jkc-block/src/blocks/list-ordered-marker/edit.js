import {
  useBlockProps,
  useInnerBlocksProps,
  InspectorControls,
} from "@wordpress/block-editor";
import { PanelBody, SelectControl } from "@wordpress/components";
import "./editor.scss";

const MARKER_OPTIONS = [
  { label: "太字 (1. 2. 3.)", value: "bold" },
  { label: "標準 (1. 2. 3.)", value: "normal" },
  { label: "丸数字 (①②③)", value: "circle" },
  { label: "括弧付き ((1)(2)(3))", value: "parentheses" },
];

// Note: core/list-item の parent は core/list のみ（コア仕様のため変更不可）。
// WP 6.8 以降でリスト項目がインサーターに表示されない場合は、
// カスタム list-item ブロックの検討または core/list のラップを検討すること。

export default function Edit({ attributes, setAttributes }) {
  const { markerStyle1, markerStyle2, markerStyle3, markerStyle4, markerStyle5 } = attributes;
  const blockProps = useBlockProps();
  const innerBlocksProps = useInnerBlocksProps(
    { className: "c-block-list-ordered-marker__items" },
    {
      allowedBlocks: ["core/list-item"],
      template: [["core/list-item"]],
    },
  );

  return (
    <>
      <InspectorControls>
        <PanelBody title="マーカー設定">
          <SelectControl
            label="第1階層"
            value={markerStyle1}
            options={MARKER_OPTIONS}
            onChange={(value) => setAttributes({ markerStyle1: value })}
          />
          <SelectControl
            label="第2階層"
            value={markerStyle2}
            options={MARKER_OPTIONS}
            onChange={(value) => setAttributes({ markerStyle2: value })}
          />
          <SelectControl
            label="第3階層"
            value={markerStyle3}
            options={MARKER_OPTIONS}
            onChange={(value) => setAttributes({ markerStyle3: value })}
          />
          <SelectControl
            label="第4階層"
            value={markerStyle4}
            options={MARKER_OPTIONS}
            onChange={(value) => setAttributes({ markerStyle4: value })}
          />
          <SelectControl
            label="第5階層"
            value={markerStyle5}
            options={MARKER_OPTIONS}
            onChange={(value) => setAttributes({ markerStyle5: value })}
          />
        </PanelBody>
      </InspectorControls>
      <div {...blockProps}>
        <div
          className="c-block-list-ordered-marker"
          data-marker-1={markerStyle1}
          data-marker-2={markerStyle2}
          data-marker-3={markerStyle3}
          data-marker-4={markerStyle4}
          data-marker-5={markerStyle5}
        >
          <ol {...innerBlocksProps} />
        </div>
      </div>
    </>
  );
}
