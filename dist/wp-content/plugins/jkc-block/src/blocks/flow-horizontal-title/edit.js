import clsx from "clsx";

import {
  RichText, // リッチテキストエディタコンポーネント
  useBlockProps,
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function ({ attributes, setAttributes }) {
  // 属性の分割代入
  const { title } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps();

  // コンテンツが変更されたときの処理
  const onChangeTitle = (newTitle) => {
    setAttributes({ title: newTitle });
  };

  return (
    <li {...blockProps}>
      <div className="c-block-flow-horizontal-title">
        <RichText
          tagName="p"
          className="c-block-flow-horizontal-title__title"
          onChange={onChangeTitle}
          value={title}
          allowedFormats={[]}
          placeholder="タイトルを入力"
        />
      </div>
    </li>
  );
}
