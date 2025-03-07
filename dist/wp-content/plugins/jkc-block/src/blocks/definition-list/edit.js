import clsx from "clsx";

import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function Edit() {
  const innerBlocksProps = useInnerBlocksProps(
    {
      className: "c-block-definition-list",
    },
    {
      allowedBlocks: ["jkc-block/definition-item"],
      template: [["jkc-block/definition-item"]],
    },
  );

  return (
    <div {...useBlockProps()}>
      <dl {...innerBlocksProps} />
    </div>
  );
}
