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
    "c-block-card-item-style-3__button": true,
  });

  return (
    <>
      <div {...useBlockProps.save({className})}>
        <article className="c-block-card-item-style-3">
          <a
            href={url}
            target={linkTarget}
            rel={rel}
            className="c-block-card-item-style-3__link"
          >
            {!!imageSrc && (
              <div className="c-block-card-item-style-3__img-wrapper">
                <img src={imageSrc} alt={imageAlt} />
              </div>
            )}
            <div className="c-block-card-item-style-3__content">
              <RichText.Content
                tagName="h4"
                className="c-block-card-item-style-3__title"
                value={title}
              />
              <RichText.Content
                tagName="p"
                className="c-block-card-item-style-3__description"
                value={description}
              />
              <div className="c-block-card-item-style-3__button-wrapper">
                <RichText.Content
                  tagName="button"
                  className="c-block-card-item-style-3__button"
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
