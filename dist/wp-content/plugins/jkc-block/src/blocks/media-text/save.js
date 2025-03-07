import clsx from "clsx";

import {
  RichText,
  useBlockProps,
  useInnerBlocksProps,
} from "@wordpress/block-editor";

export default function ({ attributes }) {
  const { content, imageSrc, imageAlt, imageWidth, imagePosition } = attributes;

  const mediaTextClassName = clsx("c-block-media-text", {
    "c-block-media-text--reverse": imagePosition === "right",
  });

  const imgWrapperClassName = clsx("c-block-media-text__img-wrapper", {
    "c-block-media-text__img-wrapper--30": imageWidth === 30,
    "c-block-media-text__img-wrapper--50": imageWidth === 50,
  });

  // クラス名を動的に設定
  const innerClassName = clsx({
    "c-block-media-text__button": true,
  });

  return (
    <div {...useBlockProps.save()}>
      <div className={mediaTextClassName}>
        {!!imageSrc && (
          <div className={imgWrapperClassName}>
            <img src={imageSrc} alt={imageAlt} />
          </div>
        )}
        <div className="c-block-media-text__body">
          <RichText.Content
            tagName="p"
            className="c-block-media-text__description"
            value={content}
          />
          <div {...useInnerBlocksProps.save({ className: innerClassName })} />
        </div>
      </div>
    </div>
  );
}
