import clsx from "clsx";

import { RichText, useBlockProps } from "@wordpress/block-editor";

export default function ({ attributes }) {
  const { title } = attributes;

  return (
    <li {...useBlockProps.save()}>
      <div className="c-block-flow-horizontal-title">
        <RichText.Content
          tagName="p"
          className="c-block-flow-horizontal-title__title"
          value={title}
        />
      </div>
    </li>
  );
}
