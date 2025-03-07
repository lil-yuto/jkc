import clsx from "clsx";

import {
  RichText,
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";

export default function ({ className, attributes }) {
  const {
    title,
    description,
    imageSrc,
    imageAlt,
    rel,
    linkTarget,
    url,
    buttonText,
  } = attributes;

  // クラス名を動的に設定
  const innerClassName = clsx({
    "c-block-card-item-style-4__button": true,
  });

  return (
    <>
      <div {...useBlockProps.save({className})}>
        <article className="c-block-card-item-style-4">
          <a
            href={url}
            target={linkTarget}
            rel={rel}
            className="c-block-card-item-style-4__link"
          >
            {!!imageSrc && (
              <div className="c-block-card-item-style-4__img-wrapper">
                <img src={imageSrc} alt={imageAlt} />
              </div>
            )}
            <div className="c-block-card-item-style-4__content">
              <RichText.Content
                tagName="h4"
                className="c-block-card-item-style-4__title"
                value={title}
              />
              <RichText.Content
                tagName="p"
                className="c-block-card-item-style-4__description"
                value={description}
              />
            </div>
          </a>
        </article>
      </div>
    </>
  );
}
