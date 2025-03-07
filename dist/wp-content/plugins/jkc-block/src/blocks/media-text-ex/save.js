import clsx from "clsx";

import {
  RichText,
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";

export default function ({ attributes }) {
  const { imageSrc, imageAlt, imageWidth, imagePosition, caption } = attributes;

  const mediaTextClassName = clsx("c-block-media-text", {
    "c-block-media-text--reverse": imagePosition === "right",
  });

  const imgWrapperClassName = clsx("c-block-media-text__img-wrapper", {
    "c-block-media-text__img-wrapper--20": imageWidth === 20,
    "c-block-media-text__img-wrapper--30": imageWidth === 30,
    "c-block-media-text__img-wrapper--40": imageWidth === 40,
    "c-block-media-text__img-wrapper--50": imageWidth === 50,
    "c-block-media-text__img-wrapper--60": imageWidth === 60,
    "c-block-media-text__img-wrapper--70": imageWidth === 70,
    "c-block-media-text__img-wrapper--80": imageWidth === 80,
  });

  // クラス名を動的に設定
  const innerClassName = clsx({
    "c-block-media-text__body": true,
  });

  return (
    <div {...useBlockProps.save()}>
      <div className={mediaTextClassName}>
        {!!imageSrc && (
          <figure className={imgWrapperClassName}>
            <img src={imageSrc} alt={imageAlt} />
            {( caption && caption.trim() ) && (
              <RichText.Content tagName="figcaption" value={caption} className="c-block-media-text__caption" />
            )}
          </figure>
        )}
        <div {...useInnerBlocksProps.save({ className: innerClassName })} />
      </div>
    </div>
  );
}
