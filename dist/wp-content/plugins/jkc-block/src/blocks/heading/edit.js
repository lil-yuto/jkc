import clsx from "clsx"; // クラス名を動的に結合するためのライブラリ

import { __ } from "@wordpress/i18n"; // 国際化用関数のインポート
import {
  useBlockProps, // ブロックのプロパティを取得するフック
  RichText, // リッチテキストエディタコンポーネント
  AlignmentControl, // テキスト整列コントロールコンポーネント
  BlockControls, // ブロックコントロールバーコンポーネント
  HeadingLevelDropdown, // 見出しレベル選択ドロップダウンコンポーネント
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function Edit({ attributes, setAttributes }) {
  const { content, textAlign, level, placeholder } = attributes; // ブロックの属性を取得
  const tagName = "h" + level; // 見出しタグ名を動的に設定（例: h2）

  const className = clsx({
    "c-post-heading": true,
    [`c-post-heading--lv${level}`]: level, // levelの値が存在する場合にのみ適用
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

  // 見出しレベルが変更されたときの処理
  const onChangeLevel = (newLevel) => {
    setAttributes({ level: newLevel });
  };

  return (
    <>
      <BlockControls>
        {/* <AlignmentControl value={textAlign} onChange={onChangeAlign} /> */}
        <HeadingLevelDropdown
          value={level}
          onChange={onChangeLevel}
          options={[2, 3, 4, 5]} // 見出しレベルの選択肢を提供
        />
      </BlockControls>
      <div {...useBlockProps()}>
        <RichText
          tagName={tagName} // 動的な見出しタグを使用
          className={className} // テキスト部分のクラス名
          onChange={onChangeContent} // コンテンツ変更時のハンドラー
          value={content} // 現在のコンテンツ値
          allowedFormats={[]} // フォーマットの許可設定（ここでは無許可）
          placeholder={placeholder} // プレースホルダーテキスト
        />
      </div>
    </>
  );
}
