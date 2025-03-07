import clsx from "clsx";

import { RichText, useBlockProps } from "@wordpress/block-editor";

export default function ({ attributes }) {
  const { organization, number } = attributes;

  return (
    <div {...useBlockProps.save()}>
      <div className="c-block-contact">
        <RichText.Content
          tagName="p"
          className="c-block-contact__organization"
          value={organization}
        />
        <RichText.Content
          tagName="p"
          className="c-block-contact__number"
          value={number}
        />
      </div>
    </div>
  );
}
