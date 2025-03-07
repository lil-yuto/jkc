import clsx from "clsx";

import {
  RichText,
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";
import { Fragment } from "@wordpress/element";
import "./editor.scss";

const ALLOWED_BLOCKS = [
  "jkc-block/text",
  "jkc-block/list-ordered",
  "jkc-block/list-unordered",
];

const TEMPLATE = [["jkc-block/list-ordered"]];

export default function ({ attributes, setAttributes }) {
  const { term } = attributes;
  const innerBlocksProps = useInnerBlocksProps(
    {
      className: "c-block-definition-list__description",
    },
    {
      allowedBlocks: ALLOWED_BLOCKS,
      template: TEMPLATE,
    },
  );

  return (
    // <Fragment>
    <div {...useBlockProps()}>
      <RichText
        tagName="dt"
        className="c-block-definition-list__term"
        value={term}
        allowedFormats={["core/text-color"]}
        onChange={(newTerm) => setAttributes({ term: newTerm })}
        placeholder="説明するものを入力"
      />
      <dd {...innerBlocksProps} />
    </div>
    // </Fragment>
  );
}
