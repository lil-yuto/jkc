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
    "c-block-card-item-style-1__button": true,
  });

  return (
    <>
      <div {...useBlockProps.save({className})}>
        <article className="c-block-card-item-style-1">
          <a
            href={url}
            target={linkTarget}
            rel={rel}
            className="c-block-card-item-style-1__link"
          >
            {!!imageSrc && (
              <div className="c-block-card-item-style-1__img-wrapper">
                <img src={imageSrc} alt={imageAlt} />
              </div>
            )}
            <div className="c-block-card-item-style-1__content">
              <RichText.Content
                tagName="h4"
                className="c-block-card-item-style-1__title"
                value={title}
              />
              <RichText.Content
                tagName="p"
                className="c-block-card-item-style-1__description"
                value={description}
              />
              <div className="c-block-card-item-style-1__button-wrapper">
                <RichText.Content
                  tagName="button"
                  className="c-block-card-item-style-1__button"
                  value={buttonText}
                />
              </div>
            </div>
          </a>
        </article>
      </div>
    </>
  );
}
