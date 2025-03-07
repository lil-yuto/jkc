import clsx from "clsx";

import {
  BlockControls,
  MediaPlaceholder,
  MediaReplaceFlow,
  RichText, // リッチテキストエディタコンポーネント
  useBlockProps,
  useInnerBlocksProps,
  InspectorControls,
} from "@wordpress/block-editor";
import {
  PanelBody,
  RangeControl,
  ToolbarGroup,
  ToolbarButton,
} from "@wordpress/components";
import "./editor.scss"; // エディター用スタイルシートのインポート

// メディアの設定
const ACCEPT = "image/*";
const ALLOWED_TYPES = ["image"];

// ALLOWED_BLOCKSを定義
const ALLOWED_BLOCKS = ["jkc-block/text", "jkc-block/button", "jkc-block/list-ordered", "jkc-block/list-unordered", "core/image"];

// TEMPLATEを定義（必要に応じて）
const TEMPLATE = [["jkc-block/text"]];
export default function ({ attributes, setAttributes }) {
  // 属性の分割代入
  const {
    imageId,
    imageSrc,
    imageAlt,
    imageWidth,
    imagePosition,
    caption
  } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps();

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

  // インナーブロックのプロパティ取得
  const innerBlocksProps = useInnerBlocksProps(
    {
      className: clsx(
        "c-block-media-text__body", // インナーブロックに適用するクラス
      ),
    },
    {
      allowedBlocks: ALLOWED_BLOCKS,
      template: TEMPLATE,
      // templateLock: false,
    },
  );

  // 画像選択時のコールバック関数
  function onSelectImage({ id, url, alt }) {
    setAttributes({
      imageId: id,
      imageSrc: url,
      imageAlt: alt,
    });
  }

  return (
    <>
      <InspectorControls>
        <PanelBody title="設定">
          <RangeControl
            __next40pxDefaultSize
            __nextHasNoMarginBottom
            initialPosition={50}
            label="画像の幅 [%]"
            marks
            max={80}
            min={20}
            onChange={(value) => setAttributes({imageWidth: value})}
            step={10}
            value={imageWidth}
          />
        </PanelBody>
      </InspectorControls>
      <BlockControls>
        <ToolbarGroup>
          <MediaReplaceFlow
            mediaId={imageId}
            mediaUrl={imageSrc}
            accept={ACCEPT}
            allowedTypes={ALLOWED_TYPES}
            onSelect={onSelectImage}
            name={!imageSrc ? "画像を追加" : "画像を置換"}
          />
        </ToolbarGroup>
        <ToolbarGroup>
          <ToolbarButton
            icon="align-pull-left"
            title="画像を左に表示"
            isActive={imagePosition === "left"}
            onClick={() => setAttributes({ imagePosition: "left" })}
            />
          <ToolbarButton
            icon="align-pull-right"
            title="画像を右に表示"
            isActive={imagePosition === "right"}
            onClick={() => setAttributes({ imagePosition: "right" })}
          />
        </ToolbarGroup>
      </BlockControls>
      <div {...blockProps}>
        <div className={mediaTextClassName}>
          <figure className={imgWrapperClassName}>
            {imageSrc ? (
              <>
                <img src={imageSrc} alt={imageAlt} />
                <RichText
                  tagName="figcaption"
                  className="c-block-media-text__caption"
                  placeholder="キャプションを入力..."
                  value={caption}
                  onChange={(value) => setAttributes({ caption: value })}
                  allowedFormats={[]}
                />
              </>
            ) : (
              <>
                <MediaPlaceholder
                  icon="format-image"
                  labels="画像"
                  accept={ACCEPT}
                  allowedTypes={ALLOWED_TYPES}
                  onSelect={onSelectImage}
                />
              </>
            )}
          </figure>
          <div {...innerBlocksProps} />
        </div>
      </div>
    </>
  );
}
