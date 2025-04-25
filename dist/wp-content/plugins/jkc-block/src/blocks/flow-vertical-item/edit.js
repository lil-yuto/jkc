import clsx from "clsx";

import {
  BlockControls,
  MediaPlaceholder,
  MediaReplaceFlow,
  RichText, // リッチテキストエディタコンポーネント
  useBlockProps,
} from "@wordpress/block-editor";
import {
  ToolbarGroup,
} from "@wordpress/components";
import "./editor.scss"; // エディター用スタイルシートのインポート

// メディアの設定
const ACCEPT = "image/*";
const ALLOWED_TYPES = ["image"];

export default function ({ attributes, setAttributes }) {
  // 属性の分割代入
  const {
    content,
    title,
    placeholder,
    imageId,
    imageSrc,
    imageAlt,
  } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps();

  // 画像選択時のコールバック関数
  function onSelectImage({ id, url, alt }) {
    setAttributes({
      imageId: id,
      imageSrc: url,
      imageAlt: alt,
    });
  }

  const onChangeContent = (newContent) => {
    setAttributes({ content: newContent });
  };

  const onChangeTitle = (newTitle) => {
    setAttributes({ title: newTitle });
  };

  return (
    <>
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
      </BlockControls>
      <li {...blockProps}>
        <div className="c-block-flow-vertical-item">
          <div className="c-block-flow-vertical-item__img-wrapper">
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
          <div className="c-block-flow-vertical-item__body">
            <RichText
              tagName="h4"
              className="c-block-flow-vertical-item__title"
              onChange={onChangeTitle}
              value={title}
              allowedFormats={[]}
              placeholder="タイトルを入力"
              />
            <RichText
              tagName="p"
              className="c-block-flow-vertical-item__description"
              onChange={onChangeContent}
              value={content}
              allowedFormats={["core/italic", "core/bold", "core/text-color", "core/underline"]}
              placeholder={placeholder}
            />
          </div>
        </div>
      </li>
    </>
  );
}
