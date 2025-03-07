import clsx from "clsx";

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function Edit({ attributes, setAttributes }) {
  const className = clsx({
    "c-block-button": true,
  });

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: clsx({
        "c-block-button__items": true,
      }),
    },
    {
      allowedBlocks: ["jkc-block/anchor-link-item"],
      template: [["jkc-block/anchor-link-item"]],
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
