import clsx from "clsx";

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function Edit({ attributes, setAttributes }) {
  const className = clsx({
    "c-block-anchor-link-small": true,
  });

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: clsx({
        "c-block-anchor-link-small__items": true,
      }),
    },
    {
      allowedBlocks: ["jkc-block/anchor-link-item-small"],
      template: Array(14).fill(["jkc-block/anchor-link-item-small"]),
    },
  );

  return (
    <div {...useBlockProps()}>
      <div className={className}>
        <ul {...innerBlocksProps} />
      </div>
    </div>
  );
}
