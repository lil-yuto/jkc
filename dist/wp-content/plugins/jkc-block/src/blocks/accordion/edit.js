import clsx from "clsx";

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function Edit() {
  const className = clsx({
    "c-block-accordion": true,
  });

  const innerBlocksProps = useInnerBlocksProps(
    {
      className: clsx({
        "c-block-accordion__items": true,
      }),
    },
    {
      allowedBlocks: ["jkc-block/accordion-item"],
      template: [["jkc-block/accordion-item"]],
    },
  );

  return (
    <div {...useBlockProps()}>
      <div className={className}>
        <div {...innerBlocksProps} />
      </div>
    </div>
  );
}
