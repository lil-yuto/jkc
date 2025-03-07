import clsx from "clsx";

import { __ } from "@wordpress/i18n";
import { useBlockProps, RichText } from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { content, rel, linkTarget, url } = attributes;

  return (
    <div {...useBlockProps.save()}>
      <div className="c-block-button-item">
        <RichText.Content
          tagName="a"
          className="c-block-button-item__link"
          value={content}
          href={url}
          target={linkTarget}
          rel={rel}
        />
      </div>
    </div>
  );
}
