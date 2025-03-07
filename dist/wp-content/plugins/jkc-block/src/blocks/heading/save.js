import clsx from "clsx"; // クラス名を動的に結合するためのライブラリ

import { __ } from "@wordpress/i18n";
import { useBlockProps, RichText } from "@wordpress/block-editor";

export default function save({ attributes }) {
  const { content, textAlign, level } = attributes; // level属性を追加
  const TagName = "h" + level; // タグ名を動的に設定

  // クラス名を動的に設定
  const className = clsx({
    "c-post-heading": true, // 常に適用するクラス
    [`c-post-heading--lv${level}`]: level, // levelの値が存在する場合にのみ適用
    [`u-text-align-${textAlign}`]: textAlign, // textAlignの値が存在する場合にのみ適用
  });

  return (
    <div {...useBlockProps.save()}>
      <RichText.Content
        tagName={TagName}
        className={className}
        value={content}
      />
    </div>
  );
}
