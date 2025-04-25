// インポートや外部ライブラリの読み込み
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

// 定数の設定（画像の受け入れ設定や許可する画像タイプ）
const ACCEPT = "image/*";
const ALLOWED_TYPES = ["image"];

// ブロックで利用するテンプレートやブロック用の定数（必要に応じて使用）
const ALLOWED_BLOCKS = ["jkc-block/button"];
const TEMPLATE = [["jkc-block/button"]];

// 新しいタブでリンクを開くときに設定するrel属性の定数
const NEW_TAB_REL = 'noopener noreferrer';

// --- メインコンポーネント ---
export default function ({ className, attributes, setAttributes, isSelected }) {
  // 属性の取り出し：ブロックの設定値をそれぞれ変数に代入
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

  // ブロックのプロパティを設定（ここでは追加クラス名も設定）
  const blockProps = useBlockProps({ className: className });

  // useStateでリンク編集中かどうかを管理
  const [isEditingURL, setIsEditingURL] = useState(false);
  // urlが設定されているかどうかの状態（真偽値）
  const isURLSet = !!url;
  // linkTargetが'_blank'なら新しいタブで開く設定と判断
  const opensInNewTab = linkTarget === "_blank";

  // useEffectでブロックの選択状態が変わったときの処理を実装
  useEffect(() => {
    // ブロックが選択されていなければ、リンク編集モードを終了する
    if (!isSelected) {
      setIsEditingURL(false);
    }
  }, [isSelected]);

  // 画像が選択されたときの処理：画像の情報をattributesに保存
  function onSelectImage({ id, url, alt }) {
    setAttributes({
      imageId: id,
      imageSrc: url,
      imageAlt: alt,
    });
  }

  // 新しいタブで開く設定を切り替える関数
  function onToggleOpenInNewTab(value) {
    // valueがtrueの場合はlinkTargetを'_blank'に、falseの場合はundefinedに変更
    const newLinkTarget = value ? '_blank' : undefined;
    // valueがtrueの場合はrel属性を定数NEW_TAB_RELに、falseの場合はundefinedに変更
    const updatedRel = value ? NEW_TAB_REL : undefined;
    // 両属性を同時に更新して保存
    setAttributes({
      linkTarget: newLinkTarget,
      rel: updatedRel,
    });
  }

  // リンク編集を開始する（イベントのデフォルト動作を停止してisEditingURLをtrueに設定）
  function startEditing(event) {
    event.preventDefault();
    setIsEditingURL(true);
  }

  // リンクの解除処理：url、linkTarget、rel属性を全てクリアにし、編集モードを終了
  function unlink() {
    setAttributes({
      url: undefined,
      linkTarget: undefined,
      rel: undefined,
    });
    setIsEditingURL(false);
  }

  // ボタンテキストの更新処理（ボタンの内容が変更されたときに呼び出す）
  function onChangeContent(newContent) {
    setAttributes({ buttonText: newContent });
  }

  // --- コンポーネントのレンダリング ---
  return (
    <>
      <div {...blockProps}>
        {/* ブロックの全体構造 */}
        <article className="c-block-card-item-style-1">
          <a className="c-block-card-item-style-1__link">
            <div className="c-block-card-item-style-1__img-wrapper">
              {imageSrc ? (
                // すでに画像がある場合は画像を表示
                <img src={imageSrc} alt={imageAlt} />
              ) : (
                // 画像がなければ、画像選択ボタンを表示
                <MediaPlaceholder
                  icon="format-image"
                  labels="画像"
                  accept={ACCEPT}
                  allowedTypes={ALLOWED_TYPES}
                  onSelect={onSelectImage}
                />
              )}
            </div>
            <div className="c-block-card-item-style-1__content">
              {/* 説明文の入力フォーム */}
              <RichText
                tagName="p"
                className="c-block-card-item-style-1__description"
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
              <div className="c-block-card-item-style-1__button-wrapper">
                {/* ボタンテキストの入力フォーム */}
                <RichText
                  tagName="p"
                  className="c-block-card-item-style-1__button"
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
      {/* ブロックのツールバーコントロール */}
      <BlockControls group="block">
        <MediaReplaceFlow
          mediaId={imageId}
          mediaUrl={imageSrc}
          accept={ACCEPT}
          allowedTypes={ALLOWED_TYPES}
          onSelect={onSelectImage}
          name={!imageSrc ? "画像を追加" : "画像を置換"}
        />
        {/* URL未設定の場合はリンク設定ボタンを表示 */}
        {!isURLSet && (
          <ToolbarButton
            name="link"
            icon={link}
            title="リンク"
            onClick={startEditing}
          />
        )}
        {/* URLが設定済みの場合はリンク解除ボタンを表示 */}
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
      {/* ブロックが選択されているとき、URL入力用のPopover（ポップアップ）を表示 */}
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
            value={{
              url,
              opensInNewTab: linkTarget === '_blank'  // タブ設定が'_blank'かどうかで判定
            }}
            onChange={({
              url: newURL = "",
              opensInNewTab: newOpensInNewTab,
            }) => {
              // URLと新しいタブ設定を更新
              onToggleOpenInNewTab(newOpensInNewTab);
              setAttributes({ url: prependHTTP(newURL) });
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
