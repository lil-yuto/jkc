import clsx from "clsx"; // クラス名を動的に結合するためのライブラリ

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import {
  useBlockProps, // ブロックのプロパティを取得するフック
  RichText, // リッチテキストエディタコンポーネント
  AlignmentControl, // テキスト整列コントロールコンポーネント
  BlockControls, // ブロックコントロールバーコンポーネント
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function Edit({ attributes, setAttributes }) {
  const { content, textAlign, placeholder } = attributes; // ブロックの属性を取得

  // クラス名を動的に設定
  const className = clsx({
    "c-block-text": true, // 常に適用するクラス
    [`u-text-align-${textAlign}`]: textAlign, // textAlignの値が存在する場合にのみ適用
  });

  // コンテンツが変更されたときの処理
  const onChangeContent = (newContent) => {
    setAttributes({ content: newContent });
  };

  // テキストの整列が変更されたときの処理
  const onChangeAlign = (newAlign) => {
    setAttributes({ textAlign: newAlign });
  };

  return (
    <>
      <BlockControls>
        <AlignmentControl value={textAlign} onChange={onChangeAlign} />
      </BlockControls>
      <div {...useBlockProps()}>
        <RichText
          tagName="p" // 動的な見出しタグを使用
          className={className}
          onChange={onChangeContent} // コンテンツ変更時のハンドラー
          value={content} // 現在のコンテンツ値
          allowedFormats={[
            "core/italic",
            "core/bold",
            "core/link",
            "core/text-color",
            "core/image",
          ]} // フォーマットの許可設定
          placeholder={placeholder} // プレースホルダーテキスト
        />
      </div>
    </>
  );
}
