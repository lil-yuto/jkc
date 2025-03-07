import clsx from "clsx";

import {
  RichText,
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";

export default function ({ attributes }) {
  const { summary, isOpen } = attributes;

  return (
    <div {...useBlockProps.save({ className: "c-block-accordion-item" })}>
      <details className="c-block-accordion-item" open={isOpen}>
        <summary className="c-block-accordion-item__summary">
          <RichText.Content
            tagName="p"
            className="c-block-accordion-item__text"
            value={summary}
          />
        </summary>
        <div
          {...useInnerBlocksProps.save({
            className: "c-block-accordion-item__content",
          })}
        />
      </details>
    </div>
  );
}
