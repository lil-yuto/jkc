import clsx from "clsx";

import { RichText, useBlockProps } from "@wordpress/block-editor";

export default function ({ attributes }) {
  const { title, description } = attributes;

  return (
    <li {...useBlockProps.save()}>
      <div className="c-block-flow-horizontal-title-text">
        <RichText.Content
          tagName="p"
          className="c-block-flow-horizontal-title-text__title"
          value={title}
        />
        <RichText.Content
          tagName="p"
          className="c-block-flow-horizontal-title-text__description"
          value={description}
        />
      </div>
    </li>
  );
}
