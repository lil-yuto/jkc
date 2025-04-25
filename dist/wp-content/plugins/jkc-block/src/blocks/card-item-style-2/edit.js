import clsx from "clsx";

import { __ } from "@wordpress/i18n";
import { link, linkOff } from "@wordpress/icons";
import { Popover, ToolbarButton } from "@wordpress/components";
import { prependHTTP } from "@wordpress/url";
import {
  useBlockProps,
  RichText,
  BlockControls,
  __experimentalLinkControl as LinkControl,
  MediaPlaceholder,
  MediaReplaceFlow,
} from "@wordpress/block-editor";
import { useEffect, useState } from "@wordpress/element";

import "./editor.scss";

// メディアの設定
const ACCEPT = "image/*";
const ALLOWED_TYPES = ["image"];
const NEW_TAB_REL = 'noopener noreferrer';

export default function ({ className, attributes, setAttributes, isSelected }) {
  // 属性の分割代入
  const {
    title,
    description,
    imageId,
    imageSrc,
    imageAlt,
    rel,
    linkTarget,
    url,
    buttonText,
  } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps({
    className: className,
  });
  const [isEditingURL, setIsEditingURL] = useState(false);
  const isURLSet = !!url;
  const opensInNewTab = linkTarget === "_blank";

  useEffect(() => {
    if (!isSelected) {
      setIsEditingURL(false);
    }
  }, [isSelected]);

  function onSelectImage({ id, url, alt }) {
    setAttributes({
      imageId: id,
      imageSrc: url,
      imageAlt: alt,
    });
  }

  function onToggleOpenInNewTab(value) {
    setAttributes({
      linkTarget: value ? '_blank' : undefined,
      rel: value ? NEW_TAB_REL : undefined,
    });
  }

  function startEditing(event) {
    event.preventDefault();
    setIsEditingURL(true);
  }

  function unlink() {
    setAttributes({
      url: undefined,
      linkTarget: undefined,
      rel: undefined,
    });
    setIsEditingURL(false);
  }

  function onChangeContent(newContent) {
    setAttributes({ buttonText: newContent });
  }

  return (
    <>
      <div {...blockProps}>
        <article className="c-block-card-item-style-2">
          <a className="c-block-card-item-style-2__link">
            <div className="c-block-card-item-style-2__img-wrapper">
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
            <div className="c-block-card-item-style-2__content">
              <RichText
                tagName="h4"
                className="c-block-card-item-style-2__title"
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
                className="c-block-card-item-style-2__description"
                value={description}
                placeholder="説明を入力"
                allowedFormats={[
                  "core/italic",
                  "core/bold",
                  "core/text-color",
                  "core/underline",
                ]}
                onChange={(value) => {
                  setAttributes({ description: value });
                }}
              />
              <div className="c-block-card-item-style-2__button-wrapper">
                <RichText
                  tagName="p"
                  className="c-block-card-item-style-2__button"
                  onChange={onChangeContent}
                  value={buttonText}
                  allowedFormats={[]}
                  placeholder="テキストを入力"
                />
              </div>
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
        {!isURLSet && (
          <ToolbarButton
            name="link"
            icon={link}
            title="リンク"
            onClick={startEditing}
          />
        )}
        {isURLSet && (
          <ToolbarButton
            name="link"
            icon={linkOff}
            title="リンク解除"
            onClick={unlink}
            isActive={true}
          />
        )}
      </BlockControls>
      {isSelected && (isEditingURL || isURLSet) && (
        <Popover
          placement="bottom"
          onClose={() => {
            setIsEditingURL(false);
          }}
          focusOnMount={isEditingURL ? "firstElement" : false}
          __unstableSlotName={"__unstable-block-tools-after"}
          shift
        >
          <LinkControl
            className="wp-block-navigation-link__inline-link-input"
            value={{ url, opensInNewTab }}
            onChange={({
              url: newURL = "",
              opensInNewTab: newOpensInNewTab,
            }) => {
              setAttributes({ url: prependHTTP(newURL) });

              if (opensInNewTab !== newOpensInNewTab) {
                onToggleOpenInNewTab(newOpensInNewTab);
              }
            }}
            onRemove={() => {
              unlink();
            }}
            forceIsEditingLink={isEditingURL}
          />
        </Popover>
      )}
    </>
  );
}
