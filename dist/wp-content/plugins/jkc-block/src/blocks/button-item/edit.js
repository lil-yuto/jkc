import clsx from "clsx"; // クラス名を動的に結合するためのライブラリ

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import { link, linkOff } from "@wordpress/icons";
import { Popover, ToolbarButton } from "@wordpress/components";
import { prependHTTP } from "@wordpress/url";
import {
  useBlockProps, // ブロックのプロパティを取得するフック
  RichText, // リッチテキストエディタコンポーネント
  __experimentalLinkControl as LinkControl,
  BlockControls,
} from "@wordpress/block-editor";
import { useEffect, useState } from "@wordpress/element";

import "./editor.scss"; // エディター用スタイルシートのインポート

const NEW_TAB_REL = "noopener noreferrer";

export default function Edit({ attributes, setAttributes, isSelected }) {
  const { content, placeholder, rel, linkTarget, url } = attributes; // ブロックの属性を取得

  // コンテンツが変更されたときの処理
  const onChangeContent = (newContent) => {
    setAttributes({ content: newContent });
  };

  const [isEditingURL, setIsEditingURL] = useState(false);
  const isURLSet = !!url;
  const opensInNewTab = linkTarget === "_blank";

  useEffect(() => {
    if (!isSelected) {
      setIsEditingURL(false);
    }
  }, [isSelected]);

  function onToggleOpenInNewTab(value) {
    setAttributes({
      linkTarget: value ? "_blank" : undefined,
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

  return (
    <>
      <div {...useBlockProps()}>
        <div className="c-block-button-item">
          <RichText
            tagName="a"
            className="c-block-button-item__link"
            value={content} // 現在のコンテンツ値
            href={url}
            target={linkTarget}
            rel={rel}
            onChange={onChangeContent} // コンテンツ変更時のハンドラー
            allowedFormats={[]} // フォーマットの許可設定
            placeholder={placeholder} // プレースホルダーテキスト
          />
        </div>
      </div>
      <BlockControls group="block">
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
