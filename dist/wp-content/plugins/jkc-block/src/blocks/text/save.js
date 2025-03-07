import clsx from "clsx"; // クラス名を動的に結合するためのライブラリ

import { __ } from "@wordpress/i18n";
import { useBlockProps, RichText } from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { content, textAlign } = attributes;

  // クラス名を動的に設定
  const className = clsx({
    "c-block-text": true, // 常に適用するクラス
    [`u-text-align-${textAlign}`]: textAlign, // textAlignの値が存在する場合にのみ適用
  });

  return (
    <div {...useBlockProps.save()}>
      <RichText.Content
        tagName="p" // 動的な見出しタグを使用
        className={className}
        value={content} // 現在のコンテンツ値
      />
    </div>
  );
}
