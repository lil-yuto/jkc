import clsx from "clsx";

import {
  RichText,
  useBlockProps,
} from "@wordpress/block-editor";

export default function ({ className, attributes }) {
  const {
    title,
    description,
    imageSrc,
    imageAlt,
    imageOrientation,
  } = attributes;

  const imageWrapperClass = clsx(
    "c-block-contest-item__img-wrapper",
    imageOrientation && `is-${imageOrientation}`
  );

  return (
    <>
      <div {...useBlockProps.save({className})}>
        <article className="c-block-contest-item">
          <a
            href={imageSrc ? imageSrc : undefined}
            className="c-block-contest-item__link"
            data-lity="data-lity"
          >
            {!!imageSrc && (
              <div className={imageWrapperClass}>
                <img src={imageSrc} alt={imageAlt} />
              </div>
            )}
            <div className="c-block-contest-item__content">
              <RichText.Content
                tagName="p"
                className="c-block-contest-item__title"
                value={title}
              />
              <RichText.Content
                tagName="p"
                className="c-block-contest-item__description"
                value={description}
              />
            </div>
          </a>
        </article>
      </div>
    </>
  );
}
