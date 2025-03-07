import clsx from "clsx";

import { __ } from "@wordpress/i18n";
import { useBlockProps, RichText } from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { content, rel, linkTarget, url } = attributes;

  return (
    <li {...useBlockProps.save()}>
      <div className="c-block-anchor-link-item-small">
        <RichText.Content
          tagName="a"
          className="c-block-anchor-link-item-small__link"
          value={content}
          href={url}
          target={linkTarget}
          rel={rel}
        />
      </div>
    </li>
  );
}
