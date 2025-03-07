import clsx from "clsx";

import {
  RichText,
  useBlockProps,
} from "@wordpress/block-editor";

export default function ({ attributes }) {
  const { content, title, imageSrc, imageAlt } = attributes;

  return (
    <li {...useBlockProps.save()}>
      <div className="c-block-flow-vertical-item">
        {!!imageSrc && (
          <div className="c-block-flow-vertical-item__img-wrapper">
            <img src={imageSrc} alt={imageAlt} />
          </div>
        )}
        <div className="c-block-flow-vertical-item__body">
          <RichText.Content
            tagName="h4"
            className="c-block-flow-vertical-item__title"
            value={title}
          />
          <RichText.Content
            tagName="p"
            className="c-block-flow-vertical-item__description"
            value={content}
          />
        </div>
      </div>
    </li>
  );
}
