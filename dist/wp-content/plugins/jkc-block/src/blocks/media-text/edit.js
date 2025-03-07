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
  RadioControl,
  ToolbarGroup,
  ToolbarButton,
} from "@wordpress/components";
import "./editor.scss"; // エディター用スタイルシートのインポート

// メディアの設定
const ACCEPT = "image/*";
const ALLOWED_TYPES = ["image"];

// ALLOWED_BLOCKSを定義
const ALLOWED_BLOCKS = ["jkc-block/button-item"];

// TEMPLATEを定義（必要に応じて）
const TEMPLATE = [];

export default function ({ attributes, setAttributes }) {
  // 属性の分割代入
  const {
    content,
    placeholder,
    imageId,
    imageSrc,
    imageAlt,
    imageWidth,
    imagePosition,
  } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps();

  const mediaTextClassName = clsx("c-block-media-text", {
    "c-block-media-text--reverse": imagePosition === "right",
  });

  const imgWrapperClassName = clsx("c-block-media-text__img-wrapper", {
    "c-block-media-text__img-wrapper--30": imageWidth === 30,
    "c-block-media-text__img-wrapper--50": imageWidth === 50,
  });

  // インナーブロックのプロパティ取得
  const innerBlocksProps = useInnerBlocksProps(
    {
      className: clsx(
        "c-block-media-text__button", // インナーブロックに適用するクラス
      ),
    },
    {
      allowedBlocks: ALLOWED_BLOCKS,
      template: TEMPLATE,
      templateLock: false,
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

  // コンテンツが変更されたときの処理
  const onChangeContent = (newContent) => {
    setAttributes({ content: newContent });
  };

  return (
    <>
      <InspectorControls>
        <PanelBody title="設定">
          <RadioControl
            label="画像の幅"
            selected={imageWidth}
            options={[
              { label: "30%", value: 30 },
              { label: "50%", value: 50 },
            ]}
            onChange={(value) => setAttributes({ imageWidth: parseInt(value) })}
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
          <div className={imgWrapperClassName}>
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
          <div className="c-block-media-text__body">
            <RichText
              tagName="p"
              className="c-block-media-text__description"
              onChange={onChangeContent}
              value={content}
              allowedFormats={["core/italic", "core/bold", "core/text-color"]}
              placeholder={placeholder}
            />
            <div {...innerBlocksProps} />
          </div>
        </div>
      </div>
    </>
  );
}
