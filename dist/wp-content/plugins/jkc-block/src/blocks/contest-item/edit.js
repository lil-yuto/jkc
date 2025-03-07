import clsx from "clsx";
import { __ } from "@wordpress/i18n";
import {
  useBlockProps,
  RichText,
  BlockControls,
  MediaPlaceholder,
  MediaReplaceFlow,
} from "@wordpress/block-editor";
import { ToolbarGroup, ToolbarButton } from "@wordpress/components";

// import "./editor.scss";

// メディアの設定
const ACCEPT = "image/*";
const ALLOWED_TYPES = ["image"];

export default function ({ className, attributes, setAttributes, isSelected }) {
  // 属性の分割代入
  const {
    title,
    description,
    imageId,
    imageSrc,
    imageAlt,
    imageOrientation,
  } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps({
    className: className,
  });

  function onSelectImage({ id, url, alt }) {
    setAttributes({
      imageId: id,
      imageSrc: url,
      imageAlt: alt,
    });
  }

  // 画像の向きを設定する関数
  function setImageOrientation(orientation) {
    setAttributes({ imageOrientation: orientation });
  }

  // 画像ラッパークラスに向きのクラスを追加
  const imageWrapperClass = clsx(
    "c-block-contest-item__img-wrapper",
    imageOrientation && `is-${imageOrientation}`
  );

  return (
    <>
      <div {...blockProps}>
        <article className="c-block-contest-item">
          <a className="c-block-contest-item__link">
            <div className={imageWrapperClass}>
              {imageSrc ? (
                <img src={imageSrc} alt={imageAlt} />
              ) : (
                <MediaPlaceholder
                  icon="format-image"
                  labels="画像"
                  accept={ACCEPT}
                  allowedTypes={ALLOWED_TYPES}
                  onSelect={onSelectImage}
                />
              )}
            </div>
            <div className="c-block-contest-item__content">
            <RichText
                tagName="p"
                className="c-block-contest-item__title"
                value={title}
                placeholder="タイトルを入力"
                allowedFormats={[]}
                multiline={false}
                onChange={(value) => {
                  setAttributes({ title: value });
                }}
              />
              <RichText
                tagName="p"
                className="c-block-contest-item__description"
                value={description}
                placeholder="説明を入力"
                allowedFormats={[]}
                onChange={(value) => {
                  setAttributes({ description: value });
                }}
              />
            </div>
          </a>
        </article>
      </div>
      <BlockControls group="block">
        <MediaReplaceFlow
          mediaId={imageId}
          mediaUrl={imageSrc}
          accept={ACCEPT}
          allowedTypes={ALLOWED_TYPES}
          onSelect={onSelectImage}
          name={!imageSrc ? "画像を追加" : "画像を置換"}
        />
        {imageSrc && (
          <ToolbarGroup>
            <ToolbarButton
              icon="align-wide"
              label={__("横向き", "jkc-block")}
              isActive={imageOrientation === "landscape"}
              onClick={() => setImageOrientation("landscape")}
            />
            <ToolbarButton
              icon="align-pull-left"
              label={__("縦向き", "jkc-block")}
              isActive={imageOrientation === "portrait"}
              onClick={() => setImageOrientation("portrait")}
            />
          </ToolbarGroup>
        )}
      </BlockControls>
    </>
  );
}
