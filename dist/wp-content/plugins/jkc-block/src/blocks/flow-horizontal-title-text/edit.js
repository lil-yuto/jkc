import clsx from "clsx";

import {
  RichText, // リッチテキストエディタコンポーネント
  useBlockProps,
} from "@wordpress/block-editor";
import "./editor.scss"; // エディター用スタイルシートのインポート

export default function ({ attributes, setAttributes }) {
  // 属性の分割代入
  const { title, description } = attributes;

  // ブロックのプロパティを設定
  const blockProps = useBlockProps();

  // コンテンツが変更されたときの処理
  const onChangeTitle = (newTitle) => {
    setAttributes({ title: newTitle });
  };

  // コンテンツが変更されたときの処理
  const onChangeDescription = (newDescription) => {
    setAttributes({ description: newDescription });
  };

  return (
    <li {...blockProps}>
      <div className="c-block-flow-horizontal-title-text">
        <RichText
          tagName="p"
          className="c-block-flow-horizontal-title-text__title"
          onChange={onChangeTitle}
          value={title}
          allowedFormats={[]}
          placeholder="タイトルを入力"
        />
        <RichText
          tagName="p"
          className="c-block-flow-horizontal-title-text__description"
          onChange={onChangeDescription}
          value={description}
          allowedFormats={["core/italic", "core/bold", "core/text-color"]}
          placeholder="説明を入力"
        />
      </div>
    </li>
  );
}
